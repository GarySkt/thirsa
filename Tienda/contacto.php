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
        <span>Contactenos</span>
    </div>
    
    <article>
    <form method="post" action="contacto.php?=confirm" enctype="multipart/form-data" class="form">
    <ul>
    	<li class="label">Nombres:</li>
        <li><input type="text" name="nombres" pattern="^[a-zA-Z\s]*$" required/></li>
    </ul>
    
    <ul>
    	<li class="label">Apellidos:</li>
        <li><input type="text" name="apellidos" pattern="^[a-zA-Z\s]*$" required/></li>
    </ul>
    
    <ul>
    	<li class="label">Direccion:</li>
        <li><input type="text" name="direccion" pattern="^[a-zA-Z0-9.-\s]$" required/></li>
    </ul>
    
    <ul>
    	<li class="label">Distrito:</li>
        <li><input type="number" name="distrito" pattern="^[a-zA-Z0-9\s]*$" required/></li>
    </ul>
    
    <ul>
    	<li class="label">Departamento:</li>
        <li><input type="text" name="departamento" pattern="^[a-zA-Z0-9\s]*$" required/></li>
    </ul>
    
    <ul>
    	<li class="label">Telefono:</li>
        <li><input type="number" name="telefono" pattern="^([0-9])*$"  required/></li>
    </ul>
    
     <ul>
    	<li class="label">E-mail:</li>
        <li><input type="email" name="email"  pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-]+)*$" required/></li>
    </ul>
    
     <ul>
    	<li class="label">Sexo:</li>
        <li><input type="radio" name="sexo" value="M"/>M
        <input type="radio" name="sexo" value="F"/>F</li>
    </ul>
    
    <ul>
    	<li class="label">Edad</li>
        <li><input type="text" name="edad" pattern="^([0-9]){2}$" required/></li>
    </ul>
    
    <ul>
    	<li class="label" id="lbl_comentario">Comentario:</li>
        <li><textarea name="comentario" rows="5" cols="30" pattern="^[a-zA-Z0-9._-\s]$"></textarea></li>
    </ul>
    
    
    <ul>
        <li>
        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
        </li>
    </ul>
    </form>
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