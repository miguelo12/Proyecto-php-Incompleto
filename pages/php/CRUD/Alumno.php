<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alumno
 *
 * @author darkg
 */
include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class Alumno {
    private $idAlumno;
    private $email;
    private $nombre;
    private $password;
    private $habilitado;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function validar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumno where email=? and password=?");
      
      $sentencia->bind_param("ss", $this->email, $this->password);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res = array("id" => $row["idAlumno"], "nombre" => $row["nombre"], "email" => $row["email"], "habilitado" => $row["habilitado"]);
          }
      }
      else {
          unset($res);
      }
      
      return $res;
    }
    
    public function Existeono()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumno where email=?");
      
      $sentencia->bind_param("s", $this->email);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          return true;
      }
      return false;
    }
    
    public function FueActualizado()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumno where email=?");
      
      $sentencia->bind_param("s", $this->email);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res = $row["nombre"];
          }       
      }
      
      if($res == "Sin nombre")
      {
        return false;
      } 
      
      return true;
    }
    
    public function isHabilitado()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumno where idAlumno=?");
      
      $sentencia->bind_param("s", $this->idAlumno);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res = $row["habilitado"];
          }       
      }
      return $res;
    }
    
    public function Ingresar()
    {
      
      $c=$this->con->getConexion();
      
      $dates1 = date("d");
      
      $dates2 = date("s");
      
      $subemail = substr($this->email, 0, 2);
      
      $rand1 = chr(rand(65,90));
      
      $rand3 = chr(rand(65,90));
      
      $rand2 = rand(1,8);
      
      $this->setidAlumno((string)"{$rand3}{$dates2}{$rand1}{$dates1}{$subemail}{$rand2}ALU");
      
      $this->sethabilitado(0);
      
      $sentencia=$c->prepare("insert into alumno values(?,?,?,?,?)");
      
      $sentencia->bind_param("sssss", $this->idAlumno, $this->email, $this->password, $this->nombre, $this->habilitado);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function ExisteonoPorID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumno where idAlumno=?");
      
      $sentencia->bind_param("s", $this->idAlumno);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function Eliminar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("delete from alumno where idAlumno=?");
      
      $sentencia->bind_param("s", $this->idDocente);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function Actualizar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("update alumno set email=?, nombre=?, password=?, habilitado=? where idAlumno=?");
      
      $sentencia->bind_param("sssss", $this->email, $this->nombre, $this->password, $this->idAlumno, $this->habilitado);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function Habilitarono()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("update alumno set habilitado=? where idAlumno=?");
      
      $sentencia->bind_param("ss", $this->habilitado, $this->idAlumno);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function DevolverAlumno()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumno");
      
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
    
    public function setEmail($em)
    {
        $this->email=$em;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    
    public function setPassword($pass)
    {
        $this->password=$pass;
    }
    
    public function setNombre($nom)
    {
        $this->nombre=$nom;
    }
    
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function setidAlumno($ad)
    {
        $this->idAlumno=$ad;
    }
    
    public function getidAlumno()
    {
        return $this->idAlumno;
    }
    
    public function sethabilitado($habilitado)
    {
        $this->habilitado=$habilitado;
    }
}

