<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Grupo
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class Grupo {
    private $idGrupo; #i
    private $Nombre; #s
    private $Actividad_idActividad; #s
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into grupo values(?,?,?)");
      
      $sentencia->bind_param("iss", $this->idGrupo, $this->Nombre, $this->Actividad_idActividad);
      
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
    
    public function Existeono()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from grupo where Actividad_idActividad=? and Nombre=?");
      
      $sentencia->bind_param("ss", $this->Actividad_idActividad, $this->Nombre);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function DevolverGrupoActividad()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from grupo where Actividad_idActividad=?");
      
      $sentencia->bind_param("s", $this->Actividad_idActividad);
      
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
    
    public function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }

    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }
    
    public function setActividad_idActividad($Actividad_idActividad) {
        $this->Actividad_idActividad = $Actividad_idActividad;
    }
}
