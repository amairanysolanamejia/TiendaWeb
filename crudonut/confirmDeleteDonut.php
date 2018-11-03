<?php 
 
require_once '../conx.php';
 
if($_GET['id']) {
    $id = $_GET['id'];
 
    $sql = "SELECT * FROM donas WHERE id_dona = {$id}";
    $result = $mysqli->query($sql);
 
    $data = $result->fetch_assoc();
 
    $mysqli->close();
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Eliminar dona</title>
</head>
<body>
 
<h3>¿Seguro que deseas eliminar esa dona?</h3>
<form action="deleteDonut.php" method="post">
 
    <input type="hidden" name="id" value="<?php echo $data['id_dona'] ?>" />
    <button type="submit">Guardar cambios</button>
    <a href="index.php"><button type="button">Regresar</button></a>
</form>
 
</body>
</html>
 
<?php
}
?>