<?php session_start();
  include 'inc/db_config.php';
  include 'inc/funciones.php';
  //if(!isset($_SESSION['email'])){ header('Location: login.php');}
  if(isset($_POST['findEmail'])){$respuesta=existeEmail($_POST['forgottenEmail']);}
  //if(isset($_POST['out'])){session_destroy();header('Location: login.php');}
?>
<!doctype html>
<html lang="es">
<head>
  <link rel="shortcut icon" href="img/icono.png">
  <title>Olvidé mi contraseña</title>

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
      <div class="col-sm-4 integrity-opener">
        <?php if(!isset($_POST['findEmail']) OR (isset($respuesta) AND $respuesta==false)) {?>
        <div class="form-group">
          <form method="post" acton="olvido.php">
            <label for="inputEmail" class="sr-only">Correo Electrónico</label>
            <input type="email" id="forgottenEmail" name="forgottenEmail" class="form-control" placeholder="Correo electrónico institucional" required autofocus>
            <br>
            <button class="btn" name="findEmail" type="submit">Continuar</button>
          </form>
        </div>
      <?php } else{ if($respuesta){ //enviarCorreoRecuperacion($_POST['forgottenEmail']); ?>
        <div class="alert alert-warning" role="alert">
          Se ha enviado un mensaje a <?php echo $_POST['forgottenEmail']; ?> con las instrucciones para reiniciar tu contraseña.
        </div>
      <?php } else{ ?>
        <div class="alert alert-danger" role="alert">
          La dirección de correo electrónico <?php echo $_POST['forgottenEmail']; ?> no aparece en la base de dato. Por favor verifique.
        </div>
      <?php } } ?>
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
