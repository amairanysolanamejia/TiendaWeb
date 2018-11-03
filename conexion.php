<?php 

	
	//para hacer la conexión con la base de datos
	//SERVER(IP),Usuario de la base de datos,contraseña, nombre de base de datos
	//Esto es lo que nos importa

	$mysqli = new mysqli("localhost","root","","clasephp"); 
	//Esta variable va a ser un objeto que recibe lo de la linea 5
	if(mysqli_connect_errno()){
		echo "No se hapodido conectar a la base",
		mysqli_connect_error(); /*La coma es para que lo imprima en el echo*/
		exit();
	}
	
	//en este momento ya estamos haciendo la conexión con la base de datos
 ?>