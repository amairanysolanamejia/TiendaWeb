<!-- ¿Cómo funciona? 
Lo primero que se deberealizar es en phpmyadmin realizar 3 tablas, "clasephp", "donas y "tienda", en clase prebe se importa el archivo "tablas.sql" y en "tienda" se importa "tiendasp", que corresponden a als tablas que se requieren para hacer funcionar el programa.

Las tablas de clasephp corresponen al login de los usuarios.
Las tablas de tienda corrsponden a los productos que la tienda vende y por cada uno de estos productos hay una carpeta que permite ver los productos existentes en la base de datos.
Únnicamente las donas pueden ser creadas desde la página web, porque son demostrativas, para comprobar la conexión, pero el resto no.

Los archivos "conexion" ,"conx" y "conh" sirven para realizar la conexión con la base de datos clasephp, donas y tienda respectivamente.

Bienvenido muestra los productos de la tienda.

Logout permite salir de la sesiin inciada.

La pantalla principal de esta tienda es index, el presente código,  que permite al usuario ingresar o registrarse. Si no está registrado no podrá acceder a el carrito de compra, pero sí a conocernos y a las APIs.

EN conócenos se encuentran nuestros valores e historia, algo sobre cada uno de los autores.

En contacto está el formulario de contacto , así como lo las Apis de Fb, instragram, etc.
-->



<?php 
require('conexion.php');

	session_start();//se inicia una sesión que se guarda en $_SESSION

	if (isset($_SESSION["id_usuario"])) {//Esta wea pregunta si existe una sesión
		header("Location: bienvenido.php");//esto redirige
	}

	if (!empty($_POST)) {
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$password = mysqli_real_escape_string($mysqli,$_POST['password']);//investigar cómo cifrar la contraseña
		//para cachar los errores
		$error = '';
		$sql = "SELECT id_usuario,id_tipo FROM usuarios WHERE nombre_usuario ='$usuario' AND password='$password'";
		//tabla, campo usuario, lo que está en el formulario
		//para que se ejecute la query:
		//le paso la query sql a la conexión para que la ejecute y se guarda en resultado
		$result = $mysqli->query($sql);
		//separar en filas nuestro resultado
		$rows = $result->num_rows;

		if ($rows > 0) {
			$row = $result->fetch_assoc();//separa en un arreglo
			echo "$row";
			$_SESSION['id_usuario'] = $row['id_usuario'];
			$_SESSION['tipo_usuario'] = $row['id_tipo'];
			header("Location: bienvenido.php");
		}else{
			$error = "Nombre de usuario o contraseña inválidos";
		}

	}


	?>
 <!-- Esta parte creo que se puede separar en php y html, pero no logreé que funcionará -->
<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta  name = "viewport" content="width=device-width,initial-scale=1.0"/>
		<title>Inicio</title>
		<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
		<link rel="stylesheet" href="style.css">
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		 <script async defer src="https://buttons.github.io/buttons.js"></script>


		 <!--GOOGLE FONTS-->
		 <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet"> 
		 <link href="https://fonts.googleapis.com/css?family=Acme|Dosis" rel="stylesheet"> 

	</head>
	<body>
		<header>
		<!--Barra de anuncio pequeño-->
		<div class="row anuncio hide-on-small-only"><p>Aprovecha envío gratis en compras mayores a $800</p></div>

		<!--NavBar-->
		<nav class="nav-extended  z-depth-3 ">
				<div class="nav-wrapper show-on-medium-and-up hide-on-small-only">
					
					<ul class="left">
						<li><a href="conocenos.html">Conócenos</a></li>
						<li><a href="contacto.html">Contacto</a></li>
					</ul>
					<a href="index.html" class="brand-logo center"><img class="img-responsive" src="img/theaka.png" height="60" width="auto"></a>
					<ul class="right">
						<li><a href="contacto.html">Productos</a></li>
						<li><a href="cart.html"><i class="large material-icons">shopping_cart</i></a></li>
					</ul>
				</div>
		</nav>

		<!--Mobile Navbar-->
			<div class="navbarsmall">
			<div class="nav-wrapper hide-on-med-and-up">
				<img class="img-responsive logo1 center" src="img/theaka.png" >
				<a href="#" data-target="slide-out" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
					
				<ul id="slide-out" class="sidenav">
				    <li><div class="user-view">
				    	<div class="row">
				    		<div class="col s6">
				    	<img class="img-responsive logo1 center" src="img/theaka.png" >
				    	</div>
				    	<div class="col s6 right">
				    		<div class="row">
				    		<div class="col s4">	</div>
				    		<div class="col s4">	</div>
						    	<div class="col s4 right">
						    		<a href="cart.html"><i class=" waves-effect small material-icons">shopping_cart</i></a>
						    	
						    	</div>
						    </div>
				    	
				    	</div>
				   		</div>

				    </div></li>
				   
				    <li><a class="waves-effect" href="contacto.html">Contacto</a></li>
				    <li><a class="waves-effect" href="conocenos.html">Conócenos</a></li>

				    <li><div class="divider"></div></li>
				</ul>


			</div>
			</div>
		</header>

		<!--Foto de supermercado-->
 		<div class="row foto">
      	<div class="col s12"><img class="responsive-img" src="img/super.jpeg"></div>
  		</div>

  		<div class="row recomendados">	<div class="col s12"><h5>Regístrate para poder comprar</h5></div></div><br>

  		<div class="largo">
  		<a class="waves-effect waves-light btn-large" href="ingresa.html">Si ya tienes una cuenta da click aqui</a>
  		</div>

  		<div class="container">
  		<div class="row">
  			<br><br>
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          
<a class="waves-effect waves-light btn">Registrarme</a>
        </div>
      </div>
    </form>
  </div>
  </div>
        
  		
		
		<footer class="page-footer z-depth-3">
				<div class="row">
					<div class="col l4 s12">
						<h6 class="white-text">Síguenos</h6>
						<ul>
							<a class="github-button" href="https://github.com/amairanysolanamejia" aria-label="Follow @amairanysolanamejia on GitHub">Follow @amairanysolanamejia</a><br>
							<a class="github-button" href="https://github.com/anallely753" aria-label="Follow @amairanysolanamejia on GitHub">Follow @anallely753</a><br>
							<!-- Place this tag where you want the button to render. -->
<a class="github-button" href="https://github.com/KarinaFloG" aria-label="Follow @KarinaFloG on GitHub">Follow @KarinaFloG</a>
						</ul>
					</div>
					<div class="col l4 s12">
						<div class="row pagos">
							<div class="col s3"><img class="responsive-img" src="img/mastercard.png" height="30" width="auto"></div>				
							<div class="col s3"><img src="img/visa.png" height="30" width="auto"></div>
							<div class="col s3"><img src="img/paypal.png" height="30" width="auto"></div>
						</div>						
					</div>
					<div class="col l4 s12 ayuda">
						<h6 class="white-text">¿Necesitas ayuda?</h6>
						<p class="white-text">Llámanos al 5134.0034<br>
						o al 01800.367.8737</p>
					</div>
				</div>
			<div class="row todos center white-text">
					 Todos los derechos reservados  |  The AKA Store ® 2018 
			</div>
		</footer>

	</body>
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	</html>