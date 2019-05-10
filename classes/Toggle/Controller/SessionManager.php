<?php

namespace Toggle\SessionManager;
use Toggle\Controller\Controller;

const TEST = 'toggle';

class SessionManager  {

    public static function getController(){
        return new Controller();       
    }	

}
