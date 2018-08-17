 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="../../css/default.css" rel="stylesheet">
<title>Documento sin título</title>
</head>

<body>

<div id="contenedor">
    <header>    	
        <div id="logo">
        <img src="../../img/tienda/logo.jpg">
        </div>       
    </header>
    
    <nav>    	
    </nav>
    
    <section>
    <div id="bloque_login">
    	<div id="cabecera">
        </div>
        
        <div>
        <form id="form_login" method="post" action="../control.php">
        <table width="250" height="200">
        	<tr>
            	<td align="center">
				<?php $error=$_GET['error']; 
				if($error=="si")
				{
					echo "Usuario y/o contraseña incorrectos";
				}
				?>
                </td>
            </tr>
        	<tr class="obj_login">
            	<td width="auto">Ingrese E-mail</td>
            </tr>
            
            <tr class="obj_login">
            	<td><input type="text" name="email" class="campo" required></td>
            </tr>
            
            <tr class="obj_login">
                <td>Contraseña</td>
            </tr>
            
            <tr class="obj_login">
            	<td><input type="password" name="password" class="campo" required></td>
            </tr>
            
            <tr class="obj_login">
            	<td><input type="submit" value="Ingresar" class="boton"></td>
            </tr>
        </table>
        </form>
        </div>
    </div>
    </section>
    
    <footer>
    <span><strong>PwebI 2016-II. Copiright 2016. Jaime Tamayo</span>
    </footer>
    
</body>
</html>