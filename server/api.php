<?php
header("Content-Type:application/json");

if (isset($_GET['viewers']) && $_GET['viewers']!="") {
  include('db.php');
  $requestCount = $_GET['viewers'];
  if($requestCount > 15 || $requestCount < 1){
    response(NULL, 400,"Invalid Request");
    return;
  }

  $result = increment($requestCount);
  response($result, 200,"OK");
}else{
	response(NULL, 400,"Invalid Request");
	}

function response($viewer_count,$response_code,$response_desc){
	$response['viewers'] = $viewer_count;
	$response['response_code'] = $response_code;
	$response['response_desc'] = $response_desc;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>