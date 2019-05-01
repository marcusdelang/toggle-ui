<?php

namespace Toggle\Model;

class RequestHandler {
   private $adress="https://toggle-api.eu-gb.mybluemix.net/";

   if(is_empty($_POST["onButton"])){
      turnOn("/on");
   }
   public function turnOn($command){
        $url=$adress . $command;
        return print_r(get_headers($url,1));   
   }
}
   
   
