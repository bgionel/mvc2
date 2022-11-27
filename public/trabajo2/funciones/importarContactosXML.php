<?php 
    require "conexionAgenda.php"; //conexión a la base de datos Agenda
    $fichero = simplexml_load_file("agenda.xml"); // cargamos el fichero agenda.xml
        foreach($fichero->children() as $fila){ // recorremos todos los hijos del xml (serían los contactos)
            $atributo= $fila->attributes(); // obtenemos el atributo del contacto (que es de tipo persona o empresa) 
            if($atributo == 'persona'){ // si el contacto es de tipo persona insertamos en la tabla persona
                $nombre=$fila->nombre;
                $apellidos=$fila->apellidos;
                $direccion=$fila->direccion;
                $telefono=$fila->telefono;
                $sentencia = $bd->prepare("INSERT INTO persona (nombre,apellidos,direccion,telefono) VALUES ('"
                . $nombre . "','" . $apellidos . "','"
                . $direccion . "','" . $telefono . "');");
                $sentencia->execute();
                
            } //fin if
            if($atributo == 'empresa'){ // si el contacto es de tipo empresa insertamos en la tabla empresa
                $nombre=$fila->nombre;
                $direccion=$fila->direccion;
                $telefono=$fila->telefono;
                $email=$fila->email;
                $sentencia = $bd->prepare("INSERT INTO empresa (nombre,direccion,telefono,email) VALUES ('"
                . $nombre . "','" . $direccion . "','"
                . $telefono . "','" . $email . "');");
                $sentencia->execute();
                
            } //fin if
    } //fin foreach
    echo "Contactos insertados en la base de datos con éxito.";
