<?php
include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Controller/Controller.php');
error_reporting(E_ALL ^ E_WARNING);
$token = $_POST["token"];
$controller  =new Controller();
$powerStatus=$controller->getPowerStatus($token);

echo $powerStatus;
?>