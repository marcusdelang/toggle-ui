<?php
require_once './resources/fragments/start.php';
use Toggle\Controller\SessionManager;
$username = $_POST["username"];
$password = $_POST["password"];
$controller = SessionManager::getController();
$result = $controller->login($username, $password);

 if ($result === "True") {
	$_SESSION["username"] = $username;
	SessionManager::storeController($controller);
 }
 
$var=array("login_result"=>$result);
$loginResult= json_encode($var);
echo $loginResult;
?>