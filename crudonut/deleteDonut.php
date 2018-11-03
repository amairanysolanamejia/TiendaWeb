<?php 
 
require_once '../conx.php';
 
if($_POST) {
    $id = $_POST['id'];
 
    $sql = "DELETE FROM donas WHERE id_dona={$id}";
    
    if($mysqli->query($sql) === TRUE) {
    
        echo "<p>Dona borrada :C</p>";
        echo "<a href='../bienvenido.php'><button type='button'>Regresar</button></a>";
    } else {
        echo "Ocurrió un error al eliminar" . $mysqli->error;
    }
 
    $mysqli->close();
}
 
?>