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
  <title>Nuevo informe | Cru</title>

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
        <a href="informes_antiguos.php">Ver informes antiguos</a>
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
    <?php if(isAdmin($_SESSION['idusuario'])){ ?>
    <li class="has-children">
      <a href="buscar_informes.php">
        <span class="mobile-menu-label">Buscar informes</span>
        <span class="icon"></span>
      </a>
    </li>
    <?php } ?>
    <li class="has-children">
      <a href="informe_nuevo.php">
        <span class="mobile-menu-label">Crear informe</span>
        <span class="icon"></span>
      </a>
    </li>
    <li class="has-children">
      <a href="informes_antiguos.php">
        <span class="mobile-menu-label">Ver informes antiguos</span>
        <span class="icon"></span>
      </a>
    </li>
  </ul>
</div>
</section>

<section id="cru-body">
  <div class="cru-container">
    <div class="row-sm-12 justify-content-sm-center">
      <div class="col-sm-12 integrity-opener">
        <div class="title section">
          <center><h1>Informe mensual</h1></center>
          <br>
        </div>
        <br>
        <form method="post" action="informe.php" onsubmit="return nuevoinforme();" enctype="multipart/form-data">
          <input type="number" id="idinforme" hidden>
          <div class="form-group row">
          <label for="idmes" class="col-sm-3 col-form-label"><i class="fas fa-calendar"></i> Mes y año del informe </label>
          <?php selectMes();?>
          <div class="col-sm-1"></div>
          <input type="text" class="col-sm-1 form-control" name="year" id="year" placeholder="Año" required>
            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
          </div>

          <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label"><i class="fas fa-address-book"></i> Nombre completo </label>
            <input type="text" readonly class="col-sm-5 form-control-plaintext" id="name" value="<?php getNombreyApellido($_SESSION['idusuario']);?>">
            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
          </div>

          <div class="form-group row">
          <label for="ciudad" class="col-sm-3 col-form-label"><i class="fas fa-map-marker-alt"></i> Ciudad </label>
            <input type="text" readonly class="col-sm-5 form-control-plaintext" id="ciudad" value="<?php getCiudad($_SESSION['idusuario']);?>">
            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
          </div>

          <div class="form-group row">
          <label for="componente" class="col-sm-3 col-form-label"><i class="fas fa-briefcase"></i> Componente </label>
            <input type="text" readonly class="col-sm-5 form-control-plaintext" id="componente" value="<?php getComponente($_SESSION['idusuario']);?>">
            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
          </div>

          <div class="form-group row">
          <label for="coach" class="col-sm-3 col-form-label"><i class="fas fa-hands-helping"></i> Coach </label>
            <input type="text" class="col-sm-5 form-control-plaintext" id="coach" name="coach" placeholder="Escribe su nombre aquí" onkeyup="buscarCoach(this.value)" value="<?php getCoach($_SESSION['idusuario']); ?>" required>
            <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
          </div>
          <div class="form-group row"><div class="col-sm-3"></div><div class="col-sm-5" id="resultado"></div></div>

          <hr class="my-6">

          <div class="jumbotron-fluid">
            <div class="row-sm justify-content-sm-center"><div class="col-sm-3"></div><h4 style="color:#007398;">Basado en los 5 esenciales contesta las preguntas que verás a continuación</h4></div>
            <br>
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-4">
                <h3 style="color:#007398;">Nota:</h3>
                <p style="color:#3eb1c8;">
                  Los esenciales 1 y 2 no son necesarios contestarlos en este informe,
                  pero si es necesario tenerlos en cuenta para la reunión mensual con el Coach
                  encargado del equipo nacional.
                </p>
              </div>
              <div class="col-sm-4">
                <img src="img/5_esenciales.png" class="img-fluid">
              </div>
            </div>
          </div>
          <br>

          <hr class="my-6">

          <div class="alert alert-primary" role="alert" style="background-color:#007398;">
            <h4 style="color:white;font-weight:bold;">Primer esencial:  Generar y fomentar una cultura de oración y dependencia de Dios.</h4>
          </div>

          <div class="form-group row">
            <label for="pregunta1" class="col-sm-3 col-form-label"><p style="font-weight:bold;">¿Cómo estás cultivando tu relación con Dios? ¿De que maneras estas viviendo
             tu vida en comunidad? (¿quién o quienes te cuidan? y ¿como?)</p></label>
            <textarea class="col-sm-8 form-control" name="pregunta1" id="pregunta1"></textarea>
          </div>

          <div class="form-group row">
            <label for="pregunta2" class="col-sm-3 col-form-label"><p style="font-weight:bold;">¿Qué hiciste que fomentó una cultura de oración en tu equipo?</p></label>
            <textarea class="col-sm-8 form-control" name="pregunta2" id="pregunta2"></textarea>
          </div>

          <div class="alert alert-primary" role="alert" style="background-color:#007398;">
            <h4 style="color:white;font-weight:bold;">Segundo esencial:  Formarnos y capacitarnos como líderes de Cru.</h4>
          </div>

          <div class="form-group row">
            <label for="pregunta3" class="col-sm-3 col-form-label"><p style="font-weight:bold;">¿Preparaste las lecciones de Formación de Nuevos Misioneros de este mes?
               ¿De las sesiones de este mes de coaching en cuantas participaste? ¿Aplicaste lo aprendido en tu ministerio? ¿Cómo? Cuéntanos lo más significativo en este
               mes de este y otros procesos deformación que estés llevando.</p></label>
            <textarea class="col-sm-8 form-control" id="pregunta3" name="pregunta3" ></textarea>
          </div>

          <div class="alert alert-primary" role="alert" style="background-color:#3eb1c8;">
            <h4 style="color:white;font-weight:bold;">Tercer esencial:  Discipular y desarrollar un equipo de soporte misionero DDSM.</h4>
          </div>

          <div class="form-group row">
            <label for="pregunta4" class="col-sm-3 col-form-label"><p style="font-weight:bold;">¿Este mes fue un tiempo concentrado de DDSM?</p></label>
            <select class="col-sm-1" id="pregunta4" name="pregunta4" onchange="tiempoconcentrado(this.value);" required><option value=""></option>
              <option value="1">Sí</option>
              <option value="2">No</option>
            </select>
          </div>

          <div class="form-group row" id="div_pregunta5">
          </div>

          <div class="alert alert-primary" role="alert" style="background-color:#f9b625;">
            <h4 style="color:white;font-weight:bold;">Cuarto esencial:  Discipulado y formación de otros.</h4>
          </div>

          <p> Tomado del GMA, del área blanco del equipo bajo los criterios de LAC.</p>

          <div class="form-group row">
            <label for="pregunta6" class="col-sm-3 col-form-label"><p style="font-weight:bold;">Presentaciones del evangelio:</p></label>
            <input type="number" class="col-sm-1 form-control" id="pregunta6" name="pregunta6" required>
          </div>
          <div class="form-group row">
            <label for="pregunta7" class="col-sm-3 col-form-label"><p style="font-weight:bold;">Decisiones en la presentación:</p></label>
            <input type="number" class="col-sm-1 form-control" id="pregunta7" name="pregunta7" required>
          </div>
          <div class="form-group row">
            <label for="pregunta7" class="col-sm-3 col-form-label"><p style="font-weight:bold;">Seguimiento:</p></label>
            <input type="number" class="col-sm-1 form-control" id="pregunta8" name="pregunta8" required>
          </div>
          <div class="form-group row">
            <label for="pregunta8" class="col-sm-3 col-form-label"><p style="font-weight:bold;">Discípulos multiplicadores:</p></label>
            <input type="number" class="col-sm-1 form-control" id="pregunta9" name="pregunta9" required>
          </div>
          <div class="form-group row">
            <label for="pregunta9" class="col-sm-3 col-form-label"><p style="font-weight:bold;">Comunidades misionales:</p></label>
            <input type="number" class="col-sm-1 form-control" id="pregunta10" name="pregunta10" required>
          </div>
          <div class="form-group row">
            <label for="pregunta10" class="col-sm-3 col-form-label"><p style="font-weight:bold;">Comunidades misionales catalíticas:</p></label>
            <input type="number" class="col-sm-1 form-control" id="pregunta11" name="pregunta11" required>
          </div>
          <div class="form-group row">
            <label for="pregunta11" class="col-sm-3 col-form-label"><p style="font-weight:bold;">Personas que mantuvieron su fase:</p></label>
            <input type="number" class="col-sm-1 form-control" id="pregunta12" name="pregunta12" required>
          </div>
          <div class="form-group row">
            <label for="pregunta12" class="col-sm-3 col-form-label"><p style="font-weight:bold;">Personas nuevas en cada fase:</p></label>
            <input type="number" class="col-sm-1 form-control" id="pregunta13" name="pregunta13" required>
            <label for="pregunta13" class="col-sm-1 col-form-label"><p style="font-weight:bold;">Sus nombres:</p></label>
            <textarea class="col-sm-3 form-control" id="pregunta14" name="pregunta14"></textarea>
          </div>
          <br>
          <hr class="my-6">
          <br>

          <center><h4>Tus discípulos</h4></center>
          <br>

              <div class="row justify-content-sm-center">
                <div class="col-sm-1"></div>
                <div class="col-sm-4">
                  <center><button class="btn btn-primary" title="Agregar un nuevo discípulo" onclick=modalnuevodiscipulo();>Agregar</button></center>
                </div>
                  <!-- Modal -->
                  <div class="modal" id="discipulo_modal">
                      <div class="modal-body">
                        <div class="form-group row">
                        <label for="discipulo_name" class="col-sm-1 col-form-label"><i class="fas fa-address-book"></i> Nombre</label>
                          <input type="text" class="col-sm-2 form-control" id="discipulo_name" name="discipulo_name">
                          <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
                          <label for="discipulo_lastname" class="col-sm-1 col-form-label"><i class="fas fa-address-book"></i> Apellidos</label>
                          <input type="text" class="col-sm-3 form-control" id="discipulo_lastname" name="discipulo_lastname">
                        </div>
                        <div class="row" style="text-align:center;">
                          <div class="col-sm-3"></div>
                          <button type="button" class="btn btn-secondary" onclick="cerrarmodaldiscipulo();">Cerrar</button>
                          <div class="col-sm-1"></div>
                          <button type="button" class="btn btn-primary" onclick="nuevodiscipulo();">Guardar</button>
                        </div>
                      </div>
                  </div>
              </div>
              <br>

            <div id="losdiscipulos"><?php tablaDiscipulosInformes($_SESSION['idusuario']); ?></div>

            <br>
            <hr class="my-6">
            <br>

            <div class="form-group row">
              <label for="pregunta15" class="col-sm-3 col-form-label"><p style="font-weight:bold;">¿Cómo está tu equipo
                 supervisando regularmente que sus líderes estén formando discípulos multiplicadores?</p></label>
              <textarea class="col-sm-8 form-control" id="pregunta15" name="pregunta15" required></textarea>
            </div>


            <div class="alert alert-primary" role="alert" style="background-color:#dd7d1b;">
              <h4 style="color:white;font-weight:bold;">Quinto esencial:  Formar un equipo de líderes.</h4>
            </div>

            <div class="form-group row">
              <label for="pregunta16" class="col-sm-3 col-form-label"><p style="font-weight:bold;">¿Qué has hecho para
                 comunicar el propósito de tu equipo, la visión y misión en este mes?¿Qué has hecho en este mes para
                  desarrollar a cada miembro de tu Equipo de manera integral (personal, comunitaria y misional)?
                   ¿Qué acciones tomaron para mejorar los procesos claves del equipo? ¿Qué acciones tomó tu equipo
                    este mes para movilizar nuevos voluntarios a involucrarse en la visión y misión?</p></label>
              <textarea class="col-sm-8 form-control" id="pregunta16" name="pregunta16" required></textarea>
            </div>

            <div class="form-group row">
              <label for="pregunta17" class="col-sm-3 col-form-label"><h3 style="font-weight:bold;">¿Hay algo significativo
                 fuera de lo anteriormente preguntado que quieras compartirnos?</h3></label>
              <textarea class="col-sm-8 form-control" id="pregunta17" name="pregunta17" required></textarea>
            </div>

            <div class="alert alert-light" role="alert" >
              <h4 style="font-weight:bold;">Archivos adicionales requeridos.</h4>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="cuentadecobro"><h4 style="font-weight:bold;"><i class="fas fa-file-invoice-dollar fa-2x"></i> Subir cuenta de cobro: </h4>
                <small class="form-text text-muted">Sólo puede ser un archivo PDF</small></label>
                <input type="file" class="col-sm-4" id="cuentadecobro" name="cuentadecobro"  accept="application/pdf" required>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="seguridadsocial"><h4 style="font-weight:bold;"><i class="fas fa-clipboard fa-2x"></i> Subir planilla de seguridad social: </h4>
                <small class="form-text text-muted">Súbelo sólo si eres cotizante. Sólo puede ser un archivo PDF</small></label>
                <input type="file" class="col-sm-4" id="seguridadsocial" name="seguridadsocial" accept="application/pdf">
            </div>

            <center><button type="submit" class="btn btn-light btn-lg" id="enviarinforme">Finalizar</button></center>
            <br>
          </form>
          <br>
        </div>
      </div>
    </div>
</section>

<script>
$("#enviarinforme").prop('disabled', true);

var toValidate = $('#idmes,#year,#pregunta4,#pregunta5,#pregunta6,#pregunta7,#pregunta8,#pregunta9,#pregunta10,#pregunta11,#pregunta12,#pregunta13,#pregunta14,#pregunta15,#pregunta16,#pregunta17,#cuentadecobro'),
    valid = false;
toValidate.change(function () {
    if ($(this).val().length > 0) {
        $(this).data('valid', true);
    } else {
        $(this).data('valid', false);
    }
    toValidate.each(function () {
        if ($(this).data('valid') == true) {
            valid = true;
        } else {
            valid = false;
        }
    });
    if (valid === true) {
        $("#enviarinforme").prop('disabled', false);
    } else {
        $("#enviarinforme").prop('disabled', true);
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
