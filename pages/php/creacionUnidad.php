<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ob_start();
session_start();

include_once("./CRUD/RecursosDidacticos.php");
include_once("./CRUD/UnidadAprendizaje.php");
include_once("./CRUD/Ayuda.php");
include_once("./CRUD/Preguntas.php");
include_once("./CRUD/Rubrica.php");

if(!isset($_SESSION["editar"])){
    if(!isset($_GET["action"])){
        if(isset($_POST["nameActivity"])){
            $new = $_POST["nameActivity"];
            if(!$new.trim() == "")
            {
              if(!isset($_SESSION["rubrica"]))
              {
                 $rubrica = new Rubrica();

                 $docente = $_SESSION["docente"];

                 $rubrica->setDocente_idDocente($docente["id"]);
                 $rubricadocente = $rubrica->DevolverRubricaPredeterminada();

                 if(isset($rubricadocente)){
                 $_SESSION["rubrica"] = $rubricadocente;
                 }
                 else
                 {
                    header("location: ../error404.php");
                    die();
                 }
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
        elseif (isset($_GET["idRubrica"])){
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
        elseif(isset($_GET["editar"])){
            //EDITAR UNIDAD DE APRENDIZAJE
            $recursosdidactico = new RecursosDidacticos();
            $unidadaprendizaje = new UnidadAprendizaje();
            $ayuda = new Ayuda();
            $preguntas = new Preguntas();
            $unidadid = $_GET["editar"];
            
            $unidadaprendizaje->setidAprendizaje($unidadid);
            $unite = $unidadaprendizaje->DevolverUnidadid();
            
            $recursosdidactico->setIdUnidadAprendizaje_idUnidadAprendizaje($unidadid);
            $recu = $recursosdidactico->DevolverRecurso();
            
            $preguntas->setUnidadAprendizaje_idUnidadAprendizaje($unidadid);
            $pregun = $preguntas->DevolverPreguntasEdit();
            
            $ayuda->setUnidadAprendizaje_idUnidadAprendizaje($unidadid);
            $ayu = $ayuda->DevolverAyudaEdit();
            
            
            if(isset($ayuda))
              {
                  if(isset($preguntas))
                  {
                      $unidadnueva = array("unidad"=>$unite,"recursosdidacticos"=>$recu, "preguntas"=>$pregun, "ayuda"=>$ayu);
                  }
                  else
                  {
                      $unidadnueva = array("unidad"=>$unite,"recursosdidacticos"=>$recu, "ayuda"=>$ayu);
                  }
              }
              else
              {
                  if(isset($preguntas))
                  {
                      $unidadnueva = array("unidad"=>$unite,"recursosdidacticos"=>$recu, "preguntas"=>$pregun);
                  }
                  else
                  {
                      $unidadnueva = array("unidad"=>$unite,"recursosdidacticos"=>$recu);
                  }
              }
            if(isset($unidadnueva))
            {
            $_SESSION["editar"] = $unidadnueva;
            header("location: ../CrearUnidad.php");
            die();
            }
            else
            {
            header("location: ../error404.php");
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

          unset($_SESSION["Ayuda"]);
          unset($_SESSION["preguntas"]);
          unset($_SESSION["titulocreacion"]);
          unset($_SESSION["rubrica"]);
          unset($_SESSION["NuevaUnidad"]);
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
             unset($ayuda);
             unset($preguntas);
             $recursosdidactico = new RecursosDidacticos();
             $unidadaprendizaje = new UnidadAprendizaje();
             $ayuda = new Ayuda();
             $preguntas = new Preguntas();
             $rubrica = $_SESSION["rubrica"];

             try
             {                      
                 $docente = $_SESSION["docente"];
                 $titulo = $_SESSION["titulocreacion"];
                 $unidadaprendizaje->setRubrica_idRubrica($rubrica["idRubrica"]);
                 $unidadaprendizaje->setTitulo($titulo);
                 $unidadaprendizaje->setDocente_idDocente($docente["id"]);
                 $idunidad = $unidadaprendizaje->Ingresar();

                 if(isset($unidad["ayuda"])){
                     $ayuda->setUnidadAprendizaje_idUnidadAprendizaje($idunidad);
                     if(isset($unidad["ayuda"]["aplicaciones"])){
                     $ayuda->setaplicaciones($unidad["ayuda"]["aplicaciones"]);
                     }
                     else{
                     $ayuda->setaplicaciones(null);
                     }
                     if(isset($unidad["ayuda"]["conclusiones"])){
                     $ayuda->setconclusiones($unidad["ayuda"]["conclusiones"]);
                     }
                     else{
                     $ayuda->setconclusiones(null);
                     }
                     if(isset($unidad["ayuda"]["lenguaje"])){
                     $ayuda->setlenguaje($unidad["ayuda"]["lenguaje"]);
                     }
                     else{
                     $ayuda->setlenguaje(null);
                     }
                     if(isset($unidad["ayuda"]["modelos"])){
                     $ayuda->setmodelos($unidad["ayuda"]["modelos"]);
                     }
                     else{
                     $ayuda->setmodelos(null); 
                     }
                     if(isset($unidad["ayuda"]["procedimiento"])){
                     $ayuda->setprocedimiento($unidad["ayuda"]["procedimiento"]);
                     }
                     else{
                     $ayuda->setprocedimiento(null); 
                     }
                     if(isset($unidad["ayuda"]["procesamiento"])){
                     $ayuda->setprocesamiento($unidad["ayuda"]["procesamiento"]);
                     }
                     else{
                     $ayuda->setprocesamiento(null); 
                     }

                     $ayuda->Ingresar();
                 }

                 if(isset($unidad["preguntas"])){
                     $pregun = $unidad["preguntas"];
                     foreach ($pregun as $dy){
                     $preguntas->setUnidadAprendizaje_idUnidadAprendizaje($idunidad);
                     $preguntas->setpreguntas($dy["pre"]);
                     $preguntas->Ingresar();
                     }
                 }

                 $recurso = $unidad["recursosdidacticos"];
                 foreach ($recurso as $dy){
                     $recursosdidactico->setIdUnidadAprendizaje_idUnidadAprendizaje($idunidad);
                     $recursosdidactico->setNombre($dy["nombre"]);
                     $recursosdidactico->setTipo($dy["tipo"]);
                     $recursosdidactico->setDescripcion($dy["descripcion"]);
                     $recursosdidactico->seturl($dy["url"]);
                     $recursosdidactico->Ingresar();     
                 }
             }
             catch (Exception $e)
             {
                 header("location: ../Biblioteca.php?error=1");
                 die();
             }

             unset($_SESSION["titulocreacion"]);
             unset($_SESSION["rubrica"]);
             unset($_SESSION["NuevaUnidad"]);
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
          if(isset($_SESSION["recursosdidacticos"]))
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
              unset($_SESSION["recursosdidacticos"]);
              unset($_SESSION["Ayuda"]);
              unset($_SESSION["preguntas"]);
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
}
else
{
    if(isset($_GET["action"])){
        if($_GET["action"]==0){
            unset($_SESSION["editar"]);
            header("location: ../indexDocente.php");
            die();
        }
    }
    else
    {
        header("location: ../RecursoDidactico.php");
        die();
    }
    
    header("location: ../CrearUnidad.php");
    die();
}

ob_end_flush();