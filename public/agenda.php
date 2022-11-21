<?php

    class Agenda{
        protected $usuario = null; //se debe llamar igual que la columna.
        protected $password = null;

        /*
            1- Preparar la consulta -> prepare
            2- Establecer el modo de recuperacion -> FETCH_CLASS, FETCH_ASSOC ...
            3- Ejecutar la consulta -> execute 
            4- Recuperar los registros (filas): fetch(un registro) / fetchAll (devuelve todos los registros)
        */
        public static function all(){
            $dsn = "mysql:host=db;dbname=agenda";
            $usuario = "root";
            $password = "password";
            try{
                $db = new PDO($dsn,$usuario,$password);
                //establece el nivel de error ue muestra la conexion
                $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM credenciales";
                $sentencia = $db->prepare($sql);
                $sentencia -> setFetchMode(PDO::FETCH_CLASS,"Agenda");
                $sentencia -> execute();
                $sentencia ->fetch();
                /*while($obj = $sentencia->fetch()){
                    //print_r($obj);
                    echo "<br>NOMBRE: " . $obj->usuario;
                    echo "<br>CONTRASEÑA: " . $obj->password;
                } //fin while*/
                $credenciales = $sentencia->fetchAll(PDO::FETCH_CLASS,"Agenda");
                foreach($credenciales as $credencial){
                    echo "<br> NOMBRE : " . $credencial->usuario;
                    echo "<br> CONTRASEÑA : " . $credencial->password;
                }

            } catch (PDOException $e) {
                echo "<br>Error conexion: " . $e->getMessage();
            }
        } //fin all
        

    } //fin clase

    echo "<h2>Recuperando registros</h2>";
    Agenda::all();
