<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlumnoGrupo
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class AlumnosGrupo {
    private $idAlumnosGrupo; #i
    private $Alumno_idAlumno; #s
    private $Grupo_idGrupo; #i
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into alumnogrupo values(?,?,?)");
      
      $sentencia->bind_param("iii", $this->idAlumnosGrupo, $this->Alumno_idAlumno, $this->Grupo_idGrupo);
      
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
        $this->Alumno_idAlumno=$idAlumno;
    }
    
    public function setidGrupo($idGrupo)
    {
        $this->Grupo_idGrupo=$idGrupo;
    }
}
