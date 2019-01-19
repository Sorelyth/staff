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
  <title>Materiales DDSM</title>

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
        <a href="recursos.php">Recursos</a>
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
          <h3 style="text-align:center;">
            <br>A continuación tienes todo lo necesario para<br>que comiences o continues este proceso.
          </h3>
          <br>
        </div>
      </div>

      <div class="col-sm-12 integrity-opener">
        <div class="row">
          <div class="col-sm">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="assets/Manual_Alumno_DDSM_Colombia.pdf">
                    <center><i class="fas fa-file-pdf fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    MANUAL DEL ALUMNO
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="assets/La_carpeta_negra.pdf">
                    <center><i class="fas fa-file-pdf fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    LA CARPETA NEGRA
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="assets/Presentacion_DDSM.pptx">
                    <center><i class="fas fa-file-powerpoint fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    PRESENTACIÓN DDSM
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="assets/Imprimibles.pptx">
                    <center><i class="fas fa-file-powerpoint fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    LLAMADO Y FOTOS
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="assets/Necesidad_financiera.docx">
                    <center><i class="fas fa-file-word fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    NECESIDAD FINANCIERA
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row"><br><br></div>
        <div class="row">
          <div class="col-sm">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="assets/Politica_financiera.docx">
                    <center><i class="fas fa-file-word fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    POLITICA FINANCIERA
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="assets/Actitud_Mensaje_1.wma">
                    <center><i class="fas fa-file-audio fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    AUDIO DE LA ACTITUD #1
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="assets/Actitud_Mensaje_2.wma">
                    <center><i class="fas fa-file-audio fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    AUDIO DE LA ACTITUD #2
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="text-image parbase section">
              <div>
              <div>
                <div class="col">
                  <a href="assets/Logo_Cru_Colombia.png">
                    <center><i class="fas fa-file-image fa-7x"></i></center>
                  </a>
                </div>
                <div class="col">
                  <p style="text-align:center;"><br>
                    LOGO DE CRU EN FORMATO PNG
                  </p>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row"><br></div>
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
