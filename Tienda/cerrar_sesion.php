<?php
include ('admin/conexion.php');
$c=conectarse();
session_start();

mysql_query("DELETE FROM carrito",$c);
session_destroy();

header ('Location:mi_cuenta.php');
?>