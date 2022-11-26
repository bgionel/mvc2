<?php
    /* usuario: normaluser ; password: usudwes
       usuario: useruser ; password: admindwes
       hash(normaluser) $2y$10$kG2p/4hVn6sZKNsTo6Je4uWWdO4cqZii2MBm2LPNuaes3cbNI.os2
       hash(adminuser) $2y$10$73wSQqyAYSbk3YSJ1K0Yu.Tyo0xNvPcPCupGArTRwX5D1jQVzJZO2
    */
    //password_hash('usudwes');
    require "conexionAgenda.php";
        $hash = '$2y$10$kG2p/4hVn6sZKNsTo6Je4uWWdO4cqZii2MBm2LPNuaes3cbNI.os2';
            $sql = "SELECT * FROM credenciales";
            $sentencia = $bd->prepare($sql);
            $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
            $sentencia -> execute();
            $sentencia ->fetch();
            $credenciales = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            
        foreach($credenciales as $credencial){
            echo "<br> NOMBRE : " . $credencial->usuario;
            echo "<br> CONTRASEÑA : " . $credencial->password;
        }
        if (password_verify('usudwes', $hash)) {
        echo 'Password is valid!';
        } else {
        echo 'Invalid password.';
        }
        
        function comprobarCredenciales($usuario, $clave){
            if($usuario === "normaluser" && $clave === "1234"){
                $credenciales["usuario"] = "normaluser";
                $credenciales["rol"] = 0;
                return $credenciales;
            }

            if($usuario === "adminuser" && $clave === "4567"){
                $credenciales["usuario"] = "adminuser";
                $credenciales["rol"] = 1;
                return $credenciales;
            }
            return false;
        } //funcion

        if($_SERVER["REQUEST_METHOD"] === "POST"){ //Si el metodo con el que recojo los datos es post
            if(isset($_POST["envio"])){  //Si esta establecida la variable envio
                $credentials = comprobarCredenciales($_POST["usuario"],$_POST["password"]); //la funcion devuelve array o falso.
                if($credentials === false){ // si la comprobacion devuelve falso
                    $error = 1; //el codigo de error es 1
                } else {
                    session_start(); //iniciamos la sesion
                    $_SESSION["loginok"] = $credentials;
                    header("Location: principal.php");
                }
            }
        }
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