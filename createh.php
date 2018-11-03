<!DOCTYPE html>
<html>
<head>
    <title>Agregar huevos</title>
</head>
<body>
 hhh
<fieldset>
    <legend>Agregar huevos</legend>
    <!-- CREATE TABLE huevos(
    id_huvo int(10) PRIMARY KEY,
    cantidad varchar(100) NOT NULL,
    precio float(30) NOT NULL

); -->
 
    <form action="huevos/createHuevos.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Cantidad [gr]</th>
                <td><input type="text" name="cantidad" placeholder="cantidad" /></td>
            </tr>     
            <tr>
                <th>Precio</th>
                <td><input type="text" name="precio" placeholder="precio" /></td>
            cantidad
            <tr>
                <td><button type="submit">Guardar</button></td>
                <td><a href="bienvenido.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>