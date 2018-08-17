<?php session_start();?>
<!doctype html>
<html>
<head>
<?php
include ("../admin/conexion.php");
$c=conectarse();
?>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Creaciones Thirsa</title>
<!-- TemplateEndEditable -->
<link href="../css/index.css" rel="stylesheet"/>
<link href="../css/detalleprod.css" rel="stylesheet"/>
<link href="../css/formularios_frontend.css" rel="stylesheet"/>
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body>

<div id="contenedor">

	<header>
   	  <div class="logo">
        <img src="../img/tienda/logo.jpg"/>
        </div>
        
      <div class="link_header">
        <ul>
        	<li><a href="../contacto">Contactenos</a></li>
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
        	<li><a href="../index.php">Inicio</a></li>
            <li><a href="../nuevos_productos.php">Nuevos Productos</a></li>
            <li><a href="../mi_cuenta.php">Mi Cuenta</a></li>
            <li><a href="../carrito.php">Carrito de compras</a></li>
            <li><a href="../pedido.php">Realizar Pedidos</a></li>            
            <li><a href="../admin/index.php">Intranet</a></li>
        </ul>
    </nav>
    
  <div id="banner">
    	<div id="img_banner">
        <img src="../img/tienda/mujeres.jpg"/>
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
    
    <section><!-- TemplateBeginEditable name="Edit_Section" -->Edit_Section<!-- TemplateEndEditable -->
    	
    </section>
    
    <aside id="der">
    	<div class="publicidad">
        <img src="../img/tienda/fotomodelo.jpg"/>
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
    <span><strong>© Copyright 2015, Tienda Thirsa. Todos los derechos reservados</strong><br>
    Tacna -Peru Telefono: 974-617440 | Correo: luciov11011@gmail.com</span>
  </footer>

</div><!--contenedor-->

</body>
</html>