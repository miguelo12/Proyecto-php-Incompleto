<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
if(!isset($_GET["action"])){
    if(isset($_POST["nameActivity"])){
        $new = $_POST["nameActivity"];
        if(!$new.trim() == "")
        {
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
         $unidad = $_SESSION["NuevaUnidad"];
         include_once("./CRUD/RecursosDidacticos.php");
         include_once("./CRUD/UnidadAprendizaje.php");
         include_once("./CRUD/CriterioNivelRubrica.php");
         include_once("./CRUD/Criterio.php");
         include_once("./CRUD/NivelCompetencia.php");
         
         $recursosdidactico = new RecursosDidacticos();
         $unidadaprendizaje = new UnidadAprendizaje();
         $criterionivelrubrica = new CriterioNivelRubrica();
         $nivelcompetencia = new NivelCompetencia();
         $criterio = new Criterio();
         $rubrica = new Rubrica();
         
         
         try
         {      
         $rubrica->setIdRubrica($idRubrica);
         $rubrica->setIdUnidadAprendizaje($idUnidadAprendizaje);
         $rubrica->setTipo(0);
         
         //$rubrica->Ingresar();
         
         $criterionivelrubrica->setidCriterio($idCriterio);
         $criterionivelrubrica->setidCriterioNivelRubrica($idCriterioNivelRubrica);
         $criterionivelrubrica->setidNivelCompetencia($idNivelCompetencia);
         $criterionivelrubrica->setidRubrica($idRubrica);
         
         //$criterionivelrubrica->Ingresar();
         
         $
         
         $titulo = $_SESSION["titulocreacion"];
         
         $unidadaprendizaje->setRubrica_idRubrica();
         $unidadaprendizaje->setTitulo($titulo);
         $unidadaprendizaje->setidAprendizaje($idAprendizaje);
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
          $autoevaluacion = $_SESSION["autoevaluacion"];
          $coevaluacion = $_SESSION["coevaluacion"];
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
                  $unidadnueva = array("recursosdidacticos"=>$recursosdidacticos, "preguntas"=>$preguntas, "ayuda"=>$ayuda, "autoevaluacion"=>$autoevaluacion, "coevaluacion"=>$coevaluacion);
              }
              else
              {
                  $unidadnueva = array("recursosdidacticos"=>$recursosdidacticos, "ayuda"=>$ayuda, "autoevaluacion"=>$autoevaluacion, "coevaluacion"=>$coevaluacion);
              }
          }
          else
          {
              if(isset($preguntas))
              {
                  $unidadnueva = array("recursosdidacticos"=>$recursosdidacticos, "preguntas"=>$preguntas, "autoevaluacion"=>$autoevaluacion, "coevaluacion"=>$coevaluacion);
              }
              else
              {
                  $unidadnueva = array("recursosdidacticos"=>$recursosdidacticos, "autoevaluacion"=>$autoevaluacion, "coevaluacion"=>$coevaluacion);
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