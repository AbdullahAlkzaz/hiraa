<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Type;
use App\Models\Wallet;
use App\Repositories\User\UserRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficeController extends Controller
{
    protected UserRepositoryInterface $repository;
    public function __construct(UserRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function index(Request $request){
        $offices = $this->repository->getOffices($request->all());
        return view("point.offices.offices")->with([
            'offices' => $offices,
        ]);
    }
    public function create(){
        if (!auth()->user()->hasPermissionTo('create-users') && !auth()->user()->hasRole('admin')) {
            session()->flash("message",  __("ليس لديك الصلاحية"));
            return back();
        }
        return view("point.offices.office_add");
    }
    public function store(UserRequest $request){
        if (session()->has('validation_message')) {
            session()->flash('message', session("validation_message"));
            return back();
        }
        try {
            DB::beginTransaction();
            $data = $request->except('manager_name', "manager_phone", "tax_number", "manager_email", "manager_national_number", "password_confirmation", "_token");
            $data['type_id'] = Type::OFFICE_TYPE; 
            $data['company_id'] = auth()->user()->type_id == Type::COMPANY_TYPE ?  auth()->user()->id : null;
            $data['email_verified_at'] = now();
            $data['approved'] = 1; 
            $office_details_data = [
                'manager_name' => $request->manager_name,
                'manager_phone' => $request->manager_phone,
                'tax_number' => $request->tax_number,
                'manager_email' => $request->manager_email,
                'manager_national_number' => $request->manager_national_number,
            ];
            $office = $this->repository->create($data);
            $this->repository->addOfficeDetails($office->id, $office_details_data);
            Wallet::create(["user_id" => $office->id]);
            DB::commit();
            session()->flash('message', __("تم إنشاء المكتب بنجاح"));
            return back();
        } catch (Exception $exception) {
            DB::rollBack();
            session()->flash('message', $exception->getMessage());
            return back();
        }
    }
    public function show($id){
        $office = $this->repository->getOffice($id);
        return view("point.offices.office_view", compact('office'));
        
    }
    public function update(UserRequest $request){
        if (session()->has('validation_message')) {
            session()->flash('message', session("validation_message"));
            return back();
        }
        try {
            DB::beginTransaction();
            $data = $request->except('id','manager_name', "manager_phone", "tax_number", "manager_email", "manager_national_number", "password_confirmation", "_token");
            $data['type_id'] = Type::OFFICE_TYPE; 
            $data['email_verified_at'] = now(); 
            $data['approved'] = 1; 
            $office_details_data = [
                'manager_name' => $request->manager_name,
                'manager_phone' => $request->manager_phone,
                'tax_number' => $request->tax_number,
                'manager_email' => $request->manager_email,
                'manager_national_number' => $request->manager_national_number,
            ];
            $this->repository->updateById($request->id,$data);
            $this->repository->updateOfficeDetail($request->id, $office_details_data);
            DB::commit();
            session()->flash('message', __("تم تعديل المكتب بنجاح"));
            return back();
        } catch (Exception $exception) {
            DB::rollBack();
            session()->flash('message', $exception->getMessage());
            return back();
        }
    }

    public function delete($id){
        $this->repository->deleteOfficeDetail($id);
        $this->repository->deleteById($id);

        session()->flash("message", "تم حذف المكتب");
        return back();
    }


}
