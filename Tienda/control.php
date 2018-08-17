<?php
include("admin/conexion.php");
$email=$_POST['email'];
$password=$_POST['password'];

conectarse();

$query = "SELECT * FROM clientes WHERE email='$email' AND clave='$password'";

$result = mysql_query($query);

$row = mysql_fetch_assoc($result);


if($row)
{
	session_start();
	$_SESSION['cliente'] = array('nom' => $row['nombres'], 'ape'=> $row['apellidos'], 'cod' =>$row['codcliente']);
	header("Location: index.php");
}
else
{
	header("Location: mi_cuenta.php?error=si");
}

mysql_free_result($rs);
mysql_close($conn);
?>