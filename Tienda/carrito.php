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
<script>
function actualizar()
	{
		document.carrito.action="verificar_carrito.php?proceso=Actualizar";
		document.carrito.submit();
	}
	
function eliminar()
{
	document.carrito.action="verificar_carrito.php?proceso=Eliminar";
	document.carrito.submit();
}
</script>
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
    <link rel="stylesheet" href="css/tablas.css">
    <div class="titulo">
        <span>Carrito</span>
    </div>
    
    <?php
	if(empty($_SESSION['cliente']))
	{
		?>
        <article>
        <p>Ud no ha iniciado sesion. <a href="mi_cuenta.php">Inicie sesion</a> o <a href="registro.php">registrese como cliente</a></p> 
        </article>
        <?php
	}
	else if (!empty($_SESSION['cliente']) && empty($_SESSION['IdOrden']))
	{
		?>
        <article>
        <p>El carrito esta vacio</p> 
        </article>
        <?php
	}
	else
	{
		?>
        <div id="datos">
        <?php
        $varOrden=$_SESSION["IdOrden"];
        ?>
        <p>Orden de Pedido: <?php echo $varOrden; ?></p>
        <p>Usuario: <?php echo $_SESSION['cliente']['nom']. ' '. $_SESSION['cliente']['ape']; ?> </p>
        </div>
        
        <article>
        <table cellspacing="0" border="1" bordercolor="#906">
        <tr class="tbl_encabezado">
            <td class="c_check"></td>
            <td colspan="2" align="center" class"h_prod">Producto</td>
            <td class="c_cant">Cantidad</td>
            <td class="c_punit">Precio Unit.</td>
            <td class="c_ptot">Total</td>
        </tr>
        
        <?php
        $subtotal=0;
        $sql=mysql_query("select c.codorden, cl.nombres, cl.apellidos, c.codproducto, p.nombreproduc, p.imagen_chica, p.precio_normal, p.precio_oferta, p.oferta, c.cantidad from carrito as c
              inner join clientes as cl on c.codcliente=cl.codcliente
              inner join productos as p on c.codproducto = p.codproducto
              where c.codorden = '$varOrden'");	
        
        while($num = mysql_fetch_array($sql))
        {		
            $varCantidad = $num['cantidad'];
            
            if($num['oferta']=='Si')
            {
                $varPrecio = $num['precio_oferta'];
            }
            else
            {
                $varPrecio = $num['precio_normal'];
            }
            $PrecioTotal= $varCantidad * $varPrecio;
        ?>
        <tr>
        <form method="post" action="verificar_pedido.php" name="carrito">
            <td class="c_check"><input type="checkbox" name="<?php echo 'chk'.$num['codproducto']?>"/></td>
            <td class="c_img"><img src="admin/producto/productos/<?php echo $num['imagen_chica'];?>"</td>
            <td class="c_prod"><?php echo $num['nombreproduc'];?></td>
            <td class="c_cant"><input type="number"  name="<?php echo 'txt'. $num['codproducto'];?>" id="<?php echo 'txt'.$num['codproducto'];?>"  value="<?php echo $varCantidad; ?>"/></td>
            <td class="c_punit"><?php echo 'S/. '. $varPrecio; ?></td>
            <td class="c_ptot"><?php echo  'S/. '.$PrecioTotal;?></td>
        </tr>
        <?php
           $subtotal=$subtotal + $PrecioTotal;
        }
        ?>
        </form>
        </table>
        <div id="subtotal">SubTotal</div>
        <div id="monto_subtotal"><?php echo 'S/. '. $subtotal;?></div>
        
        <ul class="opciones">
        <li><a href="javascript:actualizar();">Actualizar</a></li>
        <li><a href="#">Seguir Comprando</a></li>
        <li><a href="javascript:eliminar();">Eliminar</a></li>
        <li><a href="pedido.php">Hacer Pedido</a></li>
        </ul>
        
        </article>
        <?php
	}
	?>
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