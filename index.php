<?php

/**
 * Shows the index (login) page.
 */

namespace Toggle\View;

use \Toggle\Util\Util;
use Toggle\Controller\SessionManager;

require_once 'classes/Toggle/Util/Util.php';
Util::initRequest();

$controller = SessionManager::getController();
//SessionManager::storeController($controller);

include TOGGLE_VIEWS . 'devices.php';