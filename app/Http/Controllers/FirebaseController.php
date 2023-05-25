<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    public static function sendNotify($device_token,$notification,$notification_data)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
            'registration_ids' => array($device_token),
            'content_available' => true,
            'notification' =>$notification,
            'data' => $notification_data,
        );
        $headers = array(
            'Authorization: key=AAAASvSZorI:APA91bEVsqcsyV7ZJxi8pRHmxxBTZj5PaJH0dUHCm2bIpGkbHgIpXdnzM7tM2IBoAMxU4F1_vUN1vfI0_RmkuOnmx5qOfasD5PWKgF4gYsrEUEVVJc3wfYKM_Z1mRnpjA2DoX820B-Ga' ,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result=curl_exec($ch);
        if ($result === false) {
            return curl_error($ch);
        }
        curl_close($ch);
        $key = null;
        return $result;
    }
    public static function sendMultiNotify($device_token,$notification,$notification_data,$topics)
    {
        
        $url = 'https://fcm.googleapis.com/fcm/send';
            $fields = array
                (
                'to' => "/topics/all",
                'notification' =>$notification,
                'data' => $notification_data,
            );
        $headers = array(
            'Authorization: key=AAAASvSZorI:APA91bEVsqcsyV7ZJxi8pRHmxxBTZj5PaJH0dUHCm2bIpGkbHgIpXdnzM7tM2IBoAMxU4F1_vUN1vfI0_RmkuOnmx5qOfasD5PWKgF4gYsrEUEVVJc3wfYKM_Z1mRnpjA2DoX820B-Ga' ,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result=curl_exec($ch);
        if ($result === false) {
            return curl_error($ch);
        }
        curl_close($ch);
        $key = null;
        return $result;
    }
    
}
