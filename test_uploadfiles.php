<?php
  include 'inc/funciones.php';
  session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function mandar(){
$.ajax({
  type: "post",
  dataType: "html",
  data: {accion: "subir_adjuntos_informe",idinforme:1},
  url: "ajax_requests.php",
  cache: false,
  // beforeSend: function() {
  //    $('#res3').html('loading please wait...');
  // },
  success: function(response) {
    alert("lo hizo: "+response);
  }
});
return true;
}
</script>
<form enctype="multipart/form-data" action="" method="post" onsubmit="return mandar()">
<input type="file" accept="application/pdf" name="cuentadecobro" />
<input type="submit">do it</input>
</form>