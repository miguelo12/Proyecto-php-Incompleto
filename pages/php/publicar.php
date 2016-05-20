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
            $fecha1 = $_POST["fechainicio"];
            $fecha2 = $_POST["fechatermino"];
            $seccionid = $_POST["seccion"];
            $seguir = true;
            //primera fecha
            list($d, $m, $y) = explode('/', $fecha1);
            if(!checkdate($m, $d, $y)) {
               $seguir = false;
            }
            //segunda fecha
            list($d, $m, $y) = explode('/', $fecha2);
            if(!checkdate($m, $d, $y)) {
               $seguir = false;
            }
            
            if($seguir){
                echo "Seguir";
            }
            else{
                header("location: ../publicar.php?error=100");
                die();   
            } 
        }
    } else{
    header("location: ../Biblioteca.php");
    die();   
    }
}
//header("location: ../error404.php");
//die(); 
