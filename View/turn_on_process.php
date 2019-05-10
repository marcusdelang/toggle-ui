<?php
error_reporting(E_ALL ^ E_WARNING);
require_once 'e:\Datateknik KTH\Github\toggle-ui\classes\Toggle\Controller\Controller.php';

$controller  =new Controller();
$result=$controller->turnOn("HpKAF6BBi3");
$var=array("turn_on_result"=>$result);
$turnOnResult= json_encode($var);
echo $connectionStatus;
?>