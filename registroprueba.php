<?php 
	session_start();
	require 'conexion.php'; //importando la conexión, sin esto no se puede hacer query
	//esto no funciona, pero para seguridad multinivel
	$sql = "SELECT id_tipo,tipo FROM tipo_usuario";
	$result = $mysqli->query($sql);
	$bandera = false;
	if(!empty($_POST)){
		$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
		$usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
		$password = mysqli_real_escape_string($mysqli, $_POST['password']);
		$tipo_usuario = mysqli_real_escape_string($mysqli, $_POST['tipo_usuario']);
		$error = "";
		//query para el usuario
		$sqlUsuario = "SELECT id_usuario FROM usuarios WHERE nombre_usuario = '$usuario'";
		$resultUsuario = $mysqli->query($sqlUsuario);
		$rows = $resultUsuario->num_rows;
		if($rows >0){
			//manda error, porque significa que ya estoy registrando un usuario
			$error = "El usuario ya existe";
		}else{
			$sqlPersonal = "INSERT INTO personal (nombre) VALUES ('$nombre')";
			$resultPersonal = $mysqli->query($sqlPersonal);
			$idPersonal = $mysqli->insert_id;
			$sqlUsuarios = "INSERT INTO usuarios(nombre_usuario,password,id_personal,id_tipo) VALUES ('$usuario','$password','$idPersonal','$tipo_usuario')";
			$resultUsuarios = $mysqli->query($sqlUsuarios);
			$bandera = true;
			 //la bandera si es mayor a 0, es admin, si no, es normal
		}
	}
 ?>
 <!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta  name = "viewport" content="width=device-width,initial-scale=1.0"/>
		<title>Registro</title>
		<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
		<link rel="stylesheet" href="style.css">
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		 <script async defer src="https://buttons.github.io/buttons.js"></script>


		 <!--GOOGLE FONTS-->
		 <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet"> 
		 <link href="https://fonts.googleapis.com/css?family=Acme|Dosis" rel="stylesheet"> 

		<script>
			function validarNombre() //valida si existe nombre
			{
				valor = document.getElementById("nombre").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar Nombre');
					return false;
				} else { return true;}
			}
			
			function validarUsuario() //valida si existe usuario
			{
				valor = document.getElementById("usuario").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar Usuario');
					return false;
				} else { return true;}
			}
			
			function validarPassword()
			{
				valor = document.getElementById("password").value;
				if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
					alert('Falta Llenar Password');
					return false;
					} else { 
					valor2 = document.getElementById("con_password").value;
					
					if(valor == valor2) { return true; }
					else { alert('Las contraseña no coinciden'); return false;}
				}
			}
			
			function validarTipoUsuario()
			{
				indice = document.getElementById("tipo_usuario").selectedIndex;
				if( indice == null || indice==0 ) {
					alert('Seleccione tipo de usuario');
					return false;
				} else { return true;}
			}
			
			function validar()
			{
				if(validarNombre() && validarUsuario() && validarPassword() && validarTipoUsuario())
				{
					document.registro.submit();
				}
			}
		</script>
		
	</head>
	
	<body>

		<header>
		<!--Barra de anuncio pequeño-->
		<div class="row anuncio hide-on-small-only"><p>Checha nuestros nuevos productos</p></div>

		<!--NavBar-->
		<nav class="nav-extended  z-depth-3 ">
				<div class="nav-wrapper show-on-medium-and-up hide-on-small-only">
					
					<ul class="left">
						<li><a href="conocenos.html">Conócenos</a></li>
					</ul>
					<a href="index.php" class="brand-logo center"><img class="img-responsive" src="img/theaka.png" height="60" width="auto"></a>
					<ul class="right">
						<li><a href="contacto.html">Contacto</a></li>

						<!-- <li><a href="contacto.html">Productos</a></li> -->
						<!-- <li><a href="cart.html"><i class="large material-icons">shopping_cart</i></a></li> -->
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
						    		<!-- <a href="cart.html"><i class=" waves-effect small material-icons">shopping_cart</i></a> -->
						    	
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

<!-- -->
<div class="container">
 
    <div class="row">
    <form id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input id="nombre" name="nombre" type="text">
          <label for="last_name">Nombre</label>
        </div>
        <div class="input-field col s6">
          <input id="usuario" name="usuario" type="text">
          <label for="last_name">Usuario</label>
        </div>
      </div>
      <div class="row">
      <div class="input-field col s6">
          <input id="password" name="password" type="password">
          <label for="password">Contraseña</label>
        </div>
        <div class="input-field col s6">
          <inputid="con_password" name="con_password" type="password">
          <label for="password">Confirmar contraseña</label>
        </div>
    </div>

        <div class="row">
        <div class="input-field col s12">
        <div><label>Tipo Usuario:</label>
				<select id="tipo_usuario" name="tipo_usuario">
					<option value="0">Seleccione tipo de usuario...</option>
					<?php while($row = $result->fetch_assoc()){ ?>
						<option value="<?php echo $row['id']; ?>">
							<?php echo $row['tipo']; ?>
							</option>
					<?php }?>
				</select>
			</div>
		</div></div>
		 <div class="row">
		<div class="col s12"><input name="registar" type="button" value="Registrar" onClick="validar();"></div> 
		</div>

      </div>
    </form>
  </div>
        
          
  </div>

<!-- -->

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