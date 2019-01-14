<?php
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
  mysqli_stmt_bind_result($stmt,$nombre,$apellido);
  mysqli_stmt_fetch($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
  return [$nombre,$apellido];
}
//------
function buscarEmail($email){
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
  echo '<select class="col-sm-4 form-control" name="idmes" id="idmes" required><option value="0" selected> </option>';

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
  $html_ret = '<label for="idmcpo" class="col-sm-3 col-form-label">Ciudad donde resides</label>';
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
    echo $sentencia;
    printf("Error: %s\n", mysqli_error($mysqli));
  }
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  if(mysqli_stmt_num_rows($result)>0){mysqli_stmt_close($result);echo '<script type="text/javascript">alert("Correo electronico ya existente en la base de datos.");</script>';}
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
    $_SESSION['id_user']=$id_user;
    $_SESSION['hash_pass']=$hash_pass;
    $_SESSION['email']=$email;
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
function checkSelection($valor,$post_value){
  if(isset($post_value)){if($valor==$post_value){$r='selected';}else{$r='';}}
  else{ $r='';}
  return $r;
}

?>
