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
  $log_str = "${viewer_count}: ${currentTime}\n";
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
  $log_str = "CLEARED: ${currentTime}\n";
  file_put_contents($sumFile, "CLEARED: \n", FILE_APPEND | LOCK_EX);
  file_put_contents($countFile, "0");
  return 0;
}

?>