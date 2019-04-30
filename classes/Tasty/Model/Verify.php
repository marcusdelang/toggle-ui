<?php
namespace Tasty\Model;

use Tasty\Integration\DBH;

class Verify {

    public function __construct() {
    }

    public function checkLoginInput($username, $password){
        if(empty($username) || empty($password)){
            return 2; 
        }elseif (!ctype_alnum($username)){
            return 3;
        }else
            return 10;
        }
        
    public function checkCommentInput($comment){
        if(empty($comment)){
            return 1; 
        }
        elseif(!ctype_alnum($comment)){
            return 2;        }
        return 10;
    }

    public function checkSignupInput($username, $email, $password, $passwordConfirm){ 

    if(empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) 
    { return 2; }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return 3;
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 4;
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return 5;
    }
    elseif ($password !== $passwordConfirm ){
        return 6;
    }
    return 10;
    }


}