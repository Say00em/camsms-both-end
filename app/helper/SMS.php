<?php
// namespace App\helper;
use App\Models\SmsConfig;
class SMS
{

    public static function Send($number, $message)
    {
        $smsConfig = SmsConfig::first();

        $url        = $smsConfig->url;
        $api_key    = $smsConfig->api_key;
        $senderid   = $smsConfig->sender_id;

        $data = [
            "api_key"   => $api_key,
            "senderid"  => $senderid,
            "number"    => $number,
            "message"   => $message
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = json_decode(curl_exec($ch));

        // return $response;

        if ($response && isset($response->response_code) && $response->response_code != 202) {
            $errorMessage = $response->error_message;

            return ['success' => false, 'error_message' => $errorMessage];
        }

        return ['success' => true];
    }
}
