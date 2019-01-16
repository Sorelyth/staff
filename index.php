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
  <title>Inicio</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie-edge">
  <link href="css/fonts.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/clientlibs.min.css" type="text/css">
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

<!--"boton" cerrar sesion ubicado en el header heredando css de clase "signin"-->
      <div class="cru-col-9 cru-text-right">
        <div class="signin">
          <a class="signin-name" onclick="logout();">Cerrar sesión</a>
        </div>
      </div>

    </div>
  </div>
</header>
</section>

<section id="menu">
  <div class="cru-container">
    <div class="row-sm-12 justify-content-sm-center">
      <div class="col-sm-12 integrity-opener">
        <div class="title section">
          <h1 style="text-align:center;">
            ¡Hola, es un gusto tenerte por aquí!
          </h1>
          <h3 style="text-align:center;">
            ¿Qué vas a hacer hoy?
          </h3>
          <br>
        </div>
      </div>

  <div class="col-sm-12 integrity-opener">
    <div class="row">
      <div class="col-sm-3">
        <div class="text-image parbase section">
          <div>
          <div>
            <div class="col">
              <a href="material.php">
                <center><i class="fas fa-folder-open fa-7x"></i></center>
              </a>
            </div>
            <div class="col">
              <p style="text-align:center;"><br>
                MATERIALES DDSM
              </p>
            </div>
          </div>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="text-image parbase section">
          <div>
          <div>
            <div class="col">
              <a href="pdf_viewer/web/viewer.html?file=%2Fstaff/assets/Manual_de_identidad.pdf">
                <center><i class="fas fa-book fa-7x"></i></center>
              </a>
            </div>
            <div class="col">
              <p style="text-align:center;"><br>
                MANUAL DE IDENTIDAD<br>CORPORATIVA
              </p>
            </div>
          </div>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="text-image parbase section">
          <div>
          <div>
            <div class="col">
              <a href="informe.php">
                <center><i class="fas fa-file-alt fa-7x"></i></center>
              </a>
            </div>
            <div class="col">
              <p style="text-align:center;"><br>
                INFORMES
              </p>
            </div>
          </div>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="text-image parbase section">
          <div>
          <div>
            <div class="col">
              <a href="transferencia.php">
                <center><i class="fas fa-money-check-alt fa-7x"></i></center>
              </a>
            </div>
            <div class="col">
              <p style="text-align:center;"><br>
                REPORTE DE<br>TRANSFERENCIA
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
    <a href="https://www.instagram.com/crulac" target="_blank" class="br-pill bg-cru-scorpion ml2 w2 pa2 fab fa-instagram"></a>
    <a href="https://twitter.com/Cru_LAC" target="_blank" class="br-pill bg-cru-scorpion ml2 w2 pa2 fab fa-twitter"></a>
  </div>
  </div>
  </div>
</footer>
</body>
</html>
