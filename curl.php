<?php
$file = realpath('123.jpg'); 

$ch = curl_init();
$data = array('name' => 'Foo', 'image' => '@'.$file);
curl_setopt($ch, CURLOPT_URL,"http://172.17.1.64/ctf/");
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);

$server_output = curl_exec ($ch);

curl_close ($ch);

?>