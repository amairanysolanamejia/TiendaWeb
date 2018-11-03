<!DOCTYPE html>
<html>
<head>
    <title>Agregar huevos</title>
</head>
<body>
 hhh
<fieldset>
    <legend>Agregar huevos</legend>
 
    <form action="productos/crearhuevos.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Cantidad</th>
                <td><input type="text" name="sabor" placeholder="sabor" /></td>
            </tr>     
            <tr>
                <th>Precio</th>
                <td><input type="text" name="precio" placeholder="precio" /></td>
            </tr>
            <tr>
                <td><button type="submit">Guardar</button></td>
                <td><a href="bienvenido.php"><button type="button">Back</button></a></td>
            </tr>
        </table>
    </form>
 
</fieldset>
 
</body>
</html>