<?php 
 
require_once '../conxh.php';
/*CREATE TABLE huevos(
    id_huvo int(10) PRIMARY KEY,
    cantidad varchar(100) NOT NULL,
    precio float(30) NOT NULL

);*/
 
if($_POST) {
    $cantidad= $_POST['cantidad'];
    $precio = $_POST['precio'];
 
    $sql = "INSERT INTO huevos (cantidad, precio) VALUES ('$cantidad', '$precio')";
    if($mysqli->query($sql) === TRUE) {
        echo "<p>Nueva dona creada</p>";
        echo "<a href='../createh.php'><button type='button'>Regresar</button></a>";
        echo "<a href='../bienvenido.php'><button type='button'>Inicio</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }
 
    $mysqli->close();
}
 
?>