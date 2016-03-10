<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_GET["pre"]))
{
    if($_GET["pre"]== 1)
{
      if(isset($_GET["a"])){ 
        if($_GET["a"]==1){
          if(isset($_POST["preguntas"])){
              if(isset($_SESSION["preguntas"])){
                  if(!empty($_POST["preguntas"])){
                  $pre = $_POST["preguntas"];
                  $array = $_SESSION["preguntas"];
                  $index = count($array);
                  $array[] = array("id"=>$index,"pre"=>$pre, "unico"=>null);
                  $_SESSION["preguntas"] =  $array;
                  }
              }
              else
              {
                  if(!empty($_POST["preguntas"])){
                  $pre = $_POST["preguntas"];
                  $index = 0;
                  $array[$index] = array("id"=>$index,"pre"=>$pre, "unico"=>null);
                  $_SESSION["preguntas"] =  $array;
                  }
              }
          }
        }elseif ($_GET["a"] == 2) {
          if(isset($_GET["id"])){ 
              $id = $_GET["id"];
              if(!empty($_POST["preguntas{$id}"])){
              $pre = $_POST["preguntas{$id}"];
              $array = $_SESSION["preguntas"];
              $array[$id] = array("id"=>$id,"pre"=>$pre);
              $_SESSION["preguntas"] = $array;
              }
          }
        }elseif ($_GET["a"] == 3) {
            if(isset($_GET["id"])){ 
              $id = $_GET["id"];
              $array = $_SESSION["preguntas"];
              unset($array[$id]);
              $index = 0;
              foreach ($array as $ta)
              {
                 if(isset($ta))
                 {
                    $arroy[$index] = array("id"=>$index,"pre"=>$ta["pre"]);
                    $index = $index + 1;
                 } 
              }
              
              $_SESSION["preguntas"] = $arroy;
            }
        }
        header("location: ../RecursoDidactico.php?jump=2");
        die();
      }
      
    } elseif ($_GET["pre"] == 2) {
        if(!isset($_SESSION["Ayuda"])){
            $arruy;
            
            if(isset($_POST["procedimiento"])){
                if(!empty($_POST["procedimiento"]))
                {
                   $arruy["procedimiento"]=$_POST["procedimiento"];
                }
            }

            if(isset($_POST["aplicaciones"])){
                if(!empty($_POST["aplicaciones"]))
                {
                   $arruy["aplicaciones"]=$_POST["aplicaciones"];
                }
            }

            if(isset($_POST["procesamiento"])){
                if(!empty($_POST["procesamiento"]))
                {
                   $arruy["procesamiento"]=$_POST["procesamiento"];
                }
            }

            if(isset($_POST["lenguaje"])){
                if(!empty($_POST["lenguaje"]))
                {
                   $arruy["lenguaje"]=$_POST["lenguaje"];
                }
            }

            if(isset($_POST["modelos"])){
                if(!empty($_POST["modelos"]))
                {
                   $arruy["modelos"]=$_POST["modelos"];
                }
            }

            if(isset($_POST["conclusiones"])){
                if(!empty($_POST["conclusiones"]))
                {
                   $arruy["conclusiones"]=$_POST["conclusiones"];
                }
                
            }
            
            if(current($arruy)){
               $_SESSION["Ayuda"] = $arruy;
            }
            
             header("location: ../RecursoDidactico.php?jump=3");
             die();
        }
        else
        {
            $arruy = $_SESSION["Ayuda"];
            
            if(isset($_POST["procedimiento"])){
                if(!empty($_POST["procedimiento"]))
                {
                   $arruy["procedimiento"]=$_POST["procedimiento"];
                }
                else
                {
                   unset($arruy["procedimiento"]);
                }
            }

            if(isset($_POST["aplicaciones"])){
                if(!empty($_POST["aplicaciones"]))
                {
                   $arruy["aplicaciones"]=$_POST["aplicaciones"];
                }
                else 
                {
                    unset($arruy["aplicaciones"]);
                }
            }
            

            if(isset($_POST["procesamiento"])){
                if(!empty($_POST["procesamiento"]))
                {
                   $arruy["procesamiento"]=$_POST["procesamiento"];
                }
                else 
                {
                    unset($arruy["procesamiento"]);
                }
            }
            

            if(isset($_POST["lenguaje"])){
                if(!empty($_POST["lenguaje"]))
                {
                   $arruy["lenguaje"]=$_POST["lenguaje"];
                }
                else 
                {
                    unset($arruy["lenguaje"]);
                }
            }
            

            if(isset($_POST["modelos"])){
                if(!empty($_POST["modelos"]))
                {
                   $arruy["modelos"]=$_POST["modelos"];
                }
                else 
                {
                    unset($arruy["modelos"]);
                }
            }
            

            if(isset($_POST["conclusiones"])){
                if(!empty($_POST["conclusiones"]))
                {
                   $arruy["conclusiones"]=$_POST["conclusiones"];
                }
                else 
                {
                    unset($arruy["conclusiones"]);
                }
            }
            
            
            if(current($arruy)){
               $_SESSION["Ayuda"] = $arruy;
            }
            else
            {
               unset($_SESSION["Ayuda"]);
            }
             header("location: ../RecursoDidactico.php?jump=3");
             die();
        }
        
    } elseif ($_GET["pre"] == 3) {
      if(isset($_POST["preguntas"]))
      {
        //autoevaluacion.
        if(isset($_SESSION["autoevaluacion"])){
        $preauto = $_POST["preguntas"];
        $arrey = $_SESSION["autoevaluacion"];
        $index = count($arrey);
        $arrey[$index] = array("pregunta"=>$preauto, "index"=>$index, "unico"=>null);
        $_SESSION["autoevaluacion"] = $arrey;
        
        }
        else
        {
            
         $preauto = $_POST["preguntas"];
         $index = 0;
         $arrey[$index] = array("pregunta"=>$preauto, "index"=>$index, "unico"=>null);
         $_SESSION["autoevaluacion"] = $arrey;
         
        }
        header("location: ../RecursoDidactico.php?jump=5");
        die();
      }
      else
      {
          header("location: ../RecursoDidactico.php?jump=4");
          die();
      }
    } elseif ($_GET["pre"] == 4) {
      if(isset($_POST["preguntas"]))
      {
        //coevaluacion.
        if(isset($_SESSION["autoevaluacion"])){
        $precoe = $_POST["preguntas"];
        $arrey = $_SESSION["autoevaluacion"];
        $index = count($arrey);
        $arrey[$index] = array("id"=>$index, "pregunta"=>$precoe, "unico"=>null);
        $_SESSION["autoevaluacion"] =  $arrey;
        
        }
        else
        {
            
        $precoe = $_POST["preguntas"];
        $index = 0;
        $arrey[$index] = array("id"=>$index, "pregunta"=>$precoe, "unico"=>null);
        $_SESSION["autoevaluacion"] = $arrey;
        
        }
        header("location: ../RecursoDidactico.php?jump=5");
        die();
      }
      else
      {
          header("location: ../RecursoDidactico.php?jump=5");
          die();
      }
    } elseif ($_GET["pre"] == 5) {
      if(isset($_POST["cantidad"]))
      {
          if(!empty($_POST["cantidad"]))
          {
              $dw = $_POST["cantidad"];
              $_SESSION["tabla"] = $dw;
              header("location: ../RecursoDidactico.php?jump=5");
              die();
          }
          else
          {
              header("location: ../RecursoDidactico.php?jump=5");
              die();
          }
      }
      else
      {
        header("location: ../RecursoDidactico.php?jump=5");
        die();
      }
    }
}
