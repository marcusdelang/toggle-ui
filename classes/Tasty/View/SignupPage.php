<?php

namespace Tasty\View;

use Id1354fw\View\AbstractRequestHandler;
use Tasty\Controller\Controller;
use Tasty\Util\Constants;
class SignupPage extends AbstractRequestHandler { 
    
    private $username;
    private $mailadress;
    private $password;
    private $passwordconfirm;
    private $signupsubmit;

    public function setUsername($username)
    { $this->username = $username; }
    public function setMailadress($mailadress)
    { $this->mailadress = $mailadress; }
    public function setPassword($password)
    { $this->password = $password; }    
    public function setPasswordconfirm($passwordconfirm)
    { $this->passwordconfirm = $passwordconfirm; }  
    public function setSignupsubmit($signupsubmit)
    { $this->signupsubmit = $signupsubmit; }    
      
    
    protected function doExecute()
    {
        $this->session->restart();
    
        $ctrl = $this->session->get(Constants::CONTR_KEY);
        $signup = $ctrl->signupUser($_POST['username'], $_POST['mailadress'], 
                                    $_POST['password'], $_POST['passwordconfirm']);
            
        if(isset($_POST['signupsubmit'])){                 
            if($signup == 1){
                echo "Signup successful!";
            return Constants::INDEX_VIEW;
            }
            elseif($signup == 2){
                echo 'Empty fields';
            return Constants::SIGNUP_VIEW;
            }
            elseif($signup == 3){
                echo 'Incorrect format for either username or email.';
            return Constants::SIGNUP_VIEW;
            }            
            elseif($signup == 4){
                echo 'Incorrect format on email. Must be: xxxx@xxxxx.com';
            return Constants::SIGNUP_VIEW;
            }
            elseif($signup == 5){
                echo 'Incorrect format on username. Only characters or numbers';
            return Constants::SIGNUP_VIEW;
            }
            elseif($signup == 6){
                echo 'Passwords dont match.';
            return Constants::SIGNUP_VIEW;
            }
            elseif($signup == 7){
                echo  'Username taken. Please choose another one.';
            return Constants::SIGNUP_VIEW;
            }
            elseif($signup == 8){
                echo  "SQL ERROR!";
            return Constants::SIGNUP_VIEW;
            }
        }

       
        return Constants::SIGNUP_VIEW;
}}
    

  