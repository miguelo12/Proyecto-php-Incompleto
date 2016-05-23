<?php
session_start();
ob_start();
include_once("./CRUD/Rubrica.php");
include_once("./CRUD/TipoCriterioRubrica.php");  
include_once("./CRUD/Criterio.php");
include_once("./CRUD/NivelCompetencia.php");
if(!isset($_SESSION["edita"])){
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
                        $arrey[$index] = array("pregunta"=>$preauto, "id"=>$index);
                        $_SESSION["autoevaluacion"] = $arrey;

                        }else{

                         $preauto = $_POST["preguntas"];
                         $index = 0;
                         $arrey[$index] = array("pregunta"=>$preauto, "id"=>$index);
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
                      $arroy[$index] = array("id"=>$index,"pregunta"=>$n);
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
                        $arroy[$index] = array("id"=>$index,"pregunta"=>$ta["pregunta"]);
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
                    $arrey[$index] = array("id"=>$index, "pregunta"=>$precoe);
                    $_SESSION["coevaluacion"] =  $arrey;

                    }
                    else
                    {

                    $precoe = $_POST["preguntas"];
                    $index = 0;
                    $arrey[$index] = array("id"=>$index, "pregunta"=>$precoe);
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
                      $arroy[$index] = array("id"=>$index,"pregunta"=>$n);
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
                        $arroy[$index] = array("id"=>$index,"pregunta"=>$ta["pregunta"]);
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
                    header("location: ../error.php?error=404");
                    die();
                    }
                }
                else{
                    header("location: ../error.php?error=404");
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
          unset($_SESSION["edita"]);
          
          header("location: ../Biblioteca.php");
          die();
        }
    }
}
else{
    //modo editar
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
                        $arrey[$index] = array("id"=> $index, "pregunta"=> $preauto, "Cambios"=>"false", "unico"=>-1);
                        
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

                    foreach ($arrayPreg as $key => $n)
                    {
                      if($arrayPreg[$key]["Cambios"]!="eliminar"){
                          if($arrayPreg[$key]["unico"]!=-1){
                            if($arrey[$key]!=$n["pregunta"]){
                            $arrayPreg[$key] = array("id"=> $key, "pregunta"=> $n["pregunta"], "Cambios"=> $arrey[$key], "unico"=>$arrayPreg[$key]["unico"]);
                            }
                          }
                          else{
                          $arrayPreg[$key] = array("id"=> $key, "pregunta"=> $arrey[$key], "unico"=>-1);
                          }
                      }
                    }

                    $_SESSION["autoevaluacion"] = $arrayPreg;
                 }
                }
            } elseif($_GET["a"] == 3){
                //eliminar
                if(isset($_POST["checklist1"])){ 
                  $id = $_POST["checklist1"];

                  $array = $_SESSION["autoevaluacion"];

                  foreach ($id as $to)
                  {
                      var_dump($to);
                     if(isset($to[0]))
                     {
                        if($array[$to[0]]["unico"]!=-1){  
                        $array[$to[0]] = array("id"=> $to[0], "pregunta"=> $array[$to[0]]["pregunta"], "Cambios"=>"Eliminar!!.", "unico"=>$array[$to[0]]["unico"]);
                        }
                        else{
                        unset($array[$to[0]]);
                        }
                     } 
                  }

                  $desc = 0;
                  foreach ($array as $key => $ta)
                  {
                     if(isset($ta))
                     {
                        if($array[$key]["unico"]!=-1){  
                        $array[$key-$desc] = array("id"=> $key-$desc, "pregunta"=> $ta["pregunta"], "Cambios"=>$ta["Cambios"], "unico"=>$ta["unico"]);
                        }
                        else{
                        $array[$key-$desc] = array("id"=> $key-$desc, "pregunta"=> $ta["pregunta"], "Cambios"=>$ta["Cambios"], "unico"=>-1);
                        }
                     } 
                     else{
                         $desc++;
                     }
                  }

                  $_SESSION["autoevaluacion"] = $array;
                }
            } elseif ($_GET["a"] == 4) {
                //volver a null;
                if(isset($_GET["n"])){
                    $array = $_SESSION["autoevaluacion"];
                    $number = $_GET["n"];
                    
                    $array[$number]["Cambios"] = null;
                    
                    $_SESSION["autoevaluacion"] = $array;
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
                if(isset($_POST["preguntas"])){
                    //agregar
                    //autoevaluacion.
                    if(!empty($_POST["preguntas"])){

                        if(isset($_SESSION["coevaluacion"])){
                        $preauto = $_POST["preguntas"];
                        $arrey = $_SESSION["coevaluacion"];
                        $index = count($arrey);
                        $arrey[$index] = array("id"=> $index, "pregunta"=> $preauto, "Cambios"=>"false", "unico"=>-1);
                        
                        $_SESSION["coevaluacion"] = $arrey;

                        }
                    }else{
                        header("location:../rubrica.php?jump=1&pre=103");
                        die();
                    }
                }
              }
            } elseif ($_GET["a"] == 2) {
              //editar
                if(isset($_POST["preg"])){ 
                 if(isset($_SESSION["coevaluacion"])){
                    $arrey = $_POST["preg"];
                    $arrayPreg = $_SESSION["coevaluacion"];

                    foreach ($arrayPreg as $key => $n)
                    {
                      if($arrayPreg[$key]["Cambios"]!="eliminar"){
                          if($arrayPreg[$key]["unico"]!=-1){
                            if($arrey[$key]!=$n["pregunta"]){
                            $arrayPreg[$key] = array("id"=> $key, "pregunta"=> $n["pregunta"], "Cambios"=> $arrey[$key], "unico"=>$arrayPreg[$key]["unico"]);
                            }
                          }
                          else{
                          $arrayPreg[$key] = array("id"=> $key, "pregunta"=> $arrey[$key], "unico"=>-1);
                          }
                      }
                    }

                    $_SESSION["coevaluacion"] = $arrayPreg;
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
                      var_dump($to);
                     if(isset($to[0]))
                     {
                        if($array[$to[0]]["unico"]!=-1){  
                        $array[$to[0]] = array("id"=> $to[0], "pregunta"=> $array[$to[0]]["pregunta"], "Cambios"=>"Eliminar!!.", "unico"=>$array[$to[0]]["unico"]);
                        }
                        else{
                        unset($array[$to[0]]);
                        }
                     } 
                  }

                  $desc = 0;
                  foreach ($array as $key => $ta)
                  {
                     if(isset($ta))
                     {
                        if($array[$key]["unico"]!=-1){  
                        $array[$key-$desc] = array("id"=> $key-$desc, "pregunta"=> $ta["pregunta"], "Cambios"=>$ta["Cambios"], "unico"=>$ta["unico"]);
                        }
                        else{
                        $array[$key-$desc] = array("id"=> $key-$desc, "pregunta"=> $ta["pregunta"], "Cambios"=>$ta["Cambios"], "unico"=>-1);
                        }
                     } 
                     else{
                         $desc++;
                     }
                  }

                  $_SESSION["coevaluacion"] = $array;
                }
                
                header("location: ../rubrica.php?jump=1&#submit4");
                die();
            } elseif ($_GET["a"] == 4) {
                //volver a null;
                if(isset($_GET["n"])){
                    $array = $_SESSION["coevaluacion"];
                    $number = $_GET["n"];
                    
                    $array[$number]["Cambios"] = null;
                    
                    $_SESSION["coevaluacion"] = $array;
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
                       $arreyi[] = array("Descripcion"=> "Ingresar nivel de competencia.", "Puntaje"=> $value[$key1]["Puntaje"], "id"=> -1, "Cambios"=> null, "CambiosPuntaje"=>null);
                    }
                    $eva[] = array("id"=> -1, "Criterio"=> "Ingresar criterio.", "NivelCompetencia"=> $arreyi, "Cambios"=> null);    
                }
                
                $_SESSION["evaluacion"] = $eva;
            } elseif ($_GET["a"] == 2) {
                //guardar NivelCompetencia
                $eva  = $_SESSION["evaluacion"];
                if(count($eva[0]["NivelCompetencia"])<5){
                    foreach ($eva as $tei => $innerArray){
                        $arreyi = array("Descripcion"=> "Ingresar nivel de competencia.", "Puntaje"=> 0, "id"=> -1, "Cambios"=> null, "CambiosPuntaje"=>null);
                        $eva[$tei]["NivelCompetencia"][] = $arreyi;
                    }
                }
                $_SESSION["evaluacion"] = $eva;
            } elseif ($_GET["a"] == 3) {
                //eliminar criterio
                $eva  = $_SESSION["evaluacion"];
                
                if($eva[count($eva)-1]["id"]==-1){
                    if(count($eva)>1){
                        unset($eva[count($eva)-1]);    
                    }
                }
                else{
                    $do=true;
                    $nu = 0;
                    while($do){
                        if(count($eva)-$nu>1){
                            if($eva[count($eva)-($nu+1)]["Cambios"]!= "Eliminar!!."){
                               $eva[count($eva)-($nu+1)]["Cambios"] = "Eliminar!!.";
                               foreach($eva[count($eva)-($nu+1)]["NivelCompetencia"] as $key1 => $value){
                                   $eva[count($eva)-($nu+1)]["NivelCompetencia"][$key1]["Cambios"] = "Eliminar!!.";
                               }
                               $do=false;
                            }
                        }
                        else{
                           $do=false;
                        }
                        $nu++;
                    }
                }
                
                
                $_SESSION["evaluacion"] = $eva;
            } elseif ($_GET["a"] == 4) {
                //eliminar Nivel de competencia
                $eva  = $_SESSION["evaluacion"];
                
                $do=true;
                $nu = 0;
                
                $count1 = count($eva[0]["NivelCompetencia"])-1;
                if($eva[0]["NivelCompetencia"][$count1]["id"]==-1){
                    foreach($eva as $tei => $ley){
                        unset($eva[$tei]["NivelCompetencia"][$count1]);
                    }
                }
                else{
                    while($do){
                        $count = count($eva[0]["NivelCompetencia"])-($nu+1);
                        if($count>0){
                            foreach ($eva as $tei => $innerArray){
                                if($eva[$tei]["NivelCompetencia"][$count]["Cambios"]!= "Eliminar!!."){

                                   $eva[$tei]["NivelCompetencia"][$count]["Cambios"]="Eliminar!!.";
                                   $eva[$tei]["NivelCompetencia"][$count]["CambiosPuntaje"]="Eliminar!!.";
                                   $do=false;
                                }
                            }
                        }
                        else{
                           $do=false;
                        }
                        $nu++;
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
                            //revisara primero que la id no sea -1 en la cual esta en la BDD y si es asi preguntara si hay cambios.
                            if($eva[$tei]["id"]!=-1){
                                if($eva[$tei]["Criterio"] != $criterioo[$tei]){
                                    $eva[$tei]["Cambios"] = $criterioo[$tei];
                                }
                            }
                            else{
                            $eva[$tei]["Criterio"] = $criterioo[$tei];    
                            }
                            //cambios en nivel de competencias.
                            foreach($innerArray["NivelCompetencia"] as $key1 => $value){
                                if($eva[$tei]["NivelCompetencia"][$key1]["id"]!=-1){
                                    if($eva[$tei]["NivelCompetencia"][$key1]["Puntaje"]!=$puntaje[$key1]){
                                        $eva[$tei]["NivelCompetencia"][$key1]["CambiosPuntaje"] = $puntaje[$key1];
                                    }
                                }
                                else{
                                $eva[$tei]["NivelCompetencia"][$key1]["Puntaje"] = $puntaje[$key1];    
                                }
                                
                                if(isset($_POST["nivelcompetencia{$tei}"])){
                                   $nivel = $_POST["nivelcompetencia{$tei}"];
                                   if($eva[$tei]["NivelCompetencia"][$key1]["id"]!=-1){
                                       if($eva[$tei]["NivelCompetencia"][$key1]["Descripcion"]!= $nivel[$key1]){
                                            $eva[$tei]["NivelCompetencia"][$key1]["Cambios"] = $nivel[$key1];
                                       }
                                   }
                                   else{
                                       $eva[$tei]["NivelCompetencia"][$key1]["Descripcion"] = $nivel[$key1];   
                                   }
                                }
                            }
                        }
                    }
                    else{
                    header("location: ../error.php?error=404");
                    die();
                    }
                }
                else{
                    header("location: ../error.php?error=404");
                    die();
                }
                
                $_SESSION["evaluacion"] = $eva;
            } elseif ($_GET["a"] == 6) {
                 //guardar modificaciones.
                $eva  = $_SESSION["evaluacion"];
                if(isset($_POST["puntaje"])){
                    if(isset($_POST["criterios"])){
                        $criterioo = $_POST["criterios"];
                        $puntaje = $_POST["puntaje"];
                        foreach ($eva as $tei => $innerArray){
                            //revisara primero que la id no sea -1 en la cual esta en la BDD y si es asi preguntara si hay cambios.
                            if($eva[$tei]["id"]!=-1){
                                $eva[$tei]["Cambios"] = null;
                            }
                            //cambios en nivel de competencias.
                            foreach($innerArray["NivelCompetencia"] as $key1 => $value){
                                if($eva[$tei]["NivelCompetencia"][$key1]["id"]!=-1){
                                    $eva[$tei]["NivelCompetencia"][$key1]["CambiosPuntaje"] = null;
                                }
                                
                                if(isset($_POST["nivelcompetencia{$tei}"])){
                                   $nivel = $_POST["nivelcompetencia{$tei}"];
                                   $eva[$tei]["NivelCompetencia"][$key1]["Cambios"] = null;
                                }
                            }
                        }
                    }
                    else{
                    header("location: ../error.php?error=404");
                    die();
                    }
                }
                else{
                    header("location: ../error.php?error=404");
                    die();
                }
                
                $_SESSION["evaluacion"] = $eva;
            }
          
          header("location: ../rubrica.php?jump=2#submit4");
          die();
          
        } elseif ($_GET["pre"] == 4) {
           //Guardar todo.
              
               //creacion de la rubrica principal + el nombre.
               $idRubrica = $_SESSION["edita"]["rubrica"]["idRubrica"];

               //sessiones que se guardan necesarias.
               $autoeva = $_SESSION["autoevaluacion"];
               $coeva = $_SESSION["coevaluacion"];
               $eva  = $_SESSION["evaluacion"];

               //creacion de los tipo de rubrica.
               $tipocriterioru = $_SESSION["edita"]["tipo"];
               foreach($tipocriterioru as $td => $tw){
                 $idtipocriteriorubrica[$td] = array($tw["idTipoCriterioRubrica"],($td+1));
               }
               
               $criterio = new Criterio();

                foreach ($idtipocriteriorubrica as $da){
                    if($da[1]==1){
                    foreach ($eva as $da2){
                        if($da2["id"]==-1){
                            $criterio = new Criterio();
                            $criterio->setNombre($da2["Criterio"]);
                            $criterio->setTipoCriterioRubrica_idTipoCriterioRubrica($da[0]);
                            $idCriterio = $criterio->Ingresar();

                            foreach ($da2["NivelCompetencia"] as $value){
                                $nivelcompetencia = new NivelCompetencia();
                                $nivelcompetencia->setCriterio_idCriterio($idCriterio);
                                $nivelcompetencia->setDescripcion($value["Descripcion"]);
                                if($value["CambiosPuntaje"]==null){
                                $nivelcompetencia->setPuntaje($value["Puntaje"]);
                                }
                                else{
                                $nivelcompetencia->setPuntaje($value["CambiosPuntaje"]);   
                                }
                                $nivelcompetencia->Ingresar();
                                unset($nivelcompetencia);
                            }
                        }
                        elseif($da2["Cambios"]=="Eliminar!!."){
                            $criterio = new Criterio();
                            $idCriterio = $da2["id"];
                            $criterio->setidCriterio($idCriterio);
                            foreach ($da2["NivelCompetencia"] as $value){
                                $nivelcompetencia = new NivelCompetencia();
                                $nivelcompetencia->setIdNivelCompetencia($value["id"]);
                                $nivelcompetencia->Eliminar();
                                unset($nivelcompetencia);
                            }
                            $criterio->Eliminar();
                        }
                        elseif($da2["Cambios"]!=null){
                            $criterio = new Criterio();
                            $idCriterio = $da2["id"];
                            $criterio->setidCriterio($idCriterio);
                            $criterio->setNombre($da2["Cambios"]);
                            $criterio->Actualizar();

                            foreach ($da2["NivelCompetencia"] as $value){
                                if($value["id"]!=-1){
                                    if($value["Cambios"]=="Eliminar!!."){
                                    $nivelcompetencia = new NivelCompetencia();
                                    $nivelcompetencia->setIdNivelCompetencia($value["id"]);
                                    $nivelcompetencia->Eliminar();
                                    unset($nivelcompetencia);
                                    }
                                    elseif($value["Cambios"]!=null){
                                    $nivelcompetencia = new NivelCompetencia();
                                    $nivelcompetencia->setIdNivelCompetencia($value["id"]);
                                    $nivelcompetencia->setDescripcion($value["Cambios"]);
                                    if($value["CambiosPuntaje"]==null){
                                    $nivelcompetencia->setPuntaje($value["Puntaje"]);
                                    }
                                    else{
                                    $nivelcompetencia->setPuntaje($value["CambiosPuntaje"]);   
                                    }
                                    $nivelcompetencia->Actualizar();
                                    unset($nivelcompetencia);
                                    }
                                }
                                else{
                                    $nivelcompetencia = new NivelCompetencia();
                                    $nivelcompetencia->setCriterio_idCriterio($idCriterio);
                                    $nivelcompetencia->setDescripcion($value["Descripcion"]);
                                    $nivelcompetencia->setPuntaje($value["Puntaje"]);
                                    $nivelcompetencia->Ingresar();    
                                }
                            }
                        }
                        else{
                            foreach ($da2["NivelCompetencia"] as $value){
                                if($value["id"]!=-1){
                                    if($value["Cambios"]=="Eliminar!!."){
                                    $nivelcompetencia = new NivelCompetencia();
                                    $nivelcompetencia->setIdNivelCompetencia($value["id"]);
                                    $nivelcompetencia->Eliminar();
                                    unset($nivelcompetencia);
                                    }
                                    elseif($value["Cambios"]!=null){
                                    $nivelcompetencia = new NivelCompetencia();
                                    $nivelcompetencia->setIdNivelCompetencia($value["id"]);
                                    $nivelcompetencia->setDescripcion($value["Cambios"]);
                                    if($value["CambiosPuntaje"]==null){
                                    $nivelcompetencia->setPuntaje($value["Puntaje"]);
                                    }
                                    else{
                                    $nivelcompetencia->setPuntaje($value["CambiosPuntaje"]);   
                                    }
                                    $nivelcompetencia->Actualizar();
                                    unset($nivelcompetencia);
                                    } elseif($value["CambiosPuntaje"]!=null){
                                    $nivelcompetencia = new NivelCompetencia();
                                    $nivelcompetencia->setIdNivelCompetencia($value["id"]);
                                    $nivelcompetencia->setDescripcion($value["Descripcion"]);
                                    $nivelcompetencia->setPuntaje($value["CambiosPuntaje"]);   
                                    $nivelcompetencia->Actualizar();
                                    unset($nivelcompetencia);
                                    } 
                                }
                                else{
                                    $nivelcompetencia = new NivelCompetencia();
                                    $nivelcompetencia->setCriterio_idCriterio($da2["id"]);
                                    $nivelcompetencia->setDescripcion($value["Descripcion"]);
                                    $nivelcompetencia->setPuntaje($value["Puntaje"]);
                                    $nivelcompetencia->Ingresar();    
                                }
                            }
                        }
                    }
                    
                    } elseif ($da[1]==2) {
                        foreach ($autoeva as $da3){
                            if($da3["unico"]==-1){
                                $criterio = new Criterio();
                                $criterio->setNombre($da3["pregunta"]);
                                $criterio->setTipoCriterioRubrica_idTipoCriterioRubrica($da[0]);
                                $idCriterio1 = $criterio->Ingresar();
                            }
                            else{
                                if($da3["Cambios"]=="Eliminar!!."){
                                    $criterio = new Criterio();
                                    $idCriterio = $da3["unico"];
                                    $criterio->setidCriterio($idCriterio);
                                    $criterio->Eliminar();
                                } elseif ($da3["Cambios"]!=null) {
                                    $criterio = new Criterio();
                                    $idCriterio = $da3["unico"];
                                    $criterio->setidCriterio($idCriterio);
                                    $criterio->setNombre($da3["Cambios"]);
                                    $criterio->Actualizar();
                                }
                            }
                        
                        }
                    } elseif ($da[1]==3) {
                        foreach ($coeva as $da4){
                            if($da4["unico"]==-1){
                                $criterio = new Criterio();
                                $criterio->setNombre($da4["pregunta"]);
                                $criterio->setTipoCriterioRubrica_idTipoCriterioRubrica($da[0]);
                                $idCriterio2 = $criterio->Ingresar();
                            }
                            else{
                                if($da4["Cambios"]=="Eliminar!!."){
                                    $criterio = new Criterio();
                                    $idCriterio = $da4["unico"];
                                    $criterio->setidCriterio($idCriterio);
                                    $criterio->Eliminar();
                                } elseif ($da4["Cambios"]!=null) {
                                    $criterio = new Criterio();
                                    $idCriterio = $da4["unico"];
                                    $criterio->setidCriterio($idCriterio);
                                    $criterio->setNombre($da4["Cambios"]);
                                    $criterio->Actualizar();
                                }
                            }
                        }
                    }
                }
                
                unset($_SESSION["autoevaluacion"]);
                unset($_SESSION["coevaluacion"]);
                unset($_SESSION["evaluacion"]);
                unset($_SESSION["rubrica"]);
                header("location: ../biblioteca.php?editado=2");
                die();
        } elseif ($_GET["pre"] == -1) {
          //rubricaevaluativa
          unset($_SESSION["autoevaluacion"]);
          unset($_SESSION["coevaluacion"]);
          unset($_SESSION["evaluacion"]);
          unset($_SESSION["rubrica"]);
          unset($_SESSION["ver"]);
          unset($_SESSION["edita"]);
          
          header("location: ../Biblioteca.php");
          die();
        }
    }
}
header("location: ../error.php?error=404");
die();