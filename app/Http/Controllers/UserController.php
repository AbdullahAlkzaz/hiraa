<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Type;
use App\Models\Wallet;
use Exception;
use Illuminate\Http\Request;
use App\Repositories\Permission\PermissionsRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    protected UserRepositoryInterface $repository;
    protected PermissionsRepositoryInterface $permissionRepository;
    public function __construct(UserRepositoryInterface $userRepository, PermissionsRepositoryInterface $permissionRepository)
    {
        $this->repository = $userRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function index(Request $request){
        $users = $this->repository->getUsers($request->all());
        return view("point.users.users")->with([
            'users' => $users,
        ]);
    }
    public function create(){
        if (!auth()->user()->hasPermissionTo('create-users') && !(auth()->user()->type_id == Type::COMPANY_TYPE || auth()->user()->type_id == Type::OFFICE_TYPE)) {
            session()->flash("message",  __("ليس لديك الصلاحية"));
            return back();
        }
        return view("point.users.user_add");
    }
    public function show($user_id)
    {
        if (!auth()->user()->hasPermissionTo('modify-users') && !auth()->user()->hasRole('admin') && !auth()->user()->id == $user_id) {
            return redirect()->back()->withErrors(['message' => __("ليس لديك الصلاحية")]);
        }
        $user = $this->repository->getById($user_id);
        $next = $this->repository->where('id', '>', $user_id)->get()->min('id');
        $previous = $this->repository->where('id', '<', $user_id)->get()->max('id');
        return view("point.users.user_view")->with([
            'title' => __('website.title_edit_user'),
            'user' => $user,
            'next' => $next,
            'previous' => $previous
        ]);
    }

    

    public function update(UserRequest $request)
    {
        if (session()->has('validation_message')) {
            session()->flash('message', session("validation_message"));
            return back();
        }
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $data['type_id'] = $data['is_seller'] == 1 ? 3 : 4; 
            if($request->hasFile('id_image_front')){
                $path = Storage::disk('public')->put('id_images', $request->id_image_front);
                $data['id_image_front'] = $path;
            }
            if($request->hasFile('id_image_back')){
                $path = Storage::disk('public')->put('id_images', $request->id_image_back);
                $data['id_image_back'] = $path;
            }
            if($request->hasFile('shop_logo')){
                $path = Storage::disk('public')->put('shop', $request->shop_logo);
                $data['shop_logo'] = $path;
            }
            $this->repository->updateById($request->id,$data);
            DB::commit();
            session()->flash('message', __("تم تعديل المستخدم بنجاح"));
            return back();
        } catch (Exception $exception) {
            DB::rollBack();
            session()->flash('message', $exception->getMessage());
            return back();
        }
    }

    public function delete($user_id)
    {
        $this->repository->deleteById($user_id);
        session()->flash("message", "تم حذف المستخدم");
        return back();
    }

    public function updateUserPermissions(Request $request)
    {
        $user = $this->repository->getById($request->id);
        if ($request->status == "true") {
            $user->givePermissionTo($request->permission);
        }else{
            $user->withdrawPermissionTo($request->permission);
        }
        return true;
    }

    public function confirm($user_id){
        $this->repository->getById($user_id)->update(['approved' => 1]);
        session()->flash("message", "تم تأكيد المستخدم");
        return back();
    }
    public function unConfirm($user_id){
        $this->repository->getById($user_id)->update(['approved' => 0]);
        session()->flash("message", "تم إلغاء تأكيد المستخدم");
        return back();
    }

    public function store(UserRequest $request){
        if (session()->has('validation_message')) {
            session()->flash('message', session("validation_message"));
            return back();
        }
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $data['type_id'] = $data['is_seller'] == 1 ? 3 : 4; 
            $data['email_verified_at'] = now(); 
            $data['approved'] = 1;
            $data['company_id'] = auth()->user()->type_id == Type::COMPANY_TYPE ? auth()->user()->id : null;
            $data['office_id'] = auth()->user()->type_id == Type::OFFICE_TYPE ? auth()->user()->id : null;
            if($request->hasFile('id_image_front')){
                $path = Storage::disk('public')->put('id_images', $request->id_image_front);
                $data['id_image_front'] = $path;
            }
            if($request->hasFile('id_image_back')){
                $path = Storage::disk('public')->put('id_images', $request->id_image_back);
                $data['id_image_back'] = $path;
            }
            if($request->hasFile('shop_logo')){
                $path = Storage::disk('public')->put('shop', $request->shop_logo);
                $data['shop_logo'] = $path;
            }
            $user = $this->repository->create($data);
            Wallet::create(['user_id' => $user->id]);
            DB::commit();
            session()->flash('message', __("تم إنشاء المستخدم بنجاح"));
            return back();
        } catch (Exception $exception) {
            DB::rollBack();
            session()->flash('message', $exception->getMessage());
            return back();
        }
    }
    
}
