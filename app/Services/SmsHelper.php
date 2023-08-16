<?php

namespace App\Services;

use App\Http\Traits\QVMTrait;

class SmsHelper
{
    public static function send($subscriber_id, $purpose, $message)
    {
        $s = SubscriberHelper::subscribers_by_subscriber_id($subscriber_id);

        if (empty($s)) {
            return null;
        }

        $endpoint = config('app.qvm_new_url') . '/messaging/v2/in/sms';
        $data = [
            'mobile' => $s['mobile'] ?? null,
            'email' => $s['email'] ?? null,
            'purpose' => $purpose,
            'values' => [
                'message' => $message
            ]
        ];

        $result = (new class {
            use QVMTrait;
        })->postData($endpoint, $data);

        \Log::debug('SmsHelper-send', [
            'result' => $result
        ]);
    }

}
