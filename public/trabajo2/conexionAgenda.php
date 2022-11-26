<?php
    $dsn = "mysql:host=db;dbname=agenda";
    $usuario = "root";
    $password = "password";
    

    try{
        $bd = new PDO($dsn,$usuario,$password);
        $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo "Mensaje de la excepcion : " . $e->getMessage();
    }