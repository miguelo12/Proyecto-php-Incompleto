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
    private $evaluado; #b
    private $UnidadAprendizaje_idUnidadAprendizaje; #i
    private $Seccion_idSeccion; #s
    private $docente;
    
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
      
      $this->setevaluado(false);
      
      //prepara los datos antes de insertarlo
      $sentencia=$c->prepare("insert into actividad values(?,?,?,?,?,?,?)");
      //inserta los datos
      $sentencia->bind_param("sssiiis", $this->idActividad, $this->fecha_inicio, $this->fecha_termino, $this->finalizada, $this->evaluado, $this->UnidadAprendizaje_idUnidadAprendizaje,$this->Seccion_idSeccion);
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
      
      $sentencia=$c->prepare("select * from actividad where idActividad=?");
      
      $sentencia->bind_param("s", $this->idActividad);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function Finalizar()
    {
      try{
      $c=$this->con->getConexion();
      
      $this->setfinalizada(1);
      
      $sentencia=$c->prepare("update actividad set finalizada=? where idActividad=?");
      
      $sentencia->bind_param("is", $this->finalizada, $this->idActividad);
      
      $sentencia->execute();
      
      if($sentencia->affected_rows)
      {
        return true;    
      }
      else
      {
        return false;
      }
      }
      catch (Exception $e)
      {
        return false;
      }
    }
    
    public function ActividadOcupada()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select uni.Titulo from actividad as act INNER JOIN unidadaprendizaje as uni on act.UnidadAprendizaje_idUnidadAprendizaje=uni.idUnidadAprendizaje where fecha_termino>=CURDATE() and finalizada=0 and uni.idUnidadAprendizaje=?");
      
      $sentencia->bind_param("i", $this->UnidadAprendizaje_idUnidadAprendizaje);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          $res = TRUE;
      }
      else {
          $res = FALSE;
      }
      
      return $res;
    }
    
    public function DevolverActividadNuevas()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("SELECT c.Nombre as nombre,b.Codigo as codigo,d.Titulo as titulo,a.fecha_inicio as fechainicio,a.fecha_termino as fechatermino,a.finalizada,a.evaluado,a.idActividad as id from actividad as a INNER JOIN seccion as b ON a.Seccion_idSeccion=b.idSeccion INNER JOIN asignatura as c ON b.Asignatura_idAsignatura=c.idAsignatura INNER JOIN unidadaprendizaje as d on a.UnidadAprendizaje_idUnidadAprendizaje=d.idUnidadAprendizaje where fecha_termino>=CURDATE() and finalizada=0 and d.Docente_idDocente=?");
      
      $sentencia->bind_param("s", $this->docente);
      
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
    
    public function DevolverPorIdActividad()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("SELECT c.Nombre as nombre,b.Codigo as codigo,d.Titulo as titulo,a.fecha_inicio as fechainicio,a.fecha_termino as fechatermino from actividad as a INNER JOIN seccion as b ON a.Seccion_idSeccion=b.idSeccion INNER JOIN asignatura as c ON b.Asignatura_idAsignatura=c.idAsignatura INNER JOIN unidadaprendizaje as d on a.UnidadAprendizaje_idUnidadAprendizaje=d.idUnidadAprendizaje where a.idActividad=?");
      
      $sentencia->bind_param("s", $this->idActividad);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
          while($row = $resu->fetch_assoc()){
              $res = $row;
          }
      }
      else {
          unset($res);
      }
      
      return $res;
    }
    
    public function DevolverActividadAntiguas()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("SELECT c.Nombre as nombre,b.Codigo as codigo,d.Titulo as titulo,a.fecha_inicio as fechainicio,a.fecha_termino as fechatermino,a.finalizada,a.evaluado,a.idActividad as id from actividad as a INNER JOIN seccion as b ON a.Seccion_idSeccion=b.idSeccion INNER JOIN asignatura as c ON b.Asignatura_idAsignatura=c.idAsignatura INNER JOIN unidadaprendizaje as d on a.UnidadAprendizaje_idUnidadAprendizaje=d.idUnidadAprendizaje where fecha_termino<=CURDATE() OR finalizada=1 and d.Docente_idDocente=?");
      
      $sentencia->bind_param("s", $this->docente);
      
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
    
    public function setevaluado($evaluado)
    {
        $this->evaluado=$evaluado;
    } 
    
    public function setdocente($docente)
    {
        $this->docente=$docente;
    } 
}
