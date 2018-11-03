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
		<title>Inicia sesión</title>
		<link rel="stylesheet" type="text/css" href="css/materialize.min.css">

	</head>
	<body>
		<header>

			<nav class="nav-extended amber darken-1">
				<div class="nav-wrapper">
					<a href="#" class="brand-logo">Logo</a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">Menú</i></a>
					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li><a href="carrito.html">Carrito de compra</a></li>
						<li><a href="badges.html">Formas de pago</a></li>
						<li><a href="conocenos.html">Conócenos</a></li>
						<li><a href="contacto.html">Contacto</a></li>

					</ul>
				</div>

			</nav>

			<ul class="sidenav" id="mobile-demo">
				<li><a href="carrito.html">Carrito de compra</a></li>
				<li><a href="badges.html">Formas de pago</a></li>
				<li><a href="conocenos.html">Conócenos</a></li>
				<li><a href="contacto.html">Contacto</a></li>

			</ul>
		</header>

		<h1>Bienvenido a AKA, la mejor tienda online.</h1>
		<h3>El primer paso es iniciar sesión, si no tienes una, regístrate.</h3>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

			<div>
				<label> Usuario: </label>
				<input id="usuario" name="usuario" type="text">
			</div>
			<br>
			<div><label>Contraseña: </label>
				<input id="password" name="password" type="password">
			</div>
			<br>
			<div>
				<input name="login" value="Iniciar Sesión" type="submit">
			</div>
			<br>
		</form>
		<a href="registro.php">Registrarse</a>
		<div style="font-size: 16px;color: #cc0000;">
			<?php echo isset($error)?utf8_decode($error):''; ?>
		</div>
		<footer class="page-footer amber darken-1">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">Footer Content</h5>
						<p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
					</div>
					<div class="col l4 offset-l2 s12">
						<h5 class="white-text">Links</h5>
						<ul>
							<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
							<li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					© 2014 Copyright Text
					<a class="grey-text text-lighten-4 right" href="#!">More Links</a>
				</div>
			</div>
		</footer>
	</body>
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	</html>