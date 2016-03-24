<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoCriterioRubrica
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class TipoCriterioRubrica {
    private $Rubrica_idRubrica;
    private $tipos;
    private $idTipoCriterioRubrica;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into tipocriteriorubrica (tipos,Rubrica_idRubrica) values(?,?)");
      
      $sentencia->bind_param("ii", $this->tipos, $this->Rubrica_idRubrica);
      
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
    
    public function DevolverTipoCriterioRubrica()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from tipocriteriorubrica where Rubrica_idRubrica=?");
      
      $sentencia->bind_param("i", $this->Rubrica_idRubrica);
      
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
    
    public function setRubrica_idRubrica($Rubrica_idRubrica)
    {
        $this->Rubrica_idRubrica=$Rubrica_idRubrica;
    }
    
    public function settipos($tipos)
    {
        $this->tipos=$tipos;
    }
    
    public function setidTipoCriterioRubrica($idTipoCriterioRubrica)
    {
        $this->idTipoCriterioRubrica=$idTipoCriterioRubrica;
    }
}