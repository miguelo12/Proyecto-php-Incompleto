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
