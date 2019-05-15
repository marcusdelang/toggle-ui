<?php
/**
 * Shows the about page.
 */

if(isset($_SESSION['username'])){
    
}else{session_start();}

include($_SERVER["DOCUMENT_ROOT"].'/resources/views/about.php');
