<?php
// die("dsfdfdfd");
require_once("config.php");
require_once("classes/CommandHandler.php");

require_once("classes/UserClass.php");

require_once("classes/sendMailClass.php");

$function=$_POST['function'];
$method=$_POST['method'];

$fn = new $function($dbc);
$fn->$method();

function ajaxResponse($status,$data){
	$resp = array();
	$resp["status"]=$status;
	$resp["data"]=$data;
	echo json_encode($resp);
	die();
}	

?>