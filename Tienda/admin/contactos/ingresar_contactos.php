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
                 	<li><a href="ingresar_contactos.php" >Nuevos Contactos</a></li>
                    <li><a  href="listar_contactos.php">Listado de Contactos</a></li>
                </ul>
            </li>
            
            <li><a href="../index.php">Inicio</a></li>
        </ul>
    </nav>
    
    <section><!-- InstanceBeginEditable name="EditRegion1" -->
     <p class="titulo">ingresar nuevo contactos</p>
    <form>
    <table>
    <tr>
    	<td>Nombres:</td>
        <td><input type="text" name="nombres" pattern="^[a-zA-Z\s]*$" required/></td>
    </tr>
    
    <tr>
    	<td>Apellidos:</td>
        <td><input type="text" name="apellidos" pattern="^[a-zA-Z\s]*$" required/></td>
    </tr>
    
    <tr>
    	<td>Direccion:</td>
        <td><input type="text" name="direccion" pattern="^[a-zA-Z0-9.-\s]$" required/></td>
    </tr>
    
    <tr>
    	<td>Distrito:</td>
        <td><input type="number" name="distrito" pattern="^[a-zA-Z0-9\s]*$" required/></td>
    </tr>
    
    <tr>
    	<td>Departamento:</td>
        <td><input type="text" name="departamento" pattern="^[a-zA-Z0-9\s]*$" required/></td>
    </tr>
    
    <tr>
    	<td>Telefono:</td>
        <td><input type="number" name="telefono" pattern="^([0-9])*$"  required/></td>
    </tr>
    
     <tr>
    	<td>E-mail:</td>
        <td><input type="email" name="email"  pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-]+)*$" required/></td>
    </tr>
    
     <tr>
    	<td>Sexo:</td>
        <td><input type="radio" name="sexo" value="M"/>M
        <input type="radio" name="sexo" value="F"/>F</td></td>
    </tr>
    
    <tr>
    	<td>Edad</td>
        <td><input type="text" name="edad" pattern="^([0-9]){2}$" required/></td>
    </tr>
    
    <tr>
    	<td>Comentario:</td>
        <td><textarea name="comentario" rows="5" cols="30" pattern="^[a-zA-Z0-9._-\s]$"></textarea></td>
    </tr>
    
    <tr>
    	<td>Estado</td>
        <td><input type="radio" name="estado" value="Activo"/>Activo
        <input type="radio" name="estado" value="Inactivo"/>Inactivo</td>
    </tr>
    
    <tr>
        <td colspan="2" align="center">
        <input type="submit" value="Registrar Nuevo Contacto">
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