<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UnidaddeAprendizaje
 *
 * @author darkg
 */
include("../php/Conexion/Conexion.php");
class UnidadAprendizaje {
    private $idAprendizaje;
    private $Titulo;
    private $idSeccion;
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
    
}
