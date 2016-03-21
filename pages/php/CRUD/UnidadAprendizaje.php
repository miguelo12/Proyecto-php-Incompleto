<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UnidaddeAprendizaje
 *
 * @author darkg
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class UnidadAprendizaje {
    private $idAprendizaje;
    private $Titulo;
    private $Rubrica_idRubrica;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into unidadaprendizaje values(?,?,?)");
      
      $sentencia->bind_param("iss", $this->idAprendizaje, $this->Titulo, $this->Rubrica_idRubrica);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function setidAprendizaje($idAprendizaje)
    {
        $this->idAprendizaje=$idAprendizaje;
    }
    
    public function setTitulo($Titulo)
    {
        $this->Titulo=$Titulo;
    }
    
    public function setRubrica_idRubrica($Rubrica_idRubrica)
    {
        $this->Rubrica_idRubrica=$Rubrica_idRubrica;
    }
}
