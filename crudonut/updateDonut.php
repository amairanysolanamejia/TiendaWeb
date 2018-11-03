<?php  
require_once '../conx.php';
 
if($_POST) {
    $sabor = $_POST['sabor'];
    $precio = $_POST['precio'];
    $tamanio = $_POST['tamanio'];
 
    $id = $_POST['id'];
 
    $sql = "UPDATE donas SET sabor = '$sabor', precio = '$precio', tamanio = '$tamanio' WHERE id_dona = {$id}";
    if($mysqli->query($sql) === TRUE) {
        echo "<p>Dona actualizada</p>";
        echo "<a href='editDonut.php?id=".$id."'><button type='button'>Regresar</button></a>";
        echo "<a href='../index.php'><button type='button'>Ir al inicio</button></a>";
    } else {
        echo "Ocurrió un error al actualizar". $mysqli->error;
    }
 
    $mysqli->close();
 
}
 
?>