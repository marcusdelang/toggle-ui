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
  $resHeader = $http_response_header[0];
  
  if(strpos($resHeader, '200') !== false){
    //echo 'Response contains 200: true' . "\n";
    $statuscode = "200";
  } else {
    $statuscode = "500";
    $result=json_encode(array(
      "status_power"=>"unknown"
    ));
    //echo 'Response contains 200: false' . "\n";
  }
  $resultArray=array(
    "statusCode"=>$statuscode,
    "result"=>$result
  );
  return $resultArray;
}
}
?>