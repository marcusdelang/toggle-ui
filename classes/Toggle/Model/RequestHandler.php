<?php

namespace Toggle\Model;

class RequestHandler {
   private $adress="https://toggle-api.eu-gb.mybluemix.net/";

   public function turnOn($command){
        $url=$adress . $command;
        return print_r(get_headers($url,1));   
   }
}
   
   
