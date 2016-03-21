<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultadoRubrica
 *
 * @author darkg
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class ResultadoRubrica {
    private $idResultadoRubrica;
    private $ResultadoRubricaAutoevaluacion_idResultadoRubricaAutoevaluacion;
    private $ResultadoCoevaluacion_idResultadoCoevaluacion;
    private $ResultadoRubricaEvaluacion_idResultadoRubricaEvaluacion;
    private $Actividad_idActividad;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function setidResultadoRubrica($idResultadoRubrica)
    {
        $this->idResultadoRubrica=$idResultadoRubrica;
    }
    
    public function setResultadoRubricaAutoevaluacion_idResultadoRubricaAutoevaluacion($ResultadoRubricaAutoevaluacion_idResultadoRubricaAutoevaluacion)
    {
        $this->ResultadoRubricaAutoevaluacion_idResultadoRubricaAutoevaluacion=$ResultadoRubricaAutoevaluacion_idResultadoRubricaAutoevaluacion;
    }
    
    public function setResultadoCoevaluacion_idResultadoCoevaluacion($ResultadoCoevaluacion_idResultadoCoevaluacion)
    {
        $this->ResultadoCoevaluacion_idResultadoCoevaluacion=$ResultadoCoevaluacion_idResultadoCoevaluacion;
    }
    
    public function setResultadoRubricaEvaluacion_idResultadoRubricaEvaluacion($ResultadoRubricaEvaluacion_idResultadoRubricaEvaluacion)
    {
        $this->ResultadoRubricaEvaluacion_idResultadoRubricaEvaluacion=$ResultadoRubricaEvaluacion_idResultadoRubricaEvaluacion;
    }
    
    public function setActividad_idActividad($Actividad_idActividad)
    {
        $this->Actividad_idActividad=$Actividad_idActividad;
    }
}
