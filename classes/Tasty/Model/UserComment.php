<?php

namespace Tasty\Model;

date_default_timezone_set('Europe/Stockholm'); 

class UserComment{
  private $username;
  private $userid;
  private $commentid;
  private $message;
  private $date;


  public function __construct($username, $date, $message, $userid, $commentid){
    $this->username = $username;
    $this->userid = $userid;
    $this->commentid = $commentid;
    $this->message = $message;
    $this->date = $date;
  }
  public function getUsername(){
    return $this->username;
  }
  public function getUserID(){
    return $this->userid;
  }
  public function getMessage(){
    return $this->message;
  }
  public function getDate(){
    return $this->date;
  }
  public function getCommentID(){
    return $this->commentid;
  }

  public function setUsername($username){
     $this->username = $username;
  }
  public function setUserID($userid){
     $this->userid = $userid;
  }
  public function setMessage($message){
     $this->message = $message;
  }
  public function setDate($date){
     $this->date = $date;
  }
  public function setCommentID($commentid){
     $this->commentid = $commentid;
  }

}