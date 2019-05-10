<?php

/**
 * Shows the index (login) page.
 */

namespace Toggle\View;

use \Toggle\Util\Util;
use Toggle\Controller\SessionManager;

include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Util/Util.php');

Util::initRequest();

//$controller = SessionManager::getController();
//SessionManager::storeController($controller);

include($_SERVER["DOCUMENT_ROOT"].'/resources/views/devices.php');
