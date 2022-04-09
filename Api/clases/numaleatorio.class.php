<?php
require_once "conexion/conexion.php";
require_once "respuestas.class.php";


class numaleatorio extends conexion {

    private $table = "numaleatorio";
    private $numero = "";
    private $idNum= "";
    public function listarnum($pagina = 1){
        $inicio  = 0 ;
        $cantidad = 100;
        if($pagina > 1){
            $inicio = ($cantidad * ($pagina - 1)) +1 ;
            $cantidad = $cantidad * $pagina;
        }
        $query = "SELECT id,numero FROM " . $this->table . " limit $inicio,$cantidad";
        $datos = parent::obtenerDatos($query);
        return ($datos);
    }

    public function obtenerNum($id){
        $query = "SELECT * FROM " . $this->table . " WHERE id = '$id'";
        return parent::obtenerDatos($query);

    }

    public function post($json){
        
        $_respuestas = new respuestas;
        
        if(!isset($json)){
            return $_respuestas->error_400();
        }else{
            $this->numero =$json;
            
            $resp = $this->insertarNum();
            if($resp){
                $respuesta = $_respuestas->response;
                $respuesta["result"] = array(
                    "id" => $resp
                );
                return $respuesta;
            }else{
                return $_respuestas->error_500();
            }
        }


    }
    

    private function insertarNum(){
        $query = "INSERT INTO " . $this->table . " (numero)
        values
        ('" . $this->numero ."')"; 
        $resp = parent::nonQueryId($query);
        if($resp){
             return $resp;
        }else{
            return 0;
        }
    }


    public function delete($json){
        $_respuestas = new respuestas;
        

                if(!isset($json)){
                    return $_respuestas->error_400();
                }else{
                    $this->idNum = $json;
                    $resp = $this->eliminarNum();
                    if($resp){
                        $respuesta = $_respuestas->response;
                        $respuesta["result"] = array(
                            "id" => $this->idNum
                        );
                        return $respuesta;
                    }else{
                        return $_respuestas->error_500();
                    }
                }

    }


    private function eliminarNum(){
        $query = "DELETE FROM " . $this->table . " WHERE id= '" . $this->idNum . "'";
        $resp = parent::nonQuery($query);
        if($resp >= 1 ){
            return $resp;
        }else{
            return 0;
        }
    }




}
?>