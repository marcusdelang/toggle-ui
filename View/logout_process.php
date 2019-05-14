<?php
/**
 * The log out process.
 */
require_once './resources/fragments/start.php';
use Toggle\Controller\SessionManager;
    unset($_SESSION['username']);
    $var=array("login_result"=>"true");
    $logoutResult= json_encode($var);
    echo $logoutResult;
