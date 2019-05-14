<?php

include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Controller/SessionManager.php');

$username = $_POST["username"];
$password = $_POST["password"];
$controller = SessionManager::getController();
$result = $controller->login($username, $password);

 if ($result === "true") {
	session_start();
	$_SESSION["username"] = $username;
	SessionManager::storeController($controller);
 }
$var=array("login_result"=>$result);
$loginResult= json_encode($var);
echo $loginResult;
?>