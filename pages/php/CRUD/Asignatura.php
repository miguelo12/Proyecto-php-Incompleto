<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Asignatura
 *
 * @author darkg
 */

include("../php/Conexion/Conexion.php");
class Asignatura {
    private $idAsignatura;
    private $nombre;
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function TraerNombre()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from asignatura where nombre=?");
      
      $sentencia->bind_param("s", $this->nombre);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res = array("id" => $row["idAsignatura"],"nombre" => $row["nombre"],);
          }
      }
      else {
          unset($res);
      }
      
      return $res;
    }
    
}
