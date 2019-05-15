<?php
class Http{
public function post($url,$json){

$options = array(
    'http' => array(
      'method'  => 'POST',
      'content' => $json,
      'header'=>  "Content-Type: application/json\r\n" .
                  "Accept: application/json\r\n"
      )
  );
  
  $context  = stream_context_create( $options );
  $result = file_get_contents($url, false, $context );

  if(isset($http_response_header)){
  $resHeader = $http_response_header[0];

  if(strpos($resHeader, '200') !== false){
    $statuscode = "200";
  }else {
    $statuscode = "500";
    $result=json_encode(array(
      "status_power"=>"unknown"
    ));
  }
}else {
    $statuscode = "500";
    $result=json_encode(array(
      "status_power"=>"unknown"
    ));
}

  $resultArray=array(
    "statusCode"=>$statuscode,
    "result"=>$result
  );
  return $resultArray;
}
}
?>