<?php
include("conexion.php");
$email=$_POST['email'];
$password=$_POST['password'];

conectarse();

$query = "SELECT * FROM usuarios WHERE email='$email' AND clave='$password'";

$result = mysql_query($query);

$row = mysql_fetch_assoc($result);


if($row)
{
	session_start();
	$_SESSION['usuario'] = array('nom' => $row['nombres'], 'ape'=> $row['apellidos']);
	header("Location: index.php");
}
else
{
	header("Location: login/login.php?error=si");
}

mysql_free_result($rs);
mysql_close($conn);
?>