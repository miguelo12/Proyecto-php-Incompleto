<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Seccion
 *
 * @author darkg
 */

include("../php/Conexion/Conexion.php");
class Seccion {
    private $idSeccion; 
    private $idDocente;
    private $idAsignatura;
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
    
}
