<?php

include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Controller/Controller.php');

class SessionManager  {

    const CONTROLLER_KEY = 'controller';

    public static function getController(){
        return new Controller();       
    }	

    public static function storeController(Controller $controller) {
        $_SESSION[self::CONTROLLER_KEY] = serialize($controller);
    }

}
