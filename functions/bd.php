<?php

$dbhost = 'localhost';
$dbuser = 'tobi';
$dbpass = '4515101';
$dbname = 'itdep';

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('ошибка 1');

mysqli_set_charset($conn, "utf8");


?>
