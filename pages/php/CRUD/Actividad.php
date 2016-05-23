<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Actividad
 *
 * @author Miguel Sanchez
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class Actividad {
    private $idActividad; #s
    private $fecha_inicio; #s
    private $fecha_termino; #s
    private $finalizada; #b
    private $UnidadAprendizaje_idUnidadAprendizaje; #i
    private $Seccion_idSeccion; #s
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    function Codigo()
    {
    $uc=TRUE;
    $n=TRUE;
    $sc=TRUE;
    $source = 'abcdefghijklmnopqrstuvwxyz';
    if($uc==1){ $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';}
    if($n==1){ $source .= '1234567890';}
    if($sc==1){ $source .= '@*';}
    $max_chars = round(rand(5,9));
    if($max_chars>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$max_chars; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
      $this->setidActividad($rstr);
    }
    
    public function Ingresar()
    {
      //genera la conexion
      $c=$this->con->getConexion();
      
      $this->codigo();
      
      while($this->ExisteonoPorID())
      {
        $this->codigo();
      }
      
      $this->setfinalizada(false);
      
      //prepara los datos antes de insertarlo
      $sentencia=$c->prepare("insert into actividad values(?,?,?,?,?,?)");
      //inserta los datos
      $sentencia->bind_param("sssiis", $this->idActividad, $this->fecha_inicio, $this->fecha_termino, $this->finalizada, $this->UnidadAprendizaje_idUnidadAprendizaje, $this->Seccion_idSeccion);
      //ejecutar el script
      $sentencia->execute();
      //reviza si se hizo un cambio
      if($sentencia->affected_rows)
      {
        //devuelve la id.
        return $this->idActividad;
      }
      else {
       return null;    
      }
    }
    
    public function ExisteonoPorID()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from seccion where idSeccion=? and Docente_idDocente=?");
      
      $sentencia->bind_param("ss", $this->idSeccion, $this->Docente_idDocente);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function setidActividad($idActividad)
    {
        $this->idActividad=$idActividad;
    }
    
    public function setfecha_inicio($fecha_inicio)
    {
        $this->fecha_inicio=$fecha_inicio;
    }
    
    public function setfecha_termino($fecha_termino)
    {
        $this->fecha_termino=$fecha_termino;
    }
    
    public function setUnidadAprendizaje_idUnidadAprendizaje($UnidadAprendizaje_idUnidadAprendizaje)
    {
        $this->UnidadAprendizaje_idUnidadAprendizaje=$UnidadAprendizaje_idUnidadAprendizaje;
    }
    
    public function setSeccion_idSeccion($Seccion_idSeccion)
    {
        $this->Seccion_idSeccion=$Seccion_idSeccion;
    }
    
    public function setfinalizada($finalizada)
    {
        $this->finalizada=$finalizada;
    } 
}
