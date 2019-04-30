<?php

namespace TastyRecipes\Model;
use TastyRecipes\Integration\DatabaseAccess;

class User {
    
    private $username;
    private $password;
    private $databaseAccess;
    
    public function __construct($username,$password) {
        $this->databaseAccess = new DatabaseAccess();
        $this->username = $username;
        $this->password = $password;
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
   
   
   
   public function login(){
         return $this->databaseAccess->checkLogin($this->username, $this->password);   
   }
   
   /*
   public function login(){
        $usernameCheck = $this->databaseAccess->checkUsername($this->username);
        if($usernameCheck ===TRUE){
            $passwordResult = $this->databaseAccess->getPassword($this->username);
			//$hash = password_hash($this->password, PASSWORD_DEFAULT);
			if($this->username==$passwordResult){
                return 'Hit';
            }else{
                return 'Invalid';
            }
           /* if(password_verify($this->password, $passwordResult)){
                return 'Hit';
            }else{
                return 'Invalid';
            }
        }else{
            return 'Invalid';
       }
   }
   */
   
   
   
   }
   
   
