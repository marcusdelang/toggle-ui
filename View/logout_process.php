<?php
/**
 * The log out process.
 */
include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Controller/SessionManager.php');

    session_start();
    session_destroy();
    $var=array("logout_result"=>"true");
    $logoutResult= json_encode($var);
    echo $logoutResult;
