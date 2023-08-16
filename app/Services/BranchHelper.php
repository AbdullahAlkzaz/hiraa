<?php
namespace App\Services;
use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PurchaseOrder;
use App\Models\ShippingType;

class BranchHelper
{
    use ApiTrait;
    use QVMTrait;


    public static function format_branch($branch)
    {
        // return $subscriber;
        $formatted_branch = [];
        $formatted_branch['branch_id'] = $branch['id'];
        $formatted_branch['company_id'] = $branch['companyId'];
        $formatted_branch['branch_name'] = $branch['nameAr'];
        $formatted_branch['branch_en_name'] = $branch['name'];
        $formatted_branch['branch_en_name'] = $branch['name'];
        $formatted_branch['city_id'] = $branch['cityId'];
        $formatted_branch['long'] = $branch['longitude'];
        $formatted_branch['lat'] = $branch['latitude'];

        $formatted_branch['managerName'] = $branch['managerName'];
        $formatted_branch['managerPhone'] = $branch['managerPhone'];
        $formatted_branch['nameAr'] = $branch['nameAr'];
        $formatted_branch['name'] = $branch['name'];

        return $formatted_branch;
    }


    public static function branch_to_array($branches)
    {
        $branches_arr = [];
        if(is_array($branches)){
            foreach ($branches as $branch) {
                $branches_arr[$branch['id']] = self::format_branch($branch);
            }
        }
        return $branches_arr;
    }

    public static function branchesByBranchesIds($ids = []){
        $endpoint = config('app.qvm_new_url') ."/subscriber/v2/pb/branchs-ids";
        $branches_ids = implode(',',$ids);
        $data = [
            "ids"=>$branches_ids
        ];
        $res = (new class() {use QVMTrait; })->postData($endpoint, $data);
        return $res ?? [];
    }

    public static function getShippingTypes(){
        $shippingTypes = ShippingType::all();
        return $shippingTypes;
    }
    public static function cities_by_cities_ids_response($city_ids = [], $map = false)
    {
        $endpoint = config('app.qvm_new_url') . "/location/v1/pb/cities-ids";

        $data = ['ids' => implode(",",$city_ids)];

        $cities = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);
        if ($map) {
            $mapedcities = [];
            if($cities){
                foreach ($cities as $city) {
                    $mapedcities[$city['id']] = [
                        "city_id" => $city['id'],
                        "name" => $city['name'],
                        "name_ar" => $city['nameAr'],
                    ];
                }
            }
            $cities = $mapedcities;
        }
        return $cities;
    }
}
