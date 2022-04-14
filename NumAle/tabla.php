<?php
$url="http://localhost/prueba_t/Api/numaleatorio?page=1";
$accion="http://localhost/prueba_t/Api/numaleatorio";
$datos=file_get_contents($url);
$jsondata = json_decode($datos,true);

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Numeros</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  for ($i=0; $i < count($jsondata) ; $i++) {?>
    <tr>
      
      <th scope="row" value="<?php print_r($jsondata[$i]['id']);?>"> <?php echo ($i+1); ?></th>
      <td value=" "><?php print_r($jsondata[$i]['numero']);?> </td>
      <td><div class="btn-group" role="group" aria-label="Basic mixed styles example">
      <form id="eliminar"  action="http://localhost/prueba_t/Api/eliminar" method="post">
        <input type="hidden" name="id" id="id" value="<?php print_r($jsondata[$i]['id']);?>">
         <button type="submit" id="btneliminar"class="btn btn-danger">eliminar</button>
      </form> 
        <a href="index.php?numero=<?php print_r($jsondata[$i]['numero']);?>" type="button" id="btn" class="btn btn-primary"> ¿Par o Impar?</a>
        </div>
    </td>
      
    </tr>
    <?php } ?>
  </tbody>
</table>

