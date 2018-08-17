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
			$num = mysql_query("SELECT count(*) as cant from carrito where codorden='$varOrden'",$c) or die ('fallo la consulta');
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
    <style>
		section#bloque_login
		{
			width:200px;
			height:auto;
		}
		
		#cabecera
		{
			margin:0 auto;
			width:200px;
			height:auto;
		}
		
		form#form_login
		{
			margin:0 auto;
			width:300px;
			height:auto;
		}

		 .estado_cuenta
        {
			float:left;
            width: 400px;
			height:50px;
        }
		
        .cerrar
        {
			float:right;
            width: 170px;
			height:50px;
        }
		
		form.form
		{
			margin-top:30px;
			height:auto;
		}
		
		
	</style>
    <div class="titulo">
        <span>Mi Cuenta</span>
    </div>	
    
    <article>
    <?php

	if(empty($_SESSION['cliente']))
	{
		?>
    <div id="bloque_login">
    	<div id="cabecera">
        <img src="img/tienda/solo_autorizados.jpg" />
        </div>
        
        <form id="form_login" method="post" action="control.php">
        <ul>
        	<li>
				<?php 
                $error=$_GET['error']; 
				if($error=="si")
				{
					echo "Usuario y/o contraseña incorrectos";
				}
				?>
            <li>
            
        	<li class="obj_login">Ingrese E-mail</li>
            
            <li class="obj_login"><input type="text" name="email" class="campo" required>
            </li>
            
            <li class="obj_login">
            Contraseña</li>
            
            <li class="obj_login">
            <input type="password" name="password" class="campo" required></li>
                     
            <li class="obj_login">
            	<input type="submit" value="Ingresar" class="boton">
            </li>        
        </form>
    </div>
    <?php
	}
	else
	{
        $codcli = $_SESSION['cliente']['cod'];
        $sql="SELECT * FROM clientes WHERE codcliente='$codcli'";
        $rs=mysql_query($sql);        
		$row = mysql_fetch_assoc($rs);
		if($row)
		{
		?>
        <div class="estado_cuenta">
            <?php if($_REQUEST['updated']=='ok')
			{
				echo '<font color="#006600">Datos modificados</font>';
			}
			?>
        </div>
        <div class="cerrar">
            <a href='cerrar_sesion.php'>Cerrar Sesion </a>
        </div>
        
        <form method="post" action="actualizar_micuenta" enctype="multipart/form-data" class="form">               
        <ul>
            <li class="label">Nombres</li>
            <li><input type="text" name="nombres" maxlength="50" pattern="^[a-zA-Z\s]*$" size="40"  value="<?php echo $row['nombres'];?>" required/></li>
        </ul>   
    
        <ul>
            <li class="label">Apellidos</li>
            <li><input type="text" name="apellidos" maxlength="50" pattern="^[a-zA-Z\s]*$"  size="40" value="<?php echo $row['apellidos'];?>" required/></li>
        </ul>
       
        <ul>
            <li class="label">Razon Social (si es que fuera)</li>
            <li><input type="text" name="razon_social"  maxlength="50" size="40" value="<?php echo $row['razonsocial'];?>" pattern="^[a-zA-Z\s]*$"/></li>
        </ul>
        
        <ul>
            <li class="label">DNI</li>
            <li><input type="number" name="dni" maxlength="8" pattern="^([0-9]){8}$"  size="10" value="<?php echo $row['dni'];?>" required/></li>
        </ul>
     
        <ul>
            <li class="label">Direccion</li>
            <li><input type="text" name="direccion" maxlength="50"  size="40" pattern="^[a-zA-Z0-9.-\s]$" value="<?php echo $row['direccion'];?>" required/></li>
        </ul>
      
        <ul>
            <li class="label">Telefono</li>
            <li><input type="number" name="telefono" maxlength="9" size="10" pattern="^([0-9])*$" value="<?php echo $row['telefono'];?>" required/></li>
        </ul>
    
        <ul>
            <li class="label">E-mail:</li>
            <li><input type="email" name="email"  maxlength="20" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-]+)*$"  value="<?php echo $row['email'];?>" size="30"required/></li>
        </ul>
    
        <ul>
            <li class="label">Clave</li>
            <li><input type="password" name="clave" maxlength="10" pattern="^([0-9])*$"  size="20" value="<?php echo $row['clave'];?>" required/></li>
        </ul>
    
        <ul>
            <li class="label">Ocupacion</li>
            <li><input type="text" name="ocupacion" maxlength="32" pattern="^[a-zA-Z\s]*$"  size="40" value="<?php echo $row['ocupacion'];?>" required/></li>
        </ul>
    
        <ul>
            <li class="label">Edad</li>
            <li><input type="number" name="edad" maxlength="2" pattern="^([0-9]){2}$" size="10" value="<?php echo $row['edad'];?>" required/></li>
        </ul>
    
        <ul>
            <li class="label">Fecha de Nacimiento</li>
            <li><input type="datetime" name="fecha_nac" maxlength="10" pattern="^\d{4}\-\d{2}\-\d{2}$"  size="30" value="<?php echo $row['fecha_nacim'];?>" required/></li>
        </ul>
    
        <ul>
            <li><input type="submit" value="Modificar"></li>
        </ul>        
        <?php
		}
	}
	?>
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