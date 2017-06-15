<?php
$ch = curl_init();
$m3u8='http://crim.000webhostapp.com';
curl_setopt($ch, CURLOPT_URL, $m3u8);
//curl_setopt($ch, CURLOPT_REFERER, 'http://crim.000webhostapp.com');
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
 
// 不可用資源回傳 410
if ( $info['http_code'] == '200' ) {
    echo $m3u8;
    break;
}
else {
    //echo $m3u8;
    echo $i++;
    //sleep(1);
}
?>