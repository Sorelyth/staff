<?php
session_start();
include 'inc/db_config.php';
include 'inc/funciones.php';
if(!isset($_SESSION['idusuario'])){ header('Location: login.php');}
if(isset($_POST['out'])){session_destroy();header('Location: login.php');}
?>
<!doctype html>
<html lang="es">
<head>
  <link rel="shortcut icon" href="img/icono.png">
  <title>Nuevo informe</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie-edge">
  <link href="css/fonts.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/clientlibs.min.css" type="text/css">
  <link rel="stylesheet" href="css/modal.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/mix.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
</head>
<body class="sans-serif lh-copy cru-scorpion" style="padding-top: 0px;">
<section id="cru-header-nav" class="hidden-print">
<header id="cru-header">
  <div class="cru-container">
    <div class="cru-row">
      <div class="cru-col-3">
        <a class="logo" href="https://www.cru.org/">
        <img src="img/cru_logo.png">
        </a>
      </div>

      <div class="cru-col-9 cru-text-right">
        <div class="signin">
          <a class="signin-name" onclick="logout();">Cerrar sesión</a>
        </div>
      </div>

    </div>
  </div>
</header>
</section>

<section id="cru-body">
  <div class="cru-container">
    <div id="pdf_content"></div>
    <button class="btn btn-primary" onclick="generarpdf();">eso</button>
  </div>
</section>
<script>
function generarpdf(){
  var doc = new jsPDF();
  $.ajax({
    type: "post",
    dataType: "html",
    data: {accion: "contenido_informe",idinforme:35},
    url: "ajax_requests.php",
    cache: false,
    // beforeSend: function() {
    //    $('#res3').html('loading please wait...');
    // },
    success: function(htmldata) {
      $("#pdf_content").html(htmldata);
      doc.fromHTML($("#pdf_content").html(), 15, 15, {
        'width': 170
    });
    doc.save('sample-file.pdf');
      //alert(response);
    }
  });
}
</script>
</body>
</html>
