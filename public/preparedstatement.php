<?php

$dsn = "mysql:dbname=demo;host=db";
$usuario = "dbuser";
$password = "secret";
/*
 * 1 - preparar la consulta -> prepare
 * 2 - vincular los datos -> bindParam / bindValue
 * 3 - ejecutar la sentencia -> excute(); (query y exec no protegen contra inyecciones de sql).
 */ 
try {
    $db = new PDO($dsn, $usuario, $password);
    //establece el nivel de error que muestra en la conexion
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sentencia = $db->prepare("INSERT INTO credenciales (nombreusu, password) VALUES  (? , ?)");//(:nombre, :clave) "); //tiene que ir con : por sintaxis
    $nombre = "Alicia";
    $clave1 = "sombrero";
    //vinculo los valores:
    $sentencia->bindParam(1,$nombre);
    $sentencia->bindParam(2,$clave1); //no tiene que llamarse igual
    /*$sentencia->bindValue(":nombre",$nombre);
    $sentencia->bindValue(":clave",$clave1); //no tiene que llamarse igual*/

    //$nombre = "Pedro";
    //$clave1 = "789";
    $sentencia->execute(); //ejecutar la sentencia

    echo "<h2>Exito</h2>";
    
} catch (PDOException $e) {
    echo "Error producido al conectar " . $e->getMessage();
}