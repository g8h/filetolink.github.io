<?php
include 'opti.php';
include '../../lib/hexicon/hexicon.php';
include '../../crueldb.php';
include 'opti.php';

$log = md5('log');
if (!isset($_COOKIE[$log])){
    if ($linko === "On") {
        downloadF($linko_name);
    }
    header('Location: ../../../index.php');
}
if (isset($_COOKIE[$log])) {
$log = md5('log');

setcookie($log, 'index.php', time() + 1, "/");

function removeDir($dir) {
    if (file_exists($dir)) {
    // create directory pointer
    $dp = opendir($dir) or die ('ERROR: Cannot open directory');
    // read directory contents
    // delete files found
    // call itself recursively if directories found
    while ($file = readdir($dp)) {
    if ($file != '.' && $file != '..') {
    if (is_file("$dir/$file")) {
    unlink("$dir/$file");
    } else if (is_dir("$dir/$file")) {
    removeDir("$dir/$file");
    }
    }
    }
    // close directory pointer
    // remove now-empty directory
    closedir($dp);
    if (rmdir($dir)) {
    return true;
    } else {
    return false;
    }
    }
   }

$ko = ".";
removeDir($ko);

header('Location: ../../index.php');
}
