<?php 
    require "conexionAgenda.php";
    $fichero = simplexml_load_file("agenda.xml");
        foreach($fichero->children() as $fila){
            $atributo= $fila->attributes();
            if($atributo == 'persona'){
                $nombre=$fila->nombre;
                $apellidos=$fila->apellidos;
                $direccion=$fila->direccion;
                $telefono=$fila->telefono;
                $sentencia = $bd->prepare("INSERT INTO persona (nombre,apellidos,direccion,telefono) VALUES ('"
                . $nombre . "','" . $apellidos . "','"
                . $direccion . "','" . $telefono . "');");
                $sentencia->execute();
                
            }
            if($atributo == 'empresa'){
                $nombre=$fila->nombre;
                $direccion=$fila->direccion;
                $telefono=$fila->telefono;
                $email=$fila->email;
                $sentencia = $bd->prepare("INSERT INTO empresa (nombre,direccion,telefono,email) VALUES ('"
                . $nombre . "','" . $direccion . "','"
                . $telefono . "','" . $email . "');");
                $sentencia->execute();
                
            }
        }
    echo "Contactos insertados en la base de datos con éxito.";
    
    
    /* cargar archivo xml con simplexml_load_file();
    require conexionbbdd.php
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