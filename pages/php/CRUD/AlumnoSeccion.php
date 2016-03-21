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
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class AlumnoSeccion {
    private $idAlumnoSeccion;
    private $Seccion_idSeccion;
    private $Alumno_idAlumno;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into alumnoseccion values(?,?,?)");
      
      $sentencia->bind_param("iss", $this->idAlumnoSeccion, $this->Seccion_idSeccion, $this->Alumno_idAlumno);
      
      $sentencia->execute();
      
      return true;
    }
    
    public function ExisteonoPorID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumnoseccion where idAlumnoSeccion=?");
      
      $sentencia->bind_param("i", $this->idAlumnoSeccion);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function setidAlumnoSeccion($idAlumnoSeccion)
    {
        $this->idAlumnoSeccion=$idAlumnoSeccion;
    }
    
    public function setSeccion_idSeccion($idSeccion)
    {
        $this->Seccion_idSeccion=$idSeccion;
    }
    
    public function setAlumno_idAlumno($idAlumno)
    {
        $this->Alumno_idAlumno=$idAlumno;
    }
}
