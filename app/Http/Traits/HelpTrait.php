<?php
namespace App\Http\Traits;

use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Storage;
trait HelpTrait
{
    public function DateAdditionAndSubtraction($date, $value, $type)
    {
        $date = new Carbon($date);
        if ($type == '-') {
            $date->subMinutes($value);
        } elseif ($type == '+') {
            $date->addMinutes($value);
        }
        return $date;
    }
    public function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) {
            $string = array_slice($string, 0, 1);
        }
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
    public function createImageFromBase64($file_data = "", $dir = 'images')
    {
        //generating unique file name;
        $file_name = 'image_' . time() . rand(111, 999) . '.png';
        //@list($type, $file_data) = explode(';', $file_data);
        //@list(, $file_data)      = explode(',', $file_data);
        if ($file_data != "") {
            // storing image in storage/app/public Folder
            //  \Storage::disk('public')->put('orders/'.$order_id.'/'.$file_name,base64_decode($file_data));
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }
            // file_put_contents($dir.'/'.$file_name, base64_decode($file_data));
            Storage::disk('custom_folder')->put($dir . '/' . $file_name, base64_decode($file_data));
        }
        return '/' . $dir . '/' . $file_name;
    }
    public function get_percent_of_number($number, $percent)
    {
        // return $percent  * $number;
        return ($percent / 100) * $number;
    }
    public function get_percentage($total, $number)
    {
        // get_percentage(100,50).'%'; // 50%
        if ($total > 0) {
            return round($number / ($total / 100), 2);
        } else {
            return 0;
        }
    }
    public function check_balance()
    {
    }
    public function sendSMS($numbers, $msg)
    {
        // $var = rtlim($numbers, '0');
        //  $numbers = rtlim($var, '0');
        //  $numbers = rtlim($var, '0');
        //Storage::disk('local')->append('sms.txt', $numbers);
        $data = ["userName" => 'm2telecom', "userSender" => 'M2telecom', "apiKey" => "1680e0e9a5faf9af2d775411b37aa713", 'numbers' => $numbers, 'msg' => $msg];
        $url = 'https://www.msegat.com/gw/sendsms.php';
        $CURLOPT_HTTPHEADER = [
            'Content-Type:application/json',
        ];
//create a new cURL resource
        $ch = curl_init($url);
        $payload = json_encode($data);
//attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//set the content type to application/json
//curl_setopt($ch, CURLOPT_HTTPHEADER, $CURLOPT_HTTPHEADER);
//return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//execute the POST request
        $result = curl_exec($ch);
        if (curl_error($ch)) {
            $error_msg = curl_error($ch);
            echo $error_msg;
        }
//close cURL resource
        curl_close($ch);
        $json_decode_result = json_decode($result, true);
        return $json_decode_result;
    }
}
