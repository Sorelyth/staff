<?php
session_start();
//include 'inc/db_config';
include 'inc/funciones.php';
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
