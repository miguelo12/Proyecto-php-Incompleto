<?php
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
    private $Actividad_idActividad; /*externo*/
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    public function Ingresar()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("insert into alumnosgrupo values(?,?,?)");
      
      $sentencia->bind_param("isi", $this->idAlumnosGrupo, $this->Alumno_idAlumno, $this->Grupo_idGrupo);
      
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
    
    public function ExistegrupoenActividad()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select * from alumnosgrupo as alug INNER join grupo as g on alug.Grupo_idGrupo=g.idGrupo where alug.Alumno_idAlumno=? and g.Actividad_idActividad=?");
      
      $sentencia->bind_param("ss", $this->Alumno_idAlumno, $this->Actividad_idActividad);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        return true;
      }
      return false;
    }
    
    public function Existelamaxima()
    {
      $c=$this->con->getConexion();
      
      $sentencia=$c->prepare("select COUNT(*) as conteo from alumnosgrupo as alug INNER join grupo as g on alug.Grupo_idGrupo=g.idGrupo where g.Actividad_idActividad=? and g.idGrupo=?");
      
      $sentencia->bind_param("si", $this->Actividad_idActividad, $this->Grupo_idGrupo);
      
      $sentencia->execute();
      
      $resu = $sentencia->get_result();
      
      if($resu -> num_rows > 0)
      {
        while($row = $resu->fetch_assoc()){
              $res = $row["conteo"];
        }
        
        if($res > 2){
          return true;   
        }
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
    
    public function setActividad_idActividad($Actividad_idActividad)
    {
        $this->Actividad_idActividad=$Actividad_idActividad;
    }
}
