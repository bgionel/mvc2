<?php
session_start(); 
if(!isset($_SESSION["loginok"])){
    header("Location: login.php");
}


if($_SESSION["loginok"]["rol"] == 1){
    echo "<h2>Bienvenido usuario</h1>" . $_SESSION["loginok"]["usuario"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php 
    if($_SESSION["loginok"]["rol"] == 0){
    ?>
    <h1> Bienvenido usuario:
    <?php
        echo $_SESSION["loginok"]["usuario"] . "</h1>";
    }
    ?>
    <p>¿A qué tipo de contacto quieres acceder?</p>
    <p><a href="persona.php">Persona</a></p>
    <p><a href="empresa.php">Empresa</a></p>
    <p><a href="logout.php">O pulsa aquí para cerrar sesión</a></p>
</body>
</html>