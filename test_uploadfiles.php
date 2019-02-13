<?php
  include 'inc/funciones.php';
  include 'attachments/cuentasdecobro/eso.php';
  session_start();
  print_r($_FILES);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/mix.js"></script>

<form enctype="multipart/form-data" action="" method="post" onsubmit="return mandar()">
<input type="file" accept="application/pdf" name="cuentadecobro" />
<input type="submit">do it</input>
</form>
