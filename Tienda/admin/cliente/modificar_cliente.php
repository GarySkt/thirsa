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
	include("../conexion.php");
	
    //recuperamos el codigo que viene por el url
	$codigo=$_GET['cod'];
	$link = conectarse();
	
	//declaramos la consulta
	$sql= "SELECT * FROM clientes where codcliente ='$codigo'";
	
	//enviamos la consulta
	$rs = mysql_query($sql) or die("Fallo la consulta");
	
	//resultados
	$campo=mysql_fetch_array($rs);
	?>
    
    <p class="titulo">modificar cliente</p>
        
    <form method="post" action="modificar.php">
    <table>
    
    <tr>
    	<td><input type="hidden" name="codigo" maxlength="50" value="<?php echo $codigo?>"></td>
    </tr>
    
    <tr>
    	<td>Nombres:</td>
        <td><input type="text" name="nombres"  maxlength="50" pattern="^[a-zA-Z\s]*$" value="<?php echo $campo['nombres']?>" required/></td>
    </tr>
    
    <tr>
    	<td>Apellidos:</td>
        <td><input type="text" name="apellidos" maxlength="50" pattern="^[a-zA-Z]*$" value="<?php echo $campo['apellidos']?>" required/></td>
    </tr>
    
    <tr>
    	<td>Razon Social:</td>
        <td><input type="text" name="razon_social" maxlength="8" pattern="^[a-zA-Z]*$" value="<?php echo $campo['razonsocial']?>" required/></td>
    </tr>
    
    <tr>
    	<td>DNI:</td>
        <td><input type="number" name="dni"  maxlength="50"  pattern="^([0-9]){8}$" value="<?php echo $campo['dni']?>" required/></td>
    </tr>
    
    <tr>
    	<td>Direccion:</td>
        <td><input type="text" name="direccion" maxlength="9" pattern="^[a-zA-Z0-9.-\s]$" value="<?php echo $campo['direccion']?>" required/></td>
    </tr>
    
    <tr>
    	<td>Telefono:</td>
        <td><input type="number" name="telefono"  maxlength="20" pattern="^([0-9])*$" value="<?php echo $campo['telefono']?>" required/></td>
    </tr>
    
     <tr>
    	<td>E-mail:</td>
        <td><input type="email" name="email" maxlength="20" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-]+)*$"  value="<?php echo $campo['email']?>"required/></td>
    </tr>
    
     <tr>
    	<td>Clave:</td>
        <td><input type="text" name="clave" maxlength="10" pattern="^([0-9])*$" value="<?php echo $campo['clave']?>" required/></td>
    </tr>
    
    <tr>
    	<td>Ocupacion</td>
        <td><input type="text" name="ocupacion"  maxlength="32"  pattern="^[a-zA-Z\s]*$" value="<?php echo $campo['ocupacion']?>" required/></td>
    </tr>
    
    <tr>
    	<td>Edad:</td>
        <td><input type="number" name="edad" maxlength="2" pattern="^([0-9]){2}$" value="<?php echo $campo['edad']?>" required/></td>
    </tr>
    
    <tr>
    	<td>Fecha de Nacimiento</td>
        <td><input type="datetime" name="fecha_nac" maxlength="10" pattern="^\d{4}\-\d{2}\-\d{2}$" value="<?php echo $campo['fecha_nacim']?>" required/></td>
    </tr>
    
    <tr>
    	<td>Comentario:</td>
        <td><textarea name="comentario" rows="5" cols="30" pattern="^[a-zA-Z0-9._-\s]$"><?php echo $campo['comentario']?> </textarea></td>
    </tr>
    
    <tr>
    	<td>Estado</td>
        <td>
        <?php
		if($campo['estado']=='Activo')
		{			
		?>
        	<input type="radio" name="estado" value="Activo" checked required/>Activo
        	<input type="radio" name="estado" value="Inactivo" required/>Inactivo
        <?php
		}
		else if($campo['estado']=='Inactivo')
		{
			?>
			<input type="radio" name="estado" value="Activo" required/>Activo
        	<input type="radio" name="estado" value="Inactivo" checked required/>Inactivo
        <?php
		}
		else
		{
			?>
			<input type="radio" name="estado" value="Activo" required/>Activo
	        <input type="radio" name="estado" value="Inactivo" required/>Inactivo
		<?php
		}
		?>	   	
        </td>
    </tr>
    
    <tr>
        <td colspan="2" align="center">
        <input type="submit" value="Modificar Cliente">
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