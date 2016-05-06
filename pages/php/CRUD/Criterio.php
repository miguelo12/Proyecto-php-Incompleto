<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Criterio
 *
 * @author Miguel Sanchez
 */
include_once ("..\pages\php\Conexion\Conexion.php");
include_once ("..\php\Conexion\Conexion.php");
include_once ("../../php/Conexion/Conexion.php");
class Criterio {
    private $idCriterio; #i
    private $Nombre; #s
    private $TipoCriterioRubrica_idTipoCriterioRubrica; #i
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into criterio(Nombre,TipoCriterioRubrica_idTipoCriterioRubrica)values(?,?)");
      
      $sentencia->bind_param("si", $this->Nombre, $this->TipoCriterioRubrica_idTipoCriterioRubrica);
      
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
    
    public function Eliminar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("delete from criterio where idCriterio=?");
      
      $sentencia->bind_param("i", $this->idCriterio);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
       //devuelve la id.
       return true;
      }
      else {
       return false;
      }
    }
    
    public function Actualizar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("update criterio set Nombre=? where idCriterio=?");
      
      $sentencia->bind_param("si", $this->Nombre, $this->idCriterio);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
       //devuelve la id.
       return true;
      }
      else {
       return false;
      }
    }
    
    public function ExisteonoPorID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from criterio where idCriterio=?");
      
      $sentencia->bind_param("i", $this->idCriterio);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function DevolverCriterio()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from criterio where TipoCriterioRubrica_idTipoCriterioRubrica=?");
      
      $sentencia->bind_param("i", $this->TipoCriterioRubrica_idTipoCriterioRubrica);
      
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
    
    public function setidCriterio($idCriterio)
    {
        $this->idCriterio=$idCriterio;
    }
    
    public function setTipoCriterioRubrica_idTipoCriterioRubrica($TipoCriterioRubrica_idTipoCriterioRubrica)
    {
        $this->TipoCriterioRubrica_idTipoCriterioRubrica=$TipoCriterioRubrica_idTipoCriterioRubrica;
    }
    
    public function setNombre($Nombre)
    {
        $this->Nombre=$Nombre;
    }
}
