<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultadoRubricaEvaluacion
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class ResultadoEvaluacion {
    private $idResultadoEvaluacion;
    private $idGrupo;
    private $PuntajeObtenido;
    private $ResolverActividad_idResolverActividad; #i
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into resultadoevaluacion (idGrupo,PuntajeObtenido,ResolverActividad_idResolverActividad) values(?,?,?)");
      
      $sentencia->bind_param("iii", $this->idGrupo, $this->PuntajeObtenido, $this->ResolverActividad_idResolverActividad);
      
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
    
    public function ExisteonoPorID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from resultadorubricaevaluacion where idResultadoRubricaEvaluacion=?");
      
      $sentencia->bind_param("i", $this->idResultadoRubricaEvaluacion);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function setIdResultadoEvaluacion($idResultadoEvaluacion) {
        $this->idResultadoEvaluacion = $idResultadoEvaluacion;
    }

    public function setResolverActividad_idResolverActividad($ResolverActividad_idResolverActividad) {
        $this->ResolverActividad_idResolverActividad = $ResolverActividad_idResolverActividad;
    }

    public function setIdGrupo($idGrupo) {
        $this->idGrupo = $idGrupo;
    }

    public function setPuntajeObtenido($PuntajeObtenido) {
        $this->PuntajeObtenido = $PuntajeObtenido;
    }
}
