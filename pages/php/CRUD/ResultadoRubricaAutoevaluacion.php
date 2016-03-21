<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultadoRubricaAutoevaluacion
 *
 * @author darkg
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class ResultadoRubricaAutoevaluacion {
    private $idResultadoRubricaAutoevaluacion;
    private $PuntajeObtenido;
    private $AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function setidResultadoRubricaAutoevaluacion($idResultadoRubricaAutoevaluacion)
    {
        $this->idResultadoRubricaAutoevaluacion=$idResultadoRubricaAutoevaluacion;
    }
    
    public function setPuntajeObtenido($PuntajeObtenido)
    {
        $this->PuntajeObtenido=$PuntajeObtenido;
    }
    
    public function setAlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje($AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje)
    {
        $this->AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje=$AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje;
    }
}
