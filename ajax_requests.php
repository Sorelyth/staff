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
    case 'llenar_informe_ultimo' : echo llenarInformeUltimo($_POST['idinforme'],$_POST['respuesta1'],$_POST['respuesta2'],$_POST['respuesta3'],$_POST['respuesta4'],$_POST['respuesta5']);break;
    case 'informe_discipulos' : echo informeDiscipulos($_POST['idinforme'],$_POST['iddiscipulo'],$_POST['fase'],$_POST['historia'],$_SESSION['idusuario']);break;
    case 'contenido_informe' : echo contenidoInforme($_POST['idinforme']); break;
    case 'buscar_persona' : echo buscarPersona($_POST['buscar']);break;
    case 'buscar_informes_persona' : echo buscarInformesPersona($_POST['idpersona']);break;
    case 'buscar_informes_mes' : echo buscarInformesMes($_POST['mes'],$_POST['year']);break;
    case 'buscar_informes_persona_mes' : echo buscarInformesPersonaMes($_POST['idpersona'],$_POST['mes'],$_POST['year']);break;
    case 'info_socio' : echo infoSocio($_POST['idsocio'],$_POST['idtiposocio']);break,
  }
}
?>
