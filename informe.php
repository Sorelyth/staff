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
  <title>Informes | Cru</title>

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
        <a href="recursos.php">Recursos</a>
      </li>
      <li id="top-menu-2" class="top-menu-item">
        <a href="assets/Manual_de_identidad.pdf">Manual de identidad corporativa</a>
      </li>
      <li id="top-menu-3" class="top-menu-item">
        <a href="informe.php">Informes</a>
      </li>
      <li id="top-menu-4" class="top-menu-item">
        <a href="reporte_transferencias.php">Reporte de transferencias</a>
      </li>
    </ul>
  </div>
</div>
<div id="cru-mobile-menu">
  <ul class="first-level">
    <li class="search"><a href=""><span class="mobile-menu-label">Search</span><span class="icon"></span></a></li>
    <li class="has-children">
      <a href="index.php">
        <span class="mobile-menu-label">Inicio</span>
        <span class="icon"></span>
      </a>
    </li>
    <li class="has-children">
      <a href="recursos.php">
        <span class="mobile-menu-label">Recursos</span>
        <span class="icon"></span>
      </a>
    </li>
    <li class="has-children">
      <a href="assets/Manual_de_identidad.pdf">
        <span class="mobile-menu-label">Manual de identidad corporativa</span>
        <span class="icon"></span>
      </a>
    </li>
    <li class="has-children">
      <a href="informes.php">
        <span class="mobile-menu-label">Informes</span>
        <span class="icon"></span>
      </a>
    </li>
    <li class="has-children">
      <a href="reporte_transferencias.php">
        <span class="mobile-menu-label">Reporte de transferencias</span>
        <span class="icon"></span>
      </a>
    </li>
  </ul>
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

          <?php if(isAdmin($_SESSION['idusuario'])){ ?>

          <div class="col-sm-4">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="buscar_informes.php">
                    <center><i class="fas fa-search fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    BUSCAR INFORMES
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>
        <?php } ?>
          <div class="col-sm-4">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="informe_nuevo.php">
                    <center><i class="fas fa-calendar-plus fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    CREAR INFORME
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="informes_antiguos.php">
                    <center><i class="fas fa-eye fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    VER INFORMES<br>ANTIGUOS
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
