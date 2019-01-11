<?php session_start();
  include 'inc/db_config.php';
  include 'inc/funciones.php';
  if(isset($_POST['accede'])){LoginUsuario($_POST['inputEmail'],$_POST['inputPassword']);}
  //if(!isset($_SESSION['username'])){ header('Location: login.php');}
  //if(isset($_POST['out'])){session_destroy();header('Location: login.php');}
?>
<!doctype html>
<html lang="es">
<head>
  <link rel="shortcut icon" href="img/icono.png">
  <title>Inicio de sesión</title>

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
    </div>
  </div>
</header>


</section>

<section id="home">
  <div class="cru-container">
    <div class="row">
      <div class="col-sm-4 integrity-opener"></div>
      <div class="col-sm-4 integrity-opener">
        <div class="title section">
          <div class="container-fluid">

          <div class="form-group">
            <div class="form-text"><h3 class="panel-title"><center>Iniciar Sesión</center></h3></div><br>
              <form method="post" action="login.php">
                <?php if($err){echo '<div class="alert-warning" role="alert">Usuario y/o Contraseña Incorrectos</div>';} ?>
                <label for="inputEmail" class="sr-only">Correo Electrónico</label>
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Correo electrónico institucional" required autofocus>
                <br>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" required>
                <br>
                <button class="btn" name="accede" type="submit">Acceder</button>
              </form>
              <br>
                <div class="form-group">
                <label for="olvide">¿Olvidaste tu contraseña?</label><br>
                <a href="olvido.php">Haz click aquí para recuperarla</a>
                </div>
              </div>
            </div><!-- col-xs-4 -->
          </div><!-- div row -->
        </div>
        <div class="col-sm-4 integrity-opener"></div>
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
