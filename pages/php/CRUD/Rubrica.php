<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rubrica
 *
 * @author darkg
 */
include_once ("..\pages\php\Conexion\Conexion.php");
include_once ("..\php\Conexion\Conexion.php");
include_once ("../../php/Conexion/Conexion.php");
class Rubrica {
    private $idRubrica;
    private $Predeterminado;
    private $Docente_idDocente;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into rubrica (Predeterminado,Docente_idDocente) values(?,?)");
      
      $sentencia->bind_param("is",$this->Predeterminado, $this->Docente_idDocente);
      
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
      
      $sentencia=$c->prepare("select * from rubrica where idRubrica=?");
      
      $sentencia->bind_param("i", $this->idRubrica);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function setIdRubrica($idRubrica) {
        $this->idRubrica = $idRubrica;
    }

    public function setPredeterminado($Predeterminado) {
        $this->Predeterminado = $Predeterminado;
    }

    public function setDocente_idDocente($Docente_idDocente) {
        $this->Docente_idDocente = $Docente_idDocente;
    }
}