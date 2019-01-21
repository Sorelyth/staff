<?php
  session_start();
  include 'inc/db_config.php';
  include 'inc/funciones.php';
  if(!isset($_SESSION['idusuario'])){ header('Location: login.php');}
  //if(isset($_POST['out'])){session_destroy();header('Location: login.php');}
  $idusuario=$_SESSION['idusuario'];
?>
<!doctype html>
<html lang="es">
<head>
  <link rel="shortcut icon" href="img/icono.png">
  <title>Nuevo informe | Cru</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie-edge">
  <link href="css/fonts.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/clientlibs.min.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
  function buscarCoach(texto){
    $('#resultado').show();
    $.ajax({
      type: "post",
      dataType: "html",
      data: {accion: "buscar_coach",buscar:texto},
      url: "ajax_requests.php",
      cache: false,
      // beforeSend: function() {
      //    $('#res3').html('loading please wait...');
      // },
      success: function(htmldata) {
      //alert(htmldata);
         $("#resultado").html(htmldata);
      }
    });
  }
  function seleccionarcoach(idcoach,idpersona){
    $('#resultado').hide();
    $.ajax({
      type: "post",
      dataType: "html",
      data: {accion: "seleccion_coach",idcoach:idcoach,idpersona:idpersona},
      url: "ajax_requests.php",
      cache: false,
      // beforeSend: function() {
      //    $('#res3').html('loading please wait...');
      // },
      success: function(htmldata) {
      //alert(htmldata);
         $("#coach").val(htmldata);
      }
    });
  }
  </script>
</head>
<body class="sans-serif lh-copy cru-scorpion" style="padding-top: 0px;">
  <div class="form-group row">
  <label for="coach" class="col-sm-3 col-form-label"><i class="fas fa-hands-helping"></i></i> Coach </label>
    <input type="text" class="form-control-plaintext" id="coach" name="coach" placeholder="Escribe su nombre aquí" onkeyup="buscarCoach(this.value)">
    <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
    <div id="resultado"></div>
  </div>
</body>
</html>
