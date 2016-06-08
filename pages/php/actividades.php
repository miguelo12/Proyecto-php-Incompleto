<?php
error_reporting(0);
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
    }   elseif ($_GET["accion"]==4) {
       if(isset($_POST["pin"])){
           $idseccion = $_POST["pin"];
           $alumno = $_SESSION["alumno"];
           //Ingresar alumno a la seccion.
           include_once("./CRUD/AlumnoSeccion.php");
           include_once("./CRUD/Seccion.php");
           $seccion = new Seccion();
           $seccion->setidSeccion($idseccion);
           $aluseccion = new AlumnoSeccion();
           $aluseccion->setAlumno_idAlumno($alumno["id"]);
           $aluseccion->setSeccion_idSeccion($idseccion);
           if(!$seccion->ExisteonoPorID()){
               if(!$aluseccion->ExisteonoPorID()){
               $aluseccion->Ingresar();
               header("location: ../indexAlumno.php?exito=1");
               die(); 
               }
               else{
               header("location: ../indexAlumno.php?error=1");
               die();    
               }
           }
           else{
            header("location: ../indexAlumno.php?error=2");
            die();      
           }
       } 
    }   elseif ($_GET["accion"]==5) {
           //seccion alumno asignatura.
           $alumno = $_SESSION["alumno"];
           include_once("./CRUD/AlumnoSeccion.php");
           $aluseccion = new AlumnoSeccion();
           $aluseccion->setAlumno_idAlumno($alumno["id"]);
           $array = $aluseccion->EntregarSeccionAlumno();
           echo json_encode($array);
           die();
    }   elseif ($_GET["accion"]==6) {
           //Alumno quedara ligado a la actividad.
           if($_POST["actividad"]){
           $alumno = $_SESSION["alumno"];
           $act = $_POST["actividad"];
           include_once("./CRUD/AlumnoUnidadAprendizaje.php");
           $aluUnidadAprendizaje = new AlumnoUnidadAprendizaje();
           $aluUnidadAprendizaje->setAlumno_idAlumno($alumno["id"]);
           $aluUnidadAprendizaje->setActividad_idActividad($act);
               if(!$aluUnidadAprendizaje->ExisteonoPorID()){
               $_SESSION["idActividad"] = $aluUnidadAprendizaje->Ingresar();
               header("location: ../actividadAlumno.php");
               die();
               }
               else{
               header("location: ../indexAlumno.php?error1=1");
               die();   
               }
           }
    }   elseif ($_GET["accion"]==7) {
            //Alumno quedara ligado a la actividad.
            $act = $_SESSION["Actividad"];
            include_once("./CRUD/AlumnoUnidadAprendizaje.php");
            $aluUnidadAprendizaje = new AlumnoUnidadAprendizaje();
            $aluUnidadAprendizaje->setActividad_idActividad($act["id"]);
            $array = $aluUnidadAprendizaje->DevolverAlumnos();
            echo json_encode($array);
            die();
        }   
    
}
header("location: ../error.php?error=404");
die(); 
