<?php 


/***********************************************************
	Payflexi methods handles serives that don't have
	billersCode such as mtn,airtel,glo,etisalat Service
	e.g http://sandbox.vtpass.com/api/services?identifier=airtime,
	typres can be gotten from the Get service Endpoint
*************************************************************/ 
$username = "****"; //email address(sandbox@vtpass.com)
$password = "****"; //password (sandbox)
$host = 'http://sandbox.vtpass.com/api/payflexi';
$data = array(
  	'serviceID'=> $_POST['serviceID'], //integer e.g mtn,airtel
  	'amount' =>  $_POST['amount'], // integer
  	'phone' => $_POST['recepient'], //integer
  	'request_id' => '901059298909' // unique for every transaction from your platform
);
$curl       = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => $host,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_USERPWD => $username.":" .$password,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $data,
));
echo curl_exec($curl);



/********************************************************************************
	Payfix methods handles serives that have
	billersCode such as gotv,dstv,eko-electric,abuja-electric Service 
	typres can be gotten from the services endpoint 
	e.g http://sandbox.vtpass.com/api/services?identifier=bills,
	also the variation code can be gotten from the service-variations 
	endpoint e.g http://sandbox.vtpass.com/api/service-variations?serviceID=dstv
**********************************************************************************/ 
$username = "****"; //email address(sandbox@vtpass.com)
$password = "*****"; //password (sandbox)
$host = 'http://sandbox.vtpass.com/api/payfix';
$data = array(
  	'serviceID'=> $_POST['serviceID'], //integer e.g gotv,dstv,eko-electric,abuja-electric
  	'billersCode'=> $_POST['billersCode'], // e.g smartcardNumber, meterNumber,
  	'variation_code'=> $_POST['variation_code'], // e.g dstv1, dstv2,prepaid,(optional for somes services)
  	'amount' =>  $_POST['amount'], // integer (optional for somes services)
  	'phone' => $_POST['recepient'], //integer
  	'request_id' => '901059298909' // unique for every transaction from your platform
);
$curl       = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => $host,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_USERPWD => $username.":" .$password,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $data,
));
echo curl_exec($curl);

?>