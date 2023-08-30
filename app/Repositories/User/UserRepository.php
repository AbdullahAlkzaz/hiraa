<?php

namespace App\Repositories\User;
use App\Models\CompanyDetail;
use App\Models\OfficeDetail;
use App\Models\Type;
use App\Models\User;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

//use Your Model

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;
    public function __construct(User $model){
        $this->model = $model;
    }
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return User::class;
    }
    public function getUserByEmail(string $email)
    {
         return $this->model->email($email)->first();
    }
    public function findUnexpiredUser($id)
    {
        return $this->model->where("id", $id)->where("created_at", ">", Carbon::now()->subHours(1))->first();
    }


    public function getUserByToken($token)
    {
        $rememberToken = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>',  Carbon::now()->subHours(1))
            ->first();
        
        if (empty($rememberToken)) {
            return null;
        }
        return $this->model->where("email", $rememberToken->email)->first();
    }
    public function allWithoutAuthed(){
        return User::where('id',"!=",auth()->user()->id)->get();
    }
    public function detachAllPermossions($user_id){
        DB::table('users_permissions')->where('user_id',$user_id)->delete();
    } 

    public function getUsers($data){
        return User::where(function($query) use($data){
            if(isset($data['name'])){
                $query->where("name",$data['name']);
            }
            if(isset($data['email'])){
                $query->where("email",$data['email']);
            }
            if(isset($data['email'])){
                $query->where("email",$data['email']);
            }
            if(auth()->user()->type_id == Type::OFFICE_TYPE ){
                $query->where("office_id", auth()->user()->id);
            }
        })->orderBy("id","DESC")->paginate(10);
    }
    public function getCompanies($data){
        return User::with(['company_details'])->where("type_id", Type::COMPANY_TYPE)->where(function($query) use($data){
            if(isset($data['name'])){
                $query->where("name",$data['name']);
            }
            if(isset($data['email'])){
                $query->where("email",$data['email']);
            }
            if(isset($data['email'])){
                $query->where("email",$data['email']);
            }
        })->orderBy("id","DESC")->paginate(10);
    }
    public function addCompanyDetails($company_id, $data){
        return CompanyDetail::create([
            "company_id" => $company_id,
            "tax_number" => $data['tax_number'],
            "manager_name" => $data['manager_name'],
            "manager_phone" => $data['manager_phone'],
            "manager_email" => $data['manager_email'],
            "manager_national_number" => $data['manager_national_number'],
        ]);
    }
    public function updateCompanyDetail($company_id, $data){
        return CompanyDetail::where('company_id', $company_id)->update([
            "tax_number" => $data['tax_number'],
            "manager_name" => $data['manager_name'],
            "manager_phone" => $data['manager_phone'],
            "manager_email" => $data['manager_email'],
            "manager_national_number" => $data['manager_national_number'],
        ]);
    }

    
    public function deleteCompanyDetail($id){
        return CompanyDetail::where("company_id",$id)->delete();
    }
    public function getCompany($id){
        return User::with(['company_details'])->find($id);
    }

    public function getOffices($data){
        if(auth()->user()->hasRole("admin")){
            return User::with(['company_details'])->where("type_id", Type::OFFICE_TYPE)->where(function($query) use($data){
                if(isset($data['name'])){
                    $query->where("name","LIKE","%".$data['name']."%");
                }
                if(isset($data['email'])){
                    $query->where("email",$data['email']);
                }
            })->orderBy("id","DESC")->paginate(10);
        }
        return User::with(['company_details'])->where("type_id", Type::OFFICE_TYPE)->where(function($query) use($data){
            if(isset($data['name'])){
                $query->where("name","LIKE","%".$data['name']."%");
            }
            if(isset($data['email'])){
                $query->where("email",$data['email']);
            }
        })->where("company_id", auth()->user()->id)->orderBy("id","DESC")->paginate(10);
        
    }
    public function addofficeDetails($office_id, $data){
        return OfficeDetail::create([
            "office_id" => $office_id,
            "tax_number" => $data['tax_number'],
            "manager_name" => $data['manager_name'],
            "manager_phone" => $data['manager_phone'],
            "manager_email" => $data['manager_email'],
            "manager_national_number" => $data['manager_national_number'],
        ]);
    }
    public function updateOfficeDetail($office_id, $data){
        return OfficeDetail::where('office_id', $office_id)->update([
            "tax_number" => $data['tax_number'],
            "manager_name" => $data['manager_name'],
            "manager_phone" => $data['manager_phone'],
            "manager_email" => $data['manager_email'],
            "manager_national_number" => $data['manager_national_number'],
        ]);
    }

    
    public function deleteOfficeDetail($id){
        return OfficeDetail::where("office_id",$id)->delete();
    }
    public function getOffice($id){
        return User::with(['office_details'])->find($id);
    }
    
}
