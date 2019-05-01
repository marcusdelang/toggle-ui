
<?php
use Toggle\Controller\SessionManager;
$command = $_POST["commandName"];
$controller = SessionManager::getController();
$turnOnResult = $controller->turnOn($command);
 if ($turnOnResult === True) {
	$status=1;
}else{	
	$status=0;
}
echo \json_encode($status);
?>