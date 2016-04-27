<?php
session_start();
ob_start();
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
elseif(isset($_GET["Seccion"])){
 if(isset($_GET["Habilitar"])){
 $idseccion = $_GET["Seccion"];
 
 if($_GET["Habilitar"] == "true"){
    $seccion1 = new Seccion();
    $seccion1->setidSeccion($idseccion);
    $seccion1->setHabilitar(1);
    $seccion1->Habilitar();
 }
 else
 {
    $seccion2 = new Seccion();
    $seccion2->setidSeccion($idseccion);
    $seccion2->setHabilitar(0);
    $seccion2->Habilitar();
 }
 
 header("location: ../cursos.php");
 die();
 }  
header("location: ../error404.php");
die();
}
else{
header("location: ../cursos.php");
die();
}