<?php
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
    }
    try
    {
      require "../funciones/conexionAgenda.php";
      $sql = "DELETE FROM `empresa` WHERE `nombre`= '$nombre'";
      $sentencia= $bd->prepare($sql);
      $sentencia->execute();
      echo "El contacto ha sido borrado con éxito, <a href='../empresa.php'>vuelve atrás</a> para confirmar";
    }
    catch(Exception $e)
      {
        $error = $e->getMessage();
      }
    