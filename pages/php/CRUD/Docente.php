<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author darkg
 */

include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class Docente {
    private $idDocente;
    private $email;
    private $nombre;
    private $password;
    private $admin;
    
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
              $res = array("id" => $row["idDocente"], "nombre" => $row["nombre"], "email" => $row["email"], "admin" => $row["admin"]);
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
      
      $resu = $sentencia->get_result();
      
      return true;
    }
    
    public function Ingresar()
    {
      
      $c=$this->con->getConexion();
      
      $dates1 = date("yd");
      
      $subemail = substr($this->email, 0, 2);
      
      $rand1 = rand(0,9);
      
      $this->setidDocente((string)"{$rand1}{$dates1}{$subemail}");
      
      $sentencia=$c->prepare("insert into docente values(?,?,?,?,?)");
      
      $sentencia->bind_param("sssss", $this->idDocente, $this->email, $this->password, $this->nombre, $this->admin);
      
      $sentencia->execute();
      
      return true;
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
}
