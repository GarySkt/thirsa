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
	function agregar()
	{
		document.carrito.action="verificar.php";
		valor = document.carrito.cantidad.value;
		if(isNaN(valor) || (valor =="") || (valor==0))
		{
			alert("Debe de ingresar una cantidad valida");
			return;
		}
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
    <style>
	
	#info
	{
		width:300px;
		float:right;
		height:auto;
	}
	
	#imagen_prod
	{
		width:200px;
		height:auto;
		float:left;
	}
	
	#imagen_prod img
	{
		padding-top:15px;
	}
		
	ul.det_prod > li
	{
		display:block;
		padding: 5px 0px;
	}
	
	li.label
	{
		background-color:#CCC;
		font-size:14px;
		font-weight:bold;
	}
	
	li.producto
	{
		font-size:16px;
		font-weight:bold;
		color:#906;
	}
	
	li.fecha
	{
		font-size:12px;
		font-weight:bold;
	}
	
	li.precio_normal, li.precio_oferta
	{
		font-size:18px;
		font-weight:bold;
		color: #900;
	}
	
	li.estado_oferta
	{
		font-size:15px;
		font-weight:bold;
		color: #390;
	}
	
	</style>
	
	<?php
		$id=$_GET['id'];
		$query = mysql_query("SELECT * FROM productos WHERE codproducto='$id'");
		$num_filas = mysql_fetch_assoc($query);
	?>
    <div class="titulo">        
		Detalles del Producto          
    </div>
    
    
    <article>    
    <?php
	if($num_filas)
	{
		$url_img = "admin/producto/productos/". $num_filas['imagen_grande'];
		$url_retorno = "productos.php?cat=". $num_filas['codcategoria'];
		?>	
		<div id='imagen_prod'>
        <img src= "<?php echo $url_img?>"/>
        </div>
		
        <div id='info'>
        	<form name='carrito' method="post">
				<ul class='det_prod'>
                	<li><input type="hidden" name="codigo" value="<?php echo $num_filas['codproducto'];?>"/></li>
					<li class='producto'><?php echo $num_filas['nombreproduc'];?></li>
					<li class='label'>En stock desde</li>
					<li class='fecha'><?php echo $num_filas['fecha_ing'];?></li>
					<li class='label'>Precio Normal</li>
					<li class='precio_normal'>S/. <?php echo $num_filas['precio_normal'];?></li>
					<li class='label'>Precio Oferta</li>
					<li class='precio_oferta'>S/. <?php echo $num_filas['precio_oferta'];?></li>
                    <?php if ($num_filas['oferta']=='Si')
                    {
                        echo "<li class='estado_oferta'> En oferta</li>";
                    }
					?>
                    <li class='label'>Descripcion</li>
                    <li><?php echo $num_filas['descripcion'] ?></li>
                    <li class='label'> Cantidad</li>
                    <li><input type='number' name="cantidad" size=6 value='0'/></li>
               </ul>
           </form>
                    <a href="javascript:agregar();">Añadir al carrito</a>
         </div>	
    <?php
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