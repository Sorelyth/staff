<?php session_start();
  include 'inc/db_config.php';
  include 'inc/funciones.php';
  if(!isset($_SESSION['idusuario'])){header('Location:login.php');}
  if(isset($_POST['out'])){session_destroy();header('Location: login.php');}
  if(isset($_POST['name'])){UpdateInfoUsuario($_SESSION['idusuario'],$_POST['name'],$_POST['lastname'],$_POST['doc_id'],$_POST['phone'],$_POST['address'],$_POST['idmcpo'],$_POST['gender'],$_POST['idestadocivil'],$_POST['birthdate'],$_POST['idcomponente']);}
?>
<!doctype html>
<html lang="es">
<head>
  <link rel="shortcut icon" href="img/icono.png">
  <title>Editar perfil | Cru</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie-edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/mix.js"></script>
  <link href="css/fonts.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="css/clientlibs.min.css" type="text/css">
</head>

<body class="sans-serif lh-copy cru-scorpion" style="padding-top: 0px;">
<section id="cru-header-nav" class="hidden-print">
<header id="cru-header">
  <div class="cru-container">
    <div class="row">
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
    <a href="#" class="icon icon-search search search-toggle"></a>
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

<section id="home">
  <div class="cru-container">
    <div class="cru-row">
      <div class="col-sm-2"></div>
      <div class="col-sm integrity-opener">
        <br>
        <form method="post" action="editar_perfil.php" onsubmit="return confirm('¿Seguro de actualizar los datos?')">

          <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-address-book"></i> Nombre</label>
            <input type="text" class="col-sm-4 form-control" id="name" name="name" required value="<?php echo getNombre($_SESSION['idusuario']); ?>">
            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
          </div>

          <div class="form-group row">
            <label for="lastname" class="col-sm-3 col-form-label"><i class="fas fa-address-book"></i> Apellidos</label>
            <input type="text" class="col-sm-4 form-control" id="lastname" name="lastname" required value="<?php echo getApellidos($_SESSION['idusuario']); ?>">
          </div>

          <div class="form-group row">
            <label for="doc_id" class="col-sm-3 col-form-label"><i class="far fa-address-card"></i> Número de documento de identidad</label>
            <input type="text" class="col-sm-4 form-control" id="doc_id" name="doc_id" required value="<?php echo getDocId($_SESSION['idusuario']); ?>">
          </div>

          <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label"><i class="fas fa-mobile-alt"></i> Teléfono celular</label>
            <input type="number" class="col-sm-4 form-control" id="phone" name="phone" required value="<?php echo getTelefono($_SESSION['idusuario']); ?>">
          </div>

          <div class="form-group row">
            <label for="iddpto" class="col-sm-3 col-form-label"><i class="fas fa-map-marker-alt"></i> Departamento donde resides</label>
            <?php selectDepartamento();?>
          </div>

          <div class="form-group row" id="selectmunicipio">
          </div>

          <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label"><i class="fas fa-map-pin"></i>Dirección</label>
            <input type="text" class="col-sm-4 form-control" id="address" name="address" required value="<?php echo getDireccion($_SESSION['idusuario']); ?>">
          </div>

          <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label"><i class="fas fa-male"><i class="fas fa-female"></i></i> Género</label>
            <select class="col-sm-4 form-control" id="gender" name="gender" required >
              <option value="0"> </option>
              <option value="F" <?php $sexo_actual = getSexo($_SESSION['idusuario']);echo checkSelection("F",$sexo_actual);?>>Femenino</option>
              <option value="M"<?php $sexo_actual = getSexo($_SESSION['idusuario']);echo checkSelection("M",$sexo_actual);?>>Masculino</option>
            </select>
          </div>

          <div class="form-group row">
            <label for="idestadocivil" class="col-sm-3 col-form-label"> Estado civil</label>
            <?php selectEstadoCivil(); ?>
          </div>

          <div class="form-group row">
            <label for="birthdate" class="col-sm-3 col-form-label"><i class="fas fa-calendar-alt"></i> Fecha de Nacimiento</label>
            <input type="date" class="col-sm-4 form-control" id="birthdate" name="birthdate" required value="<?php echo getFechaNacimiento($_SESSION['idusuario']); ?>">
          </div>

          <div class="form-group row">
            <label for="idcomponente" class="col-sm-3 col-form-label"><i class="fas fa-briefcase"></i> Componente principal en el que sirves</label>
            <?php selectComponente(); ?>
          </div>

          <div class="form-group row">
          <label for="coach" class="col-sm-3 col-form-label"><i class="fas fa-hands-helping"></i> Coach </label>
            <input type="text" class="col-sm-5 form-control-plaintext" id="coach" name="coach" placeholder="Escribe su nombre aquí" onkeyup="buscarCoach(this.value)" value="<?php getCoach($_SESSION['idusuario']); ?>" required>
            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
          </div>
          <div class="form-group row"><div class="col-sm-3"></div><div class="col-sm-5" id="resultado"></div></div>


        <button type="submit" class="btn btn-light" name="actualizar" id="actualizar">Actualizar</button>
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
