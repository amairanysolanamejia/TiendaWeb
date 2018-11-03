<?php 
 
require_once '../conx.php';
 
if($_POST) {
    $sabor= $_POST['sabor'];
    $precio = $_POST['precio'];
    $tamanio = $_POST['tamanio'];
 
    $sql = "INSERT INTO donas (sabor, precio, tamanio) VALUES ('$sabor', '$precio', '$tamanio')";
    if($mysqli->query($sql) === TRUE) {
        echo "<p>Nueva dona creada</p>";
        echo "<a href='../create.php'><button type='button'>Regresar</button></a>";
        echo "<a href='../welcome.php'><button type='button'>Inicio</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }
 
    $mysqli->close();
}
 
?>