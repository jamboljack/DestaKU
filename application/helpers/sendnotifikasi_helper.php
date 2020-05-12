<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function sendNotification($device_id, $message)
{
    $msg = array(
        'body'  => $message,
        'title' => 'E-Health',
        'icon'  => 'myicon',
        'sound' => 'mySound',
    );
    $fields = array(
        'to'           => $device_id,
        'notification' => $msg,
    );

    $headers = array(
        'Authorization: key=' . API_ACCESS_KEY,
        'Content-Type: application/json',
    );
    #Send Reponse To FireBase Server
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
}

/* End of file welcome.php */
/* Location: ./application/helpers/sendnotifikasi_helper.php */
