<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UnidaddeAprendizaje
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class UnidadAprendizaje {
    private $idAprendizaje;
    private $Titulo;
    private $Rubrica_idRubrica;
    private $Docente_idDocente;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into unidadaprendizaje (Titulo,Rubrica_idRubrica,Docente_idDocente) values(?,?,?)");
      
      $sentencia->bind_param("sis", $this->Titulo, $this->Rubrica_idRubrica, $this->Docente_idDocente);
      
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
    
    public function setidAprendizaje($idAprendizaje)
    {
        $this->idAprendizaje=$idAprendizaje;
    }
    
    public function setTitulo($Titulo)
    {
        $this->Titulo=$Titulo;
    }
    
    public function setRubrica_idRubrica($Rubrica_idRubrica)
    {
        $this->Rubrica_idRubrica=$Rubrica_idRubrica;
    }
    
    public function setDocente_idDocente($Docente_idDocente)
    {
        $this->Docente_idDocente=$Docente_idDocente;
    }
}
