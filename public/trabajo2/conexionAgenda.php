<?php
    $dsn = "mysql:host=db;dbname=agenda";
    $usuario = "root";
    $password = "password";
    // usamos las credenciales de nuestra base de datos Agenda

    try{ //establecemos la conexión
        $bd = new PDO($dsn,$usuario,$password);
        $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Mensaje de la excepcion : " . $e->getMessage();
    } //fin try-catch