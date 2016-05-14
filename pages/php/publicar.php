<?php
error_reporting(0);
session_start();
if(isset($_GET["publicar"])){
    $publicar = $_GET["publicar"];
    echo $_SESSION["publicar"];
    $_SESSION["publicar"] = $publicar;
    header("location: ../publicar.php");
    die;
}
else{
    if(isset($_GET["buscar"])){
        if($_GET["buscar"]==1){
            include_once("./CRUD/Seccion.php");
            $seccion = new Seccion();
            $docente = $_SESSION["docente"];
            $id = $_POST["id"];
            
            $seccion->setDocente_idDocente($docente["id"]);
            $seccion->setAsignatura_idAsignatura($id);
            $arraySeccion = $seccion->DevolverSeccionDocenteAsignatura();
            
            echo json_encode($arraySeccion);
        }
    } else{
    header("location: ../Biblioteca.php");
    die;   
    }
}

