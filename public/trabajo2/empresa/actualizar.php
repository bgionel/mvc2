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
    try
    {
      require "../funciones/conexionAgenda.php";
      $sql = "UPDATE `empresa` SET `nombre`='$nombre',`direccion`='$direccion',`telefono`='$telefono', `email`='$email' WHERE `nombre`='$nombre'";
      $sentencia= $bd->prepare($sql);
      $sentencia->execute();
      echo "El contacto ha sido actualizado con éxito, <a href='../empresa.php'>vuelve atrás</a> para confirmar";
    }
    catch(Exception $e)
      {
        $error = $e->getMessage();
      }