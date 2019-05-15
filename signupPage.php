<?php

/**
 * Shows the signup page.
 */

if(isset($_SESSION['username'])){
}else{session_start();}

include($_SERVER["DOCUMENT_ROOT"].'/resources/views/signup.php');
