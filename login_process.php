
<?php
require_once './resources/fragments/start.php';
use TastyRecipes\Controller\SessionManager;
$username = $_POST["username"];
$password = $_POST["password"];
$controller = SessionManager::getController();
$loginResult = $controller->login($username, $password);
 if ($loginResult === True) {
	$_SESSION["username"] = $username;
	SessionManager::storeController($controller);
	$status=1;
}else{	
	$status=0;
}
echo \json_encode($status);
?>