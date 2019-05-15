<?php

/**
 * Shows the index (login) page.
 */

if(isset($_SESSION['username'])){
}else{session_start();}

include($_SERVER["DOCUMENT_ROOT"].'/resources/views/home.php');
