<?php
require_once 'e:\Datateknik KTH\Github\toggle-ui\classes\Toggle\Controller\Controller.php';
error_reporting(E_ALL ^ E_WARNING);
$token = $_POST["token"];
$controller  =new Controller();
$powerStatus=$controller->getPowerStatus($token);

echo $powerStatus;
?>