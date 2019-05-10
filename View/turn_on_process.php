<?php
error_reporting(E_ALL ^ E_WARNING);
include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Controller/Controller.php');
$token = $_POST["token"];
$controller  =new Controller();
$result=$controller->turnOn($token);
$var=array("turn_on_result"=>$result);
$turnOnResult= json_encode($var);
echo $turnOnResult;
?>