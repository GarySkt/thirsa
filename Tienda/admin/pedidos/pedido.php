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
                    
                    <li><a href="pedido.php">Pedidos</a></li>
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
    <p class="titulo">Listado de Pedidos</p>
    
    <?php
		//incluir modulo de conexion
		include ("../conexion.php");
		//abrir la conexion con el sevidor de base de datos
		$link = conectarse();
	?>
    
    <table width="800" border="0" align="center" cellpadding="1" cellspacing="0">
    <tr class="titulo_tabla">
    	<td width="55" class="estilo8">Codigo</td>
        <td width="119" class="estilo8">Cliente</td>
        <td width="119" class="estilo8">Fecha</td>
        <td width="131" class="estilo8">Precio Bruto</td>
        <td width="106" class="estilo8">IGV</td>
        <td width="134" class="estilo8">Precio Total</td>  
        <td></td>      
    </tr>

   <?php
	   //enviar consulta
	   $instruccion = "SELECT p.codorden, CONCAT(c.nombres,' ',c.apellidos) as cliente, p.fechapedido, p.bruto, p.igv, p.total FROM pedidos as p
inner join clientes as c on p.codcliente = c.codcliente";
	   
	   //envia una sentencia a la base activa en el servidor asociado en este caso a la sentencia sql
	   $rs = mysql_query($instruccion) or die("Fallo la consulta");
	   
	   //devuelve el numero de filas (registros) encontrados
	   $n = mysql_num_rows($rs);
	   
	   //devuelve una matriz que corresponde a la sentencia extraida, o falso si no 
	   //quedan mas filas
	   while($campo = MySQL_fetch_array($rs)){
   	?>

   	<tr>
   		<td class="estilo7"><?php echo $campo["codorden"]; ?></td>
        <td class="estilo7"><?php echo $campo["cliente"]; ?></td>
        <td class="estilo7"><?php echo $campo["fechapedido"]; ?></td>
        <td class="estilo7"><?php echo $campo['bruto']; ?></td>
        <td class="estilo7"><?php echo $campo["igv"]; ?></td>
        <td class="estilo7"><?php echo $campo["total"]; ?></td>
        <td class="estilo7">
        <a href="detalle_pedido.php?cod=<?php echo $campo['codorden']?>&cliente=<?php echo $campo["cliente"];?>&fecha=<?php echo $campo["fechapedido"]; ?>">Detalle</a>
        </td>
   	</tr>

   	<?php
	   }
	   //cerrar la conexion con la base de datos
	   mysql_close($link);
   	?>
	</table>
    <!-- InstanceEndEditable -->
    
    </section>
    
    <footer>
    <span><strong>PwebI 2016-II. Copiright 2016. Jaime Tamayo</span>
    </footer>
    
</div><!--contenedor-->

</body>
<!-- InstanceEnd --></html>