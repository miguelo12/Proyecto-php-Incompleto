<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alumnounidadaprendizaje
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class AlumnoUnidadAprendizaje {
    private $idAlumnoUnidadAprendizaje; //i
    private $Alumno_idAlumno; //s
    private $Actividad_idActividad; //i
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function setidAlumnoUnidadAprendizaje($idAlumnoUnidadAprendizaje)
    {
        $this->idAlumnoUnidadAprendizaje=$idAlumnoUnidadAprendizaje;
    }
    
    public function setActividad_idActividad($Actividad_idActividad)
    {
        $this->Actividad_idActividad=$Actividad_idActividad;
    }
    
    public function setAlumno_idAlumno($idAlumno)
    {
        $this->Alumno_idAlumno=$idAlumno;
    }
}
