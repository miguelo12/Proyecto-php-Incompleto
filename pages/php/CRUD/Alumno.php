<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alumno
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class Alumno {
    private $idAlumno; #s
    private $email; #s
    private $nombre; #s 
    private $password; #s
    private $habilitado; #i
    
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
      
      $sentencia=$c->prepare("select * from alumno where idAlumno=?");
      
      $sentencia->bind_param("s", $this->idAlumno);
      
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
    
    function Codigo()
    {
    $uc=TRUE;
    $n=TRUE;
    $sc=TRUE;
    $source = 'abcdefghijklmnopqrstuvwxyz';
    if($uc==1){ $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';}
    if($n==1){ $source .= '1234567890';}
    if($sc==1){ $source .= '@*';}
    $max_chars = round(rand(10,15));
    if($max_chars>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$max_chars; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
      $this->setidAlumno($rstr);
    }
    
    public function Ingresar()
    {
      
      $c=$this->con->getConexion();
      
      $this->codigo();
      
      while($this->ExisteonoPorID())
      {
        $this->codigo();
      }
      
      $this->sethabilitado(0);
      
      $sentencia=$c->prepare("insert into alumno values(?,?,?,?,?)");
      
      $sentencia->bind_param("ssssi", $this->idAlumno, $this->email, $this->password, $this->nombre, $this->habilitado);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
          //devuelve la id.
       return TRUE;
      }
      else {
       return null;    
      }
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
      
      if($sentencia->affected_rows)
      {
          //devuelve la id.
       return true;
      }
      else {
       return FALSE;      
      }
    }
    
    public function Actualizar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("update alumno set email=?, nombre=?, password=?, habilitado=? where idAlumno=? and nombre='Sin nombre'");
      
      $sentencia->bind_param("sssis", $this->email, $this->nombre, $this->password, $this->habilitado, $this->idAlumno);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
          //devuelve la id.
       return true;
      }
      else {
       return FALSE;      
      }
    }
    
    public function Habilitarono()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("update alumno set habilitado=? where idAlumno=?");
      
      $sentencia->bind_param("ss", $this->habilitado, $this->idAlumno);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
          //devuelve la id.
       return true;
      }
      else {
      return FALSE;       
      }
    }
    
    public function DevolverIdporEmail()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumno where email=?");
      
      $sentencia->bind_param("s", $this->email);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              return $row["idAlumno"];
          }
      }
      return false;
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

