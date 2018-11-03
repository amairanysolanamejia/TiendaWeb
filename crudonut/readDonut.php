<?php require_once '../conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Read donut</title>
</head>
<body>
  <div >
    <a href="bienvenido.php"><button type="button">Regresar</button></a>
    <table border="1" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th>ID Dona</th>
          <th>Sabot</th>
          <th>Precio</th>
          <th>Tamanio</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM donas";
        $result = $mysqli->query($sql);

        if($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>".$row['id_dona']." </td>
            <td>".$row['sabor']."</td>
            <td>".$row['precio']."</td>
            <td>".$row['tamanio']."</td>
            <td>
            <a href='update.php?id=".$row['id_dona']."'><button type='button'>Editar</button></a>
            <a href='delete.php?id=".$row['id_dona']."'><button type='button'>Eliminar</button></a>
            </td>
            </tr>";
          }
        } else {
          echo "<tr><td colspan='5'><center>No hay donas disponibles</center></td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>