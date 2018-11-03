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
    <title>Edit Member</title>
 
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }
 
        table tr th {
            padding-top: 20px;
        }
    </style>
 
</head>
<body>
 
<fieldset>
    <legend>Edit Member</legend>
 
    <form action="updateDonut.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>ID_Dona</th>
                <td><input type="text" name="id"value="<?php echo $data['id_dona'] ?>" /></td>
            </tr>     
            <tr>
                <th>Sabor</th>
                <td><input type="text" name="sabor" placeholder="Last Name" value="<?php echo $data['sabor'] ?>" /></td>
            </tr>
            <tr>
                <th>Precio</th>
                <td><input type="text" name="precio" value="<?php echo $data['precio'] ?>" /></td>
            </tr>
            <tr>
                <th>Tamaño</th>
                <td><input type="text" name="tamanio" value="<?php echo $data['tamanio'] ?>" /></td>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $data['id_dona']?>" />
                <td><button type="submit">Guardar cambios</button></td>
                <td><a href="index.php"><button type="button">Regresar</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>
 
<?php
}
?>