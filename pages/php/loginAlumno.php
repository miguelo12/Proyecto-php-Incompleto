<?php

include_once("../php/CRUD/Alumno.php");
error_reporting(E_ALL ^ E_WARNING);
$email = "";
$password = "";

if( isset($_POST["email"]) && isset($_POST["password"]) )
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    
    try {     
       $usuario = new Alumno();
       
       $usuario->setEmail($email);
       $usuario->setPassword($password);
       
       $res = $usuario->validar();
       
       if(isset($res))
       {
           session_start();
           $_SESSION["alumno"] = $res;
           header("location:../indexAlumno.php");
           die();
       }
       else 
       {
           header("location:../loginAlumno.php");
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
