<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Seccion
 *
 * @author Miguel Sanchez
 */

include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class Seccion {
    private $idSeccion; 
    private $Docente_idDocente;
    private $Asignatura_idAsignatura;
    private $Codigo;
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      
      $c=$this->con->getConexion();
      
//      $rand = rand(0,10);
//      
//      $rand2 = substr($this->idAsignatura, 0, 2);
//      
//      $rand3 = substr($this->idDocente, 0, 2);
//      
//      $rand1 = chr(rand(65,90));
//      
//      $newid = "{$rand1}{$rand}{$rand2}{$rand3}";
//      
//      $this->setidSeccion($newid);
      
      $sentencia=$c->prepare("insert into seccion values(?,?,?,?)");
      
      $sentencia->bind_param("sssi", $this->idSeccion, $this->Docente_idDocente, $this->Asignatura_idAsignatura, $this->Codigo);
      
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
      
      $sentencia=$c->prepare("select * from seccion where idSeccion=?");
      
      $sentencia->bind_param("s", $this->idSeccion);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function DevolverSeccion()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from seccion");
      
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
    
    public function setidSeccion($idSeccion)
    {
        $this->idSeccion=$idSeccion;
    }
    
    public function setDocente_idDocente($Docente_idDocente)
    {
        $this->Docente_idDocente=$Docente_idDocente;
    }
    
    public function setAsignatura_idAsignatura($Asignatura_idAsignatura)
    {
        $this->Asignatura_idAsignatura=$Asignatura_idAsignatura;
    }
    
public function setCodigo($Codigo)
    {
        $this->Codigo=$Codigo;
    }
}
