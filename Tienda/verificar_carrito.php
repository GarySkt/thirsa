<?php
include('admin/conexion.php');
$conn = conectarse();
session_start();

$varCliente = $_SESSION['cliente']['cod'];
$varProducto = $_REQUEST['codproducto'];
$varCantidad = $_REQUEST['cantidad'];
$varAccion =$_REQUEST['proceso'];


//crear sesion
$varOrden = $_SESSION['IdOrden'];

if($varOrden == "")//no existe una variable de sesion orden
{
	$IdOrden = verificaPedido($varCliente, $varOrden,$conn);
}
else
{
	$IdOrden = $varOrden;
}

switch($varAccion)
{
	case($varAccion =="Actualizar"): //actualizar
	actualizarProductos($varOrden, $varCliente, $conn);
	
	case ($varAccion == "Eliminar"): //eliminar
	eliminarProductos($varOrden,$varCliente, $conn);
	
	default:
	if($varProducto != "")
	{
		$varOrden = $IdOrden;
		$varExiste = existeProducto($varOrden, $varProducto,$conn);
		if (intval($varExiste) == 1) 
		{
			if($varCantidad!="")
			{
				$varOrden = $IdOrden;
				$IdCliente = $varCliente;
				$IdProducto = $varProducto;
				$IdCantidad = $varCantidad;				
				actualizarItem($varOrden,$IdCliente, $IdProducto, $IdCantidad);
			}
		}
		else
		{
			$varOrden = $IdOrden;
			$IdCliente = $varCliente;
			$IdProducto = $varProducto;
			$IdCantidad = $varCantidad;
			agregarItem($varOrden,$IdCliente, $IdProducto, $IdCantidad);
		}
	}
}
header("Location:carrito.php");

function verificaPedido($varCliente, $varOrden,$conn)
{
	if($varCliente!="x")
	{
		$varOrden = existePedido($varCliente,$conn);
	}
	
	if(($varOrden=="") && ($IdOrden==""))
	{
		$IdOrden =generarCodOrden($varCliente);
		$_SESSION["IdOrden"] = $IdOrden;
	}
	else
	{
		if(($varOrden=="")&&($IdOrden !=""))
		{
			$varOrden = $IdOrden;
		}
		else
		{
			$_SESSION["IdOrden"] = $varOrden;
		}
	}
	return $IdOrden;
}


function existePedido($varCliente, $conn)
{
	$sqlPedido = "select codorden from carrito where codcliente='$varCliente'";
	$rsPedido = mysql_query($sqlPedido,$conn) or die("Ha ocurrido un error en la consulta a la Base de Datos : " . mysql_error());
	while($rowPedido = mysql_fetch_array($rsPedido)) {
		$Orden = $rowPedido['codorden'];
	}
	$contador = mysql_num_rows($rsPedido);
	if ($contador  == 0) {
		$Orden = "";
	}
	return $Orden;
}

function generarCodOrden($varCliente) {
	$date = getdate();

	$hrs = $date['hours'];
	$min = $date['minutes'];
	$sec = $date['seconds'];
	$mon = $date['mon'];
	$day = $date['mday'];
	$yr = $date['year'];

	$intRam = (rand()%100) + 1;
	for ($conti=0;$conti<strlen($varCliente);$conti++) {
		$strIdunico = $strIdunico + substr($varCliente,$conti,1);
	}
	$strIdunico = $strIdunico . '-' . $min . ($yr - $intRam) . $mon . $hrs . $day . $sec;
	return $strIdunico;
}


function existeProducto($varOrden, $varProducto,$conn) {
//nombre de la tabla es carrito
	$sqlProducto = "select codproducto from carrito where codorden='$varOrden' and codproducto='$varProducto'";
	$rsProducto = mysql_query($sqlProducto,$conn) or die("Ha ocurrido un error en la consulta a la Base de Datos : " . mysql_error());
	$contador = mysql_num_rows($rsProducto);
	if ($contador  == 0) {
		return 0;
	} else {
		return 1;
	}
}
function agregarItem($varOrden,$IdCliente,$IdProducto,$IdCantidad) {
	$sql = "insert into carrito (codorden,codcliente,codproducto,cantidad) values('$varOrden','$IdCliente','$IdProducto','$IdCantidad')";
	$result = mysql_query($sql);
}


function actualizarItem($varOrden,$IdCliente,$IdProducto,$IdCantidad) {
	$sql = "update carrito set cantidad=cantidad+'$IdCantidad' where codorden='$varOrden' and codcliente='$IdCliente' and codproducto='$IdProducto'";
	$result = mysql_query($sql);
}


function actualizarProductos($varOrden,$varCliente,$conn) 
{
	$sqlProductos = "select codproducto from carrito where codorden='$varOrden' and codcliente='$varCliente'";
	$rsProductos = mysql_query($sqlProductos,$conn) or die("Ha ocurrido un error en la consulta a la Base de Datos : " . mysql_error());
	while($rowProductos = mysql_fetch_array($rsProductos)) 
	{
		$xproducto = $rowProductos['codproducto'];
		//actualizar
		$codigo = 'txt' . $xproducto;
		if ($_REQUEST[$codigo] != 0) {
				$xcantidad = $_REQUEST[$codigo];
				$sql = "update carrito set cantidad='$xcantidad' where codorden='$varOrden' and codcliente='$varCliente' and codproducto='$xproducto'";
				$result = mysql_query($sql);
		}
	}
}
function eliminarProductos($varOrden,$varCliente,$conn) {
	$sqlProductos = "select codproducto from carrito where codorden='$varOrden' and codcliente='$varCliente'";
	$rsProductos = mysql_query($sqlProductos,$conn) or die("Ha ocurrido un error en la consulta a la Base de Datos : " . mysql_error());
	while($rowProductos = mysql_fetch_array($rsProductos)) {
		$xproducto = $rowProductos['codproducto'];
		//eliminar
		$codigo = 'chk' . $xproducto;
		if ($_REQUEST[$codigo] == true) {
			$sql = "delete from carrito where codorden='$varOrden' and codcliente='$varCliente' and codproducto='$xproducto'";
			$result = mysql_query($sql);
		}
	}
}



?>