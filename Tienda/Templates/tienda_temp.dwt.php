<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Documento sin título</title>

<link href="../css/default.css" rel="stylesheet">
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
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
        
        <a href="../admin/seguridad/salir.php">
        <div id="cerrar">        
        <img src="../img/tienda/cerrarsesion.jpg" alt="Cerrar Sesion" title="Cerrar Sesion">
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
    
    <section><!-- TemplateBeginEditable name="EditRegion1" -->EditRegion1<!-- TemplateEndEditable -->
    
    </section>
    
    <footer>
    <p><strong>© Copyright 2015, Tienda Thirsa. Todos los derechos reservados</strong><br>Tacna -Peru<br>
    Telefono: 974-617440 / Correo: luciov11011@gmail.com</p>
    </footer>
    
</div><!--contenedor-->

</body>
</html>