<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecursosDidacticos
 *
 * @author darkg
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class RecursosDidacticos {
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
      
      $sentencia=$c->prepare("insert into recursosdidacticos values(?,?,?,?,?,?)");
      
      $sentencia->bind_param("iissss", $this->idRecursosDidacticos, $this->idUnidadAprendizaje, $this->nombre, $this->descripcion, $this->tipo);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function ExisteonoPorID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from recursosdidacticos where idRecursosDidacticos=?");
      
      $sentencia->bind_param("i", $this->idRecursosDidacticos);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function setIdRecursosDidacticos($idRecursosDidacticos) {
        $this->idRecursosDidacticos = $idRecursosDidacticos;
    }

    public function setIdUnidadAprendizaje($idUnidadAprendizaje) {
        $this->idUnidadAprendizaje = $idUnidadAprendizaje;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}
