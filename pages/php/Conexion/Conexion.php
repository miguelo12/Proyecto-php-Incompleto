<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author darkg
 */
class Conexion {
    private $conn=null;
    
    public function __construct() {
        try{
            $this->conn= new mysqli("localhost", "root","","heuristica");
        }
        catch(Exception $e)
        {
            throw new Exception("No se pudo conectar a la base de datos".$this->conn->errno);
        }
    }
    
    public function getConexion()
    {
       return $this->conn;
    }

}