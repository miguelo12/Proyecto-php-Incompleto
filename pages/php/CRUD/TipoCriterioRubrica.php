<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoCriterioRubrica
 *
 * @author darkg
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class TipoCriterioRubrica {
    private $Rubrica_idRubrica;
    private $tipos;
    private $TipoCriterioRubrica;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into tipocriteriorubrica (tipos,Rubrica_idRubrica) values(?,?)");
      
      $sentencia->bind_param("ii", $this->tipos, $this->Rubrica_idRubrica);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
          //devuelve la id.
       return $sentencia->insert_id;
      }
      else {
       return null;    
      }
    }
    
    public function setRubrica_idRubrica($Rubrica_idRubrica)
    {
        $this->Rubrica_idRubrica=$Rubrica_idRubrica;
    }
    
    public function settipos($tipos)
    {
        $this->tipos=$tipos;
    }
    
    public function setTipoCriterioRubrica($TipoCriterioRubrica)
    {
        $this->TipoCriterioRubrica=$TipoCriterioRubrica;
    }
}