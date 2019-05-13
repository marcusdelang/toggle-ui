<?php
require_once './resources/fragments/start.php';
use Toggle\Controller\SessionManager;
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$controller = SessionManager::getController();
$result = $controller->signup($username, $password, $email);
$var=array("register_result"=>$result);
$registerResult= json_encode($var);
echo $registerResult;
?>