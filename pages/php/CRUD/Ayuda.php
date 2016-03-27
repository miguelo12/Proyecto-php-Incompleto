<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ayuda
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class Ayuda {
    private $idAyuda; #i
    private $procedimiento; #s
    private $aplicaciones; #s
    private $procesamiento; #s
    private $lenguaje; #s
    private $modelos; #s
    private $conclusiones; #s
    private $UnidadAprendizaje_idUnidadAprendizaje; #i
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into ayuda (procedimiento,aplicaciones,procesamiento,lenguaje,modelos,conclusiones,UnidadAprendizaje_idUnidadAprendizaje) values(?,?,?,?,?,?,?)");
      
      $sentencia->bind_param("ssssssi", $this->procedimiento, $this->aplicaciones, $this->procesamiento, $this->lenguaje, $this->modelos, $this->conclusiones, $this->UnidadAprendizaje_idUnidadAprendizaje);
      
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
    
    public function setidAyuda($idAyuda)
    {
        $this->idAyuda=$idAyuda;
    }
    
    public function setprocedimiento($procedimiento)
    {
        $this->procedimiento=$procedimiento;
    }
    
    public function setaplicaciones($aplicaciones)
    {
        $this->aplicaciones=$aplicaciones;
    }
    
    public function setprocesamiento($procesamiento)
    {
        $this->procesamiento=$procesamiento;
    }
    
    public function setlenguaje($lenguaje)
    {
        $this->lenguaje=$lenguaje;
    }
    
    public function setmodelos($modelos)
    {
        $this->modelos=$modelos;
    }
    
    public function setconclusiones($conclusiones)
    {
        $this->conclusiones=$conclusiones;
    }
    
    public function setUnidadAprendizaje_idUnidadAprendizaje($UnidadAprendizaje_idUnidadAprendizaje)
    {
        $this->UnidadAprendizaje_idUnidadAprendizaje=$UnidadAprendizaje_idUnidadAprendizaje;
    }
}
