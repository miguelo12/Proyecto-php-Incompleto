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
    private $Habilitar;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
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
    $max_chars = round(rand(5,6));
    if($max_chars>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$max_chars; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
      $this->setidSeccion($rstr);
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $this->codigo();
      
      while($this->ExisteonoPorID())
      {
        $this->codigo();
      }
      
      $this->setHabilitar(1);
      
      $sentencia=$c->prepare("insert into seccion (idSeccion,Docente_idDocente,Asignatura_idAsignatura,Codigo,Habilitar) values(?,?,?,?,?)");
      
      $sentencia->bind_param("ssiii", $this->idSeccion, $this->Docente_idDocente, $this->Asignatura_idAsignatura, $this->Codigo, $this->Habilitar);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
          //devuelve la id.
       return true;
      }
      else {
       return false;    
      }
    }
    
    public function ExisteonoPorID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from seccion where idSeccion=? and Docente_idDocente=?");
      
      $sentencia->bind_param("ss", $this->idSeccion, $this->Docente_idDocente);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function ExisteonoPorCodigo()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from seccion where Codigo=? and Docente_idDocente=? and Asignatura_idAsignatura=?");
      
      $sentencia->bind_param("isi", $this->Codigo, $this->Docente_idDocente, $this->Asignatura_idAsignatura);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function DevolverSeccionDocente()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from seccion where Docente_idDocente=?");
      
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
    
    public function DevolverSeccionid()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from seccion where idSeccion=?");
      
      $sentencia->bind_param("s", $this->idSeccion);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res = array("Codigo"=>$row["Codigo"],"Asignatura"=>$row["Asignatura_idAsignatura"]);
          }
      }
      else {
          unset($res);
      }
      
      return $res;
    }
    
    public function DevolverSeccionDocenteAsignatura()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from seccion where Docente_idDocente=? and Asignatura_idAsignatura=?");
      
      $sentencia->bind_param("si", $this->Docente_idDocente, $this->Asignatura_idAsignatura);
      
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
    
    public function Habilitar()
    {
      try{
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("update seccion set Habilitar=? where idSeccion=?");
      
      $sentencia->bind_param("is", $this->Habilitar, $this->idSeccion);
      
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
        $this->Codigo=$Codigo.trim();
    }
    
    public function setHabilitar($Habilitar)
    {
        $this->Habilitar=$Habilitar;
    }
}
