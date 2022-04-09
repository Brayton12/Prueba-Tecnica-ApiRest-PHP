<?php
require_once "clases/conexion/conexion.php";

$conexion= new conexion;
//$query= "INSERT INTO numaleatorio (numero) values (39)";

//print_r($conexion->nonQueryId($query));
$query="SELECT * FROM numaleatorio";
print_r($conexion->obtenerDatos($query));
//$n= 20;

//$r= $n%2;
//if($r==0){
    //echo("es Par");
    
//}else{
    //echo("es impar");
    
//}

?>