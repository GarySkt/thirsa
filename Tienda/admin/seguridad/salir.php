<?php
	@session_start(); //inicia sesion (la @ evita los mensajes de error si la session ya está iniciada)
	unset($_SESSION['usuario']); //eliminamos la variable con los datos de usuario;
    session_destroy(); 

	header("Location: ../login/login.php");

?>