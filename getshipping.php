     <?php 



//Retrieve the shipping form's input fields from Shipping.php


//shiper's detail

$shipmentdescription = isset($_REQUEST['shipmentdescription'])?$_REQUEST['shipmentdescription']:'';
$shipperName = isset($_REQUEST['shipperName'])?$_REQUEST['shipperName']:'';
$shipperAttentionName = isset($_REQUEST['shipperAttentionName'])?$_REQUEST['shipperAttentionName']:'';
$TaxIdentificationNumber = isset($_REQUEST['TaxIdentificationNumber'])?$_REQUEST['TaxIdentificationNumber']:'';
$shipperext = isset($_REQUEST['shipperext'])?$_REQUEST['shipperext']:'';
$shipperphone = isset($_REQUEST['shipperphone'])?$_REQUEST['shipperphone']:'';
$shipperAccNum = isset($_REQUEST['shipperAccNum'])?$_REQUEST['shipperAccNum']:'';
$Shiperfax = isset($_REQUEST['Shiiperfax'])?$_REQUEST['Shiiperfax']:'';

$shipperAddress = isset($_REQUEST['shipperAddress'])?$_REQUEST['shipperAddress']:'';
$shipperCity = isset($_REQUEST['shipperCity'])?$_REQUEST['shipperCity']:'';
$shipperProvinceCode = isset($_REQUEST['shipperProvinceCode'])?$_REQUEST['shipperProvinceCode']:'';
$shipperPostalCode = isset($_REQUEST['shipperPostalCode'])?$_REQUEST['shipperPostalCode']:'';
$shippercountryCode = isset($_REQUEST['shippercountryCode'])?$_REQUEST['shippercountryCode']:'';



//Ship To detail
$shippToName = isset($_REQUEST['shippToName'])?$_REQUEST['shippToName']:'';
$shippToAttnName = isset($_REQUEST['shippToAttnName'])?$_REQUEST['shippToAttnName']:'';
$shiptoext = isset($_REQUEST['shiptoext'])?$_REQUEST['shiptoext']:'';
$shipTophone = isset($_REQUEST['shipTophone'])?$_REQUEST['shipTophone']:'';
$shippToAddress = isset($_REQUEST['shippToAddress'])?$_REQUEST['shippToAddress']:'';
$shippToCity = isset($_REQUEST['shippToCity'])?$_REQUEST['shippToCity']:'';
$shippToStateCode = isset($_REQUEST['shippToStateCode'])?$_REQUEST['shippToStateCode']:'';
$shippToCode = isset($_REQUEST['shippToCode'])?$_REQUEST['shippToCode']:'';

$shippToCountryCode = isset($_REQUEST['shippToCountryCode'])?$_REQUEST['shippToCountryCode']:'';
$shippToResidentialCode = isset($_REQUEST['shippToResidentialCode'])?$_REQUEST['shippToResidentialCode']:'';





// Ship From
$shippfromName = isset($_REQUEST['shippfromName'])?$_REQUEST['shippfromName']:'';
$shippFromAttnName = isset($_REQUEST['shippFromAttnName'])?$_REQUEST['shippFromAttnName']:'';
$shipFromphone = isset($_REQUEST['shipFromphone'])?$_REQUEST['shipFromphone']:'';
$shipFromAddress = isset($_REQUEST['shipFromAddress'])?$_REQUEST['shipFromAddress']:'';
$shipFromCity = isset($_REQUEST['shipFromCity'])?$_REQUEST['shipFromCity']:'';
$shipFromStateCode = isset($_REQUEST['shipFromStateCode'])?$_REQUEST['shipFromStateCode']:'';
$shipFromCode = isset($_REQUEST['shipFromCode'])?$_REQUEST['shipFromCode']:'';

$shipFromCountryCode = isset($_REQUEST['shipFromCountryCode'])?$_REQUEST['shipFromCountryCode']:'';
$shipFromFax = isset($_REQUEST['shipFromFax'])?$_REQUEST['shipFromFax']:'';


