
<?php
$log = md5('log');
if (!isset($_COOKIE[$log])){
    header('Location: ../../../index.php');
}

$name = '$name';
$folder = '$folde';
$pass = '$pass';
$theme = '/normal';
$layout = '/l-normal';
$linko = 'Off';
$linko_name = '';

