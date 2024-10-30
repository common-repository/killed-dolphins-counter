<?php
if( $_GET['start'] == '1' ){
	$fp = fopen('timer', 'w');
	fwrite($fp, time() );	
	fclose($fp);
}
$filename = "timer";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);

$timeperiod = 15;
$sec_time = $timeperiod*60;

$diff = time() - (int)$contents; // - $sec_time;

$res_dif = $sec_time - $diff;

if( $res_dif <= 0 ){
	$res_dif = 0;
}

echo date('i:s', $res_dif);
?>