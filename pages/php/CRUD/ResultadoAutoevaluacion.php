<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultadoRubricaAutoevaluacion
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class ResultadoAutoevaluacion {
    private $idResultadoAutoevaluacion; #i
    private $PuntajeObtenido; #i
    private $ComentarioAutoevaluacion; #s
    private $AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje; #i
    private $ResolverActividad_idResolverActividad; #i
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into resultadocoevaluacion (PuntajeObtenido,ComentarioAutoevaluacion,AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje,ResolverActividad_idResolverActividad) values(?,?,?,?)");
      
      $sentencia->bind_param("isii", $this->PuntajeObtenido, $this->ComentarioAutoevaluacion, $this->AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje, $this->ResolverActividad_idResolverActividad);
      
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
    
    public function setidResultadoAutoevaluacion($idResultadoAutoevaluacion)
    {
        $this->idResultadoAutoevaluacion=$idResultadoAutoevaluacion;
    }
    
    public function setPuntajeObtenido($PuntajeObtenido)
    {
        $this->PuntajeObtenido=$PuntajeObtenido;
    }
    
    public function setComentarioAutoevaluacion($ComentarioAutoevaluacion)
    {
        $this->ComentarioAutoevaluacion=$ComentarioAutoevaluacion;
    }
    
    public function setAlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje($AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje)
    {
        $this->AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje=$AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje;
    }
    
    public function setResolverActividad_idResolverActividad($ResolverActividad_idResolverActividad)
    {
        $this->ResolverActividad_idResolverActividad=$ResolverActividad_idResolverActividad;
    }
}
