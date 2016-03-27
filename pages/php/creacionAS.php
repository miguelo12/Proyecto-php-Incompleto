<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once("./CRUD/Seccion.php");
include_once("./CRUD/Asignatura.php");
if(isset($_POST["codigo"]))
{
    if(isset($_POST["nombre"]))
    {
        $codigoSeccion = $_POST["codigo"];
        $nombreAsignatura = strtoupper($_POST["nombre"]);

        $seccion = new Seccion();
        $asignatura = new Asignatura();
        $docente = $_SESSION["docente"];

        $asignatura->setNombre($nombreAsignatura);
        $asignatura->setDocente_idDocente($docente["id"]);   
        if($asignatura->ExisteonoPorNombre())
        {
          $asig1 = $asignatura->DevolverAsignaturasNombre();
          $idasig = $asig1["idAsignatura"];
        }
        else{
          $idasig = $asignatura->Ingresar(); 
        }
    
        $seccion->setCodigo($codigoSeccion);
        $seccion->setDocente_idDocente($docente["id"]);
        $seccion->setAsignatura_idAsignatura($idasig);
        
        if(!$seccion->ExisteonoPorCodigo())
        {
           if($seccion->Ingresar())
           {
               header("location: ../cursos.php?succes=1");
               die();
           }
           else
           {
               header("location: ../cursos.php?error=2");
               die();
           }
        }
        else
        {
           header("location: ../cursos.php?error=3");
           die();
        }
    }
    
    header("location: ../error404.php");
    die();
}
else{

header("location: ../cursos.php");
die();
}