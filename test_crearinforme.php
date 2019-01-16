<?php
session_start();
include 'inc/funciones.php';
//if(isset($_POST['dale'])){echo crearInforme($_SESSION['idusuario'],$_POST['idmes'],$_POST['year']);}
if(isset($_POST['accion']) && !empty($_POST['accion'])){
  $action = $_POST['accion'];
  switch($action){
    case 'cambio_dpto' : echo selectMunicipio($_POST['iddpto']);break;
    case 'buscar_coach' : echo buscarCoach($_POST['buscar']);break;
    case 'seleccion_coach' : echo cambiarCoach($_POST['idcoach'],$_SESSION['idusuario']);break;
    case 'nuevo_discipulo' : echo nuevoDiscipulo($_POST['nombre'],$_POST['apellidos'],$_SESSION['idusuario']);break;
    case 'crear_informe' : echo crearInforme($_SESSION['idusuario'],$_POST['mes'],$_POST['year']);break;
    case 'llenar_informe' : echo llenarInforme($_POST['idinforme'],$_POST['respuesta1'],$_POST['respuesta2'],$_POST['respuesta3'],$_POST['respuesta4']);break;
    case 'informe_discipulos' : echo informeDiscipulos($_POST['idinforme'],$_POST['iddiscipulo'],$_POST['fase'],$_POST['historia'],$_SESSION['idusuario']);break;
  }
}
?>
<button name="dale" onclick="nuevoinforme();">go</button>
  <?php selectMes(); ?><input type="text" name="year" id="year">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  function nuevoinforme(){
    var mes = document.getElementById("idmes").value;
    var year = document.getElementById("year").value;
    //var idinforme;
    $.ajax({
      type: "post",
      dataType: "html",
      data: {accion: "crear_informe",mes:mes,year:year},
      url: "test_crearinforme.php",
      cache: false,
      // beforeSend: function() {
      //    $('#res3').html('loading please wait...');
      // },
      success: function(response) {
        var idinforme = response;
        alert(idinforme);
        $('#year').val(response)
      }
    });
  }
  </script>
