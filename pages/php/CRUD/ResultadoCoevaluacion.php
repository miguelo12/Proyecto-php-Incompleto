<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultadoCoevaluacion
 *
 * @author darkg
 */
include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class ResultadoCoevaluacion {
    private $idResultadoCoevaluacion;
    private $idAlumnosGrupo;
    private $idCriterioNivelRubrica;
    private $PuntajeObtenido;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into resultadocoevaluacion values(?,?,?,?)");
      
      $sentencia->bind_param("iiii", $this->idResultadoCoevaluacion, $this->idAlumnosGrupo, $this->idCriterioNivelRubrica, $this->PuntajeObtenido);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function ExisteonoPorID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from resultadocoevaluacion where idResultadoCoevaluacion=?");
      
      $sentencia->bind_param("i", $this->idResultadoCoevaluacion);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function setIdResultadoCoevaluacion($idResultadoCoevaluacion) {
        $this->idResultadoCoevaluacion = $idResultadoCoevaluacion;
    }

    public function setIdAlumnosGrupo($idAlumnosGrupo) {
        $this->idAlumnosGrupo = $idAlumnosGrupo;
    }

    public function setIdCriterioNivelRubrica($idCriterioNivelRubrica) {
        $this->idCriterioNivelRubrica = $idCriterioNivelRubrica;
    }

    public function setPuntajeObtenido($PuntajeObtenido) {
        $this->PuntajeObtenido = $PuntajeObtenido;
    }
}
