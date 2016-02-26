<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Criterio
 *
 * @author darkg
 */
include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class Criterio {
    private $idCriterio;
    private $Nombre;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into criterio values(?,?)");
      
      $sentencia->bind_param("is", $this->idAlumnosGrupo, $this->idAlumno);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function setidCriterio($idCriterio)
    {
        $this->idCriterio=$idCriterio;
    }
    
    public function setNombre($Nombre)
    {
        $this->Nombre=$Nombre;
    }
}
