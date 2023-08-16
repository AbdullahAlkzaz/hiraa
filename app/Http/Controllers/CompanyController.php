<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Type;
use App\Repositories\User\UserRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    protected UserRepositoryInterface $repository;
    public function __construct(UserRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function index(Request $request){
        $companies = $this->repository->getCompanies($request->all());
        return view("point.companies.companies")->with([
            'companies' => $companies,
        ]);
    }
    public function create(){
        if (!auth()->user()->hasPermissionTo('create-users') && !auth()->user()->hasRole('admin')) {
            session()->flash("message",  __("ليس لديك الصلاحية"));
            return back();
        }
        return view("point.companies.company_add");
    }
    public function store(UserRequest $request){
        if (session()->has('validation_message')) {
            session()->flash('message', session("validation_message"));
            return back();
        }
        try {
            DB::beginTransaction();
            $data = $request->except('manager_name', "manager_phone", "tax_number", "manager_email", "manager_national_number", "password_confirmation", "_token");
            $data['type_id'] = Type::COMPANY_TYPE; 
            $data['email_verified_at'] = now(); 
            $data['approved'] = 1; 
            $compan_details_data = [
                'manager_name' => $request->manager_name,
                'manager_phone' => $request->manager_phone,
                'tax_number' => $request->tax_number,
                'manager_email' => $request->manager_email,
                'manager_national_number' => $request->manager_national_number,
            ];
            $company = $this->repository->create($data);
            $this->repository->addCompanyDetails($company->id, $compan_details_data);
            DB::commit();
            session()->flash('message', __("تم إنشاء الشركة بنجاح"));
            return back();
        } catch (Exception $exception) {
            DB::rollBack();
            session()->flash('message', $exception->getMessage());
            return back();
        }
    }
    public function show($id){
        $company = $this->repository->getCompany($id);
        return view("point.companies.company_view", compact('company'));
        
    }
    public function update(UserRequest $request){
        if (session()->has('validation_message')) {
            session()->flash('message', session("validation_message"));
            return back();
        }
        try {
            DB::beginTransaction();
            $data = $request->except('id','manager_name', "manager_phone", "tax_number", "manager_email", "manager_national_number", "password_confirmation", "_token");
            $data['type_id'] = Type::COMPANY_TYPE; 
            $data['email_verified_at'] = now(); 
            $data['approved'] = 1; 
            $compan_details_data = [
                'manager_name' => $request->manager_name,
                'manager_phone' => $request->manager_phone,
                'tax_number' => $request->tax_number,
                'manager_email' => $request->manager_email,
                'manager_national_number' => $request->manager_national_number,
            ];
            $this->repository->updateById($request->id,$data);
            $this->repository->updateCompanyDetail($request->id, $compan_details_data);
            DB::commit();
            session()->flash('message', __("تم تعديل الشركة بنجاح"));
            return back();
        } catch (Exception $exception) {
            DB::rollBack();
            session()->flash('message', $exception->getMessage());
            return back();
        }
    }

    public function delete($id){
        $this->repository->deleteCompanyDetail($id);
        $this->repository->deleteById($id);

        session()->flash("message", "تم حذف الشركة");
        return back();
    }

    public function getCompanyOffices($company_id){
        $offices = $this->repository->where("company_id",$company_id)->where("type_id", Type::OFFICE_TYPE)->get();
        return view("point.companies.components.companies_offices_select")->with([
            'offices' => $offices,
        ]);
    }


}
