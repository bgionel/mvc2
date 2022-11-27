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
      $sql = "UPDATE `persona` SET `nombre`='$nombre',`apellidos`='$apellidos',`direccion`='$direccion',`telefono`='$telefono' WHERE `nombre`='$nombre'";
      $sentencia= $bd->prepare($sql);
      $sentencia->execute();
      echo "El contacto ha sido actualizado con éxito, <a href='../persona.php'>vuelve atrás</a> para confirmar";
    }
    catch(Exception $e)
      {
        $error = $e->getMessage();
      }