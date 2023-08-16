<?php
namespace App\Services;
use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;


class CountryHelper
{
    use ApiTrait;
    use QVMTrait;

    public static function getCompaniesContries($CountriesIDs = null){
        $endpoint = config('app.qvm_new_url') . "/location/v1/pb/countries-only";
        $result = (new class
        {use QVMTrait;})->getData($endpoint, [], $secret = "MOBILE_SECRET");
        $mapedCountries = [];
        foreach($result as $country){
            $mapedCountries[$country["id"]] = $country['name'];
        }
        return $mapedCountries;
    }
    public static function format_city($company)
    {
        // return $subscriber;
        $formatted_company = [];
        $formatted_company['company_id'] = $company['id'];
        $formatted_company['company_name'] = $company['nameAr'];
        $formatted_company['company_en_name'] = $company['name'];

        $formatted_company['company_email'] = $company['managerMail'];
        $formatted_company['company_location'] = $company['cityId'];
        $formatted_company['default_sales_tax'] = $company['defaultSalesTax'];

        return $formatted_company;
    }


    public static function city_to_array($companies)
    {
        $companies_arr = [];
        if (is_array($companies)) {
            foreach ($companies as $company) {
                $companies_arr[$company['id']] = CompanyHelper::format_company($company);
            }
        }
        return $companies_arr;
    }
    public static function cities_by_cities_ids($city_ids = [], $map = false)
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
                    $mapedcities[$city['id']] = $city['name'];
                }
            }
            $cities = $mapedcities;
        }
        return $cities;
    }

}
