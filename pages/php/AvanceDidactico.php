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
                  }else{
                      header("location:../RecursoDidactico.php?jump=2&pre=100");
                      die();
                  }
              }
              else
              {
                  if(!empty($_POST["preguntas"])){
                  $pre = $_POST["preguntas"];
                  $index = 0;
                  $array[$index] = array("id"=>$index,"pre"=>$pre, "unico"=>null);
                  $_SESSION["preguntas"] =  $array;
                  }else{
                      header("location:../RecursoDidactico.php?jump=2&pre=100");
                      die();
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
        header("location: ../RecursoDidactico.php?jump=2#submit1");
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
            
             header("location: ../RecursoDidactico.php?jump=3#submit2");
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
                   header("location:../RecursoDidactico.php?jump=3&pre=101");
                   die();
                }
            }

            if(isset($_POST["aplicaciones"])){
                if(!empty($_POST["aplicaciones"]))
                {
                   $arruy["aplicaciones"]=$_POST["aplicaciones"];
                }
                else 
                {
                    header("location:../RecursoDidactico.php?jump=3&pre=101");
                    die();
                }
            }
            

            if(isset($_POST["procesamiento"])){
                if(!empty($_POST["procesamiento"]))
                {
                   $arruy["procesamiento"]=$_POST["procesamiento"];
                }
                else 
                {
                    header("location:../RecursoDidactico.php?jump=3&pre=101");
                    die();
                }
            }
            

            if(isset($_POST["lenguaje"])){
                if(!empty($_POST["lenguaje"]))
                {
                   $arruy["lenguaje"]=$_POST["lenguaje"];
                }
                else 
                {
                    header("location:../RecursoDidactico.php?jump=3&pre=101");
                    die();
                }
            }
            

            if(isset($_POST["modelos"])){
                if(!empty($_POST["modelos"]))
                {
                   $arruy["modelos"]=$_POST["modelos"];
                }
                else 
                {
                    header("location:../RecursoDidactico.php?jump=3&pre=101");
                    die();
                }
            }
            

            if(isset($_POST["conclusiones"])){
                if(!empty($_POST["conclusiones"]))
                {
                   $arruy["conclusiones"]=$_POST["conclusiones"];
                }
                else 
                {
                    header("location:../RecursoDidactico.php?jump=3&pre=101");
                    die();
                }
            }
            
            
            if(current($arruy)){
               $_SESSION["Ayuda"] = $arruy;
            }
            else
            {
               header("location:../RecursoDidactico.php?jump=3&pre=101");
               die();
            }
             header("location: ../RecursoDidactico.php?jump=3#submit2");
             die();
        }
        
    } elseif($_GET["pre"] == 3){
      if(isset($_GET["a"])){
        if($_GET["a"] == 1){
            if(isset($_POST["preguntas"])){
                //agregar
                //autoevaluacion.
                if(!empty($_POST["preguntas"])){
                    
                    if(isset($_SESSION["autoevaluacion"])){
                    $preauto = $_POST["preguntas"];
                    $arrey = $_SESSION["autoevaluacion"];
                    $index = count($arrey);
                    $arrey[$index] = array("pregunta"=>$preauto, "id"=>$index, "unico"=>null);
                    $_SESSION["autoevaluacion"] = $arrey;
                    
                    }else{
                        
                     $preauto = $_POST["preguntas"];
                     $index = 0;
                     $arrey[$index] = array("pregunta"=>$preauto, "id"=>$index, "unico"=>null);
                     $_SESSION["autoevaluacion"] = $arrey;
                    }
                }else{
                    header("location:../RecursoDidactico.php?jump=4&pre=102");
                    die();
                }
            }
        } elseif($_GET["a"] == 2){
            //editar
            if(isset($_POST["preg"])){ 
             if(isset($_SESSION["autoevaluacion"])){
                $arrey = $_POST["preg"];
                $arrayPreg = $_SESSION["autoevaluacion"];
                
                $index = 0;
                foreach ($arrey as $key => $n)
                {
                  $arroy[$index] = array("id"=>$index,"pregunta"=>$n, "unico"=>null);
                  $index = $index + 1;
                }
              
                $_SESSION["autoevaluacion"] = $arroy;
             }
            }
        } elseif($_GET["a"] == 3){
            //eliminar
            if(isset($_POST["checklist1"])){ 
              $id = $_POST["checklist1"];
              
              $array = $_SESSION["autoevaluacion"];
              
              foreach ($id as $to)
              {
                 if(isset($to[0]))
                 {
                    unset($array[$to[0]]);
                 } 
              }
              
              $index = 0;
              $arroy;
              foreach ($array as $ta)
              {
                 if(isset($ta))
                 {
                    $arroy[$index] = array("id"=>$index,"pregunta"=>$ta["pregunta"], "unico"=>null);
                    $index = $index + 1;
                 } 
              }
              
              $_SESSION["autoevaluacion"] = $arroy;
            }
        }
      }
        header("location: ../RecursoDidactico.php?jump=4#submit3");
        die();
    } elseif ($_GET["pre"] == 4) {
      if(isset($_GET["a"])){
        if($_GET["a"] == 1){
          if(isset($_POST["preguntas"]))
          {//agregar
            //coevaluacion.
            if(!empty($_POST["preguntas"])){
                if(isset($_SESSION["coevaluacion"])){
                $precoe = $_POST["preguntas"];
                $arrey = $_SESSION["coevaluacion"];
                $index = count($arrey);
                $arrey[$index] = array("id"=>$index, "pregunta"=>$precoe, "unico"=>null);
                $_SESSION["coevaluacion"] =  $arrey;

                }
                else
                {

                $precoe = $_POST["preguntas"];
                $index = 0;
                $arrey[$index] = array("id"=>$index, "pregunta"=>$precoe, "unico"=>null);
                $_SESSION["coevaluacion"] = $arrey;
                
                }
            }else{
                header("location:../RecursoDidactico.php?jump=5&pre=103");
                die();
            }
          }
        } elseif ($_GET["a"] == 2) {
            //editar
            if(isset($_POST["preg"])){ 
             if(isset($_SESSION["coevaluacion"])){
                $arrey = $_POST["preg"];
                $arrayPreg = $_SESSION["coevaluacion"];
                
                $index = 0;
                foreach ($arrey as $key => $n)
                {
                  $arroy[$index] = array("id"=>$index,"pregunta"=>$n, "unico"=>null);
                  $index = $index + 1;
                }
              
                $_SESSION["coevaluacion"] = $arroy;
             }
            }
            header("location: ../RecursoDidactico.php?jump=5&#submit4");
            die();
            
        } elseif ($_GET["a"] == 3) {
            //eliminar
            if(isset($_POST["checklist"])){ 
              $id = $_POST["checklist"];
              
              $array = $_SESSION["coevaluacion"];
              
              foreach ($id as $to)
              {
                 if(isset($to[0]))
                 {
                    unset($array[$to[0]]);
                 }
              }
              
              $index = 0;
              $arroy;
              foreach ($array as $ta)
              {
                 if(isset($ta))
                 {
                    $arroy[$index] = array("id"=>$index,"pregunta"=>$ta["pregunta"], "unico"=>null);
                    $index = $index + 1;
                 } 
              }
              
              $_SESSION["coevaluacion"] = $arroy;
            }
        }
        
        header("location: ../RecursoDidactico.php?jump=5&#submit4");
        die();
      }
    } elseif ($_GET["pre"] == 5) {
      if(isset($_POST["cantidad"]))
      {
          if(!empty($_POST["cantidad"]))
          {
              $dw = $_POST["cantidad"];
              $_SESSION["tabla"] = $dw;
          }
      }
      header("location: ../RecursoDidactico.php?jump=5#submit4");
      die();
    }
}