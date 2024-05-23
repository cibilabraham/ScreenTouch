<?php
session_start();
require_once("classes/DBConnection.php");

date_default_timezone_set ("Asia/Calcutta");
$today		=	Date('Y-m-j');
$nowM		=	Date('m');
$nowD		=	Date('d');
$nowY		=	Date('Y');
$xdays		=	10;
// $GLOBALS['today']=$today;

define('HOST', "localhost");
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','ScreenTouch');

$dbc = new DBConnection();


function url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'].'/admin';
}
// $url=url();



function baseurl(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }else{
        $protocol = 'http';
    }
    return $protocol . "://" . $_SERVER['HTTP_HOST'];
}


?>
