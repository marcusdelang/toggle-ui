
<?php
error_reporting(E_ALL ^ E_WARNING);
require_once 'e:\Datateknik KTH\Github\toggle-ui\classes\Toggle\Controller\Controller.php';
$token = $_POST["token"];
$controller  =new Controller();
//$result=$controller->getConnectionStatus("HpKAF6BBi3");
$result=$controller->getConnectionStatus($token);
$var=array("connection_status"=>$result);
$connectionStatus= json_encode($var);
echo $connectionStatus;
?>