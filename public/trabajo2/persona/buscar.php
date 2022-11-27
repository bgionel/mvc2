<?php
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
    }
    try
    {
      require "../funciones/conexionAgenda.php";
      $personas= $bd->query("SELECT * FROM persona WHERE `nombre`='$nombre'")->fetchAll();
      foreach($personas as $persona) {
        echo "Información del contacto: <br>";
        echo "Nombre:" . $persona['nombre'] . "<br>";
        echo "Apellidos:" . $persona['apellidos'] . "<br>";
        echo "Direccion:" . $persona['direccion'] . "<br>";
        echo "Telefono:" . $persona['telefono'] . "<br>";
        echo "<a href='../persona.php'>Volver atrás</a>";
        }//fin foreach
    }catch(Exception $e){
      $error = $e->getMessage();
    }