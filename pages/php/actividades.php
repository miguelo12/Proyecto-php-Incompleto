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
       if(isset($_GET["id"])){
       $id = $_GET["id"];
       
       include_once("./CRUD/Actividad.php");
       $actividad = new Actividad();
       $actividad->setidActividad($id);
       $content = $actividad->DevolverPorIdActividad();

       $_SESSION["Actividad"] = array("id"=>$id,"Unidad"=> $content["titulo"],"Asignatura"=> $content["nombre"],"FechaInicio"=>$content["fechainicio"],"FechaTermino"=>$content["fechatermino"], "CodigoSeccion"=>$content["codigo"]);
       header("location: ../Actividades.php");
       die(); 
       }
    }  elseif ($_GET["accion"]==2){
        if(isset($_GET["evaluar"])){
            $id = $_GET["evaluar"];
            include_once("./CRUD/Actividad.php");
            $actividad = new Actividad();
            $actividad->setidActividad($id);
            
            header("location: actividades.php");
            die(); 
        }
    }  elseif ($_GET["accion"]==3) {
       if(isset($_GET["finish"])){
           $id = $_GET["finish"];
           include_once("./CRUD/Actividad.php");
           $actividad = new Actividad();
           $actividad->setidActividad($id);
           $actividad->Finalizar();
           
           header("location: actividades.php");
           die(); 
       } 
    }
    
}
header("location: ../error.php?error=404");
die(); 
