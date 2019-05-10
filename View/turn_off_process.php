<?php
error_reporting(E_ALL ^ E_WARNING);
include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Controller/Controller.php');
$token = $_POST["token"];
$controller  =new Controller();
$result=$controller->turnOff($token);
$var=array("turn_off_result"=>$result);
$turnOffResult= json_encode($var);
echo $turnOffResult;
?>