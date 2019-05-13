<?php
namespace Toggle\Model;
use Toggle\Integration\UserDBAccess;

class User {
    
    private $username;
    private $password;
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
            //$hash = password_hash($this->password, PASSWORD_DEFAULT);
			$this->databaseAccess->insertUser($this->username, $this->password);
            return 'OK!';
        }   
   }
   

   
   }
   
   