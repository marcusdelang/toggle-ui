<?php

class User {
    
    private $username;
    private $password;
    private $email;
    private $databaseAccess;
    
    public function __construct($username,$password,$email) {
        $this->databaseAccess = new UserDBAccess();
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;

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
   
   