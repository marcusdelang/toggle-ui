<?php
require_once './resources/fragments/start.php';
use Toggle\Controller\SessionManager;
$username = $_POST["username"];
$password = $_POST["password"];
$controller = SessionManager::getController();
$loginResult = $controller->login($username, $password);
 if ($loginResult === True) {
	$_SESSION["username"] = $username;
	SessionManager::storeController($controller);
	$var=array("loginResult"=>True);
}else{	
	$var=array("loginResult"=>False);
}
echo json_encode($var);
?>