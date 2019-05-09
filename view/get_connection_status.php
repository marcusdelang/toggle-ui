
<?php
use Toggle\Controller\SessionManager;
//$url = $_POST["url"];
//$controller = SessionManager::getController();
//$turnOnResult = $controller->turnOn($command);
//$str_json = file_get_contents("php://input");
//$object = json_decode($body, true);
//$url = $object["url"];
$json = json_decode($_POST["json"], true);
$url = $json["url"];

$options = array(
    'http' => array(
      'method'  => 'POST',
      'header'=>  "Accept: application/json\r\n"
      )
  );
  
  $context  = stream_context_create( $options );
  $result = file_get_contents( $url, false, $context );
  $response = json_decode( $result, true );
  echo json_encode(array(
    "status" => "200"));
//echo \json_encode($response);
?>