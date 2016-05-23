<?php session_start(); 
  error_reporting(0);

        unset($_SESSION["autoevaluacion"]);
        unset($_SESSION["coevaluacion"]);
        unset($_SESSION["evaluacion"]);
        unset($_SESSION["rubrica"]);
        unset($_SESSION["ver"]);
        unset($_SESSION["edita"]);
        unset($_SESSION["publicar"]);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error</title>
        <link rel="shortcut icon" type="image/png" href="img/icon.png"/>
    </head>
    <body>
        <h1>Error <?= $_GET["error"]?></h1>
        <p><a href="inicio.php">Vuelva..</a></p>
    </body>
</html>
