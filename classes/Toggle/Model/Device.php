<?php
include($_SERVER["DOCUMENT_ROOT"].'/classes/Toggle/Util/Http.php');
class Device {
    
    private $name;
    private $token;   
    
    public function __construct($token) {
        //$this->token = 'HpKAF6BBi3';
        $this->token =$token;
    }
    
    public function getPowerStatus(){
        $json=json_encode(array("token"=>$this->token));
        $url="https://toggle-api.eu-gb.mybluemix.net/api/status";
        $http=new Http();
        $httpResult=$http->post($url,$json);
        if($httpResult["statusCode"]==="200"){
            return $httpResult["result"];
        }else{
            return $httpResult["result"];
        }

   }

   public function getConnectionStatus(){
        $json=json_encode(array("token"=>$this->token));
        $url="https://toggle-api.eu-gb.mybluemix.net/api/status";
        $http=new Http();
        $httpResult=$http->post($url,$json);
        if($httpResult["statusCode"]==="200"){
            return "true";
        }
        else{
            return "false";
        }
    }
    public function turnOn(){
        $json=json_encode(array("token"=>$this->token));
        $url="https://toggle-api.eu-gb.mybluemix.net/api/power/on";
        $http=new Http();
        $httpResult=$http->post($url,$json);
        if($httpResult["statusCode"]==="200"){
            return "true";
        }
        else{
            return "false";
        }
    }

    public function turnOff(){
        $json=json_encode(array("token"=>$this->token));
        $url="https://toggle-api.eu-gb.mybluemix.net/api/power/off";
        $http=new Http();
        $httpResult=$http->post($url,$json);
        if($httpResult["statusCode"]==="200"){
            return "true";
        }
        else{
            return "false";
        }
    }
}