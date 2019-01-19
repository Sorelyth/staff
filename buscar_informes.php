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
  <title>Buscar informes</title>

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

      <!--css para barra vertical que sirva como separador-->
            <style>
            #vertical-bar{
              border-left: 1px solid #bebebe;
              width:1px;
              height:40px;}
            </style>

      <!--"botones" ubicados en el header heredando css de clase "signin"-->
          <div class="col-sm-6 cru-text-right">
            <div class="signin">
              <a class="signin-name" href="editar_perfil.php">Editar perfil</a>
            </div>
          </div>
          <div id="vertical-bar"></div>
          <div class="col-sm-2">
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
        <a href="index.php">Inicio</a>
      </li>
      <?php if(isAdmin($_SESSION['idusuario'])){ ?>
      <li id="top-menu-1" class="top-menu-item">
        <a href="buscar_informes.php">Buscar informes</a>
      </li>
      <?php } ?>
      <li id="top-menu-2" class="top-menu-item">
        <a href="informe_nuevo.php">Crear informe</a>
      </li>
      <li id="top-menu-3" class="top-menu-item">
        <a href="">Ver informes antiguos</a>
      </li>
    </ul>
  </div>
</div>
</section>

<section id="cru-body">
  <div class="cru-container">
    <div class="cru-row">
      <div class="col-sm-12 integrity-opener">
        <div class="title section">
          <center><h1>Módulo de búsqueda de informes</h1></center>
          <br>
        </div>
        <div class="form-group row">
          <label for="perona" class="col-sm-3 col-form-label"><i class="fas fa-hands-helping"></i> Nombre de persona </label>
          <input type="text" class="col-sm-5 form-control-plaintext" id="persona" name="persona" placeholder="Escribe su nombre aquí" onkeyup="buscarpersona(this.value)" required>
          <input type="number" hidden id="idpersona">
          <button class="btn btn-light" onclick="buscarinformesporpersona();" id="informesporpersona">Buscar informes por persona</button>
        </div>
        <div class="form-group row"><div class="col-sm-3"></div><div class="col-sm-5" id="resultado"></div></div>
        <div class="form-group row">
          <label for="idmes" class="col-sm-3 col-form-label"><i class="fas fa-calendar"></i> Mes y año del informe </label>
          <?php selectMes();?>
          <div class="col-sm-1"></div>
          <input type="text" class="col-sm-1 form-control" name="year" id="year" placeholder="Año">
          <div class="col-sm-1"></div>
          <button class="btn btn-light" onclick="buscarinformespormes();" id="informespormes">Buscar informes por mes y año</button>
        </div>
        <div class="form-group row" style="text-align:center;">
          <center>
            <button class="btn btn-light" onclick="buscarinformesporpersonaymes();" id="informesporpersonaymes">Buscar informes por persona, mes y año</button>
          </center>
        </div>
        <div id="resultados_busqueda">
        </div>
      </div>
    </div>
</section>

<script>
$("#informesporpersona").prop('disabled', true);
$("#informespormes").prop('disabled', true);
$("#informesporpersonaymes").prop('disabled', true);

var toValidate1 = $('#persona'),
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
        $("#informesporpersona").prop('disabled', false);
    } else {
        $("#informesporpersona").prop('disabled', true);
    }
});

var toValidate2 = $('#year'),
    valid2 = false;
toValidate2.change(function () {
    if ($(this).val().length > 0) {
        $(this).data('valid2', true);
    } else {
        $(this).data('valid2', false);
    }
    toValidate2.each(function () {
        if ($(this).data('valid2') == true) {
            valid2 = true;
        } else {
            valid2 = false;
        }
    });
    if (valid2 === true) {
        $("#informespormes").prop('disabled', false);
    } else {
        $("#informespormes").prop('disabled', true);
    }
});

var toValidate3 = $('#persona,#year'),
    valid3 = false;
toValidate3.change(function () {
    if ($(this).val().length > 0) {
        $(this).data('valid3', true);
    } else {
        $(this).data('valid3', false);
    }
    toValidate3.each(function () {
        if ($(this).data('valid3') == true) {
            valid3 = true;
        } else {
            valid3 = false;
        }
    });
    if (valid3 === true) {
        $("#informesporpersonaymes").prop('disabled', false);
    } else {
        $("#informesporpersonaymes").prop('disabled', true);
    }
});
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
      <a href="https://www.facebook.com/CruVPC/" target="_blank" class="br-pill bg-cru-scorpion w2 pa2 fab fa-facebook"></a>
      <a href="https://www.instagram.com/cru.colombia" target="_blank" class="br-pill bg-cru-scorpion ml2 w2 pa2 fab fa-instagram"></a>
      <a href="ops.colombia@cru.org" target="_blank" class="br-pill bg-cru-scorpion ml2 w2 pa2 fab fa fa-envelope"></a>
      <a href="+57%203184447781" target="_blank" class="br-pill bg-cru-scorpion ml2 w2 pa2 fab fa-whatsapp"></a>
      <a href="tel:" target="_blank" class="br-pill bg-cru-scorpion ml2 w2 pa2 fas fa-mobile-alt"></a>
    </div>
  </div>
  </div>
</footer>
</body>
</html>
