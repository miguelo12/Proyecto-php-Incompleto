<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RecursosDidacticos
 *
 * @author darkg
 */
include("..\pages\php\Conexion\Conexion.php");
include("..\php\Conexion\Conexion.php");
include("../../php/Conexion/Conexion.php");
class RecursosDidacticos {
    private $idRecursosDidacticos;
    private $idUnidadAprendizaje;
    private $nombre;
    private $descripcion;
    private $tipo;
    
    private $con;
    
    public function __construct() {
        $this->con = new Conexion();
    }
}
