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

    public function addDevice($token,$name){
		$safeToken = $this->conn->real_escape_string($token); 
        $safeName = $this->conn->real_escape_string($name); 	
		$statment = $this->conn->prepare("INSERT INTO devices (token,name) VALUES (?,?);");
		if (!$statment) {
            return "Can not have access to the database!";
		} else {
            $statment->bind_param("ss", $token, $name);
            $statment->execute() ;
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
            $statment->execute() ;
            if($statment->execute() === TRUE) {
                $statment->store_result();
	            return "true";
            }else{
                return "false";
            }
		}
		mysqli_close($this->conn) or die (mysql_error());
    }
}
