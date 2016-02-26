<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rubrica
 *
 * @author darkg
 */
include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class Rubrica {
    private $idRubrica;
    private $idUnidadAprendizaje;
    private $tipo;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into rubrica values(?,?,?)");
      
      $sentencia->bind_param("iii", $this->idRubrica, $this->idUnidadAprendizaje, $this->tipo);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function ExisteonoPorID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from rubrica where idRubrica=?");
      
      $sentencia->bind_param("i", $this->idRubrica);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function setIdRubrica($idRubrica) {
        $this->idRubrica = $idRubrica;
    }

    public function setIdUnidadAprendizaje($idUnidadAprendizaje) {
        $this->idUnidadAprendizaje = $idUnidadAprendizaje;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}
