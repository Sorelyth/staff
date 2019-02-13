<?php
include inc/db_config.php;
$sentencia="SELECT correo FROM users_login WHERE correo='algo@cru.org'";
$res = mysqli_query($mysqli, $sentencia);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if (!$res) {
  echo $sentencia;
  printf("Error: %s\n", mysqli_error($mysqli));
}
?>
