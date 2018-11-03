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
		<title>Registro</title>
		
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
		
		<form id="registro" name="registro" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
			<div><label>Nombre:</label><input id="nombre"name="nombre" type="text" ></div>
			<br />
			
			<div><label>Usuario:</label><input id="usuario" name="usuario" type="text"></div>
			<br />
			
			<div><label>Password:</label><input id="password" name="password" type="password"></div>
			<br />
			
			<div><label>Confirmar Password:</label><input id="con_password" name="con_password" type="password"></div>
			<br />
			
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

			
			<div><input name="registar" type="button" value="Registrar" onClick="validar();"></div> 
		
		</form>
		
		<?php if($bandera) { ?>
			<h1>Registro exitoso</h1>
			<a href="bienvenido.php">Regresar</a>
			<?php }else{ ?>
			<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
			
		<?php } ?>
	</body>
</html>