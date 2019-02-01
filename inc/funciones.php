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
function getNombre($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT nombre FROM users_info WHERE id_user=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$nombre);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $nombre;
}
//----
function getApellidos($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT apellidos FROM users_info WHERE id_user=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$apellidos);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $apellidos;
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
function getidComponente($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id_componente FROM users_info WHERE id_user=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$idcomponente);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $idcomponente;
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
function getTelefono($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT telefono FROM users_info WHERE id_user='".$idusuario."'";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$telefono);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $telefono;
}
//----
function getDireccion($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT direccion FROM users_info WHERE id_user='".$idusuario."'";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$direccion);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $direccion;
}
//----
function getDocId($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT doc_id FROM users_info WHERE id_user=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$doc_id);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $doc_id;
}
//----
function getSexo($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT sexo FROM users_info WHERE id_user=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$sexo);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $sexo;
}
//----
function getidEstadoCivil($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id_estado_civil FROM users_info WHERE id_user=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$idestadocivil);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $idestadocivil;
}
//----
function getFechaNacimiento($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT fecha_nacimiento FROM users_info WHERE id_user=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$fechanacimiento);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $fechanacimiento;
}
//----
function getidCiudad($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id_ciudad FROM users_info WHERE id_user=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$idciudad);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $idciudad;
}
//----
function getDepartamento($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT nombre FROM departamentos WHERE id=(SELECT departamento_id from municipios WHERE id=(SELECT id_ciudad FROM users_info WHERE id_user=".$idusuario."))";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$departamento);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $departamento;
}
//----
function getidDepartamento($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT departamento_id from municipios WHERE id=(SELECT id_ciudad FROM users_info WHERE id_user=".$idusuario.")";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$iddepartamento);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return $iddepartamento;
}
//----
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
//------
function buscarPersona($texto){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id_user, nombre, apellidos FROM users_info WHERE nombre LIKE '%".$texto."%' OR apellidos LIKE '%".$texto."%' OR CONCAT(nombre,' ',apellidos) LIKE '%".$texto."%' LIMIT 5";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  mysqli_stmt_bind_result($result,$idpersona,$nombre,$apellidos);
  $html_ret = '<ul class="list-group list-group-flush">';
  while(mysqli_stmt_fetch($result)){
    $html_ret .= '<li class="list-group item list-group-item-action" onclick="seleccionarpersona('.$idpersona.')"><a>'.$nombre.' '.$apellidos.'</a></li>';
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
  echo '<select class="col-sm-1 form-control" name="idmes" id="idmes" required><option value="0"> </option>';

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
  echo '<select class="col-sm-4 form-control" name="idcomponente" id="idcomponente" required><option value="0"> </option>';

  while(mysqli_stmt_fetch($stmt)){
    if(isset($_SESSION['idusuario'])){
      $componente_actual = getidComponente($_SESSION['idusuario']);
      echo '<option value="'.$idcomponente.'" '.checkSelection($idcomponente,$componente_actual).'>'.$componente.'</option>';
    }
    else{echo '<option value="'.$idcomponente.'">'.$componente.'</option>';}
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
  echo '<select class="col-sm-4 form-control" name="idestadocivil" id="idestadocivil" required><option value="0"> </option>';

  while(mysqli_stmt_fetch($stmt)){
    if(isset($_SESSION['idusuario'])){
      $estadocivil_actual = getidEstadoCivil($_SESSION['idusuario']);;
      echo '<option value="'.$idestadocivil.'" '.checkSelection($idestadocivil,$estadocivil_actual).'>'.$estadocivil.'</option>';
    }
    else{echo '<option value="'.$idestadocivil.'">'.$estadocivil.'</option>';}
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
    if(isset($_SESSION['idusuario'])){
      $dpto_actual = getidDepartamento($_SESSION['idusuario']);
      echo '<option value="'.$iddpto.'" '.checkSelection($iddpto,$dpto_actual).'>'.$dpto.'</option>';
    }
    else {echo '<option value="'.$iddpto.'" '.checkSelection($iddpto,$_POST['iddpto']).'>'.$dpto.'</option>';}
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
    if(isset($_SESSION['idusuario'])){
      $mcpo_actual = getidCiudad($_SESSION['idusuario']);
      $html_ret .= '<option value="'.$idmcpo.'" '.checkSelection($idmcpo,$mcpo_actual).'>'.$mcpo.'</option>';
    }
    else{$html_ret .= '<option value="'.$idmcpo.'" '.checkSelection($idmcpo,$_POST['idmcpo']).'>'.$mcpo.'</option>';}
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
function UpdateInfoUsuario($id_user,$name,$lastname,$doc_id,$phone,$address,$idmcpo,$gender,$idestadocivil,$birthdate,$idcomponente){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  echo "algo";
  //$sentencia = "eso";
  $sentencia="UPDATE users_info SET nombre='".$name."', apellidos='".$lastname."', doc_id='".$doc_id."', telefono='".$phone."',direccion='".$address."',sexo='".$gender."',id_ciudad=".$idmcpo.",id_componente=".$idcomponente.",id_estado_civil=".$idestadocivil.",fecha_nacimiento='".$birthdate."' WHERE id_user=".$id_user."";
  $res = mysqli_query($mysqli, $sentencia);
  echo $sentencia;
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
  if (!$res) {
    echo $sentencia;
    printf("Error: %s\n", mysqli_error($mysqli));
  }
  mysqli_close($mysqli);
  header('Location: index.php');
}
//----
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
  echo '<select class="col-sm-2" name="fase_'.$iddiscipulo.'" id="fase_'.$iddiscipulo.'" required><option value="0"> </option>';
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
    echo '<textarea class="col-sm-3" name="historia_'.$iddiscipulo.'" id="historia_'.$iddiscipulo.'"></textarea>';
    echo '</div>';
    $k++;
  }
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
}
//-----------
function getFaseeHistoria($idinforme,$iddiscipulo){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id_fase,historia FROM informes_discipulos WHERE id_informe=".$idinforme." AND id_discipulo=".$iddiscipulo."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$idfase,$historia);
  mysqli_stmt_fetch($stmt);
  switch($idfase){
    case 1 : $fase='Conectar';break;
    case 2 : $fase='Experimentar';break;
    case 3 : $fase='Comprometer';break;
  }
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return [$fase,$historia];
}
//------------
function mostrarTablaDiscipulos($idusuario,$idinforme){
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
    echo '<label for="nombre_'.$iddiscipulo.'" class="col-sm-1" style="font-weight:bold;">Nombre y apellido: </label>';
    echo '<input id="nombre_'.$iddiscipulo.'" name="nombre_'.$iddiscipulo.'" type="text" readonly class="col-sm-2" style="font-weight:bold;" value="'.$nombre.' '.$apellidos.'">';
    echo '<label for="fase_'.$iddiscipulo.'" class="col-sm-1" style="font-weight:bold;"> Fase: </label>';
    echo getFaseeHistoria($idinforme,$iddiscipulo)[0];
    echo '</div>';
    echo '<label for="historia_'.$iddiscipulo.'" class="col-sm-2" style="font-weight:bold;"> Historia  de guerra con esta persona en este mes:</label>';
    echo '<p readonly class="col-sm-3" id="historia_'.$iddiscipulo.'">'.getFaseeHistoria($idinforme,$iddiscipulo)[1].'</p>';
    $k++;
  }
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
}
//-----------
function existeInforme($id_user,$mes,$year){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user,$db_password,$db_schema);
  $sentencia = "SELECT id FROM informes WHERE id_user=".$id_user." AND id_mes=".$mes." AND year='".$year."'";
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
function llenarInformeUltimo($idinforme,$iddiscipulo,$respuesta2,$respuesta3,$respuesta4,$respuesta5){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="INSERT INTO informes_text_content (id_informe,respuesta) VALUES(".$idinforme.",'".$respuesta1."'), (".$idinforme.",'".$respuesta2."'),(".$idinforme.",'".$respuesta3."'),(".$idinforme.",'".$respuesta4."'),(".$idinforme.",'".$respuesta5."')";
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
//-----------------------
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
function buscarInformesPersona($idpersona){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia = "SELECT id,id_mes,year FROM informes WHERE id_user=".$idpersona."";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  mysqli_stmt_bind_result($result,$idinforme,$idmes,$year);
  if(mysqli_stmt_num_rows($result)>0){
    $nombre= getNombre($idpersona);
    $apellidos = getApellidos($idpersona);
    $html_ret = '<h3 style="font-weight: bold;"><center>';
    $html_ret .= $nombre.' '.$apellidos;
    $html_ret .='</center></h3>';
    while(mysqli_stmt_fetch($result)){
      $html_ret .= '<div class="row">';
      $html_ret .= '<div class="col-sm-2 style="font-weight: bold;">';
      $html_ret .= ' '.getMes($idmes).' de '.$year;
      $html_ret .= '</div>';
      //$html_ret .= '<div class="col-sm-1"></div>';
      $html_ret .= '<div class="col-sm-1">';
      $html_ret .= '<button class="btn btn-light" onclick="mostrarinforme('.$idpersona.','.$idinforme.')"><i class="fab fa-wpforms fa-2x"></i></button>';
      $html_ret .= '</div></div>';
      $html_ret .= nl2br("\n");
    }
    return $html_ret;
  }
  else{
    $html_ret = '<h3> No se encontraron informes con este criterio de búsqueda.</h3>';
    return $html_ret;
  }
  mysqli_stmt_close($result);
  mysqli_close($mysqli);
}
//------
function buscarInformesMes($mes,$year){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia = "SELECT id,id_user FROM informes WHERE  id_mes=".$mes." AND year='".$year."'";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  mysqli_stmt_bind_result($result,$idinforme,$idpersona);
  if(mysqli_stmt_num_rows($result)>0){
    $html_ret = '<h4><strong><center>'.getMes($idmes).' de '.$year.'</center></strong></h4>';
    while(mysqli_stmt_fetch($result)){
      $html_ret .= '<div class="row">';
      $html_ret .= '<div class="col-sm-4">';
      $html_ret .= ' '.getNombreyApellido($idpersona).' ';
      $html_ret .= '</div>';
      $html_ret .= '<div class="col-sm-1"></div>';
      $html_ret .= '<div class="col-sm-1">';
      $html_ret .= '<button class="btn btn-light" onclick="mostrarinforme('.$idpersona.','.$idinforme.')"><i class="fab fa-wpforms fa-2x></i>"</button>';
      $html_ret .= '</div></div>';
      $html_ret .= nl2br("\n");
    }
    return $html_ret;
  }
  else{
    $html_ret = '<h3> No se encontraron informes con este criterio de búsqueda.</h3>';
    return $html_ret;
  }
  mysqli_stmt_close($result);
  mysqli_close($mysqli);
}
//------
function buscarInformesPersonaMes($idpersona,$mes,$year){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia = "SELECT id FROM informes WHERE id_user=".$idpersona." AND id_mes=".$mes." AND year='".$year."'";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  mysqli_stmt_bind_result($result,$idinforme);
  if(mysqli_stmt_num_rows($result)>0){
    $html_ret = '<h4><strong><center>'.getMes($idmes).' de '.$year.'</center></strong></h4>';
    while(mysqli_stmt_fetch($result)){
      $html_ret .= '<div class="row">';
      $html_ret .= '<div class="col-sm-4">';
      $html_ret .= ' '.getNombreyApellido($idpersona).' ';
      $html_ret .= '</div>';
      $html_ret .= '<div class="col-sm-1"></div>';
      $html_ret .= '<div class="col-sm-1">';
      $html_ret .= '<button class="btn btn-light" onclick="mostrarinforme('.$idpersona.','.$idinforme.')"><i class="fab fa-wpforms fa-2x></i>"</button>';
      $html_ret .= '</div></div>';
      $html_ret .= nl2br("\n");
    }
    return $html_ret;
  }
  else{
    $html_ret = '<h3> No se encontraron informes con este criterio de búsqueda.</h3>';
    return $html_ret;
  }
  mysqli_stmt_close($result);
  mysqli_close($mysqli);
}
//------
function selectSocios($idusuario){
  include 'db_config.php';
  $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
  $sentencia="SELECT id,id_tipo_socio,nombre_completo FROM socios WHERE id_user=".$idusuario."";
  $stmt = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  mysqli_stmt_bind_result($stmt,$idsocio,$idtiposocio,$socio);
  echo '<select class="col-sm-4 form-control" name="idsocio" id="idsocio"><option value="0"> </option>';
  while(mysqli_stmt_fetch($stmt)){
    echo '<option value="'.$idsocio.'" onclick="seleccionarsocio('.$idsocio.','.$idtiposocio.')">'.$socio.'</option>';
  }
  echo '</select>';
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
}
//------
// function infoSocio($idsocio,$idtiposocio){
//   include 'db_config.php';
//   $mysqli=mysqli_connect($db_host,$db_user ,$db_password,$db_schema);
//   $sentencia="SELECT info FROM socios_info WHERE id_socio=".$idsocio."";
//   $stmt = mysqli_prepare($mysqli,$sentencia);
//   mysqli_stmt_execute($stmt);
//   mysqli_stmt_store_result($stmt);
//   mysqli_stmt_bind_result($stmt,$info);
//   while(mysqli_stmt_fetch($stmt)){
//   }
//   mysqli_stmt_close($stmt);
//   mysqli_close($mysqli);
// }
//------
