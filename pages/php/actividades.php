<?php
session_start();
if(!isset($_GET["accion"])){
include_once("./CRUD/Actividad.php");
$actividades = new Actividad();
$docente = $_SESSION["docente"];
$actividades->setdocente($docente["id"]);
$news = $actividades->DevolverActividadNuevas();
$olds = $actividades->DevolverActividadAntiguas();

$_SESSION["actividades"] = array("nuevos"=>$news,"antiguos"=>$olds);

header("location: ../Evaluar.php");
die();
}
else{
    if($_GET["accion"]==1){
       
        
    }  elseif ($_GET["accion"]==2){
        
    }  elseif ($_GET["accion"]==3) {
        
    }
    
}

