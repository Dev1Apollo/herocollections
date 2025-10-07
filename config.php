<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Calcutta");
$website_name = "hero";
$ProjectName = "Hero Collection";

 if ($_SERVER['SERVER_NAME'] == 'astutemanagement.co.in' || $_SERVER['SERVER_NAME'] == 'www.astutemanagement.co.in') {

    $dbhost = "localhost";
    $dbuser = "httpastutemanage";
    $dbpass = "#4XP*Gh8}mWR";
    $dbname = "httpastu_herocollections";
    $web_url = 'https://' . $_SERVER['SERVER_NAME'] . '/herocollections/';
    $dbconn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Could not connect: ' . mysqli_connect_error());

    $cateperpaging = 50;

    
}
?>
 