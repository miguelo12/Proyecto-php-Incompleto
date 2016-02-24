<?php

include_once("../php/CRUD/Docente.php");
error_reporting(E_ALL ^ E_WARNING);
$email = "";
$password = "";

if( isset($_POST["email"]) && isset($_POST["password"]) )
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    
    try {     
       $usuario = new Docente();
       
       $usuario->setEmail($email);
       $usuario->setPassword($password);
       
       $res = $usuario->validar();
       if(isset($res))
       {
           session_start();
           $_SESSION["docente"] = $res;
           header("location:../indexDocente.php");
           die();
       }
       else 
       {
           header("location:../loginProfesor.php");
           die();
       }
       
       
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    
}
else
{
    echo 'no ha llegado nada';
}