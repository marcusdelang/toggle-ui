<?php

namespace Tasty\Model;

date_default_timezone_set('Europe/Stockholm'); 

class User{
  private $username;
  private $userid;

  public function __construct($username, $userid){
    $this->username = $username;
    $this->userid = $userid;
  }
  public function getUsername(){
    return $this->username;
  }
  public function getUserID(){
    return $this->userid;
  }


  public function setUsername($username){
     $this->username = $username;
  }
  public function setUserID($userid){
     $this->userid = $userid;
  }
}