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
  	include ("../conexion.php");
	$codigo=$_POST['codigo'];
	$codcategoria=$_POST['categoria'];
	$nomproduc=$_POST['nombre_producto'];
	$descripcion=$_POST['descripcion'];
	$fecha_ing=$_POST['fecha_ingreso'];
	$precionormal=$_POST['precio_normal'];
	$preciooferta=$_POST['precio_oferta'];
	
	/*controlamos la subida de la imagen chica*/
	if ($_FILES['img_chica']["error"] > 0)
  	{
		echo "Error: " . $_FILES['img_chica']['error'] . "<br>";
	}
	else
	{
		echo "Nombre: " . $_FILES['img_chica']['name'] . "<br>";
		echo "Tipo: " . $_FILES['img_chica']['type'] . "<br>";
		echo "Tamaño: " . ($_FILES['img_chica']['size'] / 1024) . " kB<br>";
		echo "Carpeta temporal: " . $_FILES['img_chica']['tmp_name'];
		
		/*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
		move_uploaded_file($_FILES['img_chica']['tmp_name'], "productos/".$_FILES['img_chica']['name']);
	} 
	
	
	/*controlamos la subida de la imagen grande*/
	if ($_FILES['img_grande']["error"] > 0)
  	{
		echo "Error: " . $_FILES['img_grande']['error'] . "<br>";
	}
	else
	{
		echo "Nombre: " . $_FILES['img_grande']['name'] . "<br>";
		echo "Tipo: " . $_FILES['img_grande']['type'] . "<br>";
		echo "Tamaño: " . ($_FILES['img_grande']['size'] / 1024) . " kB<br>";
		echo "Carpeta temporal: " . $_FILES['img_grande']['tmp_name'];
		
		/*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
		move_uploaded_file($_FILES['img_grande']['tmp_name'], "productos/".$_FILES['img_grande']['name']);
	} 
	
  	$imagen_chica=$_FILES['img_chica']['name'];
	$imagen_grande=$_FILES['img_grande']['name'];
	$oferta=$_POST['oferta'];
	$estado=$_POST['estado'];
	
	
	//nos conectamso a la BD y actualizamos el registro
  	$link = conectarse();
  	$sql="UPDATE productos SET 
	codcategoria ='$codcategoria',
	nombreproduc ='$nomproduc',
	descripcion ='$descripcion', 
	fecha_ing ='$fecha_ing', 
	precio_normal ='$precionormal', 
	precio_oferta ='$preciooferta', 
	imagen_chica ='$imagen_chica',
	imagen_grande = '$imagen_grande',
	oferta ='$oferta', 
	estado ='$estado'
	WHERE codproducto='$codigo'";
  	$rs = mysql_query($sql);
  
  	if($rs==1)
 	{
		echo "<p class='titulo'>modificar producto</p>";
		echo "<center>El registro fue actualizado con exito</center>";
		echo "<br>";
		echo "<center><a href='listar_productos.php'>Retornar</a></center>";
	}
	else
	{
		echo "<p class='titulo'>modificar producto</p>";
		echo "<center>Error al actualizar el registro</center>";
		echo "<br>";
		echo "<center><a href=\"modificar_producto.php\">Retornar</a></center>";
	}
	?>
	<!-- InstanceEndEditable -->
    
    </section>
    
    <footer>
    <span><strong>PwebI 2016-II. Copiright 2016. Jaime Tamayo</span>
    </footer>
    
</div><!--contenedor-->

</body>
<!-- InstanceEnd --></html>