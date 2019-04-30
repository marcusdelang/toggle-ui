<?php
/**
 * The log out process.
 */
require_once './resources/fragments/start.php';
use TastyRecipes\Controller\SessionManager;

    unset($_SESSION['username']);

include 'index.php';