

<?php
require_once './resources/fragments/start.php';
use TastyRecipes\Controller\SessionManager;
$username = $_POST["username"];
$password = $_POST["password"];
$controller = SessionManager::getController();
$registerResult=$controller->signUp($username, $password);
 if ($registerResult === "Username exist!") {
	$status=0;
}else{	
	$status=1;
}
echo \json_encode($status);
?>
