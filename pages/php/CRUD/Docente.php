<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Miguel Sanchez
 */

include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class Docente {
    private $idDocente;
    private $email;
    private $nombre;
    private $password;
    private $admin;
    private $habilitado;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function validar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from docente where email=? and password=?");
      
      $sentencia->bind_param("ss", $this->email, $this->password);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res = array("id" => $row["idDocente"], "nombre" => $row["nombre"], "email" => $row["email"], "admin" => $row["admin"], "habilitado" => $row["habilitado"]);
          }
      }
      else {
          unset($res);
      }
      
      return $res;
    }
    
    public function id()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from docente where email=?");
      
      $sentencia->bind_param("s", $this->email);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res = $row["idDocente"];
          }
      }
      else {
          unset($res);
      }
      
      return $res;
    }
    
    public function Habilitarono()
    {
      try{
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("update docente set habilitado=? where idDocente=?");
      
      $sentencia->bind_param("ss", $this->habilitado, $this->idDocente);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
        return true;    
      }
      else
      {
        return false;
      }
      }
      catch (Exception $e)
      {
        return false;
      }
    }
    
    public function Existeono()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from docente where email=?");
      
      $sentencia->bind_param("s", $this->email);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function ExisteonoPorID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from docente where idDocente=?");
      
      $sentencia->bind_param("s", $this->idDocente);
      
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
      
      $sentencia=$c->prepare("delete from docente where idDocente=?");
      
      $sentencia->bind_param("s", $this->idDocente);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
      return true;
      }
      else {
          return FALSE;   
      }
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
      $this->setidDocente($rstr);
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $this->codigo();
      
      while($this->ExisteonoPorID())
      {
        $this->codigo();
      }
      
      $this->sethabilitado(1);
      
      $sentencia=$c->prepare("insert into docente values(?,?,?,?,?,?)");
      
      $sentencia->bind_param("ssssss", $this->idDocente, $this->email, $this->password, $this->nombre, $this->admin, $this->habilitado);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
      return true;
      }
      else {
      return FALSE;    
      }
    }
    
    public function DevolverDocentes()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from docente");
      
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
    
    public function isHabilitado()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from docente where idDocente=?");
      
      $sentencia->bind_param("s", $this->idDocente);
      
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
    
    public function setAdmin($admin)
    {
        $this->admin=$admin;
    }
    
    public function setidDocente($docente)
    {
        $this->idDocente=$docente;
    }
    
    public function sethabilitado($habilitado)
    {
        $this->habilitado=$habilitado;
    }
}
