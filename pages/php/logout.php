<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
unset($_SESSION["email"]);
unset($_SESSION["alumno"]);
unset($_SESSION["docente"]);
session_destroy();
header("location: ../inicio.php");