<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultadoRubricaEvaluacion
 *
 * @author darkg
 */
include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class ResultadoRubricaEvaluacion {
    private $idResultadoRubricaEvaluacion;
    private $idCriterioNivelRubrica;
    private $idGrupo;
    private $PuntajeObtenido;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into resultadorubricaevaluacion values(?,?,?,?)");
      
      $sentencia->bind_param("iiii", $this->idResultadoRubricaEvaluacion, $this->idCriterioNivelRubrica, $this->idGrupo, $this->PuntajeObtenido);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function setIdResultadoRubricaEvaluacion($idResultadoRubricaEvaluacion) {
        $this->idResultadoRubricaEvaluacion = $idResultadoRubricaEvaluacion;
    }

    public function setIdCriterioNivelRubrica($idCriterioNivelRubrica) {
        $this->idCriterioNivelRubrica = $idCriterioNivelRubrica;
    }

    public function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }

    public function setPuntajeObtenido($PuntajeObtenido) {
        $this->PuntajeObtenido = $PuntajeObtenido;
    }
}