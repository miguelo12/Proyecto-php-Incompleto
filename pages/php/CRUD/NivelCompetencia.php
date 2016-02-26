<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NivelCompetencia
 *
 * @author darkg
 */
include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class NivelCompetencia {
    private $idNivelCompetencia;
    private $Descripcion;
    private $Puntaje;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into nivelcompetencia values(?,?,?)");
      
      $sentencia->bind_param("isi", $this->idNivelCompetencia, $this->Descripcion, $this->Puntaje);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function setIdNivelCompetencia($idNivelCompetencia) {
        $this->idNivelCompetencia = $idNivelCompetencia;
    }

    public function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

    public function setPuntaje($Puntaje) {
        $this->Puntaje = $Puntaje;
    }
}
