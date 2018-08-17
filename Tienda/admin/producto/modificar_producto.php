<?php
include("../seguridad/seguridad.php");
?>
<!doctype html>
<html><!-- InstanceBegin template="/Templates/tienda_temp.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Documento sin título</title>

<link href="../../css/default.css" rel="stylesheet">
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>

<div id="contenedor">
    <header>    	
        <div id="logo">
        <img src="../../img/tienda/logo.jpg">
        </div>
        
        <div id="usuario">
        	<div id="txtUser">Bienvenido <br> <?php echo $_SESSION['usuario']['nom']. ' '. $_SESSION['usuario']['ape'];?></div>
        </div>
        
        <a href="../seguridad/salir.php">
        <div id="cerrar">        
        <img src="../../img/tienda/cerrarsesion.jpg" alt="Cerrar Sesion" title="Cerrar Sesion">
        </div>       
        </a>
    </header>
    
    <nav>
    	<ul class="menu">
        	<li><a href=""../admin/index.php">Sistema</a></li>
           
            <li><a href="">Productos</a>
            	<ul>
                	<li><a href="">Categoria</a>
	                    <ul>
                        	<li><a href="../categoria/ingresar_categoria.php">Nueva Categoria</a></li>
                            <li><a href="../categoria/listar_categoria.php">Listado de Categoria</a></li>
                        </ul>
                    </li>
                        
                    <li><a href="">Productos</a>
                    	<ul>
                        	<li><a href="ingresar_producto.php">Nuevos Productos</a></li>
                            <li><a href="listar_productos.php">Listado de Productos</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="../pedidos/pedido.php">Pedidos</a></li>
                </ul>
            </li>
           
            <li><a href="">Clientes</a>
	            <ul>
                 	<li><a href="../cliente/ingresar_cliente.php">Nuevos Clientes</a></li>
                    <li><a href="../cliente/listar_cliente.php">Listado de Clientes</a></li>
                </ul>
            </li>
            
            <li><a href="">Noticias</a>
	            <ul>
                 	<li><a href="../noticias/ingresar_noticias.php" >Nuevas Noticias</a></li>
                    <li><a href="../noticias/listar_noticias.php">Listado de Noticias</a></li>
                </ul>
            </li>
            
            <li><a href="">Contactos</a>
            	<ul>
                 	<li><a href="../contactos/ingresar_contactos.php" >Nuevos Contactos</a></li>
                    <li><a  href="../contactos/listar_contactos.php">Listado de Contactos</a></li>
                </ul>
            </li>
            
            <li><a href="../index.php">Inicio</a></li>
        </ul>
    </nav>
    
    <section><!-- InstanceBeginEditable name="EditRegion1" -->
    <?php
    //incluir modulo de conexion
	include("../conexion.php");
	
    //recuperamos el codigo que viene por el url
	$codigo=$_GET['cod'];
	$link = conectarse();
	
	//declaramos la consulta
	$sql= "SELECT p.codproducto, p.nombreproduc, c.nom_categoria, p.descripcion, p.fecha_ing, p.precio_normal, p.precio_oferta, p.imagen_chica, p.imagen_grande, p.oferta, p.estado FROM productos AS p INNER JOIN categorias AS c ON p.codcategoria=c.codcategoria WHERE p.codproducto= '$codigo'";
	
	//enviamos la consulta
	$rs = mysql_query($sql) or die("Fallo la consulta");
	
	//resultados
	$campo=mysql_fetch_array($rs);
	?>
    
    <p class="titulo">modificar producto</p>       
    <form method="post" action="modificar.php" enctype="multipart/form-data">
    <form>
    <table>
    
    <tr>
    	<td><input type="hidden" name="codigo"  value="<?php echo $codigo;?>" required/></td>
    </tr>
    
    <tr>
    	<td>Nombre Producto:</td>
        <td><input type="text" name="nombre_producto"  value="<?php echo $campo['nombreproduc']?>"/></td>
    </tr>
    
    <tr>
    	<td>Categoria:</td>
        <td>
        <select name="categoria">
            <?php		
				$sql= "SELECT * FROM categorias";
				$rs = mysql_query($sql) or die("Fallo la consulta");
				$n= mysql_num_rows($rs);
				
				while($campocat = MySQL_fetch_array($rs))
				{
					if($campo['nom_categoria']==$campocat['nom_categoria'])
					{
						?>
						<option selected value="<?php echo $campocat['codcategoria']?>"><?php echo $campocat['nom_categoria'];?> </option>		
                        <?php
					}
					?>
					<option value="<?php echo $campocat['codcategoria']?>"><?php echo $campocat['nom_categoria'];?> </option>
                    <?php
				}				            
				mysql_close($link);
            ?>
        </select>
        </td>
    </tr>
    
    <tr>
    	<td>Descripcion:</td>
        <td><textarea name="descripcion" rows="10" cols="30" pattern="^[a-zA-Z0-9._-\s]$" required><?php echo $campo['descripcion']?></textarea></td>
    </tr>
    
    <tr>
    	<td>Fecha ingreso:</td>
        <td><input type="datetime" name="fecha_ingreso" value="<?php echo $campo['fecha_ing']?>" pattern="^\d{4}\-\d{2}\-\d{2}$" required/></td>
    </tr>
    
     <tr>
    	<td>Precio Normal:</td>
        <td><input type="number" name="precio_normal" value="<?php echo $campo['precio_normal']?>" pattern="^\d*\.\d{2}$" required/></td>
    </tr>
    
     <tr>
    	<td>Precio Oferta:</td>
        <td><input type="number" name="precio_oferta" value="<?php echo $campo['precio_oferta']?>" pattern="^\d*\.\d{2}$" required/></td>
    </tr>
    
    <tr>
    	<td>Imagen chica:</td>
        <td><input type="file" name="img_chica" value="<?php echo $campo['imagen_chica']?>"/></td>
    </tr>
    
    <tr>
    	<td>Imagen grande:</td>
        <td><input type="file" name="img_grande" value="<?php echo $campo['imagen_grande']?>"/></td>
    </tr>
    
    <tr>
    	<td>Oferta</td>
        <td>
         <?php
		if($campo['oferta']=='Si')
		{			
		?>
        	 <input type="radio" name="oferta" value="Si" checked/>Si
        	<input type="radio" name="oferta" value="No"/>No
        <?php
		}
		else if($campo['oferta']=='No')
		{
			?>
			 <input type="radio" name="oferta" value="Si"/>Si
        	<input type="radio" name="oferta" value="No" checked/>No
        <?php
		}else
		{			
		?>
            <input type="radio" name="oferta" value="Si"/>Si
                <input type="radio" name="oferta" value="No" />No	      
         <?php
		}
		?>
       </td>
    </tr>
    
    <tr>
    	<td>Estado</td>
        <td>
         <?php
		if($campo['estado']=='Activo')
		{			
		?>
        	<input type="radio" name="estado" value="Activo" checked/>Activo
       		<input type="radio" name="estado" value="Inactivo"/>Inactivo
        <?php
		}
		else if($campo['estado']=='Inactivo')
		{
			?>
			<input type="radio" name="estado" value="Activo"/>Activo
	        <input type="radio" name="estado" value="Inactivo" checked/>Inactivo
        <?php
		}else
		{			
		?>
            <input type="radio" name="estado" value="Activo"/>Activo
	        <input type="radio" name="estado" value="Inactivo"/>Inactivo 
         <?php
		}
		?>      
    </tr>
    
    <tr>
        <td colspan="2" align="center">
        <input type="submit" value="Modificar Producto">
        </td>
    </tr>
    </table>
	
    </form>
	<!-- InstanceEndEditable -->
    
    </section>
    
    <footer>
    <span><strong>PwebI 2016-II. Copiright 2016. Jaime Tamayo</span>
    </footer>
    
</div><!--contenedor-->

</body>
<!-- InstanceEnd --></html>