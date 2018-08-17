<?php
session_start();
include ("admin/conexion.php");
$link=conectarse();

$varCod = $_SESSION['cliente']['cod'];
$varNombres = $_POST['nombres'];
$varApellidos = $_POST['apellidos'];
$varRazonSocial = $_POST['razon_social'];
$varDni = $_POST['dni'];
$varDireccion = $_POST['direccion'];
$varTelefono = $_POST['telefono'];
$varEmail = $_POST['email'];
$varClave = $_POST['clave'];
$varOcupacion = $_POST['ocupacion'];
$varEdad = $_POST['edad'];
$varFechaNac = $_POST['fecha_nac'];

$query="UPDATE clientes SET
		nombres='$varNombres', 
		apellidos='$varApellidos', 
		razonsocial='$varRazonSocial', 
		dni='$varDni', 
		direccion='$varDireccion', 
		telefono='$varTelefono', 
		email='$varEmail', 
		clave='$varClave', 
		ocupacion='$varOcupacion', 
		edad='$varEdad', 
		fecha_nacim='$varFechaNac' 
		WHERE codcliente='$varCod'";

mysql_query($query,$link) or die('fallo la consulta');

header('Location:mi_cuenta.php?updated=ok');
?>