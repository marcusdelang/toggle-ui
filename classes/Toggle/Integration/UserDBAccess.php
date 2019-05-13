<?php
namespace Toggle\Integration;
class UserDBAccess {
   private $conn;
    
   public function __construct() {
        $dbUsername = "root";
        $dbPassword = "";
        $dbServername = "localhost";
        $dbName = "toggle";
		$conn = new \mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
		 $this->conn = $conn;
		if ($this->conn->connect_errno) {
            printf("Connect failed: %s\n", $this->conn->connect_error);
            exit();
        } 
    }
	
	public function checkLogin($username, $password){
			$safeUsername = $this->conn->real_escape_string($username);
			$safePassword = $this->conn->real_escape_string($password);
		    $statment = $this->conn->prepare("SELECT * FROM users WHERE username =? AND password =?;");
		if (!$statment) {
			return "Can not have access to the database!";
		} else {
            $statment->bind_param("ss", $safeUsername, $safePassword);
            if($statment->execute() === TRUE) {
				$statment->store_result();
				if ($statment->num_rows > 0) {
					return "true";
				} else {
					return "false";
				}	
			}
		}
		mysqli_close($this->conn) or die (mysql_error());
    }

    public function checkUsername($username){  
     $safeUsername = $this->conn->real_escape_string($username);
     $statment = $this->conn->prepare("SELECT * FROM users WHERE username =?;");
     if (!$statment) {
      return "Can not have access to the database!";
     } else {
     $statment->bind_param("s", $safeUsername);
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

    public function insertUser($username,$password, $email){
		$safeUsername = $this->conn->real_escape_string($username); 
        $safePassword = $this->conn->real_escape_string($password); 	
        $safeEmail = $this->conn->real_escape_string($email); 	
		$statment = $this->conn->prepare("INSERT INTO users (username, password, email) VALUES (?,?,?);");
		if (!$statment) {
            return "false";
			//echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		} else {
            $statment->bind_param("sss", $safeUsername, $safePassword, $email);
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









	
    
    public function insertUser($username,$password){
		$safeUsername = $this->conn->real_escape_string($username); 
		$safePassword = $this->conn->real_escape_string($password); 		
		$statment = $this->conn->prepare("INSERT INTO user_info (username, password) VALUES (?,?);");
		if (!$statment) {
			echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		} else {
            $statment->bind_param("ss", $safeUsername, $safePassword);
            $statment->execute() ;
			return TRUE;
		}
		mysqli_close($this->conn) or die (mysql_error());
    }
	
}