//Payment Information
$servicecode  = isset($_REQUEST['servicecode'])?$_REQUEST['servicecode']:'';
$accNum = isset($_REQUEST['accNum'])?$_REQUEST['accNum']:'';
$serviceDesc = isset($_REQUEST['serviceDesc'])?$_REQUEST['serviceDesc']:'';


//Package Dimention

$PackageDesciption = isset($_REQUEST['PackageDesciption'])?$_REQUEST['PackageDesciption']:'';
$Packagelength = isset($_REQUEST['Packagelength'])?$_REQUEST['Packagelength']:'';
$PackageWidth = isset($_REQUEST['PackageWidth'])?$_REQUEST['PackageWidth']:'';
$PackageHeight = isset($_REQUEST['PackageHeight'])?$_REQUEST['PackageHeight']:'';
$PackageWeight = isset($_REQUEST['PackageWeight'])?$_REQUEST['PackageWeight']:'';
$shipdate = isset($_REQUEST['shipdate'])?$_REQUEST['shipdate']:'';
$billtype = isset($_REQUEST['billtype'])?$_REQUEST['billtype']:'';
$numOfPackage = isset($_REQUEST['numOfPackage'])?$_REQUEST['numOfPackage']:'';
$shiptime =isset($_REQUEST['shiptime'])?$_REQUEST['shiptime']:'';

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

//API request to create Shipping.

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://onlinetools.ups.com/api/shipments/v1/ship?additionaladdressvalidation=string',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS => '{
  "ShipmentRequest": {
    "Request": {
      "SubVersion": "1801",
      "RequestOption": "nonvalidate",
      "TransactionReference": {
        "CustomerContext": " "
      }
    },
    "Shipment": {
      "Description": "' . $shipmentdescription . '",
      "Shipper": {
        "Name": "'. $shipperName .'",
        "AttentionName": "' . $shipperAttentionName . '",
        "TaxIdentificationNumber":  "'.$TaxIdentificationNumber . '",
        "Phone": {
          "Number":  "' . $shipperphone . '",
          "Extension": "' . $shipperext . '"
        },
        "ShipperNumber":  "' . $shipperAccNum . '",
        "FaxNumber":  "' . $Shiperfax . '",
        "Address": {
          "AddressLine": "' . $shipperAddress . '",
          "City":  "'.$shipperCity.'",
          "StateProvinceCode": "' . $shipperProvinceCode . '",
          "PostalCode":  "' . $shipperPostalCode . '",
          "CountryCode":  "' . $shippercountryCode . '"
        }
      },
      "ShipTo": {
        "Name": "' . $shippToName . '",
        "AttentionName":"' . $shippToAttnName . '",
        "Phone": {
          "Number": "'.$shipTophone . '",
          "Extension": "' . $shiptoext . '"
        },
        "Address": {
          "AddressLine": "' . $shippToAddress . '",
          "City": "' . $shippToCity . '",
          "StateProvinceCode": "' . $shippToStateCode . '",
          "PostalCode": "' . $shippToCode . '",
          "CountryCode":"' . $shippToCountryCode . '"
        },
        "Residential": "' . $shippToResidentialCode . '"
      },
      "ShipFrom": {
        "Name": "' . $shippfromName . '",
        "AttentionName": "' . $shippFromAttnName . '",
        "Phone": {
          "Number": "' . $shipFromphone . '"
        },
        "FaxNumber": "' . $shipFromFax . '",
        "Address": {
          "AddressLine": "' . $shipFromAddress . '",
          "City": "' . $shipFromCity . '",
          "StateProvinceCode": "' . $shipFromStateCode . '",
          "PostalCode": "' . $shipFromCode . '",
          "CountryCode":"' . $shipFromCountryCode . '"
        }
      },
      "PaymentInformation": {
        "ShipmentCharge": {
          "Type": "01",
          "BillShipper": {
            "AccountNumber": " ' .$accNum . '"
          }
        }
      },
      "Service": {
        "Code": " ' .$servicecode . '",
        "Description": " ' .$serviceDesc . '"
      },
      "Package": [
        {
          "Description": " ' .$PackageDesciption . '",
          "Packaging": {
            "Code": "02",
            "Description": " ' .$PackageDesciption . '"
          },
          "Dimensions": {
            "UnitOfMeasurement": {
              "Code": "IN",
              "Description": "Inches"
            },
            "Length": " ' .$Packagelength . '",
            "Width": " ' .$PackageWidth . '",
            "Height": " ' .$PackageWidth . '"
          },
          "PackageWeight": {
            "UnitOfMeasurement": {
              "Code": "LBS",
              "Description": "Pounds"
            },
            "Weight": " ' .$PackageWeight .' "
          }
        }
      ]
    },
    "LabelStockSize": {
      "LabelImageFormat": {
        "Code": "GIF",
        "Description": "GIF"
      },
      "HTTPUserAgent": "Mozilla/4.5"
    }
  }
}',

  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'transId: 01528428738450974',
    'transactionSrc: AddressBook',
    'Authorization: Bearer '.$token,
    'Cookie: _abck=C1E385D6A89E03CE36FD344AFCBE17FC~-1~YAAQSmjcF2CNUrKIAQAAHUNi2QrzPOYMy5iHQLJWXgYcR6nPdlRNx+u8du0xC1hh1shHC4ktWMevQttMWjwYlcXkh8BeeTrPqZ8HW/N/lXCj20eqLpyKL0gfqSXTqXLBCwfDBzG13n6hOnerqaO2b81b5Y/SmxhSMsw9UVGiovW4VVd0Co9mwPqWANjWxZT1+RLhU7af1sITo89Cfsvm9uEByCOHTJ6jhK+4jofySoeJ/T/l4eOgUDWzutappYcBEbIOokHX9FVBp0dBK4Z3T94xPYDl2rr3uVEM8Ffu8QQEKFeQ1lYkMBhkgUSItrubAumb17oicPGPaoRZqPogsAVVFKJanzM2Pav15ne1lXuHE9el3hTbown8Xlkwzp8FZKBNRA==~-1~-1~1687183442; ups_language_preference=en_US'
  ),
));

