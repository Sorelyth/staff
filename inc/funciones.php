<?php
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
  echo '<select name="idmes" id="idmes"><option value="0" selected> </option>';

  while(mysqli_stmt_fetch($stmt)){
    echo '<option value="'.$idmes.'">'.$mes.'</option>';
  }
  echo '</select>';
  mysqli_stmt_close($stmt);
  mysqli_close($mysqli);
}
//-----
function RegistroUsuario($username,$email,$password){
  include 'db_config.php';
  $sentencia="SELECT name, email FROM users WHERE name='".$username."' OR email='".$email."'";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  if(mysqli_stmt_num_rows($result)>0){mysqli_stmt_close($result);echo '<script type="text/javascript">alert("Usuario o Email ya existente. Intente otro nombre de usuario.")</script>';}
  else{
    mysqli_stmt_close($result);
    $opciones = [ 'cost' => 12,];
    $hash_pass = password_hash($password, PASSWORD_BCRYPT, $opciones);
    $sentencia="INSERT INTO users (name,hash_pass,email) VALUES('".$username."','".$hash_pass."','".$email."')";
    $result = mysqli_prepare($mysqli,$sentencia);
    mysqli_stmt_execute($result);
    mysqli_stmt_store_result($result);
    mysqli_stmt_close($result);
    mysqli_close($mysqli);
    header('Location: login.php');
  }
}
//-----
function LoginUsuario($username,$password){
  include 'db_config.php';
  $sentencia="SELECT name, email,hash_pass FROM users WHERE name='".$username."'";
  $result = mysqli_prepare($mysqli,$sentencia);
  mysqli_stmt_execute($result);
  mysqli_stmt_store_result($result);
  mysqli_stmt_bind_result($result,$user,$email,$hash_pass);
  mysqli_stmt_fetch($result);
  if(password_verify($password,$hash_pass)){
    session_start();
    $_SESSION['username']=$user;
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
?>
