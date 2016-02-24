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
}
