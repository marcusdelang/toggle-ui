<?php
require_once './resources/fragments/start.php';
use TastyRecipes\Controller\SessionManager;
//$time = $_POST["time"];
//$recipe = $_POST["recipe"];
$controller = SessionManager::getController();
$deleteResult=$controller->deleteComment($time, $recipe);
 if ($deleteResult) {
	$status=1;
}else{	
	$status=0;
}
echo \json_encode($status);
?>

