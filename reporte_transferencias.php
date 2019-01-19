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
  <title>Reporte de transferencias</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie-edge">
  <link href="css/fonts.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/clientlibs.min.css" type="text/css">
  <link rel="stylesheet" href="css/modal.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/mix.js"></script>
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

<div id="cru-nav" class="visible-sm-up">
  <div class="cru-container">
    <ul>
      <li id="top-menu-0" class="top-menu-item">
        <a href="material.php">Materiales DDSM</a>
      </li>
      <li id="top-menu-1" class="top-menu-item">
        <a href="pdf_viewer/web/viewer.html?file=%2Fstaff/assets/Manual_de_identidad.pdf">Manual de identidad corporativa</a>
      </li>
      <li id="top-menu-2" class="top-menu-item">
        <a href="informe.php">Informes</a>
      </li>
      <li id="top-menu-3" class="top-menu-item">
        <a href="transferencia.php">Reporte de transferencias</a>
      </li>
    </ul>
  </div>
</div>
</section>

<section id="menu">
  <div class="cru-container">
    <div class="row-sm-12 justify-content-sm-center">
      <div class="col-sm-12 integrity-opener">
        <div class="title section">
          <h2 style="text-align:center;">
            <br>Selecciona a tus socios registrados o agrega uno nuevo.
          </h2>
          <br>
          <div class="form-group row">
            <div class="col-sm-1"></div>
            <?php selectSocios($_SESSION['idusuario']); ?>
            <div class="col-sm-3"></div>
            <div class="col-sm-1"><button class="btn btn-primary" onclick="modalnuevosocio();">Agregar nuevo socio</button></div>
          </div>
          <!-- Modal -->
          <div class="modal" id="socio_modal">
              <div class="modal-body">
                <div class="form-group row">
                  <select class="col-sm-2 form-control" id="idtiposocio" name="idtiposocio"  onchange="seleccionartiposocio();">
                    <option value=0 selected></option>
                    <option value=1>Persona</option>
                    <option value=2>Empresa</option>
                  </select>
                </div>
                <div id="formulario_socio"></div>
                <div class="row" style="text-align:center;">
                  <div class="col-sm-3"></div>
                  <button type="button" class="btn btn-secondary" onclick="cerrarmodalsocio();">Cerrar</button>
                  <div class="col-sm-1"></div>
                  <button type="button" class="btn btn-primary" onclick="nuevosocio();" id="guardarsocio">Guardar</button>
                </div>
              </div>
          </div>
        </div>
        <br>
        <div id="info_socio"></div>
        <div id="formulario_transferencia"></div>
      </div>
    </div>
  </div>
</section>
<script>
$("#guardarsocio").prop('disabled', true);
//$("#informespormes").prop('disabled', true);


var toValidate1 = $('#socio_name,#socio_id,#socio_email,#socio_address'),
    valid1 = false;
toValidate1.change(function () {
    if ($(this).val().length > 0) {
        $(this).data('valid1', true);
    } else {
        $(this).data('valid1', false);
    }
    toValidate1.each(function () {
        if ($(this).data('valid1') == true) {
            valid1 = true;
        } else {
            valid1 = false;
        }
    });
    if (valid1 === true) {
        $("#guardarsocio").prop('disabled', false);
    } else {
        $("#guardarsocio").prop('disabled', true);
    }
});

// var toValidate2 = $('#year'),
//     valid2 = false;
// toValidate2.change(function () {
//     if ($(this).val().length > 0) {
//         $(this).data('valid2', true);
//     } else {
//         $(this).data('valid2', false);
//     }
//     toValidate2.each(function () {
//         if ($(this).data('valid2') == true) {
//             valid2 = true;
//         } else {
//             valid2 = false;
//         }
//     });
//     if (valid2 === true) {
//         $("#informespormes").prop('disabled', false);
//     } else {
//         $("#informespormes").prop('disabled', true);
//     }
// });

</script>
<footer class="white bg-cru-scorpion-dark pv4 hidden-print" id="main-footer">
  <div class="container">
    <div class="row pb4">
      <div class="col-lg-2 col-md col-sm-6 mv3"></div>
      <div class="col-lg-2 col-md col-sm-6 mv3"></div>
      <div class="col-lg-2 col-md col-sm-6 mv3"></div>
      <div class="col-lg-2 col-md col-sm-6 mv3"></div>
    </div>
  <hr class="border-bottom-0 bt b--cru-scorpion">
  <div class="d-flex justify-content-between align-items-center pt3">
    <div>
      <img class="w3" src="img/cru_logo_white.png">
      <span class="cru-scorpion-light pl3 f6 v-btm dn d-sm-inline">
        ©1994-2018 Cru. All Rights Reserved.
      </span>
    </div>
  <div class="tc">
    <a href="https://www.facebook.com/crulac" target="_blank" class="br-pill bg-cru-scorpion w2 pa2 fab fa-facebook"></a>
    <a href="https://www.instagram.com/crulac" target="_blank" class="br-pill bg-cru-scorpion ml2 w2 pa2 fab fa-instagram"></a>
    <a href="https://twitter.com/Cru_LAC" target="_blank" class="br-pill bg-cru-scorpion ml2 w2 pa2 fab fa-twitter"></a>
  </div>
  </div>
  </div>
</footer>
</body>
</html>
