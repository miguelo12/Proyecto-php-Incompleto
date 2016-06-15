<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Alumnounidadaprendizaje
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class AlumnoUnidadAprendizaje {
    private $idAlumnoUnidadAprendizaje; //i
    private $Alumno_idAlumno; //s
    private $Actividad_idActividad; //s
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into alumnounidadaprendizaje values(?,?,?)");
      
      $sentencia->bind_param("iss", $this->idAlumnoUnidadAprendizaje, $this->Alumno_idAlumno, $this->Actividad_idActividad);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
          //devuelve la id.
       return $sentencia->insert_id;
      }
      else {
       return null;    
      }
    }
    
    public function ExisteonoPorID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumnounidadaprendizaje where Actividad_idActividad=? and Alumno_idAlumno=?");
      
      $sentencia->bind_param("ss", $this->Actividad_idActividad, $this->Alumno_idAlumno);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function DevolveridActividad()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumnounidadaprendizaje where idAlumnoUnidadAprendizaje=?");
      
      $sentencia->bind_param("i", $this->idAlumnoUnidadAprendizaje);
      
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
    
    public function DevolverActividad()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumnounidadaprendizaje where Alumno_idAlumno=? and Actividad_idActividad=?");
      
      $sentencia->bind_param("ss", $this->Alumno_idAlumno, $this->Actividad_idActividad);
      
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
    
    public function DevolverAlumnos()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("SELECT alu.email as email, alu.nombre FROM alumnounidadaprendizaje as aluni INNER JOIN alumno as alu on aluni.Alumno_idAlumno=alu.idAlumno where aluni.Actividad_idActividad=?");
      
      $sentencia->bind_param("s", $this->Actividad_idActividad);
      
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
    
    public function setidAlumnoUnidadAprendizaje($idAlumnoUnidadAprendizaje)
    {
        $this->idAlumnoUnidadAprendizaje=$idAlumnoUnidadAprendizaje;
    }
    
    public function setActividad_idActividad($Actividad_idActividad)
    {
        $this->Actividad_idActividad=$Actividad_idActividad;
    }
    
    public function setAlumno_idAlumno($idAlumno)
    {
        $this->Alumno_idAlumno=$idAlumno;
    }
}
