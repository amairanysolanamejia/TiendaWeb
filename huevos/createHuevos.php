<?php 
 
require_once '../conxh.php';
/*CREATE TABLE huevos(
    id_huevos int(10) PRIMARY KEY,
    caracteristicas varchar(100) NOT NULL,
    precio float(30) NOT NULL

);*/
 
if($_POST) {
    $cantidad= $_POST['caracteristicas'];
    $precio = $_POST['precio'];
 
    $sql = "INSERT INTO huevos (caracteristicas, precio) VALUES ('$caracteristicas', '$precio')";
    if($mysqli->query($sql) === TRUE) {
        echo "<p>Nuevos huevos creada</p>";
        echo "<a href='../createh.php'><button type='button'>Regresar</button></a>";
        echo "<a href='../bienvenido.php'><button type='button'>Inicio</button></a>";
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }
 
    $mysqli->close();
}
 
?>