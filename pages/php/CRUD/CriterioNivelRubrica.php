<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CriterioNivelRubrica
 *
 * @author darkg
 */
include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class CriterioNivelRubrica {
    private $idCriterioNivelRubrica;
    private $idCriterio;
    private $idNivelCompetencia;
    private $idRubrica;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into criterionivelrubrica values(?,?,?,?)");
      
      $sentencia->bind_param("iiii", $this->idCriterioNivelRubrica, $this->idCriterio, $this->idNivelCompetencia, $this->idRubrica);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function setidCriterioNivelRubrica($idCriterioNivelRubrica)
    {
        $this->idCriterioNivelRubrica=$idCriterioNivelRubrica;
    }
    
    public function setidCriterio($idCriterio)
    {
        $this->idCriterio=$idCriterio;
    }
    
    public function setidNivelCompetencia($idNivelCompetencia)
    {
        $this->idNivelCompetencia=$idNivelCompetencia;
    }
    
    public function setidRubrica($idRubrica)
    {
        $this->idRubrica=$idRubrica;
    }
}
