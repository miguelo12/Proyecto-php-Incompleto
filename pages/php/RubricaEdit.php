<?php
session_start();
ob_start();
include_once("./CRUD/Rubrica.php");
include_once("./CRUD/TipoCriterioRubrica.php");  
include_once("./CRUD/Criterio.php");
include_once("./CRUD/NivelCompetencia.php");
if(!isset($_GET["edit"])){
    if(isset($_GET["pre"])){
        if($_GET["pre"] == 1){
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
                        header("location:../rubrica.php?jump=0&pre=102");
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
          header("location: ../rubrica.php?jump=0#submit3");
          die();
        } elseif ($_GET["pre"] == 2) {
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
                    header("location:../rubrica.php?jump=1&pre=103");
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
                header("location: ../rubrica.php?jump=1&#submit4");
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

            header("location: ../rubrica.php?jump=1&#submit4");
            die();
          }
        } elseif ($_GET["pre"] == 3) {
          //rubricaevaluativa
            if ($_GET["a"] == 1) {
                //guardar criterio
                $eva  = $_SESSION["evaluacion"];
                if(count($eva)<8){
                    foreach($eva[0]["NivelCompetencia"] as $key1 => $value){
                       $arreyi[] = array("Descripcion"=> "Ingresar nivel de competencia.", "Puntaje"=> $value[$key1]["Puntaje"]);
                    }
                    $eva[] = array("id"=> 0, "Criterio"=> "Ingresar criterio.", "NivelCompetencia"=> $arreyi);    
                }
                
                $_SESSION["evaluacion"] = $eva;
            } elseif ($_GET["a"] == 2) {
                //guardar NivelCompetencia
                $eva  = $_SESSION["evaluacion"];
                if(count($eva[0]["NivelCompetencia"])<5){
                    foreach ($eva as $tei => $innerArray){
                        $arreyi = array("Descripcion"=> "Ingresar nivel de competencia.", "Puntaje"=> 0);
                        $eva[$tei]["NivelCompetencia"][] = $arreyi;
                    }
                }
                $_SESSION["evaluacion"] = $eva;
            } elseif ($_GET["a"] == 3) {
                //guardar eliminar criterio
                $eva  = $_SESSION["evaluacion"];
                if(count($eva)>1){
                    unset($eva[count($eva)-1]);    
                }
                
                $_SESSION["evaluacion"] = $eva;
            } elseif ($_GET["a"] == 4) {
                //guardar eliminar Nivel de competencia
                $eva  = $_SESSION["evaluacion"];
                if(count($eva[0]["NivelCompetencia"])>1){
                    $count = count($eva[0]["NivelCompetencia"])-1;
                    foreach ($eva as $tei => $innerArray){
                        unset($eva[$tei]["NivelCompetencia"][$count]);
                    }
                }
                $_SESSION["evaluacion"] = $eva;
                
            } elseif ($_GET["a"] == 5) {
                 //guardar modificaciones.
                $eva  = $_SESSION["evaluacion"];
                if(isset($_POST["puntaje"])){
                    if(isset($_POST["criterios"])){
                        $criterioo = $_POST["criterios"];
                        $puntaje = $_POST["puntaje"];
                        foreach ($eva as $tei => $innerArray){
                            $eva[$tei]["Criterio"] = $criterioo[$tei];
                            foreach($innerArray["NivelCompetencia"] as $key1 => $value){
                                $eva[$tei]["NivelCompetencia"][$key1]["Puntaje"] = $puntaje[$key1];
                                if(isset($_POST["nivelcompetencia{$tei}"])){
                                   $nivel = $_POST["nivelcompetencia{$tei}"];
                                   $eva[$tei]["NivelCompetencia"][$key1]["Descripcion"] = $nivel[$key1];
                                }
                            }
                        }
                    }
                    else{
                    header("location: ../error404.php");
                    die();
                    }
                }
                else{
                    header("location: ../error404.php");
                    die();
                }
                
                $_SESSION["evaluacion"] = $eva;
            }
          
          header("location: ../rubrica.php?jump=2#submit4");
          die();
        } elseif ($_GET["pre"] == 4) {
          if(isset($_POST["nombre"])){
           //Guardar todo.
           $name = $_POST["nombre"];
           if($name.trim()!=""){
               
               //creacion de la rubrica principal + el nombre.
               $rubrica = new Rubrica();
               $rubrica->setDocente_idDocente($_SESSION["docente"]["id"]);
               $rubrica->setnombre($name);
               $idrubrica = $rubrica->Ingresar();

               //sessiones que se guardan necesarias.
               $autoeva = $_SESSION["autoevaluacion"];
               $coeva = $_SESSION["coevaluacion"];
               $eva  = $_SESSION["evaluacion"];

               //creacion de los tipo de rubrica.
               $idtipocriteriorubrica;
               for ($i = 1; $i <= 3; $i++){
                 $tipocriteriorubrica = new TipoCriterioRubrica();
                 $tipocriteriorubrica->setRubrica_idRubrica($idrubrica);
                 $tipocriteriorubrica->settipos($i);
                 $idtipocriteriorubrica[$i] = array($tipocriteriorubrica->Ingresar(),$i);
                 unset($tipocriteriorubrica);
               }

               $criterio = new Criterio();

                foreach ($idtipocriteriorubrica as $da){
                    if($da[1]==1){
                    foreach ($eva as $da2){
                        $criterio = new Criterio();
                        $criterio->setNombre($da2["Criterio"]);
                        $criterio->setTipoCriterioRubrica_idTipoCriterioRubrica($da[0]);
                        $idCriterio = $criterio->Ingresar();

                        foreach ($da2["NivelCompetencia"] as $value){
                            $nivelcompetencia = new NivelCompetencia();
                            $nivelcompetencia->setCriterio_idCriterio($idCriterio);
                            $nivelcompetencia->setDescripcion($value["Descripcion"]);
                            $nivelcompetencia->setPuntaje($value["Puntaje"]);
                            $nivelcompetencia->Ingresar();
                            unset($nivelcompetencia);
                        }
                    }
                    } elseif ($da[1]==2) {
                        foreach ($autoeva as $da3){
                        $criterio = new Criterio();
                        $criterio->setNombre($da3["pregunta"]);
                        $criterio->setTipoCriterioRubrica_idTipoCriterioRubrica($da[0]);
                        $idCriterio1 = $criterio->Ingresar();
                        }
                    } elseif ($da[1]==3) {
                        foreach ($coeva as $da4){
                        $criterio = new Criterio();
                        $criterio->setNombre($da4["pregunta"]);
                        $criterio->setTipoCriterioRubrica_idTipoCriterioRubrica($da[0]);
                        $idCriterio2 = $criterio->Ingresar();
                        }
                    }
                }
                unset($_SESSION["autoevaluacion"]);
                unset($_SESSION["coevaluacion"]);
                unset($_SESSION["evaluacion"]);
                unset($_SESSION["rubrica"]);
                header("location: ../biblioteca.php?creado=2");
                die();
           }
           
           header("location: ../rubrica.php?jump=3&error=100");
           die();
          }
        } elseif ($_GET["pre"] == -1) {
          //rubricaevaluativa
          unset($_SESSION["autoevaluacion"]);
          unset($_SESSION["coevaluacion"]);
          unset($_SESSION["evaluacion"]);
          unset($_SESSION["rubrica"]);
          unset($_SESSION["ver"]);
          
          header("location: ../Biblioteca.php");
          die();
        }
    }
}
//header("location: ../error404.php");
//die();