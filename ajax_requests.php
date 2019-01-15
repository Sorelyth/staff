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
  }
}
?>
