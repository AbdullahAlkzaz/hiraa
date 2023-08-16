<?php
namespace App\Services;
use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
class SearchHelper
{
    use ApiTrait;
    use QVMTrait;
    public static function subscriber_by_name($subscriber_name)
    {
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/pb/subscriber/search-name/" . $subscriber_name;
        $data = [];
        $result = (new class
        {use QVMTrait;})->getData($endpoint, $data);
        return $result;
    }
    public static function company_by_name($company_name)
    {
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/pb/subscriber/search-name/" . $company_name;
         
        $data = [];
        $result = (new class
        {use QVMTrait;})->getData($endpoint, $data);
        return $result;
    }
    public static function search_companies($query, $labelId = 0, $appcode = 0)
    {
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/qvm/in/search-companies";
        $data = [
            "query" => $query, "labelId" => $labelId, "appcode" => $appcode,
        ];
        $result = (new class
        {use QVMTrait;})->postData($endpoint, $data);
        return $result;
    }
}
