<?php

include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Controller/SessionManager.php');

$token = $_POST["device_token"];
$name = $_POST["device_name"];
$controller = SessionManager::getController();
$result = $controller->addDevice($token, $name, $_SESSION['username']);
$var=array("add_device_result"=>$result);
$addDeviceResult= json_encode($var);
echo $addDeviceResult;
?>

