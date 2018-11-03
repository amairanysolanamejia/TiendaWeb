<?php 
//Destruimos la sesion
	session_start();
	session_destroy();
	//redirigimos
	header('Location: index.php')
 ?>