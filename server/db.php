<?php
$sumFile = "sumCount.txt";
$countFile = "viewerCount.txt";
global $sumFile, $countFile;
function increment($viewer_count){
  //echo "Starting read current count";
  global $sumFile, $countFile;
  //$myfile = fopen("viewerCount.txt", "r+") or die("Unable to open file!");
  $currentCount = file_get_contents($countFile);
  //fread($myfile,filesize("viewerCount.txt"));

  $newCount = $currentCount + $viewer_count;
  //echo "The new count $newCount";
  file_put_contents($countFile, $newCount, LOCK_EX);

  $currentTime = date("Y-m-d H:i:s");
  $ipAddress = getUserIP();
  $log_str = "${viewer_count}: ${currentTime}, ${ipAddress}\n";
  file_put_contents($sumFile, $log_str, FILE_APPEND | LOCK_EX);
  //return $log_str;
  return $newCount;
}

function getCountSum(){
  global $sumFile, $countFile;
  $currentSum = file_get_contents($countFile);
  return $currentSum;
}

function clearCount(){
  global $sumFile, $countFile;
  $currentTime = date("Y-m-d H:i:s");
  $ipAddress = getUserIP();
  $log_str = "CLEARED: ${currentTime}, ${ipAddress}\n";
  file_put_contents($sumFile, $log_str, FILE_APPEND | LOCK_EX);
  file_put_contents($countFile, "0");
  return 0;
}

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

?>