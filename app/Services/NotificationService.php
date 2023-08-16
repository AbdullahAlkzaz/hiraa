<?php


namespace App\Services;


use App\External\NotificationExternal;
use Illuminate\Support\Facades\Http;

class NotificationService
{

    protected NotificationExternal $notificationExternal;

    public function __construct(NotificationExternal $notificationExternal)
    {
        $this->notificationExternal = $notificationExternal;
    }


    /**
     * Push Notification
     * @param string $type
     * @param string $category
     * @param array $body
     * @param array $data
     * @return array|mixed
     * @throws \ErrorException
     */
    public function pushNotification(string $type, string $category, array $body, array $data)
    {
        $data = [
            'type' => $type,
            'category' => $category,
            'en' => $body['en'],
            'ar' => $body['ar'],
            'data' => $data,
        ];
        $res = $this->notificationExternal->storeNotificationRequest($data);
        // Check If Failed Request
        if($res->failed()) {
            throw new \ErrorException('server error');
        }
        return $res->json();
    }


    public function pushNotificationToSpecificUser(string $type, string $category,$userId, array $body, array $data)
    {
        $data = [
            'type' => $type,
            'user_id' => $userId,
            'category' => $category,
            'en' => $body['en'],
            'ar' => $body['ar'],
            'data' => $data,
        ];

        \Log::debug('NotificationService-pushNotificationToSpecificUser', [
            'parameters' => $data
        ]);

        $url = config('urls.NOTIFICATION_STORE_SHIPPING_URL');

        $response =  Http::acceptJson()
            ->withHeaders(['Internal-Signature' => config('urls.QVM_NOTIFICATION_TOKEN')])
            ->post("$url", $data);

        // Check If Failed Request
        if($response->failed()) {
            \Log::error('NotificationService-pushNotificationToSpecificUser', [
                'response' => $response->json()
            ]);

            return null;
        }

        return $response->json();
    }
}
