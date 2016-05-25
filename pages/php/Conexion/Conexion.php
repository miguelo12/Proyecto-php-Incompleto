<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author Miguel Sanchez
 */
class Conexion {
    private $conn=null;
    
    public function __construct() {
        $this->conn= new mysqli("localhost", "root","","heuristica");
        if($this->conn->connect_errno){
            unset($this->conn);
            throw new RuntimeException("Fallo la coneccion");
        }
    }
    
    public function getConexion()
    {
       return $this->conn;
    }

}