<?php 
    
    $dsn = "mysql:host=db;dbname=agenda";
    $usuario = "root";
    $password = "password";
    
    try{
        $bd = new PDO($dsn,$usuario,$password);
        echo "Exito";
    }catch(PDOException $e){
        echo "Mensaje de la excepcion : " . $e->getMessage();
    }


    /* cargar archivo xml con simplexml_load_file();
    require conexionbbdd.php
    $sentencia = create table
    if($bd->execute($sentencia) === TRUE){
        echo "exito"; 
    }

    recorres con un for each los hijos del xml
    $fichero ->children() as $fila 
     $atributo = $fila -> attributes(); 
     if($atributo['tipo'] === 'persona'){

     }
     if($atributo['tipo'] === 'persona'){

     }
    */