<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultadoCoevaluacion
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class ResultadoCoevaluacion {
    private $idResultadoCoevaluacion; #i
    private $PuntajeObtenido; #i
    private $ComentarioCoe; #s
    private $AlumnosGrupo_idAlumnosGrupo; #i
    private $ResolverActividad_idResolverActividad; #i
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into resultadocoevaluacion (PuntajeObtenido,ComentarioCoe,AlumnosGrupo_idAlumnosGrupo,ResolverActividad_idResolverActividad) values(?,?,?,?)");
      
      $sentencia->bind_param("isii", $this->PuntajeObtenido, $this->ComentarioCoe, $this->AlumnosGrupo_idAlumnosGrupo, $this->ResolverActividad_idResolverActividad);
      
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
    
    public function setIdResultadoCoevaluacion($idResultadoCoevaluacion) {
        $this->idResultadoCoevaluacion = $idResultadoCoevaluacion;
    }

    public function setAlumnosGrupo_idAlumnosGrupo($AlumnosGrupo_idAlumnosGrupo) {
        $this->AlumnosGrupo_idAlumnosGrupo = $AlumnosGrupo_idAlumnosGrupo;
    }

    public function setComentarioCoe($ComentarioCoe) {
        $this->ComentarioCoe = $ComentarioCoe;
    }

    public function setPuntajeObtenido($PuntajeObtenido) {
        $this->PuntajeObtenido = $PuntajeObtenido;
    }
    
    public function setResolverActividad_idResolverActividad($ResolverActividad_idResolverActividad) {
        $this->ResolverActividad_idResolverActividad = $ResolverActividad_idResolverActividad;
    }
}
