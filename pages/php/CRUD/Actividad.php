<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Actividad
 *
 * @author darkg
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class Actividad {
    private $idActividad;
    private $fecha_inicio;
    private $fecha_termino;
    private $UnidadAprendizaje_idUnidadAprendizaje;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      //genera la conexion
      $c=$this->con->getConexion();
      //prepara los datos antes de insertarlo
      $sentencia=$c->prepare("insert into actividad values(?,?,?)");
      //inserta los datos
      $sentencia->bind_param("sss", $this->fecha_inicio, $this->fecha_termino, $this->UnidadAprendizaje_idUnidadAprendizaje);
      //ejecutar el script
      $sentencia->execute();
      //reviza si se hizo un cambio
      if($sentencia->affected_rows)
      {
          //devuelve la id.
       return $sentencia->insert_id;
      }
      else {
       return null;    
      }
    }
    
    public function setidActividad($idActividad)
    {
        $this->idActividad=$idActividad;
    }
    
    public function setfecha_inicio($fecha_inicio)
    {
        $this->fecha_inicio=$fecha_inicio;
    }
    
    public function setfecha_termino($fecha_termino)
    {
        $this->fecha_termino=$fecha_termino;
    }
    
    public function setUnidadAprendizaje_idUnidadAprendizaje($UnidadAprendizaje_idUnidadAprendizaje)
    {
        $this->UnidadAprendizaje_idUnidadAprendizaje=$UnidadAprendizaje_idUnidadAprendizaje;
    }
}
