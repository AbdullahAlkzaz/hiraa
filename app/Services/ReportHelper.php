<?php
namespace App\Services;
use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
use App\Models\CompanyDocument;

class ReportHelper
{
    use ApiTrait;
    use QVMTrait;





    public static function month_sales()
    {
        $endpoint = config('app.qvm_new_url')."/invoice/v2/pb/summary-report";
        $summary_report = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $summary_report;
    }
    public static function stock_values()
    {
        $endpoint = config('app.qvm_new_url')."/product/v1/qvm/in/summary-report";
        $summary_report = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $summary_report;
    }
    public static function companies()
    {
        $endpoint = config('app.qvm_new_url')."/subscriber/v2/pb/summary-report";
        $summary_report = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $summary_report;
    }
    public static function get_keywords_search_activity()
    {
        $from = date('2023-01-01');
        $to = date("Y-m-d");
        $endpoint = config('app.qvm_new_url')."/subscriber/v2/pb/search-activity/from/" . $from . "/to/" . $to;
        $summary_report = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $summary_report;
    }
    public static function general_roles()
    {
        $from = date('2023-01-01');
        $to = date("Y-m-d");
        $endpoint = config('app.qvm_new_url')."/subscriber/v2/pb/search-activity/from/" . $from . "/to/" . $to;
        $summary_report = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $summary_report;
    }
    public static function general_sactivities()
    {
        $from = date('2023-01-01');
        $to = date("Y-m-d");
        $endpoint = config('app.qvm_new_url')."/subscriber/v2/pb/search-activity/from/" . $from . "/to/" . $to;
        $summary_report = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $summary_report;
    }
    public static function get_stock_keywords_kearch_activity()
    {
        $from = date('2023-01-01');
        $to = date("Y-m-d");
        $endpoint = config('app.qvm_new_url')."/subscriber/v2/pb/search-stock-activity/from/" . $from . "/to/" . $to;
        $summary_report = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $summary_report;
    }
    public static function get_replacement_keywords_search_activity()
    {
        $from = date('2023-01-01');
        $to = date("Y-m-d");
        $endpoint = config('app.qvm_new_url')."/subscriber/v2/pb/search-replacement-activity/from/" . $from . "/to/" . $to;
        $summary_report = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $summary_report;
    }
    public static function pin_comments_user()
    {
        $userId = 1;
        $endpoint = config('app.qvm_new_url')."/subscriber/v2/pb/pin-comments/user/" . $userId;
        $summary_report = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $summary_report;
    }


    public static function company_month_sales($company_id)
    {
        $endpoint = config('app.qvm_new_url')."/subscriber/v2/pb/company-summary-report/".$company_id;
        $result = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $result;
    }

    public static function company_stock_values($company_id)
    {
        $endpoint = config('app.qvm_new_url')."/product/v1/qvm/in/summary-report/company/".$company_id;
        $result = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $result;
    }


    public static function company_comments($company_id)
    {
        $endpoint = config('app.qvm_new_url')."/subscriber/v2/pb/company-comments/".$company_id;
        $result = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $result;
    }



    public static function company_labels($company_id)
    {
        $endpoint = config('app.qvm_new_url')."/subscriber/v2/pb/company-labels/".$company_id;
        $result = (new class
        {use QVMTrait;})->getData($endpoint, $data = []);
        return $result;
    }

    public static function search_keywords_by_company_id($company_id , $max = 50)
    {
        $endpoint = config('app.qvm_url') . "/subscriber/search-keywords/company/{$company_id}/max/{$max}";

        $data = (new class {use QVMTrait;})->getData($endpoint, $data = []);

        if (empty($data)){
            $data = [];
        }

        return $data;
    }


    public static function searches_monthly_summary($company_id)
    {
        $endpoint = config('app.qvm_url') . "/subscriber/search-statisics/company/{$company_id}";

        $data = (new class {use QVMTrait;})->getData($endpoint, $data = []);

        if (empty($data) || empty($data['monthlySummary'])){
            return [];
        }

        return $data['monthlySummary'];
    }

    public static function company_attachments($id){
        $endpoint = config('app.qvm_order_base_url') . "/config/company-documents/".$id;

        $data = (new class {use QVMTrait;})->getData($endpoint, $data = []);

        if (empty($data) || empty($data['files'])){
            return [];
        }
        return $data['files'];
    }

}
