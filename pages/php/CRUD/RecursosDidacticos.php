<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecursosDidacticos
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class RecursosDidacticos {
    private $idRecursosDidacticos;
    private $UnidadAprendizaje_idUnidadAprendizaje;
    private $nombre;
    private $descripcion;
    private $tipo;
    private $url;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into recursosdidacticos (UnidadAprendizaje_idUnidadAprendizaje,nombre,descripcion,tipo,url) values(?,?,?,?,?)");
      
      $sentencia->bind_param("issss", $this->UnidadAprendizaje_idUnidadAprendizaje, $this->nombre, $this->descripcion, $this->tipo, $this->url);
      
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
    
    public function DevolverRecurso()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from recursosdidacticos where UnidadAprendizaje_idUnidadAprendizaje=?");
      
      $sentencia->bind_param("i", $this->UnidadAprendizaje_idUnidadAprendizaje);
      
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
    
    public function DevolverRecursoEdit()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from recursosdidacticos where UnidadAprendizaje_idUnidadAprendizaje=?");
      
      $sentencia->bind_param("i", $this->UnidadAprendizaje_idUnidadAprendizaje);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res[] = array("idRecursosDidacticos" => $row["idRecursosDidacticos"],"nombre" => $row["nombre"],"descripcion" => $row["descripcion"],"tipo" => $row["tipo"],"url" => $row["url"], "eliminar" => null);
          }
      }
      else {
          unset($res);
      }
      
      return $res;
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

    public function setIdUnidadAprendizaje_idUnidadAprendizaje($UnidadAprendizaje_idUnidadAprendizaje) {
        $this->UnidadAprendizaje_idUnidadAprendizaje = $UnidadAprendizaje_idUnidadAprendizaje;
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
    
    public function seturl($url) {
        $this->url = $url;
    }
}
