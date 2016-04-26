<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rubrica
 *
 * @author Miguel Sanchez
 */
include_once ("..\pages\php\Conexion\Conexion.php");
include_once ("..\php\Conexion\Conexion.php");
include_once ("../../php/Conexion/Conexion.php");
class Rubrica {
    private $idRubrica;
    private $nombre;
    private $Docente_idDocente;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into rubrica (nombre,Docente_idDocente) values(?,?)");
      
      $sentencia->bind_param("ss",$this->nombre, $this->Docente_idDocente);
      
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
      
      $sentencia=$c->prepare("select * from rubrica where idRubrica=?");
      
      $sentencia->bind_param("i", $this->idRubrica);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function DevolverRubrica()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from rubrica where Docente_idDocente=?");
      
      $sentencia->bind_param("s", $this->Docente_idDocente);
      
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
    
    public function DevolverRubricaPredeterminada()
    {
      $c=$this->con->getConexion();
      
      $this->setnombre("Predeterminado");
      
      $sentencia=$c->prepare("select * from rubrica where Docente_idDocente=? and nombre=?");
      
      $sentencia->bind_param("ss", $this->Docente_idDocente, $this->nombre);
      
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
    
    public function DevolverRubricaid()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from rubrica where Docente_idDocente=? and idRubrica=?");
      
      $sentencia->bind_param("si", $this->Docente_idDocente, $this->idRubrica);
      
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
    
    public function setIdRubrica($idRubrica) {
        $this->idRubrica = $idRubrica;
    }

    public function setnombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDocente_idDocente($Docente_idDocente) {
        $this->Docente_idDocente = $Docente_idDocente;
    }
}