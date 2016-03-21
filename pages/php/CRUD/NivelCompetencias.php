<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NivelCompetencias
 *
 * @author darkg
 */
include_once ("..\pages\php\Conexion\Conexion.php");
include_once ("..\php\Conexion\Conexion.php");
include_once ("../../php/Conexion/Conexion.php");
class NivelCompetencias {
    private $idRecursosDidacticos;
    private $idUnidadAprendizaje;
    private $nombre;
    private $descripcion;
    private $tipo;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into nivelcompetencia (Descripcion,Puntaje,Criterio_idCriterio) values(?,?,?)");
      
      $sentencia->bind_param("sii", $this->Descripcion, $this->Puntaje, $this->Criterio_idCriterio);
      
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
    
    public function setIdNivelCompetencia($idNivelCompetencia) {
        $this->idNivelCompetencia = $idNivelCompetencia;
    }

    public function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

    public function setPuntaje($Puntaje) {
        $this->Puntaje = $Puntaje;
    }
    
    public function setCriterio_idCriterio($Criterio_idCriterio) {
        $this->Criterio_idCriterio = $Criterio_idCriterio;
    }
}
