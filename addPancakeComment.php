
<?php
require_once './resources/fragments/start.php';
use TastyRecipes\Controller\SessionManager;
//$username = $_POST["username"];
$comment = $_POST["comment"];
//$time = $_POST["time"];
//$recipe = $_POST["recipe"];
$time = date("Y-m-d H:i:s");
$controller = SessionManager::getController();
$result_feedback = $controller->insertComment($_SESSION['username'], $_POST['comment'], $time, "pancakes");
 if ($result_feedback) {
	SessionManager::storeController($controller);
	$status=1;
}else{	
	$status=0;
}
echo \json_encode($status);
?>




