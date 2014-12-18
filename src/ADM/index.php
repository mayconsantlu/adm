<?php
session_start();

$url = explode("/", $_SERVER["REQUEST_URI"]);
array_shift($url);
require_once 'config.php';

//print_r($url)."<br>";
//echo($_SERVER["HTTP_HOST"]);
//echo $url[0]."\n";
//echo $url[1];


if (isset($url[0]) && $url[0] == "admin") {
    require_once('admin.php');
} elseif ($url[0] == '' or $url[0] !='admin') {
    require_once('template/template.php');
} else {
    require_once('includes/404.php');
}


?>
