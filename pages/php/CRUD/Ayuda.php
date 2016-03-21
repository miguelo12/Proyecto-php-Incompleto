<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ayuda
 *
 * @author darkg
 */
include_once("..\pages\php\Conexion\Conexion.php");
include_once("..\php\Conexion\Conexion.php");
include_once("../../php/Conexion/Conexion.php");
class Ayuda {
    private $idAyuda;
    private $procedimiento;
    private $aplicaciones;
    private $procesamiento;
    private $lenguaje;
    private $modelos;
    private $conclusiones;
    private $UnidadAprendizaje_idUnidadAprendizaje;
    
    public function setidAyuda($idAyuda)
    {
        $this->idAyuda=$idAyuda;
    }
    
    public function setprocedimiento($procedimiento)
    {
        $this->procedimiento=$procedimiento;
    }
    
    public function setaplicaciones($aplicaciones)
    {
        $this->aplicaciones=$aplicaciones;
    }
    
    public function setprocesamiento($procesamiento)
    {
        $this->procesamiento=$procesamiento;
    }
    
    public function setlenguaje($lenguaje)
    {
        $this->lenguaje=$lenguaje;
    }
    
    public function setmodelos($modelos)
    {
        $this->modelos=$modelos;
    }
    
    public function setconclusiones($conclusiones)
    {
        $this->conclusiones=$conclusiones;
    }
    
    public function setUnidadAprendizaje_idUnidadAprendizaje($UnidadAprendizaje_idUnidadAprendizaje)
    {
        $this->UnidadAprendizaje_idUnidadAprendizaje=$UnidadAprendizaje_idUnidadAprendizaje;
    }
}
