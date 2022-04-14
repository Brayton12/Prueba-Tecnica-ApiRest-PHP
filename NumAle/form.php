<?php

    if(!empty($_REQUEST['numero'])){
      $n=$_REQUEST['numero'];
            
      $r= $n%2;
      if($r==0){
        echo'<script type="text/javascript">
        alert(" El numero '.$n.' es par");
        
        </script>';
          
      }else{
        echo'<script type="text/javascript">
        alert(" El numero '.$n.' es impar");
        
        </script>';
          
      }
    }
  ?>

  <div class="col-auto">
    <h1>Escriba un numero</h1>
    <label for="staticEmail2" class="visually-hidden">Nombre</label>
   
  </div>
  <div class="col-auto">
    <label for="nombre" class="visually-hidden">Juan</label>
    <input type="numeric" class="form-control" name="numero" id="numero" placeholder="" pattern="^[0-9]+([,]?[0-9]+)*$" >
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3" >enviar</button>
  </div>


 

