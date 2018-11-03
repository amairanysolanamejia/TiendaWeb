<!DOCTYPE html>
<html>
<head>
    <title>Agregar dona</title>
</head>
<body>
<fieldset>
    <legend>Agregar dona</legend>
 
    <form action="crudonut/createDonut.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Sabor</th>
                <td><input type="text" name="sabor" placeholder="sabor" /></td>
            </tr>     
            <tr>
                <th>Precio</th>
                <td><input type="text" name="precio" placeholder="precio" /></td>
            </tr>
            <tr>
                <th>Tamaño</th>
                <td><input type="text" name="tamanio" placeholder="tamanio" /></td>
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