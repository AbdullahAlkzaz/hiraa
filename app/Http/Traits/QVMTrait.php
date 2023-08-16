<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


trait QVMTrait
{
    public function getPureToken()
    {
        $token = Auth::user()->jwt_token;
        return $token;

    }
    public function guestPostData($url, $data = [])
    {
        $response = Http::acceptJson()->post($url, $data)->json();

        return $response;
    }
    public function postData($url, $data = [])
    {
        $jwt_token = $this->getPureToken();
        if(isset($data["file"])){
            $response = Http::acceptJson()->withToken($jwt_token)->attach('file', $data["file"],"file.xls")->post($url, $data)->json();
        }else{
            $response = Http::acceptJson()->withToken($jwt_token)->post($url, $data)->json();
        }
        return $response;
    }

    public function putData($url, $data = [])
    {
        $jwt_token = $this->getPureToken();
        $response = Http::acceptJson()->withToken($jwt_token)->put($url, $data)->json();
        return $response;
    }
    public function getData($url, $data = [], $secret = null)
    {
        $jwt_token = $secret ?: $this->getPureToken();
        $response = Http::acceptJson()->withToken($jwt_token)->get($url, $data)->json();
        return $response;
    }

    public function deleteData($url,$data = []){
        $jwt_token = $this->getPureToken();
        $response = Http::acceptJson()->withToken($jwt_token)->delete($url, $data)->json();
        return $response;
    }
}
