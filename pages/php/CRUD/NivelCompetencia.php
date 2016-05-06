<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NivelCompetencias
 *
 * @author Miguel Sanchez
 */
include_once ("..\pages\php\Conexion\Conexion.php");
include_once ("..\php\Conexion\Conexion.php");
include_once ("../../php/Conexion/Conexion.php");
class NivelCompetencia {
    private $idNivelCompetencia; #i
    private $Descripcion; #s
    private $Puntaje; #i
    private $Criterio_idCriterio; #i
    
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
    
    public function Eliminar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("delete from nivelcompetencia where idNivelCompetencia=?");
      
      $sentencia->bind_param("i", $this->idNivelCompetencia);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
       //devuelve la id.
       return true;
      }
      else {
       return false;
      }
    }
    
    public function Actualizar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("update nivelcompetencia set Descripcion=?,Puntaje=? where idNivelCompetencia=?");
      
      $sentencia->bind_param("sii", $this->Descripcion, $this->Puntaje, $this->idNivelCompetencia);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
       //devuelve la id.
       return true;
      }
      else {
       return false;
      }
    }
    
    public function DevolverNivelCompetencia()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from nivelcompetencia where Criterio_idCriterio=?");
      
      $sentencia->bind_param("i", $this->Criterio_idCriterio);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res[] = $row;
          }
      }
      else {
          unset($res);
      }
      
      return $res;
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
