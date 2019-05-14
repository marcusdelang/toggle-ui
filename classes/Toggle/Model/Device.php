<?php
class Device {
    private $token;   
    private $name;
    private $databaseAccess;
    
    public function __construct($token) {
        //$this->token = 'HpKAF6BBi3';
        $this->token =$token;
        $this->name = $name;
        $this->databaseAccess = new DeviceDBAccess();
    }
    
    public function getPowerStatus(){
        $json=json_encode(array("token"=>$this->token));
        $url="http://130.229.145.217/api/status";
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
        $url="http://130.229.145.217/api/status";
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
        $url="http://130.229.145.217/api/power/on";
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
        $url="http://130.229.145.217/api/power/off";
        $http=new Http();
        $httpResult=$http->post($url,$json);
        if($httpResult["statusCode"]==="200"){
            return "true";
        }
        else{
            return "false";
        }
    }

    public function add(){
        $result = $this->databaseAccess->checkDeviceToken($this->token);  
        if($result ===TRUE){
            return "Token exist!";
        }else{
			return $this->databaseAccess->addDevice($this->token, $this->name);        
        }
    }

}