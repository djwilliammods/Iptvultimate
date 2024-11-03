<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://runpoint.pro/get.php?username=mullerneto&password=Se6Tw&type=m3u_plus&output=ts");
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

echo $response;