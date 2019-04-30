
<?php
require_once './resources/fragments/start.php';
use TastyRecipes\Controller\SessionManager;
$comment = $_POST["comment"];
$recipe = $_POST["recipe"];
$time = date("Y-m-d H:i:s");
$controller = SessionManager::getController();
$result_feedback = $controller->insertComment($_SESSION['username'], $_POST['comment'], $time, $recipe);
 if ($result_feedback) {
	SessionManager::storeController($controller);
	$status=1;
}else{	
	$status=0;
}
echo \json_encode($status);
?>




