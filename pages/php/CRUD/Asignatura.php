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
    private $idAsignatura; #i
    private $nombre; #s
    private $Docente_idDocente; #s
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into asignatura (Nombre,Docente_idDocente) values(?,?)");
      
      $sentencia->bind_param("ss", $this->nombre, $this->Docente_idDocente);
      
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
    
    public function ExisteonoPorNombre()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from asignatura where Nombre=? and Docente_idDocente=?");
      
      $sentencia->bind_param("ss", $this->nombre, $this->Docente_idDocente);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function DevolverAsignaturasid()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from asignatura where idAsignatura=?");
      
      $sentencia->bind_param("i", $this->idAsignatura);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res = $row["Nombre"];
          }
      }
      else {
          unset($res);
      }
      
      return $res;
    }
    
    public function DevolverAsignaturasNombre()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from asignatura where Nombre=? and Docente_idDocente=?");
      
      $sentencia->bind_param("ss", $this->nombre, $this->Docente_idDocente);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res = $row;
          }
      }
      else {
          unset($res);
      }
      
      return $res;
    }
    
    public function DevolverAsignaturasDocente()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from asignatura where Docente_idDocente=?");
      
      $sentencia->bind_param("s", $this->Docente_idDocente);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res[] = array("idAsignatura" => $row["idAsignatura"], "Nombre" => $row["Nombre"], "Docente_idDocente" => $row["Docente_idDocente"]);
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
    
    public function setDocente_idDocente($Docente_idDocente)
    {
        $this->Docente_idDocente=$Docente_idDocente;
    }
}
