<?php
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
    }
    try
    {
      require "../funciones/conexionAgenda.php";
      $empresas= $bd->query("SELECT * FROM empresa WHERE `nombre`='$nombre'")->fetchAll();
      foreach($empresas as $empresa) {
        echo "Información del contacto: <br>";
        echo "Nombre:" . $empresa['nombre'] . "<br>";
        echo "Direccion:" . $empresa['direccion'] . "<br>";
        echo "Telefono:" . $empresa['telefono'] . "<br>";
        echo "Email:" . $empresa['email'] . "<br>";
        echo "<a href='../empresa.php'>Volver atrás</a>";
        }//fin foreach
    }catch(Exception $e){
      $error = $e->getMessage();
    }