<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Preguntas
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class Preguntas {
    private $idPreguntas;
    private $preguntas;
    private $UnidadAprendizaje_idUnidadAprendizaje;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into preguntas (preguntas,UnidadAprendizaje_idUnidadAprendizaje) values(?,?)");
      
      $sentencia->bind_param("si", $this->preguntas, $this->UnidadAprendizaje_idUnidadAprendizaje);
      
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
    
    public function DevolverPreguntas()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from preguntas where UnidadAprendizaje_idUnidadAprendizaje=?");
      
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
    
    public function setidPreguntas($idPreguntas)
    {
        $this->idPreguntas=$idPreguntas;
    }
    
    public function setpreguntas($preguntas)
    {
        $this->preguntas=$preguntas;
    }
    
    public function setUnidadAprendizaje_idUnidadAprendizaje($UnidadAprendizaje_idUnidadAprendizaje)
    {
        $this->UnidadAprendizaje_idUnidadAprendizaje=$UnidadAprendizaje_idUnidadAprendizaje;
    }
}
