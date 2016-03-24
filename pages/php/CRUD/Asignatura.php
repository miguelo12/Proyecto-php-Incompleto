<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Asignatura
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class Asignatura {
    private $idAsignatura; #s
    private $nombre; #s
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function TraerporID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from asignatura where idAsignatura=?");
      
      $sentencia->bind_param("s", $this->idAsignatura);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res = array("id" => $row["idAsignatura"],"nombre" => $row["nombre"],);
          }
      }
      else {
          unset($res);
      }
      
      return $res;
    }
    
    public function Ingresar()
    {
      
      $c=$this->con->getConexion();
      
      $rand = rand(0,10);
      
      $rand2 = substr($this->nombre, 0, 2);
      
      $rand1 = chr(rand(65,90));
      
      $newid = "{$rand1}{$rand}{$rand2}";
      
      $this->setidAsignatura($newid);
      
      $sentencia=$c->prepare("insert into asignatura values(?,?)");
      
      $sentencia->bind_param("ss", $this->idAsignatura, $this->nombre);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
          //devuelve la id.
       return $this->idAsignatura;
      }
      else {
       return null;    
      }
    }
    
    public function DevolverAsignaturas()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from asignatura");
      
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
    
    public function setNombre($nom)
    {
        $this->nombre=$nom;
    }
    
    public function setidAsignatura($idAsignatura)
    {
        $this->idAsignatura=$idAsignatura;
    }
    
}
