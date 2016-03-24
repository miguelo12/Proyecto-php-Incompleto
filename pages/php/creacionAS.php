<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST["seccion"]))
{
    if(isset($_POST["asignatura"]))
    {
    
        
        
    header("location: ../cursos.php?succes=1");
    die();
    }
}
else{

header("location: ../cursos.php");
die();
}