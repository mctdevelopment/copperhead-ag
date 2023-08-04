<?php 

//Retrieve the tracking number from the input field 'trackingNumber' in tracking.php.

$trackingNumber = isset($_REQUEST['trackingNumber'])?$_REQUEST['trackingNumber']:'';
//API request to generate an access token.
$curl = curl_init();

$payload = "grant_type=client_credentials";

curl_setopt_array($curl, [
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/x-www-form-urlencoded",
    "x-merchant-id: string",
    "Authorization: Basic " . base64_encode("oRUL7GGLKLocq2L6HuTQNPWsRUfgQXgQiewAzI3sw83rT5Kz:Jp76ReTQCI5BPlcbkKwH5zKGasjFhoizeAG8ZFcaPR20bYmfkcxITpjspzR1ahEd")
  ],
  CURLOPT_POSTFIELDS => $payload,
  CURLOPT_URL => "https://wwwcie.ups.com/security/v1/oauth/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
]);

$response = curl_exec($curl);
$error = curl_error($curl);



curl_close($curl);

if ($error) {
  echo "cURL Error #:" . $error;
} else {
  $resp = json_decode($response,true);
 $token =  ($resp['access_token']);
}
 

//API request to retrieve tracking information and package details.
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://onlinetools.ups.com/api/track/v1/details/'.$trackingNumber.'?locale=en_US&returnSignature=false',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'transId: string',
    'transactionSrc: testing',
    'Authorization: Bearer '.$token.'
'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
     

header('Content-disposition: attachment; filename=file.json');
 header('Content-type: application/json');
$data =  json_decode($response,true);
  echo ($response);
