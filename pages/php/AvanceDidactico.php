<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_GET["pre"]))
{
    if($_GET["pre"] == 1)
    {
      if(isset($_POST["preguntas"]))
      {
          $pre = $_POST["preguntas"];
          $array = $_SESSION["preguntas"];
          $array[] = $pre;
          $_SESSION["preguntas"] = $array;
          header("location: ../RecursoDidactico.php?jump=3");
      }
    } elseif ($_GET["pre"] == 2) {
    
    } elseif ($_GET["pre"] == 3) {
    
    } elseif ($_GET["pre"] == 4) {
    
    }
}
