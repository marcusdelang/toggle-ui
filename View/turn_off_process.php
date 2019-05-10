<?php
error_reporting(E_ALL ^ E_WARNING);
require_once 'e:\Datateknik KTH\Github\toggle-ui\classes\Toggle\Controller\Controller.php';

$controller  =new Controller();
$result=$controller->turnOff("HpKAF6BBi3");
$var=array("turn_off_result"=>$result);
$turnOffResult= json_encode($var);
echo $turnOffResult;
?>