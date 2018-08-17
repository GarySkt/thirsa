<?php
session_start();

$varProducto = $_REQUEST['codigo'];
$varCantidad = $_REQUEST['cantidad'];

$varCliente = $_SESSION['cliente']['cod'];

if($varCliente=="")
{
	$_SESSION["IdProducto"] = $varProducto;
	header("Location: mi_cuenta.php");
}
else
{
	$_SESSION["IdProducto"]= "";
	unset($_SESSION['IdProducto']);
	header("Location: verificar_carrito.php?codproducto=$varProducto&cantidad=$varCantidad");
}

?>