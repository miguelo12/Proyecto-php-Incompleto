<?php
error_reporting(0);
session_start();
if(isset($_GET["accion"])){
    if($_GET["accion"]==1){
        //entrega los grupos de la actividad donde se encuentre.
        include_once("./CRUD/Grupo.php");
        $grupo = new Grupo();
        $grupo->setActividad_idActividad($_SESSION["idActividad"][0]["Actividad_idActividad"]);
        $re = $grupo->DevolverGrupoActividad();
        echo json_encode($re);
        die();
        
    } elseif($_GET["accion"]==2){
        $alumno = $_SESSION["alumno"];
        //crear grupo y despues ingresar al alumno al grupo de la actividad.
        $name = $_POST["nombre"];
        include_once("./CRUD/Grupo.php");
        include_once("./CRUD/AlumnosGrupo.php");
        $grupo = new Grupo();
        $alumnosgrupo = new AlumnosGrupo();
        $grupo->setActividad_idActividad($_SESSION["idActividad"][0]["Actividad_idActividad"]);
        $grupo->setNombre($name);
        //verifica si existe o no.
        if(!$grupo->Existeono()){
        $idG = $grupo->Ingresar();
        
        $alumnosgrupo->setidGrupo($idG);
        $alumnosgrupo->setidAlumno($alumno["id"]);
        $alumnosgrupo->Ingresar();
        
        header("location: ../actividadAlumno.php");
        die();
        }
        else{
        header("location: ../actividadAlumno.php?error=1");
        die();
        }
        
    } elseif($_GET["accion"]==3){
        $alumno = $_SESSION["alumno"];
        //ingresar al alumno al grupo.
        $grupito = $_POST["grupo"];
        include_once("./CRUD/AlumnosGrupo.php");
        $alumnosgrupo = new AlumnosGrupo();
        $alumnosgrupo->setidAlumno($alumno["id"]);
        $alumnosgrupo->setidGrupo($grupito);
        $alumnosgrupo->setActividad_idActividad($_SESSION["idActividad"][0]["Actividad_idActividad"]);
        
        //maximo son 3 por grupo.
        if(!$alumnosgrupo->Existelamaxima()){
            $alumnosgrupo->Ingresar();
            header("location: ../actividadAlumno.php");
            die();
        }
        else{
            header("location: ../actividadAlumno.php?error1=1");
            die();   
        }
        
    }
}
header("location: ../error.php?error=404");
die(); 
