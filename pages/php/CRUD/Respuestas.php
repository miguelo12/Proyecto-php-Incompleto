<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Respuestas
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class Respuestas {
    private $idRespuestas; #i
    private $respuesta; #s
    private $ResolverActividad_idResolverActividad; #i
    private $Criterio_idCriterio; #i
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into respuestas (respuesta,ResolverActividad_idResolverActividad,Criterio_idCriterio) values(?,?,?)");
      
      $sentencia->bind_param("sii", $this->Pregunta, $this->respuesta, $this->ResolverActividad_idResolverActividad, $this->Criterio_idCriterio);
      
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

    public function setidRespuestas($idRespuestas) {
        $this->idRespuestas = $idRespuestas;
    }

    public function setResolverActividad_idResolverActividad($ResolverActividad_idResolverActividad) {
        $this->ResolverActividad_idResolverActividad = $ResolverActividad_idResolverActividad;
    }
    
    public function setrespuesta($respuesta) {
        $this->respuesta = $respuesta;
    }
    
    public function setCriterio_idCriterio($Criterio_idCriterio) {
        $this->Criterio_idCriterio = $Criterio_idCriterio;
    }
}
