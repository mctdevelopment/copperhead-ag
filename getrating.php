      <?php 


//Retrieve the rating form's input fields from Rating.php

//shiper's detail
$accessLicenseNumber = isset($_REQUEST['accessLicenseNumber'])?$_REQUEST['accessLicenseNumber']:'';
$shipperName = isset($_REQUEST['shipperName'])?$_REQUEST['shipperName']:'';
$shipperNum = isset($_REQUEST['accessLicenseNumber'])?$_REQUEST['accessLicenseNumber']:'';
$consignee = isset($_REQUEST['consignee'])?$_REQUEST['consignee']:'';
$shipperCity = isset($_REQUEST['shipperCity'])?$_REQUEST['shipperCity']:'';
$shipperProvinceCode = isset($_REQUEST['shipperProvinceCode'])?$_REQUEST['shipperProvinceCode']:'';
$shipperPostalCode = isset($_REQUEST['shipperPostalCode'])?$_REQUEST['shipperPostalCode']:'';

//Ship To detail
$shippToName = isset($_REQUEST['shippToName'])?$_REQUEST['shippToName']:'';
$shippToAddress = isset($_REQUEST['shippToAddress'])?$_REQUEST['shippToAddress']:'';
$shippToCity = isset($_REQUEST['shippToCity'])?$_REQUEST['shippToCity']:'';
$shippToStateCode = isset($_REQUEST['shippToStateCode'])?$_REQUEST['shippToStateCode']:'';
$shippToCode = isset($_REQUEST['shippToCode'])?$_REQUEST['shippToCode']:'';


// Ship From
$shippFromName = isset($_REQUEST['shippFromName'])?$_REQUEST['shippFromName']:'';
$shipFromAddress = isset($_REQUEST['shipFromAddress'])?$_REQUEST['shipFromAddress']:'';
$shipFromcity = isset($_REQUEST['shipFromcity'])?$_REQUEST['shipFromcity']:'';
$shipFromstate = isset($_REQUEST['shipFromstate'])?$_REQUEST['shipFromstate']:'';
$shipFromcode = isset($_REQUEST['shipFromcode'])?$_REQUEST['shipFromcode']:'';

//Package Information

$ratingdesciption = isset($_REQUEST['ratingdesciption'])?$_REQUEST['ratingdesciption']:'';
$packageweight = isset($_REQUEST['packageweight'])?$_REQUEST['packageweight']:'';
$rating = isset($_REQUEST['rating'])?$_REQUEST['rating']:'';
$totalweight = isset($_REQUEST['totalweight'])?$_REQUEST['totalweight']:'';
$serviceType = isset($_REQUEST['serviceType'])?$_REQUEST['serviceType']:'';
$packagelength = isset($_REQUEST['packagelength'])?$_REQUEST['packagelength']:'';
$packagewidth = isset($_REQUEST['packagewidth'])?$_REQUEST['packagewidth']:'';
$packageheight = isset($_REQUEST['packageheight'])?$_REQUEST['packageheight']:'';


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


//API request to retrieve rate information.

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://wwwcie.ups.com/api/rating/v1/Rate',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
 "RateRequest": {
    "Request": {
      "SubVersion": "1703",
      "TransactionReference": {
        "CustomerContext": ""
      }
    },
    "Shipment": {
      "ShipmentRatingOptions": {
        "UserLevelDiscountIndicator": "TRUE"
      },
      "Shipper": {
        "Name": "' . $shipperName . '",
        "ShipperNumber": "' . $shipperNum . '",
        "Address": {
          "AddressLine": "' . $consignee . '",
          "City": "' . $shipperCity . '",
          "StateProvinceCode": "' . $shipperProvinceCode . '",
          "PostalCode": "' . $shipperPostalCode . '",
          "CountryCode": "US"
        }
      },
      "ShipTo": {
        "Name": "' . $shippToName . '",
        "Address": {
          "AddressLine": "' . $shippToAddress . '",
          "City": "' . $shippToCity . '",
          "StateProvinceCode": "' . $shippToStateCode . '",
          "PostalCode": "' . $shippToCode . '",
          "CountryCode": "US"
        }
      },
      "ShipFrom": {
        "Name": "' . $shippFromName . '",
        "Address": {
          "AddressLine": "' . $shipFromAddress . '",
          "City": "' . $shipFromcity . '",
          "StateProvinceCode": "' . $shipFromstate . '",
          "PostalCode": "' . $shipFromcode . '",
          "CountryCode": "US"
        }
      },
      "Service": {
        "Code": "' . $serviceType . '",
        "Description": "' . $ratingdesciption . '"
      },

      "ShipmentTotalWeight": {
        "UnitOfMeasurement": {
          "Code": "LBS",
          "Description": "Pounds"
        },
        "Weight": ' . $totalweight . '
      },
      "Package": {
        "PackagingType": {
          "Code": "02",
          "Description": "' . $rating . '"
        },
        "Dimensions": {
          "UnitOfMeasurement": {
            "Code": "IN"
          },
          "Length": "' . $packagelength . '",
          "Width": "' . $packagewidth . '",
          "Height":"' . $packageheight . '"
        },
        "PackageWeight": {
          "UnitOfMeasurement": {
            "Code": "LBS"
          },
          "Weight": "' . $packageweight . '"
        }
      },
       "DeliveryTimeInformation": {
        "PackageBillType": "03",
        "Pickup": {
          "Date": "20230723",
          "Time": "1000"
        }
      }
    }
  }
}',
  CURLOPT_HTTPHEADER => array(
    'AccessLicenseNumber:'. $accessLicenseNumber,
    'Username: oRUL7GGLKLocq2L6HuTQNPWsRUfgQXgQiewAzI3sw83rT5Kz',
    'Password: Jp76ReTQCI5BPlcbkKwH5zKGasjFhoizeAG8ZFcaPR20bYmfkcxITpjspzR1ahEd',
    'Content-Type: application/json',
    'Authorization: Bearer '.$token
  ),
));

$response1 = curl_exec($curl);


// curl_close($curl);     

// header('Content-disposition: attachment; filename=file.json');
// header('Content-type: application/json');
// $data =  json_decode($response1,true);
// echo "<pre>";
// print_r($data);


curl_close($curl);     

header('Content-disposition: attachment; filename=file.json');
header('Content-type: application/json');
echo $response1;