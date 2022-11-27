<?php
/*
require "funciones/conexionAgenda.php"; //conectamos con la base de datos
        $sql = "SELECT * FROM credenciales WHERE usuario = '$usuario'"; //seleccionamos los datos de la tabla de credenciales cuyo usuario sea el que el se introduce en el formulario
        $sentencia = $bd->prepare($sql); 
        $sentencia->execute(); //ejecuto la sentencia
        $credenciales = $sentencia->fetchAll(PDO::FETCH_OBJ); //al ejecutar guardamos en un objeto credenciales el usuario y contraseña
        
        foreach($credenciales as $credencial){
            $clave = $credencial->password; //recogemos la contraseña en la variable clave
            if(password_verify($clave,$contrasenya)){ //verificamos la contraseña
                return true;
            } else {
                return false;
            }
        }
*/
    if($_SERVER["REQUEST_METHOD"] === "POST"){ //Si el metodo con el que recojo los datos es post
        if(isset($_POST['envio'])){ //Si esta establecida la variable envio
            if(!empty($_POST['usuario'])){
                $usuario = $_POST['usuario'];
                $_SESSION['usuario'] = $usuario;
            }
            if(!empty($_POST['password'])){
                $passwd = $_POST['password'];
            }
        }
    }
    
        if(isset($_POST["envio"])){  
            $credentials = comprobarCredenciales($_POST["usuario"],$_POST["password"]); //la funcion devuelve array o falso.
            if($credentials === false){ // si la comprobacion devuelve falso
                $error = 1; //el codigo de error es 1
            } else {
                session_start(); //iniciamos la sesion
                $_SESSION["loginok"] = $credentials;
                header("Location: principal.php");
            }
        }
    /* Esta función comprueba la validez del usuario y la contraseña que introducimos como parámetros
    sacando los datos de la tabla Credenciales de la base de datos Agenda*/
    function validarCredencialesBD($usuario, $passwd){
    require "conexionAgenda.php"; //conectamos con la base de datos
    $sql = "SELECT * FROM credenciales WHERE usuario = '$usuario'"; //seleccionamos los datos de la tabla de credenciales 
    $sentencia = $bd->prepare($sql); 
    $sentencia->execute(); 
    $credenciales = $sentencia->fetchAll(PDO::FETCH_OBJ); 
        if($sentencia -> rowCount() > 0)   { // si la tabla no está vacía
            foreach($credenciales as $credencial) { //recorremos las credenciales
                if($credencial->usuario === $usuario){ //si el usuario de la BD coincide con el usuario que introducimos
                    $passwd = $credencial->password;
                    if(password_verify($contrasenya,$passwd)){ //verificamos la contraseña
                        return true;
                    } else {
                        return false;
                    }
                }
            } //fin foreach
        } //fin if
    } //fin funcion
        
        function comprobarCredenciales($usuario, $clave){
           if (validarCredencialesBD($usuario,$clave)){
                if($usuario === "normaluser" && $clave === "usudwes"){
                    $credenciales["usuario"] = "normaluser";
                    $credenciales["rol"] = 0;
                    return $credenciales;
                }
                if($usuario === "adminuser" && $clave === "admindwes"){
                    $credenciales["usuario"] = "adminuser";
                    $credenciales["rol"] = 1;
                    return $credenciales;
                }
            }
            return false;
        } //funcion

        
?>
<!--este trozo de codigo de arriba solo se ejecuta cuando le das a submit-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

</head>
<body>
    <h2>Página de acceso</h2>
    <?php 
        if(isset($error) && $error == 1){
            echo "<p><font color=\"red\">Credenciales invalidas.</font></p>";
        }
    ?>
  <form name="formulario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <p>
            <label for="usuario">Introduce Usuario: </label>
            <input type="text" name="usuario" id="usuario">
        </p>
        <p>
            <label for="password">Introduce la contraseña: </label>
            <input type="password" name="password" id="password">
        </p>
        <br>
        <input type="submit" name="envio" id="envio" value="Enviar">
</body>
</html>