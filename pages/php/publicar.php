<?php
error_reporting(0);
session_start();
if(isset($_GET["publicar"])){
    $publicar = $_GET["publicar"];
    $name = $_GET["name"];
    echo $_SESSION["publicar"];
    $_SESSION["publicar"] = array("id"=>$publicar, "nombre"=>$name);
    header("location: ../publicar.php");
    die();
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
            die();
        }
    } elseif(isset($_GET["crear"])){
        if($_GET["crear"]==1){
            //crea la actividad.
            $fecha1 = $_POST["fechainicio"];
            $fecha2 = $_POST["fechatermino"];
            $Unidadid = $_SESSION["publicar"]["id"];
            $seccionid = $_POST["seccion"];
            
            include_once("./CRUD/Actividad.php");
            $actividad = new Actividad();
            $actividad->setUnidadAprendizaje_idUnidadAprendizaje($Unidadid);
            $actividad->setfecha_inicio($fecha1);
            $actividad->setfecha_termino($fecha2);
            $actividad->setSeccion_idSeccion($seccionid);
            
            $idActividad = $actividad->Ingresar();
            
            $_SESSION["Actividad"] = $idActividad;
            header("location: ../Actividades.php");
            die(); 
        }
    } else{
    header("location: ../Biblioteca.php");
    die();   
    }
}
header("location: ../error.php?error=404");
die(); 
