<?php
    if (isset($_POST['nombre'])) {
      $nombre = $_POST['nombre'];
    }
    if (isset($_POST['direccion'])) {
        $direccion = $_POST['direccion'];
    }
    if (isset($_POST['telefono'])) {
        $telefono = $_POST['telefono'];
    }
    if (isset($_POST['email'])) {
      $email = $_POST['email'];
    }
     //comprobamos si tenemos todos los datos para insertar
    try
    {
      
      require "../funciones/conexionAgenda.php";
      $sql = "INSERT INTO `empresa` (`nombre`, `direccion`, `telefono`,  `email`) VALUES ('$nombre','$direccion','$telefono','$email')";
      $sentencia= $bd->prepare($sql);
      $sentencia->execute();
      echo "El contacto ha sido insertado con éxito, <a href='../empresa.php'>vuelve atrás</a> para confirmar";
    }
    catch(Exception $e)
      {
        $error = $e->getMessage();
      }
    