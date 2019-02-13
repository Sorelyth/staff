<?php
include 'inc/funciones.php';
include 'inc/db_config';
if(isset($_POST['accion']) && !empty($_POST['accion'])){
  $action = $_POST['accion'];
  switch($action){
    case 'cambio_dpto' : echo selectMunicipio($_POST['iddpto']);break;
  }
}

?>
<html>
<form action="" method="post">
  <input type="text" name="accion">
  <input type="number" name="iddpto" value=1 hidden>
  <button type="submit" name="eso">eso</button>
</form>
  <?php selectMunicipio($_POST['iddpto']); ?>
</html>
