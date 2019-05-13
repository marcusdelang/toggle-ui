<?php
namespace Toggle\Model;
use Toggle\Integration\UserDBAccess;

class User {
    
    private $username;
    private $password;
    private $email;
    private $databaseAccess;
    
    public function __construct($username,$password) {
        $this->databaseAccess = new UserDBAccess();
        $this->username = $username;
        $this->password = $password;
    }

    public function login(){
        return $this->databaseAccess->checkLogin($this->username, $this->password);   
    }
    
    public function signUp(){
        $result = $this->databaseAccess->checkUsername($this->username);  
        if($result ===TRUE){
            return "Username exist!";
        }else{
			return $this->databaseAccess->insertUser($this->username, $this->password,  $this->email);
        }   
   }
   

   
   }
   
   