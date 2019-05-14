<?php

include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Model/Device.php');
include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Model/User.php');
include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Integration/UserDBAccess.php');
include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Integration/DeviceDBAccess.php');

class Controller  {
    public function login($username,$password){
        $user = new User($username,$password);
        return $user->login();
    }

    public function signUp($username,$password,$email){
        $user = new User($username,$password,$email);
        return $user->signUp();
    }

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

    public function addDevice($token, $name){
        $device = new Device($token, $name);
        return $device->add();
    } 

    public function removeDevice($token){
        $databaseAccess=new DeviceDBAccess();
        return $databaseAccess->removeDevice($token);
    } 

    public function getDevices($username){
		$safeRecipe = $this->conn->real_escape_string($recipe); 
		$statment = $this->conn->prepare("SELECT * FROM allcomments WHERE recipe =?;");
		if (!$statment) {
			echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		} else {
            $statment->bind_param("s", $safeRecipe);
            if($statment->execute() === TRUE) {
				$resultArray = $statment->get_result();
				//return json_encode($resultArray);
				return $resultArray;
			}
		}
			mysqli_close($this->conn) or die (mysql_error());
    }
}
?>
