<?php
namespace Tasty\Integration;

use Tasty\Model\User;
use Tasty\Model\UserComment;



class DBH {
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "loginsys";

public function __construct() {}

/* Establish a connection to the SQL loginsys sever, else throw error. */
public function connection()
{
    $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
/*************** LOGIN ***************/
public function login($username, $password){
    $conn = $this->connection();

        $sql = "SELECT * FROM users WHERE nameuser=? OR emailuser=?";
        $stmt = $conn->stmt_init();
        if (!$stmt->prepare($sql)) {
            return 4;
        }
        $stmt->prepare($sql);
        if($conn == true){
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($row = $result->fetch_assoc ()){
            $pwdCheck = password_verify($password, $row['pwduser']);
            if ($pwdCheck == false) {
                return 5;
            }
            elseif ($pwdCheck == true) {
                $user;
                $conn->close();
                return $user[] =  new User($row['nameuser'] ,$row['id']);       
            }
        }
        $conn->close();
        return 6;
    }
    $conn->close();
    return 7;
}



public function newComment($userid, $date, $message){
        $conn = $this->connection();
        $sql = "INSERT INTO comments(userid, date, message) VALUES (?, ?, ?)";
        $stmt = $conn->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param("sss",$userid, $date,$message);
        $stmt->execute();
        $conn->query($sql);
        $conn->close();
        return;
        }

public function storeUser($username, $email, $password, $passwordConfirm)
{
        $conn = $this->connection();
        $sql = "SELECT nameuser FROM users WHERE nameuser= ?";
        $stmt = $conn->stmt_init();
        if(!$stmt->prepare($sql)){
            return 8;
        }
        else{ 
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->get_result();
            $result = $stmt->num_rows();
            if($result > 0) {
                return 7;
            }
            else {
    $sql = "INSERT INTO users(nameuser, emailuser, pwduser) VALUES (?, ?, ?)";
    $stmt = $conn->stmt_init();
    $stmt->prepare($sql);
    $hashPwd = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("sss",$username, $email,$hashPwd);
    $stmt->execute();
    $conn->close();
    return 1;
    }
}   
}


/*************** COMMENTS ***************/

// functions for storing and viewing comments.
public function showComments()
{
    $arrayOfComments;
    $conn = $this->connection();
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);
    while($row = $result -> fetch_assoc()) {
    $commentId = $row['userid'];
    $sqlLogin = "SELECT * FROM users WHERE id='$commentId'";
    $resultLogin = $conn->query($sqlLogin);
    if($row2 = $resultLogin -> fetch_assoc()) {
        $comment = new UserComment($row2['nameuser'], $row['date'], $row['message'], $row['userid'], $row['commentid']);
        $arrayOfComments[] = $comment;
        }
    }
    $conn->close();
    return $arrayOfComments;
}


public function removeComment($commentid)
{
    $conn = $this->connection();
    $sql = "DELETE FROM comments WHERE commentid='$commentid'";
    $conn->query($sql);
    $conn->close();
}
}
?>