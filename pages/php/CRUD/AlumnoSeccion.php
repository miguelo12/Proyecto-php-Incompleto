<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlumnoSeccion
 *
 * @author Miguel Sanchez
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
      
      $sentencia=$c->prepare("select * from alumnoseccion where Alumno_idAlumno=? and Seccion_idSeccion=?");
      
      $sentencia->bind_param("ss", $this->Alumno_idAlumno, $this->Seccion_idSeccion);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function EntregarSeccionAlumno()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select asi.Nombre as asignatura, aluse.Seccion_idSeccion as idseccion, act.idActividad as idactividad from alumnoseccion as aluse inner JOIN seccion as se on se.idSeccion=aluse.Seccion_idSeccion inner join asignatura as asi on se.Asignatura_idAsignatura=asi.idAsignatura inner join actividad as act on act.Seccion_idSeccion=se.idSeccion where aluse.Alumno_idAlumno=? and act.finalizada=0 and act.fecha_termino>=CURDATE()");
      
      $sentencia->bind_param("s", $this->Alumno_idAlumno);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        while($row = $resu->fetch_assoc()){
          $res[] = $row;
        }
      }
      else{
          $res = null;
      }

      return $res;
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
