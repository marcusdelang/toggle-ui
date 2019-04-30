<?php

namespace TastyRecipes\Controller;
use TastyRecipes\Model\User;
use TastyRecipes\Integration\DatabaseAccess;
use TastyRecipes\Model\Cacher;


class Controller  {
    private $cacher;
	
	public function __construct() {
        $this->cacher = New Cacher();
	}

    public function caching_headers() {
            $this->cacher->caching_headers();
    }
   
    public function signUp($username,$password){
        $user = new User($username,$password);
        return $user->signUp();
    } 
    public function login($username,$password){
        $user = new User($username,$password);
        return $user->login();
    }
    public function insertComment($username,$commentText,$commentTime,$recipe){
		$databaseAccess = new DatabaseAccess();
        return $databaseAccess->insertComment($username,$commentText,$commentTime,$recipe);
    }
    public function getComments($recipe){ 
        $databaseAccess = new DatabaseAccess();
        return $databaseAccess->getComments($recipe);
    }
   public function deleteComment($time, $recipe){
	    $databaseAccess = new DatabaseAccess();
        return $databaseAccess->deleteComment($time,$recipe);
    }
	

}
