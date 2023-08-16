<?php


namespace App\External;


use Illuminate\Support\Facades\Http;

class NotificationExternal
{

    /**
     * Push Notification
     * @param array $data
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function storeNotificationRequest(array $data)
    {
        // Set Url
        $url = config('urls.NOTIFICATION_STORE_URL');
        return Http::acceptJson()->withToken(request()->bearerToken())->post($url, $data);
    }

}
