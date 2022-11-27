<?php
    if (isset($_POST['nombre'])) {
      $nombre = $_POST['nombre'];
    }
    if (isset($_POST['apellidos'])) {
        $apellidos = $_POST['apellidos'];
    }
    if (isset($_POST['direccion'])) {
        $direccion = $_POST['direccion'];
    }
    if (isset($_POST['telefono'])) {
        $telefono = $_POST['telefono'];
    }
    try
    {
      
      require "../funciones/conexionAgenda.php";
      $sql = "INSERT INTO `persona` (`nombre`, `apellidos`, `direccion`, `telefono`) VALUES ('$nombre','$apellidos','$direccion','$telefono')";
      $sentencia= $bd->prepare($sql);
      $sentencia->execute();
      echo "El contacto ha sido insertado con éxito, <a href='../persona.php'>vuelve atrás</a> para confirmar";
    }
    catch(Exception $e)
      {
        $error = $e->getMessage();
      }
    