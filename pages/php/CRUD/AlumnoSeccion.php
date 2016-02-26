<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlumnoSeccion
 *
 * @author darkg
 */
include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class AlumnoSeccion {
    private $idAlumnoSeccion;
    private $idSeccion;
    private $idAlumno;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into alumnoseccion values(?,?,?)");
      
      $sentencia->bind_param("iss", $this->idAlumnoSeccion, $this->idSeccion, $this->idAlumno);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function setidAlumnoSeccion($idAlumnoSeccion)
    {
        $this->idAlumnoSeccion=$idAlumnoSeccion;
    }
    
    public function setidSeccion($idSeccion)
    {
        $this->idSeccion=$idSeccion;
    }
    
    public function setidAlumno($idAlumno)
    {
        $this->idAlumno=$idAlumno;
    }
}
