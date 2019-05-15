<?php

include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Controller/SessionManager.php');

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$controller = SessionManager::getController();
$result = $controller->signUp($username, $password, $email);
$var=array("register_result"=>$result);
$registerResult= json_encode($var);
echo $registerResult;
?>