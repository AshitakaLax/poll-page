<?php
header("Content-Type:application/json");
include('db.php');
$result = clearCount();

response("Successfully Cleared the number of viewers", 200,"OK");

function response($message,$response_code,$response_desc){
	$response['message'] = $message;
	$response['response_code'] = $response_code;
	$response['response_desc'] = $response_desc;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>