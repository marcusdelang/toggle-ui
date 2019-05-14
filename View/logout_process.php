<?php
/**
 * The log out process.
 */
require_once './resources/fragments/start.php';
use Toggle\Controller\SessionManager;
    unset($_SESSION['username']);
include 'index.php';