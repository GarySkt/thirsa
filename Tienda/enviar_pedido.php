<?php session_start();?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/tienda_front.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<?php
include ("admin/conexion.php");
$c=conectarse();
?>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Creaciones Thirsa</title>
<!-- InstanceEndEditable -->
<link href="css/index.css" rel="stylesheet"/>
<link href="css/detalleprod.css" rel="stylesheet"/>
<link href="css/formularios_frontend.css" rel="stylesheet"/>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>

<div id="contenedor">

	<header>
   	  <div class="logo">
        <img src="img/tienda/logo.jpg"/>
        </div>
        
      <div class="link_header">
        <ul>
        	<li><a href="contacto">Contactenos</a></li>
            <li>
			<?php
			if(empty($_SESSION['cliente']))
			{
				echo "<a href='registro.php'>Registrate como Cliente</a>";
			}
			else
			{
				echo $_SESSION['cliente']['nom']. ' '. $_SESSION['cliente']['ape'];
			}
			?>
            </li>
        </ul>
        </div>
  </header>
    
    <nav id="main_menu">
	    <ul>
        	<li><a href="index.php">Inicio</a></li>
            <li><a href="nuevos_productos.php">Nuevos Productos</a></li>
            <li><a href="mi_cuenta.php">Mi Cuenta</a></li>
            <li><a href="carrito.php">Carrito de compras</a></li>
            <li><a href="pedido.php">Realizar Pedidos</a></li>            
            <li><a href="admin/index.php">Intranet</a></li>
        </ul>
    </nav>
    
  <div id="banner">
    	<div id="img_banner">
        <img src="img/tienda/mujeres.jpg"/>
        </div>
        
        <div id="carrito">
        <p class="titulo">Carrito de compras</p>
        <p>Nro de Productos:
        <?php
		$varOrden = $_SESSION['IdOrden'];
        if(empty($_SESSION['IdOrden']))
		{
			echo "0";
		}
		else
		{
			$num = mysql_query("select count(*) as cant from carrito where codorden='$varOrden'",$c) or die ('fallo la consulta');
			while ($res = mysql_fetch_array($num))
			{
				echo $res['cant'];
			}
		}
		?>
        </p>
        </div>
    	
  </div>
    
    <aside id="izq">
    	<div class="titulo">
        Categoria de Productos
        </div>
        
        <nav>
            <ul>
            <?php				
			$query = mysql_query("SELECT * FROM categorias");
			while($campo = MySQL_fetch_array($query))
			{				
			?>
            	<li><a href="productos.php?cat=<?php echo $campo['codcategoria']?>"><?php echo $campo['nom_categoria']?></a></li>
            <?php
			}
			?>
            </ul>
        </nav>
    </aside>
    
    <section><!-- InstanceBeginEditable name="Edit_Section" -->
    <div class="titulo">
        <span>Realizar Pedidos</span>
    </div>	
    
    <article>
    <?php
		date_default_timezone_set('America/Lima');

	$varOrden=$_SESSION['IdOrden'];
	$varIdCliente=$_SESSION['cliente']['cod'];
	$Fecha= date('Y-m-d h:i:s',time());
	$bruto = $_SESSION['montos']['bruto'];
	$igv = $_SESSION['montos']['igv'];
	$total = $_SESSION['montos']['total'];
	$observacion = $_POST['observacion'];
	
	
		enviar($varOrden, $varIdCliente, $Fecha, $observacion,$bruto,$igv,$total,$c);
		echo "Su pedido ha sido enviado. Gracias por su compra";
		unset($_SESSION['IdOrden']);
		unset($_SESSION['montos']['bruto']);
		unset($_SESSION['montos']['igv']);
		unset($_SESSION['montos']['total']);
		$res = mysql_query("DELETE FROM carrito",$c);
		
	function enviar($varOrden, $varIdCliente, $Fecha, $observacion, $bruto, $igv, $total, $c)
	{
		//ingresamos los datos en la tabla Pedidos		
		$sqlPedido = "insert into pedidos(codorden, codcliente, fechapedido, observaciones, bruto, igv, total)
		values('$varOrden', '$varIdCliente', '$Fecha', '$observacion','$bruto', '$igv', '$total')";
		$result1=mysql_query($sqlPedido, $c) or die('Fallo la consulta');
		
		//ingresamos los datos en la tabla DetallePedidos
		$sqlCarrito = mysql_query("SELECT c.codorden, c.codcliente, c.codproducto, c.cantidad, p.precio_normal FROM carrito AS c INNER JOIN productos AS p ON c.codproducto = p.codproducto WHERE codorden='$varOrden'");
		while($num = mysql_fetch_array($sqlCarrito))
        {	
			$codProd = $num['codproducto'];
			$varPrecio = $num['precio_normal'];
			$varCant = $num['cantidad'];
			
			$sqlDetPedido = "insert into pedidodetalle (codorden, codproducto, precio, cantidad)
						  values('$varOrden', '$codProd', '$varPrecio', '$varCant')";
			$result2=mysql_query($sqlDetPedido, $c) or die('Fallo la consulta');
		}		
	}
	
	?>
    </article>
	<!-- InstanceEndEditable -->
    	
    </section>
    
    <aside id="der">
    	<div class="publicidad">
        <img src="img/tienda/fotomodelo.jpg"/>
        </div>
        
        <div class="noticias">
   	  	  <div class="titulo">
        	Noticias y Eventos
        	</div>
            <div class="contenido">
              <ul>
                <?php				
				$query = mysql_query("SELECT * FROM noticias ORDER BY fecha_ing DESC LIMIT 2");
				while($campo = MySQL_fetch_array($query))
				{				
				?>
					<li>
                    <a href="detalle_noticia.php?cat=<?php echo $campo['codnoticias']?>"> 
					<?php echo "<p class='titulo_noticia'>".$campo['titulo'] . "</p><p class='sumilla'>" . $campo['sumilla']."</p>"?> 
                    </a> 
                    </li>
					<?php
				}
				?>
              </ul>
            </div>
        </div>
    </aside>
    
    <footer>
    <span><strong>PwebI 2016-II. Copiright 2016. Jaime Tamayo</span>
  </footer>

</div><!--contenedor-->

</body>
<!-- InstanceEnd --></html>