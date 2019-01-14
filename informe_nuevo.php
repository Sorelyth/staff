<?php
  session_start();
  include 'inc/db_config.php';
  include 'inc/funciones.php';
  if(!isset($_SESSION['idusuario'])){ header('Location: login.php');}
  //if(isset($_POST['out'])){session_destroy();header('Location: login.php');}
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
    </div>
  </div>
</header>
<div id="cru-nav" class="visible-sm-up">
  <div class="cru-container">
    <ul>
      <li id="top-menu-0" class="top-menu-item">
        <a href="">Buscar informes</a>
      </li>
      <li id="top-menu-1" class="top-menu-item">
        <a href="informe_nuevo.php">Crear informe</a>
      </li>
      <li id="top-menu-2" class="top-menu-item">
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
          <center><h1>Informe mensual</h1></center>
          <br>
        </div>
        <br>
        <form method="post" action="">
          <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-address-book"></i> Nombre completo </label>
            <input type="text" readonly class="form-control-plaintext" id="name" value="<?php getNombreyApellido($_SESSION['idusuario']);?>">
            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
          </div>

          <div class="form-group row">
          <label for="componente" class="col-sm-3 col-form-label"><i class="fas fa-briefcase"></i> Componente </label>
            <input type="text" readonly class="form-control-plaintext" id="componente" value="<?php getComponente($_SESSION['idusuario']);?>">
            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
          </div>

          <div class="form-group row">
          <label for="coach" class="col-sm-3 col-form-label"><i class="fas fa-hands-helping"></i> Coach </label>
            <input type="text" class="form-control-plaintext" id="coach" name="coach" placeholder="Escribe su nombre aquí" onkeyup="buscarCoach(this.value)">
            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
            <div id="resultado"></div>
          </div>


          <div class="form-group row">
            <label for="doc_id" class="col-sm-3 col-form-label"><i class="far fa-address-card"></i> Número de documento de identidad</label>
            <input type="text" class="col-sm-4 form-control" id="doc_id" name="doc_id" required>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label"><i class="fas fa-mobile-alt"></i> Teléfono celular</label>
            <input type="number" class="col-sm-4 form-control" id="phone" name="phone" required>
          </div>

          <div class="form-group row">
            <label for="iddpto" class="col-sm-3 col-form-label"><i class="fas fa-map-marker-alt"></i>Departamento donde resides</label>
            <?php selectDepartamento();?>
          </div>

          <div class="form-group row" id="selectmunicipio">
          </div>

          <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label"><i class="fas fa-map-pin"></i> Dirección</label>
            <input type="text" class="col-sm-4 form-control" id="address" name="address" required>
          </div>

          <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label"><i class="fas fa-male"><i class="fas fa-female"></i></i> Género</label>
            <select class="col-sm-4 form-control" id="gender" name="gender" required>
              <option value="0" selected> </option>
              <option value="F">Femenino</option>
              <option value="M">Masculino</option>
            </select>
          </div>

          <div class="form-group row">
            <label for="idestadocivil" class="col-sm-3 col-form-label"> Estado civil</label>
            <?php selectEstadoCivil(); ?>
          </div>

          <div class="form-group row">
            <label for="birthdate" class="col-sm-3 col-form-label"><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento</label>
            <input type="date" class="col-sm-4 form-control" id="birthdate" name="birthdate" required>
          </div>


        <button type="submit" class="btn btn-light" name="moreinfo" id="moreinfo">Finalizar</button>
      </form>
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
