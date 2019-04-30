<?php

namespace TastyRecipes\Controller;

use TastyRecipes\Controller\Controller;

class SessionManager {

    const CONTROLLER_KEY = 'controller';

    public static function getController() {
        if (isset($_SESSION[self::CONTROLLER_KEY])) {
            return unserialize($_SESSION[self::CONTROLLER_KEY]);
        } else {
            return new Controller();
        }
    }

    public static function storeController(Controller $controller) {
        $_SESSION[self::CONTROLLER_KEY] = serialize($controller);
    }

}

