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
           $usuario->setidDocente($res["id"]);
           if($res["habilitado"]==0){
           $usuario->sethabilitado(1);
           $usuario->Habilitarono();
           session_start();
           $_SESSION["docente"] = $res;
           header("location:../indexDocente.php?Bienvenido=1");
           die();
           }else {
           session_start();
           $_SESSION["docente"] = $res;
           header("location:../indexDocente.php");
           die();
           }
       }
       else 
       {
           header("location:../inicio.php?error=error");
           die();
       }
       
       
    } catch (RuntimeException $ex) {
        header("location:../error.php?error=500");
        die();
    }
    
}
else
{
    echo 'no ha llegado nada';
}