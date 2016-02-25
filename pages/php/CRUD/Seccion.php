<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Seccion
 *
 * @author darkg
 */

include("../php/Conexion/Conexion.php");
class Seccion {
    private $idSeccion; 
    private $idDocente;
    private $idAsignatura;
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
//      $this->setNombre($newid);
      
      $sentencia=$c->prepare("insert into seccion values(?,?,?)");
      
      $sentencia->bind_param("sss", $this->idSeccion, $this->idDocente, $this->idAsignatura);
      
      $sentencia->execute();
      
      return true;
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
    
    public function setidDocente($idDocente)
    {
        $this->idDocente=$idDocente;
    }
    
    public function setidAsignatura($idAsignatura)
    {
        $this->idAsignatura=$idAsignatura;
    }
}
