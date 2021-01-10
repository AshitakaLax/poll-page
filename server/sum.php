<?php
header("Content-Type:application/json");
include('db.php');
$result = getCountSum();
response($result, 200,"OK");


function response($viewer_count,$response_code,$response_desc){
	$response['viewers'] = $viewer_count;
	$response['response_code'] = $response_code;
	$response['response_desc'] = $response_desc;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>