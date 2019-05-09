
<?php
use Toggle\Controller\SessionManager;
$command = $_POST["command"];
//$controller = SessionManager::getController();
//$turnOnResult = $controller->turnOn($command);
 if ($command === "on") {
	$status="off";
}else{	
	$status="on";
}
echo \json_encode($status);
?>