<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResolverActividad
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class ResolverActividad {
    private $idResolverActividad; #i
    private $Pregunta; #s
    private $Actividad_idActividad; #i
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into ResolverActividad (Pregunta,Actividad_idActividad) values(?,?)");
      
      $sentencia->bind_param("si", $this->Pregunta, $this->Actividad_idActividad);
      
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

    public function setidResolverActividad($idResolverActividad) {
        $this->idResolverActividad = $idResolverActividad;
    }

    public function setPregunta($Pregunta) {
        $this->Pregunta = $Pregunta;
    }
    
    public function setActividad_idActividad($Actividad_idActividad) {
        $this->Actividad_idActividad = $Actividad_idActividad;
    }
}
