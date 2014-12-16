<?php 

$ch = curl_init("http://dev.checkengine.com/cron/test");
$fp = fopen("/tmp/cron_test.out", "a");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);