<?php

//use Toggle\Model\Device;
include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Model/Device.php');

class Controller  {

    public function getPowerStatus($token){
        $device=new Device($token);       
        return $device->getPowerStatus();
    }

    public function getConnectionStatus($token){
        $device=new Device($token);       
        return $device->getConnectionStatus();
    }

    public function turnOn($token){
        $device=new Device($token);       
        return $device->turnOn();
    }

    public function turnOff($token){
        $device=new Device($token);       
        return $device->turnOff();
    }
}
?>
