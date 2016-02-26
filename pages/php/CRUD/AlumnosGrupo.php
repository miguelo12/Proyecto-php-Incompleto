<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlumnoGrupo
 *
 * @author darkg
 */
include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class AlumnosGrupo {
    private $idAlumnosGrupo;
    private $idAlumno;
    private $idGrupo;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into alumnogrupo values(?,?,?)");
      
      $sentencia->bind_param("iii", $this->idAlumnosGrupo, $this->idAlumno, $this->idGrupo);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function ExisteonoPorID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumnogrupo where idAlumnosGrupo=?");
      
      $sentencia->bind_param("i", $this->idAlumnosGrupo);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function setidAlumnosGrupo($idAlumnosGrupo)
    {
        $this->idAlumnosGrupo=$idAlumnosGrupo;
    }
    
    public function setidAlumno($idAlumno)
    {
        $this->idAlumno=$idAlumno;
    }
    
    public function setidGrupo($idGrupo)
    {
        $this->idGrupo=$idGrupo;
    }
}
