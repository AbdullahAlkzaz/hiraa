<?php

namespace App\Http\Controllers;

use App\Events\SignUpVerificationMailEvent;
use App\Http\Requests\UserAuthenticationRequest;
use App\Models\Price;
use App\Models\Type;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\UserResetPasswordEvent;
use App\Repositories\User\UserRepositoryInterface;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserAuthenticationController extends Controller
{
    private UserRepositoryInterface $repository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function login()
    {
        if (auth()->user()) {
            return redirect('dashboard');
        }
        return view('auth.login')->with([
            'title' => __("تسجيل الدخول"),
            'email' => __("البريد الإلكترني"),
            "password" => __("كلمة المرور"),
            "start_exploring" => __("تسجيل الدخول"),
        ]);
    }
    //Perform login
    public function signIn(UserAuthenticationRequest $request)
    {
        $user = $this->repository->getUserByEmail($request->email);
        if($user && !$user->hasVerifiedEmail()){
            session()->flash("message", __("هذا الحساب غير مفعل"));
            return back();
        }
        if($user && $user->approved == 0){
            session()->flash("message", __("من فضلك انتظر الأدمن ليقبل الحساب الخاص بك"));
            return back();
        }
        if (!Auth::attempt($request->only('email', 'password'), isset($request->remember_me) ? true : false)) {
            session()->flash("message", __("خطأ في البريد الألكتروني أو كلمة المرور"));
            return back();
        }
        return redirect("articles");
    }

    public function signUp()
    {
        $companies = $this->repository->where("type_id", Type::COMPANY_TYPE)->get();
        $governments = Price::groupBy("government")->pluck("government")->toArray();
        return view('auth.register')->with([
            'title' => __("إنشاء حساب"),
            'name' => __(" الاسم بالكامل"),
            'email' => __("البريد الإلكتروني"),
            "password" => __("كلمة المرور"),
            'password_confirmation' => __("تأكيد كلمة المرور"),
            "app_name" => config('app.name'),
            "companies" => $companies,
            "governments" => $governments,
        ]);
    }

    public function register(UserAuthenticationRequest $request)
    {
        if (session()->has('validation_message')) {
            session()->flash('message', session("validation_message"));
            return back();
        }
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $data['type_id'] = ($data['is_seller'] == 0 || $data['is_seller'] == 2) ? 4 : 3; 
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
            $data['is_seller'] = $data['is_seller'] == 1 ? 1 : 0;
            $this->repository->create($data);
            event(new SignUpVerificationMailEvent($request->validated()));
            DB::commit();
            session()->flash('message', __("من فضلك قم بفحص البريد الإلكتروني لتأكيد العملية"));
            return redirect("verifyShow");
        } catch (Exception $exception) {
            DB::rollBack();
            session()->flash('message', $exception->getMessage());
            return back();
        }
    }
    public function forgot()
    {
        return view('auth.forgot-password');
    }

    public function resetPassword(UserAuthenticationRequest $request)
    {
        if (session()->has('validation_message')) {
            session()->flash("message", session("validation_message"));
            return back();
        }
        $user = $this->repository->getUserByEmail($request->email);
        if (!$user) {
            session()->flash("message", "ليس لديك الصلاحية لذلك");
            return back();
        }
        DB::beginTransaction();
        try {
            $token = app('auth.password.broker')->createToken($user);
            DB::table('password_resets')->where('email', $request->email)->delete();
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            $user->token = $token;
            event(new UserResetPasswordEvent($user));
            DB::commit();
            session()->flash("message", __("من فضلك تأكد من البريد اللكتروني الخاص بك"));
            return redirect("login");
        } catch (Exception $exception) {
            DB::rollBack();
            session()->flash("message", $exception->getMessage());
            return back();
        }
        

    }
    public function verifyShow(){
        if (auth()->user()) {
            return redirect('dashboard');
        }
        return view("auth.verify-email")->with([
            'title' => __("تأكيد المستخدم"),
            'email' => __("البريد الإلكترني"),
            "password" => __("كلمة المرور"),
            "start_exploring" => __("من فضلك تفحص البريد الاكتروني الخاص بك و قم بنسخ الكود هنا"),
            "app_name" => config('app.name'),
        ]);
    }
    public function verifyUser(UserAuthenticationRequest $userAthenticationRequest)
    {
        $user =  $this->repository->getUserByToken($userAthenticationRequest->verification_code);
        if (!$user) {
            session()->flash('message',"الكود غير صحيح او منتهي!! عذرا");
            return back();        
        }
        if ($user->hasVerifiedEmail()) {
            session()->flash('message',"من فضلك حاول تسجيل الدخول");
            return redirect("login"); 
        }        
        
        $user->markEmailAsVerified();
        Wallet::create([
            "user_id" => $user->id
        ]);
        session()->flash('message',"من فضلك حاول تسجيل الدخول أو انتظر موافقة الأدمن");
        return redirect("login");    
    }
    public function newPassword()
    {
        return view("auth.reset-password")->with(["token" => request()->token]);
    }
    public function changePassword(UserAuthenticationRequest $request)
    {
        if (session()->has('validation_message')) {
            session()->flash('message',session("validation_message"));
            return back();
        }
        $user = $this->repository->getUserByToken($request->token);
        if ($user == null) {
            session()->flash('message',session("هذا العميل غير موجود في الداتا الحالية"));
            return back();
        }
        $user->update([
            "password" => $request->password,
        ]);
        DB::table('password_resets')->where('token', $user->email)->delete();
        session()->flash('message',session("تم تغيير كلمة المرور من فضلك قم بتسجيل الدخول"));
        return redirect("login");
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect("login");
    }
}