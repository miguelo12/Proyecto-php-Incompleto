<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlumnoSeccion
 *
 * @author darkg
 */
include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class AlumnoSeccion {
    private $idAlumnoSeccion;
    private $idSeccion;
    private $idAlumno;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
}
