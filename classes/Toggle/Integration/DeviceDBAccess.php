<?php
class DeviceDBAccess {
   private $conn;   
   public function __construct() {
        $dbUsername = "root";
        $dbPassword = "";
        $dbServername = "localhost";
        $dbName = "toggle";
		$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
		 $this->conn = $conn;
		if ($this->conn->connect_errno) {
            printf("Connect failed: %s\n", $this->conn->connect_error);
            exit();
        } 
    }

    public function checkDeviceToken($token){  
     $safeToken = $this->conn->real_escape_string($token);
     $statment = $this->conn->prepare("SELECT * FROM devices WHERE token =?;");
     if (!$statment) {
      return "Can not have access to the database!";
     } else {
     $statment->bind_param("s", $safeToken);
     if($statment->execute() === TRUE) {
         $statment->store_result();
         if ($statment->num_rows > 0) {
             return TRUE;
         } else {
             return FALSE;
         }	
     }
     }
        mysqli_close($this->conn) or die (mysql_error());
    }

    public function addDevice($token,$name, $username){
		$safeToken = $this->conn->real_escape_string($token); 
        $safeName = $this->conn->real_escape_string($name); 
        $safeUserName = $this->conn->real_escape_string($username); 	
		$statment = $this->conn->prepare("INSERT INTO devices (token,name,username) VALUES (?,?,?);");
		if (!$statment) {
            return "Can not have access to the database!";
		} else {
            $statment->bind_param("sss", $token, $name, $username);
            if($statment->execute() === TRUE) {
                $statment->store_result();
	            return "true";
            }else{
                return "false";
            }
		}
		mysqli_close($this->conn) or die (mysql_error());
    }

    public function removeDevice($token){
		$safeToken = $this->conn->real_escape_string($token); 
		$statment = $this->conn->prepare("DELETE FROM devices WHERE token =?;");
		if (!$statment) {
            return "Can not have access to the database!";
		} else {
            $statment->bind_param("s", $token);
            if($statment->execute() === TRUE) {
                $statment->store_result();
	            return "true";
            }else{
                return "false";
            }
		}
		mysqli_close($this->conn) or die (mysql_error());
    }

    public function getDevices($username){
		$safeUsername = $this->conn->real_escape_string($username); 
		$statment = $this->conn->prepare("SELECT * FROM devices WHERE username =?;");
		if (!$statment) {
			return "Can not have access to the database!";
		} else {
            $statment->bind_param("s", $username);
            if($statment->execute() === TRUE) {
				$resultArray = $statment->get_result();
				return $resultArray;
			}
		}
			mysqli_close($this->conn) or die (mysql_error());
    }
	
}
