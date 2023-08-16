<?php
namespace App\Services;

use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
use App\Models\SubscriberPaymentType;

class SubscriberHelper
{

    // SubscriberHelper
    use ApiTrait;
    use QVMTrait;
    public static function temp_subscriber_name($subscribers)
    {
        $subscribers_ids = [];
        $subscribers_arr = [];
        foreach ($subscribers as $subscriber) {
            $subscribers_ids[] = $subscriber->subscriber_company_id;
        }
        $subscribers = self::subscribers_by_subscriber_ids($subscribers_ids);
        if($subscribers){
        foreach ($subscribers as $subscriber) {
            $subscriber['is_cash_enable'] = null;
            $subscriber['is_deferred_enable'] = null;
            $subscriber['current_balance'] = null;
            $subscribers_arr[$subscriber['id']] = SubscriberHelper::format_subscriber($subscriber);
        }
    }
        return $subscribers_arr;
    }
    public static function subscriber_to_array($subscribers)
    {
        $subscribers_arr = [];
        if (is_array($subscribers)) {
            foreach ($subscribers as $subscriber) {
                $subscribers_arr[$subscriber['id']] = SubscriberHelper::format_subscriber($subscriber);
            }
        }
        return $subscribers_arr;
    }
    public static function first_active_shipping($subscriber_id)
    {
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/qvm/in/companies";
        $data = ['ids' => [$subscriber_id]];
        $subscribers = (new class

        {use QVMTrait;})->postData($endpoint, $data);
        return (isset($subscribers[0])) ? $subscribers[0] : null;
    }
    public static function subscribers_by_subscriber_id($subscriber_id)
    {
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/qvm/in/companies";
        $data = ['ids' => [$subscriber_id]];
        $subscribers = (new class

        {use QVMTrait;})->postData($endpoint, $data);
        return (isset($subscribers[0])) ? $subscribers[0] : null;
    }
    public static function subscribers_by_subscriber_ids($subscriber_ids = [])
    {
        $endpoint = config('app.qvm_new_url') . "/subscriber/v2/qvm/in/companies";
        $data = ['ids' => $subscriber_ids];
        $subscribers = (new class

        {use QVMTrait;})->postData($endpoint, $data);
        return $subscribers;
    }
    public static function format_subscriber($subscriber)
    {
        // return $subscriber;
        $formatted_subscriber = [];
        $formatted_subscriber['subscriber_id'] = $subscriber['id'];
        $formatted_subscriber['subscriber_name'] = $subscriber['name'];
        $formatted_subscriber['subscriber_email'] = $subscriber['email'];
        $formatted_subscriber['subscriber_mobile'] = $subscriber['mobile'];
        $formatted_subscriber['is_cash_enable'] = (isset($subscriber['is_cash_enable'])) ? $subscriber['is_cash_enable'] : null;
        $formatted_subscriber['is_deferred_enable'] = (isset($subscriber['is_deferred_enable'])) ? $subscriber['is_deferred_enable'] : null;
        $formatted_subscriber['current_balance'] = (isset($subscriber['current_balance'])) ? $subscriber['current_balance'] : null;
        if (isset($subscriber['transactions'])) {
            $formatted_subscriber['transactions'] = $subscriber['transactions'];
        }
        // $formatted_subscriber['subscriber_payment_types'] = $subscriber['subscriber_payment_types'];
        $formatted_subscriber['labels'] = self::format_labels($subscriber['labels']);
        return $formatted_subscriber;
    }
    public static function format_labels($labels)
    {
        $formatted_labels = [];
        foreach ($labels as $label) {
            $formatted_labels[] = self::format_label($label);
        }
        return $formatted_labels;
    }
    public static function format_label($label)
    {
        $formatted_label = [
            'id' => $label['id'],
            'label' => $label['label'],
            'color' => $label['color'],
        ];
        return $formatted_label;
    }
    public static function activate_cash_payment($seller_id, $subscriber_id)
    {
        $cash = SubscriberPaymentType::
            where('subscriber_id', $subscriber_id)
            ->where('seller_id', $seller_id)
            ->where('payment_type_id', 1)
            ->first();
        if (!$cash) {
            $subscriber_payment_type = new SubscriberPaymentType();
            $subscriber_payment_type->seller_id = $seller_id;
            $subscriber_payment_type->subscriber_id = $subscriber_id;
            $subscriber_payment_type->payment_type_id = 1;
            $subscriber_payment_type->is_active = 1;
            $subscriber_payment_type->save();
        }
    }
}
