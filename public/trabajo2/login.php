<?php 
        function comprobarCredenciales($usuario, $passwd){
            if($usuario === "normaluser" && $passwd=== "usudwes"){
                $credenciales["usuario"] = "normaluser";
                $credenciales["rol"] = 0;
                return $credenciales;
            }

            if($usuario === "adminuser" && $passwd=== "admindwes"){
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
        } //if

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h2>Pagina de acceso</h2>
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