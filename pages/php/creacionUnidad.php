<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if(!isset($_GET["action"])){
    if(isset($_POST["nameActivity"])){
        $new = $_POST["nameActivity"];
        if(!$new == "")
        {
        $_SESSION["titulocreacion"] = $new;
        header("location: ../RecursoDidactico.php");
        die();
        } 
        else
        {
         header("location: ../CrearUnidad.php?error=1");
         die();
        }
    }
    else
    {
      echo "error";    
    }
}
else
{
    $new2 = $_GET["action"];
    if($new2 == 0)
    {
      unset($_SESSION["titulocreacion"]);
      header("location: ../indexDocente.php");
      die();
    }
    elseif ($new2 ==1) 
    {
      echo "guardado?";
    }
}