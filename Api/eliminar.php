
<?php
require_once 'clases/respuestas.class.php';
require_once 'clases/numaleatorio.class.php';

$_respuestas = new respuestas;
$_numaleatorio = new numaleatorio;


if($_SERVER['REQUEST_METHOD'] == "POST"){

$postBody = $_POST["id"];
$datosArray = $_numaleatorio->delete($postBody);


header('Content-Type: application/json');
if(isset($datosArray["result"]["error_id"])){
    $responseCode = $datosArray["result"]["error_id"];
    http_response_code($responseCode);
}else{
    http_response_code(200);
}
Header("Location: http://localhost/prueba_t/NumAle/");


}
?>