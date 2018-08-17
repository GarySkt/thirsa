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
                        	<li><a href="../producto/ingresar_producto.php">Nuevos Productos</a></li>
                            <li><a href="../producto/listar_productos.php">Listado de Productos</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="../pedidos/pedido.php">Pedidos</a></li>
                </ul>
            </li>
           
            <li><a href="">Clientes</a>
	            <ul>
                 	<li><a href="ingresar_cliente.php">Nuevos Clientes</a></li>
                    <li><a href="listar_cliente.php">Listado de Clientes</a></li>
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
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$razonsocial=$_POST['razon_social'];
	$dni=$_POST['dni'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$email=$_POST['email'];
	$clave=$_POST['clave'];
	$ocupacion=$_POST['ocupacion'];
	$edad=$_POST['edad'];
	$fechanac=$_POST['fecha_nac'];
	$comentario=$_POST['comentario'];
	$estado=$_POST['estado'];

	
	
  	echo $nombres."<br>";
	echo $apellidos."<br>";
	echo $razonsocial."<br>";
	echo $dni."<br>";
	echo $direccion."<br>";
	echo $telefono."<br>";
	echo $email."<br>";
	echo $clave."<br>";
	echo $ocupacion."<br>";
	echo $edad."<br>";
	echo $fechanac."<br>";
	echo $comentario."<br>";
	echo $estado."<br>";
	
	//nos conectamso a la BD y actualizamos el registro
  	$link = conectarse();
  	$sql="INSERT INTO clientes (nombres, apellidos, razonsocial, dni, direccion, telefono, email, clave, ocupacion, edad, fecha_nacim, comentario, estado) VALUES ('$nombres','$apellidos', '$razonsocial', '$dni', '$direccion', '$telefono', '$email', '$clave', '$ocupacion', '$edad', '$fechanac', '$comentario', '$estado')";
  	$result = mysql_query($sql,$link) or die("Fallo la consulta");
	
  	if($result)
 	{
		echo "<p class='titulo'>ingresar nueva categoria</p>";
		echo "<center>El registro fue ingresado con exito</center>";
		echo "<br>";
		echo "<center><a href=\"listar_cliente.php\">Retornar</a></center>";
	}
	else
	{
		echo "<p class='titulo'>ingresar nueva categoria</p>";
		echo "<center>Error al ingresar el registro</center>";
		echo "<br>";
		echo "<center><a href=\"ingresar_cliente.php\">Retornar</a></center>";
	}
	mysql_close($link);
	?>
	<!-- InstanceEndEditable -->
    
    </section>
    
    <footer>
    <span><strong>PwebI 2016-II. Copiright 2016. Jaime Tamayo</span>
    </footer>
    
</div><!--contenedor-->

</body>
<!-- InstanceEnd --></html>