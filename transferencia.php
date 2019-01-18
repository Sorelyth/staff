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
      <li id="top-menu-1" class="top-menu-item">
        <a href="material.php">Materiales DDSM</a>
      </li>
      <li id="top-menu-2" class="top-menu-item">
        <a href="pdf_viewer/web/viewer.html?file=%2Fstaff/assets/Manual_de_identidad.pdf">Manual de identidad corporativa</a>
      </li>
      <li id="top-menu-3" class="top-menu-item">
        <a href="informe.php">Informes</a>
      </li>
      <li id="top-menu-4" class="top-menu-item">
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
            <br>¿Qué vas a hacer hoy?
          </h2>
          <br>
        </div>
      </div>

      <div class="col-sm-12 integrity-opener">
        <div class="row">
          <div class="col-sm-6">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="socio_inscrito.php">
                    <center><i class="fas fa-user-check fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    SOCIO INSCRITO<br>
                    Diligencia aquí la<br>transferencia de un<br>socio ya registrado.
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="socio_nuevo.php">
                    <center><i class="fas fa-user-plus fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    SOCIO NUEVO<br>
                    Diligencia aquí el registro<br>de un nuevo socio.
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
        <br>
      </div>
    </div>
  </div>
</section>

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
    <a href="https://www.instagram.com/cru_lac" target="_blank" class="br-pill bg-cru-scorpion ml2 w2 pa2 fab fa-instagram"></a>
    <a href="https://twitter.com/Cru_LAC" target="_blank" class="br-pill bg-cru-scorpion ml2 w2 pa2 fab fa-twitter"></a>
  </div>
  </div>
  </div>
</footer>
</body>
</html>
