<?php

/**
 * Shows the map page.
 */

if(isset($_SESSION['username'])){
}else{session_start();}

include($_SERVER["DOCUMENT_ROOT"].'/resources/views/map.php');
