<?php
return [
    'SUBSCRIBER_BASE_URL' => env('SUBSCRIBER_BASE_URL'),
    'BANK_DETAILS' => env('SUBSCRIBER_BASE_URL') . 'bank-details/',
    'USERS_LIST_BY_IDS' => env('SUBSCRIBER_BASE_URL') . 'companies',
    // Notifications Url
    'NOTIFICATION_STORE_URL' => env('NOTIFICATION_BASE_URL') . '/user/notifications/store',
    // Notification Keys Url
    'NOTIFICATION_KEY_DETAILS_URL' => env('NOTIFICATION_BASE_URL') . '/user/notification-keys/key/',
    'NOTIFICATION_STORE_SHIPPING_URL' => env('NOTIFICATION_BASE_URL') . '/user/shipping/notifications/store',
    'WALLET' => env('QVMWALLETURL') . '/api/v1/qvm',
    'QVM_WALLET' => env('QVMWALLETURL') . '/api/v1/qvm',
    'QVM_SELLER_WALLET' => env('QVMWALLETURL') . '/api/v1/qvm_seller',

    'QVM_NOTIFICATION_TOKEN' => env('QVM_NOTIFICATION_TOKEN' ,'')
];
