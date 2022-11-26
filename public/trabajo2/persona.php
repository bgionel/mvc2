<?php 
    
    $dsn = "mysql:host=db;dbname=agenda";
    $usuario = "root";
    $password = "password";
    $fichero = simplexml_load_file("agenda.xml");
    

    try{
        $bd = new PDO($dsn,$usuario,$password);
        $sql = "INSERT INTO Persons (nombre varchar(255), apellidos varchar(255)); ";
        $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        foreach ($fichero ->children() as $fila ){
            $atributo = $fila -> attributes();
        }
        $sentencia = $bd->prepare($sql);
        $nombre = "Alicia";
        $apellidos = "sombrero";
        //vinculo los valores:
        $sentencia->bindParam(1,$nombre);
        $sentencia->bindParam(2,$apellidos); 
        $sentencia->execute();
        echo "Exito";
    }catch(PDOException $e){
        echo "Mensaje de la excepcion : " . $e->getMessage();
    }