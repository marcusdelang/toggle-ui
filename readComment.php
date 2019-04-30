<?php 




require_once './resources/fragments/start.php';
use TastyRecipes\Controller\SessionManager;

$controller = SessionManager::getController();
$result_array = $controller->getComments($recipe);
SessionManager::storeController($controller);