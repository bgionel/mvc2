<?php 

    try
  {
    require "funciones/conexionAgenda.php";
    $sql = 'SELECT * FROM persona';
    $sentencia= $bd->prepare($sql);
    $sentencia->execute();
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
    <link rel="stylesheet" href="css/estilos.css">
  </head>
  <body>
    <div class="contenedor">
      <h1>Agenda de Contactos</h1>
      <div class="contactos existentes">
        <h2>Contactos Existentes</h2>
        <table>
            <tr>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Dirección</th>
              <th>Teléfono</th>
            </tr>
            <tr>
                <td>
                    <?php 
                    $personas= $bd->query('SELECT * FROM persona')->fetchAll();
                    foreach($personas as $persona) {
                        echo $persona['nombre'] . "<br>";
                    }?>
                </td>
                <td>
                    <?php 
                    $personas= $bd->query('SELECT * FROM persona')->fetchAll();
                    foreach($personas as $persona) {
                        echo $persona['apellidos'] . "<br>";
                    }?>
                </td>
                <td>
                    <?php 
                    $personas= $bd->query('SELECT * FROM persona')->fetchAll();
                    foreach($personas as $persona) {
                        echo $persona['direccion'] . "<br>";
                    }?>
                </td>
                <td>
                <?php 
                    $personas= $bd->query('SELECT * FROM persona')->fetchAll();
                    foreach($personas as $persona) {
                        echo $persona['telefono'] . "<br>";
                    }?>
                </td>
            </tr>
        </table>
      </div>

        <h2>Agregar un contacto</h2>
        <form action="persona/insertar.php" method="post">
            <p><label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            </p>
            <p><label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" placeholder="Apellidos" required>    
            </p>
            <p><label for="direccion">Direccion</label>
            <input type="text" name="direccion" placeholder="direccion" required>    
            </p>
            <p><label for="telefono">Telefono</label>
            <input type="text" name="telefono" placeholder="telefono" required>    
            </p>
          <input type="submit" name="agregar" value="Agregar contacto">
        </form>

        <h2>Borrar un contacto</h2>
        <form action="persona/borrar.php" method="post">
            <p><label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            </p>
            <input type="submit" name="borrar" value="Borrar contacto">
        </form>
        <h2>Actualizar un contacto</h2>
        <form action="persona/actualizar.php" method="post">
            <p><label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            </p>
            <p><label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" placeholder="Apellidos" required>    
            </p>
            <p><label for="direccion">Direccion</label>
            <input type="text" name="direccion" placeholder="direccion" required>    
            </p>
            <p><label for="telefono">Telefono</label>
            <input type="text" name="telefono" placeholder="telefono" required>    
            </p>
            <input type="submit" name="actualizar" value="Actualizar contacto">
        </form>
        
        <p><a href="principal.php">Volver atrás</a>
      </div>
    </div>
  </body>
</html>