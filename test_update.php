<?php
echo "aaaa";
lavida($_SESSION['idusuario'],'Sore','Villar','12345678','3003003030','por ahi',300,'F',1,'1992-08-22',2);
function lavida($id_user,$name,$lastname,$doc_id,$phone,$address,$idmcpo,$gender,$idestadocivil,$birthdate,$idcomponente){
  echo "eee";
  include 'inc/db_config.php';
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
?>
