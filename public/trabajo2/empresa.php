<?php

try
  {
    require "funciones/conexionAgenda.php";
    $sql = 'SELECT * FROM persona';
    $resultado = $bd->query($sql);
  }
  catch(Exception $e)
    {
      $error = $e->getMessage();
    }

?>



<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <title>Agenda PHP</title>
    <link rel="stylesheet" href="css/estilos.css" media="screen">
  </head>
  <body>
    <div class="contenedor">
      <h1>Agenda de Contactos</h1>

      <div class="contenido">
        <h2>Nueva Contacto de Persona</h2>
        <form action="crear.php" method="post">
          <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">
          </div>
          <div class="campo">
            <label for="numero">Numero</label>
            <input type="text" name="numero" id="numero" placeholder="Numero Telefonico">
          </div>
          <input type="submit" value="Agregar">
        </form>
      </div>
      <div class="contenido existentes">
        <h2>Contactos Existentes</h2>
        <p>
          Número de contactos: <?php echo $resultado->num_rows;?>
        </p>
        <table>
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th>Editar</th>
              <th>Borrar</th>
            </tr>
          </thead>
          <tbody>
            <?php while($registros = $resultado->fetchAll(PDO::FETCH_OBJ) ) {?>
              <tr >
                <td><?php echo $registros['Nombre']; ?></td>
                <td><?php echo $registros['Telefono']; ?></td>
                <td><a href="editar.php?id=<?php echo $registros['id']; ?>">Editar</a></td>
                <td ><a class="borrar" href="borrar.php?id=<?php echo $registros['id']; ?>">Borrar</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>