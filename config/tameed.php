<?php 

if(config("app.env") == "local"){
    return [
        "payment_request_endpoint" => "https://demo.ta3meed.com/paymentRequest",
        "merchant_commercial_registeration_number" => "2012201200",
    ];
}else{
    return [
        "payment_request_endpoint" => "https://demo.ta3meed.com/paymentRequest",
        "merchant_commercial_registeration_number" => "2012201200",
    ];
}

?>