<?php session_start();
  include 'inc/db_config.php';
  include 'inc/funciones.php';
  if(!isset($_SESSION['idusuario'])){header('Location:register.php');}
?>
<!doctype html>
<html lang="es">
<head>
  <link rel="shortcut icon" href="img/icono.png">
  <title>Registro</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie-edge">
  <link href="css/fonts.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/clientlibs.min.css" type="text/css">
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

</section>

<section id="home">
  <div class="cru-container">
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm integrity-opener">
        <br>
        <form method="post" action="moreinfo.php" onsubmit="return checkMoreInfoForm(this)">

          <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-address-book"></i>Nombre</label>
            <input type="text" class="col-sm-4 form-control" id="name" name="name">
            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
          </div>

          <div class="form-group row">
            <label for="lastname" class="col-sm-3 col-form-label">Apellidos</label>
            <input type="text" class="col-sm-4 form-control" id="lastname" name="lastname">
          </div>

          <div class="form-group row">
            <label for="doc_id" class="col-sm-3 col-form-label"><i class="far fa-address-card"></i>Número de documento de identidad</label>
            <input type="text" class="col-sm-4 form-control" id="doc_id" name="doc_id">
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label"><i class="fas fa-mobile-alt"></i>Teléfono celular</label>
            <input type="number" class="col-sm-4 form-control" id="phone" name="phone">
          </div>

          <div class="form-group row">
            <label for="iddpto" class="col-sm-3 col-form-label">Departamento donde resides</label>
            <?php selectDepartamento();?>
            <label for="idmcpo" class="col-sm-3 col-form-label">Ciudad donde resides</label>
            <?php if(isset($_POST['iddpto'])){selectMunicipio($_POST['iddpto']);}?>
          </div>

          <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label"><i class="fas fa-male"><i class="fas fa-female"></i></i>Género</label>
            <select class="col-sm-4 form-control" id="gender" name="gender">
              <option value="0" selected> </option>
              <option value="F">Femenino</option>
              <option value="M">Masculino</option>
            </select>
          </div>

          <div class="form-group row">
            <label for="idestadocivil" class="col-sm-3 col-form-label">Estado civil</label>
            <?php selectEstadoCivil(); ?>
          </div>

          <div class="form-group row">
            <label for="birthdate" class="col-sm-3 col-form-label">Fecha de Nacimiento</label>
            <input type="date" class="col-sm-4 form-control" id="birthdate" name="birthdate">
          </div>

          <div class="form-group row">
            <label for="idcomponente" class="col-sm-3 col-form-label">Componente principal en el que sirves</label>
            <?php selectComponente(); ?>
          </div>


        <button type="submit" class="btn btn-primary" name="registro" id="registro">Continuar</button>
      </form>
      </div>
      <div class="col-sm-2"></div>
    </div>
  </div>
</section>
<br>
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
