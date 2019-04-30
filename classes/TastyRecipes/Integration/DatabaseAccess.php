<?php

namespace TastyRecipes\Integration;

class DatabaseAccess {
   private $conn;
    
   public function __construct() {
	    require realpath('E:\ComputerScience\branches\Datateknik KTH\termin 1\4_Applikationer för internet, grundkurs\Seminars\secret.php');
        $dbServername = "localhost";
        $dbName = "mydb";
		$conn = new \mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
		 $this->conn = $conn;
		if ($this->conn->connect_errno) {
            printf("Connect failed: %s\n", $this->conn->connect_error);
            exit();
        }
       
    }
    
    public function checkUsername($username){  
	   		$safeUsername = $this->conn->real_escape_string($username);
		    $statment = $this->conn->prepare("SELECT * FROM user_info WHERE username =?;");
		if (!$statment) {
			return FALSE;
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

    public function getPassword($username){
        $safeUsername = $this->conn->real_escape_string($username);    
		$statment = $this->conn->prepare("SELECT password FROM user_info WHERE username =?;");
		if (!$statment) {
			echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		} else {
            $statment->bind_param("s", $safeUsername);
			
           if($statment->execute() === TRUE) {
				$statment->bind_result($passWord);
				if ($statment->num_rows === 1) {
					$row = $statment->get_result();
					return $row['password'];
				}
			}
		}
		mysqli_close($this->conn) or die (mysql_error());
    }
	
	public function checkLogin($username, $password){
			$safeUsername = $this->conn->real_escape_string($username);
			$safePassword = $this->conn->real_escape_string($password);
		    $statment = $this->conn->prepare("SELECT * FROM user_info WHERE username =? AND password =?;");
		if (!$statment) {
			return FALSE;

		} else {
            $statment->bind_param("ss", $safeUsername, $safePassword);
            if($statment->execute() === TRUE) {
				$statment->store_result();
				if ($statment->num_rows > 0) {
					return True;
				} else {
					return False;
				}	
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
    
    public function insertComment($username,$comment, $time, $recipe){
		$safeUsername = $this->conn->real_escape_string($username); 
		$safeComment = $this->conn->real_escape_string($comment); 		
		$safeRecipe = $this->conn->real_escape_string($recipe); 	
		$statment = $this->conn->prepare("INSERT INTO allcomments (username, comment, time, recipe) VALUES (?,?,?,?);");
		if (!$statment) {
			echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		} else {
            $statment->bind_param("ssss", $safeUsername, $safeComment, $time, $safeRecipe);
			return $statment->execute() ;
		}
			mysqli_close($this->conn) or die (mysql_error());
    }
	
    public function getComments($recipe){
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
	
    
    public function deleteComment($time, $recipe){
		$safeRecipe = $this->conn->real_escape_string($recipe); 	
		$statment = $this->conn->prepare("DELETE FROM allcomments WHERE time =? AND recipe=?;");
		if (!$statment) {
			echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		} else {
            $statment->bind_param("ss", $time,$safeRecipe);
			return $statment->execute() ;
		}
			mysqli_close($this->conn) or die (mysql_error());
    }
	
}


