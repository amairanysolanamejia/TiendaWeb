<?php 
	
	//Para hacer la conexión 
	//(SERVER[IP],DB_USER,PASS_DB,NOMBRE_DB)
	$mysqli = new mysqli("localhost","root","","tienda");
	if(mysqli_connect_errno()){
		echo "No se ha podido conectar a la base!",mysqli_connect_error();
		exit();
	}

 ?>