<?php 

    try
  {
    require "funciones/conexionAgenda.php";
    $sql = 'SELECT * FROM empresa';
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
      <h1>Agenda de Empresas</h1>
        <h2>Contactos Existentes</h2>
        <table>
            <tr>
              <th>Nombre</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th>email</th>
            </tr>
            <tr>
                <td>
                    <?php 
                    $empresas= $bd->query('SELECT * FROM empresa')->fetchAll();
                    foreach($empresas as $empresa) {
                        echo $empresa['nombre'] . "<br>";
                    }?>
                </td>
                <td>
                    <?php 
                    $empresas= $bd->query('SELECT * FROM empresa')->fetchAll();
                    foreach($empresas as $empresa) {
                        echo $empresa['direccion'] . "<br>";
                    }?>
                </td>
                <td>
                    <?php 
                    $empresas= $bd->query('SELECT * FROM empresa')->fetchAll();
                    foreach($empresas as $empresa) {
                        echo $empresa['telefono'] . "<br>";
                    }?>
                </td>
                <td>
                <?php 
                    $empresas= $bd->query('SELECT * FROM empresa')->fetchAll();
                    foreach($empresas as $empresa) {
                        echo $empresa['email'] . "<br>";
                    }?>
                </td>
            </tr>
        </table>

        <h2>Agregar un contacto</h2>
        <form action="empresa/insertar.php" method="post">
            <p><label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            </p>
            <p><label for="direccion">Direccion</label>
            <input type="text" name="direccion" placeholder="direccion" required>    
            </p>
            <p><label for="telefono">Telefono</label>
            <input type="text" name="telefono" placeholder="telefono" required>    
            </p>
            <p><label for="email">email</label>
            <input type="text" name="email" placeholder="email" required>    
            </p>
          <input type="submit" name="agregar" value="Agregar contacto">
        </form>
        <h2>Buscar un contacto</h2>
        <form action="empresa/buscar.php" method="post">
            <p><label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            </p>
            <input type="submit" name="buscar" value="Buscar contacto">
        </form>
        <h2>Borrar un contacto</h2>
        <form action="empresa/borrar.php" method="post">
            <p><label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            </p>
            <input type="submit" name="borrar" value="Borrar contacto">
        </form>
        <h2>Actualizar un contacto</h2>
        <form action="empresa/actualizar.php" method="post">
            <p><label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            </p>
            <p><label for="email">email</label>
            <input type="text" name="email" placeholder="email" required>    
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
        <p><a href="persona.php">Agenda de Personas</a>
  </body>
</html>