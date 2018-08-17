<?php
session_start();

if(empty($_SESSION["usuario"]))
{
	header("Location: login/login.php");
	exit();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link href="../css/default.css" rel="stylesheet">

</head>

<body>

<div id="contenedor">
    <header>    	
        <div id="logo">
        <img src="../img/tienda/logo.jpg">
        </div>
        
        <div id="usuario">
        	<div id="txtUser">Bienvenido <br> <?php echo $_SESSION['usuario']['nom']. ' '. $_SESSION['usuario']['ape'];?></div>
        </div>
        
        <a href="seguridad/salir.php">
        <div id="cerrar">        
        <img src="../img/tienda/cerrarsesion.jpg" alt="Cerrar Sesion" title="Cerrar Sesion"/>
        </div>       
        </a>
    </header>
    
    <nav>
    	<ul class="menu">
        	<li><a href="../admin/index.php">Sistema</a></li>
           
            <li><a href="">Productos</a>
            	<ul>
                	<li><a href="">Categoria</a>
	                    <ul>
                        	<li><a href="../admin/categoria/ingresar_categoria.php">Nueva Categoria</a></li>
                            <li><a href="../admin/categoria/listar_categoria.php">Listado de Categoria</a></li>
                        </ul>
                    </li>
                        
                    <li><a href="">Productos</a>
                    	<ul>
                        	<li><a href="../admin/producto/ingresar_producto.php">Nuevos Productos</a></li>
                            <li><a href="../admin/producto/listar_productos.php">Listado de Productos</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="../admin/pedidos/pedido.php">Pedidos</a></li>
                </ul>
            </li>
           
            <li><a href="">Clientes</a>
	            <ul>
                 	<li><a href="../admin/cliente/ingresar_cliente.php">Nuevos Clientes</a></li>
                    <li><a href="../admin/cliente/listar_cliente.php">Listado de Clientes</a></li>
                </ul>
            </li>
            
            <li><a href="">Noticias</a>
	            <ul>
                 	<li><a href="../admin/noticias/ingresar_noticias.php" >Nuevas Noticias</a></li>
                    <li><a href="../admin/noticias/listar_noticias.php">Listado de Noticias</a></li>
                </ul>
            </li>
            
            <li><a href="">Contactos</a>
            	<ul>
                 	<li><a href="../admin/contactos/ingresar_contactos.php" >Nuevos Contactos</a></li>
                    <li><a  href="../admin/contactos/listar_contactos.php">Listado de Contactos</a></li>
                </ul>
            </li>
            
            <li><a href="../admin/index.php">Inicio</a></li>
        </ul>
    </nav>
    
    <section>
    	<figure>
    	<img src="../img/tienda/mujeres.jpg"/>
    	</figure>
        <br>
        <p class="titulo">Bienvenidos al sistema administrador de datos de creaciones thirsa</p>
        <p align="center">En este modulo podremos Insertar, Modificar y Eliminar la informacion a la Base de Datos</p>
    </section>
    
    <footer>
    <span><strong>PwebI 2016-II. Copiright 2016. Jaime Tamayo</span>
    </footer>
</div>

</body>
</html>