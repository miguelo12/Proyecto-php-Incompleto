<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ob_start();
session_start();
error_reporting(0);
include_once("./CRUD/RecursosDidacticos.php");
include_once("./CRUD/UnidadAprendizaje.php");
include_once("./CRUD/TipoCriterioRubrica.php");
include_once("./CRUD/Criterio.php");
include_once("./CRUD/Rubrica.php");
include_once("./CRUD/NivelCompetencia.php");

if(!isset($_GET["action"])){
    if(isset($_POST["nameActivity"])){
        $new = $_POST["nameActivity"];
        if(!$new.trim() == "")
        {
          if(!isset($_SESSION["rubrica"]))
          {
             $tipocriteriorubrica = new TipoCriterioRubrica();
             $nivelcompetencia = new NivelCompetencia();
             $criterio = new Criterio();
             $rubrica = new Rubrica();

             $docente = $_SESSION["docente"];
             
             $rubrica->setDocente_idDocente($docente["id"]);
             $rubricadocente = $rubrica->DevolverRubricaPredeterminada();
             
             $_SESSION["rubrica"] = $rubricadocente;
          }
        
        $_SESSION["titulocreacion"] = $new;
        header("location: ../RecursoDidactico.php");
        die();
        } 
        else
        {
            
         header("location: ../CrearUnidad.php?error=1");
         die();
         
        }
    }
    elseif (isset($_GET["idRubrica"])) {
        unset($rubrica);
        $rubrica = new Rubrica();
        
        $docente = $_SESSION["docente"];

        $rubrica->setDocente_idDocente($docente["id"]);
        $rubrica->setIdRubrica($_GET["idRubrica"]);
        $rubricadocente = $rubrica->DevolverRubricaid();
        
        $_SESSION["rubrica"] = $rubricadocente;
        
        if(isset($_SESSION["rubrica"])){
        header("location: ../CrearUnidad.php");
        die();
        }
        else
        {
        header("location: ../indexDocente.php");
        die();
        }
    }
    else
    {
        header("location: ../indexDocente.php");
        die();
    }
}
else
{
    $new2 = $_GET["action"];
    if($new2 == 0)
    {
      
      $sec = $_SESSION["recursosdidacticos"];
      $docente = $_SESSION["docente"];
      date_default_timezone_set('Chile/Continental');
      $date = date("mY");
      //elimina los archivos.
      foreach($sec as $do)
      {
          unlink($do["url"]);
      }
      //elimina la carpeta.
      if(rmdir("uploads/".$docente["id"]."/".$_SESSION["titulocreacion"]."-".$date))
      {
          unset($_SESSION["titulocreacion"]);
      }else
      {
          unset($_SESSION["titulocreacion"]);
      }
      unset($_SESSION["recursosdidacticos"]);
      header("location: ../indexDocente.php");
      die();
      
    }
    elseif ($new2 ==1) 
    {
      if(isset($_SESSION["NuevaUnidad"]))
      {
         //creacion a finalizar;
         //unidad es un array que contiene 
         $unidad = $_SESSION["NuevaUnidad"];
         unset($tipocriteriorubrica);
         unset($nivelcompetencia);
         $recursosdidactico = new RecursosDidacticos();
         $unidadaprendizaje = new UnidadAprendizaje();
         $rubrica = $_SESSION["rubrica"];
         
         try
         {                      
         $docente = $_SESSION["docente"];
         $titulo = $_SESSION["titulocreacion"];
         $unidadaprendizaje->setRubrica_idRubrica($rubrica["idRubrica"]);
         $unidadaprendizaje->setTitulo($titulo);
         $unidadaprendizaje->setDocente_idDocente($docente["id"]);
         $idunidad = $unidadaprendizaje->Ingresar();
         
         
         
         }
         catch (Exception $e)
         {
             header("location: ../Biblioteca.php?error=1");
             die();
         }
         
         header("location: ../Biblioteca.php?creado=1");
         die();
      }
      else
      {
          header("location: ../CrearUnidad.php?SinTerminar=1");
          die();
      }
    }
    elseif ($new2 ==2) 
    {
      if(isset($_SESSION["autoevaluacion"]) && isset($_SESSION["coevaluacion"]) && isset($_SESSION["recursosdidacticos"]))
      {
          $recursosdidacticos = $_SESSION["recursosdidacticos"];
          
          if(isset($_SESSION["Ayuda"]))
          {
             $ayuda = $_SESSION["Ayuda"]; 
          }
          
          if(isset($_SESSION["preguntas"]))
          {
             $preguntas = $_SESSION["preguntas"];
          }
          
          if(isset($ayuda))
          {
              if(isset($preguntas))
              {
                  $unidadnueva = array("recursosdidacticos"=>$recursosdidacticos, "preguntas"=>$preguntas, "ayuda"=>$ayuda);
              }
              else
              {
                  $unidadnueva = array("recursosdidacticos"=>$recursosdidacticos, "ayuda"=>$ayuda);
              }
          }
          else
          {
              if(isset($preguntas))
              {
                  $unidadnueva = array("recursosdidacticos"=>$recursosdidacticos, "preguntas"=>$preguntas);
              }
              else
              {
                  $unidadnueva = array("recursosdidacticos"=>$recursosdidacticos);
              }
          }
          
          $_SESSION["NuevaUnidad"] = $unidadnueva;
          
          header("location: ../CrearUnidad.php");
          die();
      }
      else
      {
          header("location: ../CrearUnidad.php?SinTerminar=1");
          die();
      }
    }
}

ob_end_flush();