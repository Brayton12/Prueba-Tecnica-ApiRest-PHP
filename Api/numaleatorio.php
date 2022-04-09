<?php
require_once 'clases/respuestas.class.php';
require_once 'clases/numaleatorio.class.php';

$_respuestas = new respuestas;
$_numaleatorio = new numaleatorio;


if($_SERVER['REQUEST_METHOD'] == "GET"){

    if(isset($_GET["page"])){
        $pagina = $_GET["page"];
        $listarnum = $_numaleatorio->listarnum($pagina);
        header("Content-Type: application/json");
        echo json_encode($listarnum);
        http_response_code(200);
    }else if(isset($_GET['id'])){
        $idNum = $_GET['id'];
        $datosNum = $_numaleatorio->obtenerNum($idNum);
        
        $num = json_decode($datosNum[0]['numero'],true);
        
        Header("Location: http://localhost/prueba_t/NumAle/index.php?numero='$num'");
        
    }
    
}else if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $postBody = $_POST["numero"];
    $datosArray = $_numaleatorio->post($postBody);
    
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