<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://runpoint.pro/get.php?username=mullerneto&password=Se6Tw&type=m3u_plus&output=ts");
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);

if (substr($info["http_code"], 0, 2) != 20) {
    die("Could not connect to server. Check username and password");
}

preg_match_all('/(tvg-name="(?<name>.*?)".+tvg-logo="(?<logo>.*?)".+\n(?P<link>https?:\/\/.+))/', $response, $channels, PREG_SET_ORDER);

?>

<table>
    <thead>
        <tr>
            <th>Logo</th>
            <th>Name</th>
            <th>Link</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($channels as $channel): ?>
        <tr>
            <td><img src="<?php echo $channel["logo"] ?>" height="75" width="75" /></td>
            <td><?php echo $channel["name"] ?></td>
            <td><?php echo str_replace(".ts", ".m3u8", $channel["link"]) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>