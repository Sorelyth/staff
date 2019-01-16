<?php
function isAdmin($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT admin FROM users_info WHERE id_user=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$admin);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $admin;
}
//----
function getIdusuario($correo){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id_user FROM users_login WHERE correo='".$correo."'";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$idusuario);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $idusuario;
}
//----
function getNombreyApellido($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT nombre,apellidos FROM users_info WHERE id_user=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$nombre,$apellidos);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  echo $nombre.' '.$apellidos;
}
//------
function getCiudad($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT nombre AS ciudad FROM municipios where id=(SELECT id_ciudad FROM users_info WHERE id_user=".$idusuario.")";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$ciudad);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  echo $ciudad;
}
//------
function getComponente($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT componente FROM componentes where id=(SELECT id_componente FROM users_info WHERE id_user=".$idusuario.")";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$componente);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  echo $componente;
}
//------
function getCoach($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT nombre,apellidos FROM users_info where id_user=(SELECT id_coach FROM users_info WHERE id_user=".$idusuario.")";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  if(mysqli_stmt_num_rows($stmt)>0){
    mysqli_stmt_bind_result($stmt,$nombre,$apellidos);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);
    echo $nombre.' '.$apellidos;
  }
  else{mysqli_stmt_close($stmt);mysqli_close($mysqli);echo '';}
}
//------
function existeEmail($email){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT correo FROM users_login WHERE correo='".$email."'";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  if(mysqli_stmt_num_rows($result)>0){
    mysqli_stmt_close($result);
    return true;
  }
  else{mysqli_stmt_close($result);return false;}
}
//------
function buscarCoach($texto){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id_user, nombre, apellidos FROM users_info WHERE nombre LIKE '%".$texto."%' OR apellidos LIKE '%".$texto."%' OR CONCAT(nombre,' ',apellidos) LIKE '%".$texto."%' LIMIT 5";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  mysqli_stmt_bind_result($result,$idpersona,$nombre,$apellidos);
  $html_ret = '<ul class="list-group list-group-flush">';
  while(mysqli_stmt_fetch($result)){
    $html_ret .= '<li class="list-group item list-group-item-action" onclick="seleccionarcoach('.$idpersona.')"><a>'.$nombre.' '.$apellidos.'</a></li>';
  }
  $html_ret .= '</ul>';
  mysqli_stmt_close($result);
  mysqli_close($mysqli);
  return $html_ret;
}
//-----
function cambiarCoach($idcoach,$idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="UPDATE users_info SET id_coach=".$idcoach." WHERE id_user=".$idusuario."";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  $html_ret = getNombreyApellido($idcoach);
  mysqli_stmt_close($result);
  mysqli_close($mysqli);
  return $html_ret;
}
//-----
function getMes($idmes){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT mes FROM meses WHERE id=".$idmes."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$mes);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $mes;
}
//-----
function selectMes(){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id,mes FROM meses";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$idmes,$mes);
  echo '<select class="col-sm-1 form-control" name="idmes" id="idmes" required><option value="0" selected> </option>';

  while(mysqli_stmt_fetch($stmt)){
    echo '<option value="'.$idmes.'">'.$mes.'</option>';
  }
  echo '</select>';
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
}
//-----
function selectComponente(){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id,componente FROM componentes";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$idcomponente,$componente);
  echo '<select class="col-sm-4 form-control" name="idcomponente" id="idcomponente" required><option value="0" selected> </option>';

  while(mysqli_stmt_fetch($stmt)){
    echo '<option value="'.$idcomponente.'">'.$componente.'</option>';
  }
  echo '</select>';
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
}
//-----
function selectEstadoCivil(){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id,estado_civil FROM estados_civiles";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$idestadocivil,$estadocivil);
  echo '<select class="col-sm-4 form-control" name="idestadocivil" id="idestadocivil" required><option value="0" selected> </option>';

  while(mysqli_stmt_fetch($stmt)){
    echo '<option value="'.$idestadocivil.'">'.$estadocivil.'</option>';
  }
  echo '</select>';
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
}
//-----
function selectDepartamento(){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id,nombre FROM departamentos";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$iddpto,$dpto);
  echo '<select class="col-sm-4 form-control" name="iddpto" id="iddpto" onchange="cambioDepartamento();" required><option value="0"> </option>';

  while(mysqli_stmt_fetch($stmt)){
    echo '<option value="'.$iddpto.'"'.checkSelection($iddpto,$_POST['iddpto']).'>'.$dpto.'</option>';
  }
  echo '</select>';
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
}
//-----
function selectMunicipio($iddpto){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id,nombre FROM municipios WHERE departamento_id=".$iddpto."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$idmcpo,$mcpo);
  $html_ret = '<label for="idmcpo" class="col-sm-3 col-form-label"><i class="fas fa-map-marked-alt"></i>Ciudad donde resides</label>';
  $html_ret .= '<select class="col-sm-4 form-control" name="idmcpo" id="idmcpo" required><option value="0"> </option>';

  while(mysqli_stmt_fetch($stmt)){
    $html_ret .= '<option value="'.$idmcpo.'"'.checkSelection($idmcpo,$_POST['idmcpo']).'>'.$mcpo.'</option>';
  }
  $html_ret .= '</select>';
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $html_ret;
}
//-----
function RegistroUsuario($email,$password){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT correo FROM users_login WHERE correo='".$email."'";
  $res = mysqli_query($mysqli, $sentencia);
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
  if (!$res) {
    //echo $sentencia;
    printf("Error: %s\n", mysqli_error($mysqli));
  }
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  if(mysqli_stmt_num_rows($result)>0){mysqli_stmt_close($result);echo '<script type="text/javascript">alert("Correo electronico ya existente en la base de datos.");</script>';header('Location: login.php');}
  else{
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
    $sentencia="INSERT INTO users_login (correo,hash_pass) VALUES('".$email."','".$hash_pass."')";
    $result = mysqli_prepare($mysqli,$sentencia);
    mysqli_stmt_execute($result);
    mysqli_stmt_store_result($result);
    mysqli_stmt_close($result);
    mysqli_close($mysqli);
    session_start();
    $_SESSION['idusuario']=getIdusuario($email);
    header('Location: moreinfo.php');
  }
}
//-----
function MoreInfoUsuario($id_user,$name,$lastname,$doc_id,$phone,$address,$idmcpo,$gender,$idestadocivil,$birthdate,$idcomponente){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="INSERT INTO users_info (id_user,nombre,apellidos,doc_id,telefono,direccion,sexo,id_ciudad,id_componente,id_estado_civil,fecha_nacimiento,id_coach) VALUES(".$id_user.",'".$name."','".$lastname."',".$doc_id.",'".$phone."','".$address."','".$gender."',".$idmcpo.",".$idcomponente.",".$idestadocivil.",'".$birthdate."',NULL)";
  $res = mysqli_query($mysqli, $sentencia);
  //echo $sentencia;
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
  if (!$res) {
    echo $sentencia;
    printf("Error: %s\n", mysqli_error($mysqli));
  }
  mysqli_close($mysqli);
  header('Location: login.php');
}
//----
function LoginUsuario($correo,$password){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id_user, correo, hash_pass FROM users_login WHERE correo='".$correo."'";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  mysqli_stmt_bind_result($result,$id_user,$email,$hash_pass);
  mysqli_stmt_fetch($result);
  if(password_verify($password,$hash_pass)){
    session_start();
    $_SESSION['idusuario']=$id_user;
    header('Location: index.php');
  }
  else{
    echo '<script type="text/javascript">alert("Usuario o contraseña incorrecto(a).")</script>';
  }
  mysqli_stmt_close($result);
  mysqli_close($mysqli);
}
//-----
function transformarbooleano($valor){
  if($valor==0){$r='No';}
  else{ $r='Sí';}
  return $r;
}
//-----
function checkSelection($valor,$post_value){
  if(isset($post_value)){if($valor==$post_value){$r='selected';}else{$r='';}}
  else{ $r='';}
  return $r;
}
//---------------
function nuevoDiscipulo($nombre,$apellidos,$idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="INSERT INTO discipulos (nombre,apellido,id_discipulador) VALUES('".$nombre."','".$apellidos."',".$idusuario.")";
  $res = mysqli_query($mysqli, $sentencia);
  //echo $sentencia;
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
  if (!$res) {
    echo $sentencia;
    printf("Error: %s\n", mysqli_error($mysqli));
  }
  mysqli_close($mysqli);
}
//---------------
function cuantosDiscipulos($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT COUNT(id) FROM discipulos WHERE id_discipulador=".$idusuario."";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  mysqli_stmt_bind_result($result,$numerodediscipulos);
  mysqli_stmt_fetch($result);
  mysqli_close($mysqli);
  return $numerodediscipulos;
}
//---------------
function selectFase($iddiscipulo){
  echo '<select class="col-sm-2" name="fase_'.$iddiscipulo.'" id="fase_'.$iddiscipulo.'" required><option value="0" selected> </option>';
  echo '<option value=1> Conectar </option>';
  echo '<option value=2> Experimentar </option>';
  echo '<option value=3> Comprometer </option>';
  echo '</select>';
}
//-----
function tablaDiscipulosInformes($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id,nombre,apellido FROM discipulos WHERE id_discipulador=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$iddiscipulo,$nombre,$apellidos);
  echo '<input type="number" readonly id="cuantosdiscipulos" value='.cuantosDiscipulos($idusuario).' hidden>';
  $k=1;
  while(mysqli_stmt_fetch($stmt)){
    echo '<br>';
    echo '<div class="form-group row">';
    echo '<input type="number" readonly id="iddiscipulo_'.$k.'" value='.$iddiscipulo.' hidden>';
    echo '<label for="nombre_'.$iddiscipulo.'" class="col-sm-1" style="font-weight:bold;">Nombre y apellido</label>';
    echo '<input id="nombre_'.$iddiscipulo.'" name="nombre_'.$iddiscipulo.'" type="text" readonly class="col-sm-2" style="font-weight:bold;" value="'.$nombre.' '.$apellidos.'">';
    echo '<label for="fase_'.$iddiscipulo.'" class="col-sm-1" style="font-weight:bold;">Fase</label>';
    echo selectFase($iddiscipulo);
    echo '<label for="historia_'.$iddiscipulo.'" class="col-sm-2" style="font-weight:bold;">Historia  de guerra con esta persona en este mes</label>';
    echo '<input class="col-sm-3" type="text" name="historia_'.$iddiscipulo.'" id="historia_'.$iddiscipulo.'">';
    echo '</div>';
    $k++;
  }
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
}
//-----------
function existeInforme($id_user,$mes,$year){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user,$db_password,$db_schema);
  $sentencia = "SELECT id FROM informes WHERE id_user=".$id_user." AND id_mes=".$mes." AND year=".$year."";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  mysqli_stmt_store_result($result);
  if(mysqli_stmt_num_rows($result)>0){
    mysqli_stmt_close($result);
    return true;
  }
  else{
    return false;
  }
}
//-----------
function crearInforme($id_user,$mes,$year){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  if(existeInforme($id_user,$mes,$year)){
    return 0;
  }
  else{
    $sentencia="INSERT INTO informes (id_user,id_mes,year) VALUES(".$id_user.",".$mes.",'".$year."')";
    $res = mysqli_query($mysqli, $sentencia);
    //echo $sentencia;
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    if (!$res) {
      echo $sentencia;
      printf("Error: %s\n", mysqli_error($mysqli));
    }
    $sentencia="SELECT id FROM informes ORDER BY id DESC LIMIT 1";
    $result = mysqli_prepare($mysqli,$sentencia);
    mysqli_stmt_execute($result);
    mysqli_stmt_store_result($result);
    mysqli_stmt_bind_result($result,$idinforme);
    mysqli_stmt_fetch($result);
    mysqli_close($mysqli);
    return $idinforme;
  }
}
//----------------
function llenarInforme($idinforme,$iddiscipulo,$respuesta2,$respuesta3,$respuesta4){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="INSERT INTO informes_text_content (id_informe,respuesta) VALUES(".$idinforme.",'".$respuesta1."'), (".$idinforme.",'".$respuesta2."'),(".$idinforme.",'".$respuesta3."'),(".$idinforme.",'".$respuesta4."')";
  $res = mysqli_query($mysqli, $sentencia);
  //echo $sentencia;
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
  if (!$res) {
    echo $sentencia;
    printf("Error: %s\n", mysqli_error($mysqli));
  }
  return true;
}
//------
function informeDiscipulos($idinforme,$iddiscipulo,$fase,$historia,$idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="INSERT INTO informes_discipulos (id_informe,id_discipulo,id_fase,historia,id_discipulador) VALUES(".$idinforme.",".$iddiscipulo.",".$fase.",'".$historia."',".$idusuario.")";
  $res = mysqli_query($mysqli, $sentencia);
  //echo $sentencia;
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
  if (!$res) {
    echo $sentencia;
    printf("Error: %s\n", mysqli_error($mysqli));
  }
}
//------
function contenidoInforme($idinforme){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT * FROM discipulos WHERE id_discipulador=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$iddiscipulo,$nombre,$apellidos);
  echo '<input type="number" readonly id="cuantosdiscipulos" value='.cuantosDiscipulos($idusuario).' hidden>';
  $k=1;
  while(mysqli_stmt_fetch($stmt)){
    echo '<br>';
    echo '<div class="form-group row">';
    echo '<input type="number" readonly id="iddiscipulo_'.$k.'" value='.$iddiscipulo.' hidden>';
    echo '<label for="nombre_'.$iddiscipulo.'" class="col-sm-1" style="font-weight:bold;">Nombre y apellido</label>';
    echo '<input id="nombre_'.$iddiscipulo.'" name="nombre_'.$iddiscipulo.'" type="text" readonly class="col-sm-2" style="font-weight:bold;" value="'.$nombre.' '.$apellidos.'">';
    echo '<label for="fase_'.$iddiscipulo.'" class="col-sm-1" style="font-weight:bold;">Fase</label>';
    echo selectFase($iddiscipulo);
    echo '<label for="historia_'.$iddiscipulo.'" class="col-sm-2" style="font-weight:bold;">Historia  de guerra con esta persona en este mes</label>';
    echo '<input class="col-sm-3" type="text" name="historia_'.$iddiscipulo.'" id="historia_'.$iddiscipulo.'">';
    echo '</div>';
    $k++;
  }
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
}
?>
