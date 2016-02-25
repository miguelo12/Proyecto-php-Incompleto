<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rubrica
 *
 * @author darkg
 */
include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class Rubrica {
    private $idRubrica;
    private $idUnidadAprendizaje;
    private $tipo;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
}