$response1 = curl_exec($curl);
 $data1 =  json_decode($response1,true);

curl_close($curl);

//API request to get transit time.

$curl = curl_init();

$payload = array(
  "originCountryCode" => "$shipFromCountryCode",
  "originStateProvince" => "$shipFromStateCode",
  "originCityName" => "$shipFromCity",
  "originTownName" => "$shipFromCity",
  "originPostalCode" => "$shipFromCode",

  "destinationCountryCode" => "$shippToCountryCode",
  "destinationStateProvince" => "$shippToStateCode",
  "destinationCityName" => "$shippToCity",
  "destinationTownName" => "$shippToCity",
  "destinationPostalCode" => "$shippToCode",

  "weight" => "$PackageWeight",
  "weightUnitOfMeasure" => "LBS",
  "shipmentContentsValue" => "$PackageWeight",
  "shipmentContentsCurrencyCode" => "USD",
  "billType" => "$billtype",
  "shipDate" => "$shipdate",
  "shipTime" => "$shiptime",
  "residentialIndicator" => "",
  "avvFlag" => true,
  "numberOfPackages" => "$numOfPackage"
);

curl_setopt_array($curl, [
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer ".$token,
    "Content-Type: application/json",
    "transId: string",
    "transactionSrc: testing"
  ],
  CURLOPT_POSTFIELDS => json_encode($payload),
  CURLOPT_URL => "https://onlinetools.ups.com/api/shipments/v1/transittimes",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
]);

$response = curl_exec($curl);
// $error = curl_error($curl);

curl_close($curl);

if ($error) {
  echo "cURL Error #:" . $error;
} else {
 $data =  json_decode($response,true);

}

    

header('Content-disposition: attachment; filename=file.json');
header('Content-type: application/json');
echo $response1,$response;