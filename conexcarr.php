<?php 
	//echo "Hola prebes!";
	//Para hacer la conexión 
	//(SERVER[IP],DB_USER,PASS_DB,NOMBRE_DB)
	$mysqli = new mysqli("localhost","root","","carrito");
	if(mysqli_connect_errno()){
		echo "Ha ocurrido un error, estamos trabajando para solucionarlo",mysqli_connect_error();
		exit();
	}
	//echo "Estas conectado papu!";
 ?>