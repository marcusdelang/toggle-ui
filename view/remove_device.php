<?php

include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Controller/SessionManager.php');

$token = $_POST["device_token"];
$controller = SessionManager::getController();
$result = $controller->removeDevice($token);
$var=array("remove_device_result"=>$result);
$removeDeviceResult= json_encode($var);
echo $removeDeviceResult;
?>