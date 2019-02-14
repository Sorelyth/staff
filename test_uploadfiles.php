<?php
  include 'inc/funciones.php';
  session_start();
  if(isset($_POST["boton"])){echo subirAdjuntosInforme(1,1);}
  print_r($_FILES);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<form enctype="multipart/form-data" action="" method="post">
<input type="file" accept="application/pdf" name="cuentadecobro" />
<input type="submit" name="boton"></input>
</form>
