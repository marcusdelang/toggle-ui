<?php
/**
 * The log out process.
 */
    session_start();
    session_destroy();
    $var=array("logout_result"=>"true");
    $logoutResult= json_encode($var);
    echo $logoutResult;
