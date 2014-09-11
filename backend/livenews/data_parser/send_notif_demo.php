<?php

$ch = curl_init('');

curl_setopt($ch, CURLOPT_URL, "https://api.parse.com/1/push");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-Parse-Application-Id: Q982ewBYSL47LhFVnPfn84btjrLOSiWmvbjetvI6',
    'X-Parse-REST-API-Key: hPg6L5EBuwDHoQQyC5Z3UnilsAdExwT90FyEB2nK',
    'Content-Type: application/json'
    ));


$body ='{ "channels": ["Admin"],"data": {"alert": "Το Ski Greece σας ευχεται καλες γιορτες!"}}';
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_POST, true);

// Execute post
$result = curl_exec($ch);

// Close connection
curl_close($ch);
print_r($result);

?>