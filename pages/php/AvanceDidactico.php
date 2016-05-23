<?php
session_start();
if(!isset($_GET["edit"])){
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
                      $array[] = array("id"=>$index,"pre"=>$pre, "key"=>null);
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
                      $array[$index] = array("id"=>$index,"pre"=>$pre, "key"=>null);
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
                  $array[$id] = array("id"=>$id,"pre"=>$pre, "key"=>0);
                  $_SESSION["preguntas"] = $array;
                  header("location: ../RecursoDidactico.php?jump=2&modify=1#submit1");
                  die();
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
                        $arroy[$index] = array("id"=>$index,"pre"=>$ta["pre"], "key"=>$ta["key"]);
                        $index = $index + 1;
                     } 
                  }

                  $_SESSION["preguntas"] = $arroy;
                  header("location: ../RecursoDidactico.php?jump=2&delete=1#submit1");
                  die();
                }
            }
            header("location: ../RecursoDidactico.php?jump=2&submit=1#submit1");
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
                else
                {
                   unset($_SESSION["Ayuda"]);
                   header("location: ../RecursoDidactico.php?jump=3&vacio=1#submit2");
                   die();
                }

                 header("location: ../RecursoDidactico.php?jump=3&submit=100#submit2");
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
                   header("location: ../RecursoDidactico.php?jump=3&vacio=1#submit2");
                   die();
                }

                header("location: ../RecursoDidactico.php?jump=3&submit=100#submit2");
                die();
            }
        } 
    }
}
else
{
    if($_GET["edit"] == 1){
        if(isset($_GET["a"])){ 
            if($_GET["a"] == 1){ 
                if(isset($_GET["id"])){
                   $edit = $_SESSION["editar"];
                   $id = $_GET["id"];
                   if(!empty($_POST["preguntas{$id}"])){ 
                   $preguntt = $_POST["preguntas{$id}"];
                   foreach ($edit["preguntas"] as $key => $editar)
                   {
                       if($id == $editar["idPreguntas"])   
                       {    
                           if($editar["eliminar"] == null){
                               if($editar["editar"] != null)
                               {
                                  $edit["preguntas"][$key]["editar"] = null;
                                  $ca=true;
                               }
                              else
                               {
                                  $edit["preguntas"][$key]["editar"] = $preguntt;
                                  $ca=false;
                               }
                           }
                           else
                           {
                               header("location: ../RecursoDidactico.php?jump=2&invalid=1");
                               die();
                           }
                       }
                   }
                   if($ca){
                   $_SESSION["editar"] = $edit;
                   
                   header("location: ../RecursoDidactico.php?jump=2&modify=e2");
                   die();
                   }
                   else{
                   $_SESSION["editar"] = $edit;
                   
                   header("location: ../RecursoDidactico.php?jump=2&modify=e1");
                   die();  
                   }
                   }
                   else{
                    header("location: ../RecursoDidactico.php?jump=2&pre=e100");
                    die();  
                   }
                }
                else{
                    header("location: ../RecursoDidactico.php?jump=2");
                    die();
                }
            } elseif ($_GET["a"] == 2) {
                if(isset($_GET["id"])){
                   $edit = $_SESSION["editar"];
                   $id = $_GET["id"];
                   foreach ($edit["preguntas"] as $key => $editar)
                   {
                       if($id == $editar["idPreguntas"])   
                       {    
                           if($editar["editar"] == null){
                               if($editar["eliminar"] == "YES")
                               {
                                  $edit["preguntas"][$key]["eliminar"] = null;
                                  $ca=true;
                               }
                              else
                               {
                                  $edit["preguntas"][$key]["eliminar"] = "YES";
                                  $ca=false;
                               }
                           }
                           else
                           {
                               header("location: ../RecursoDidactico.php?jump=2&invalid=1");
                               die();
                           }
                       }
                   }
                   
                   if($ca){
                   $_SESSION["editar"] = $edit;
                   
                   header("location: ../RecursoDidactico.php?jump=2&delete=e2");
                   die();
                   }
                   else{
                   $_SESSION["editar"] = $edit;
                   
                   header("location: ../RecursoDidactico.php?jump=2&delete=e1");
                   die();
                   }
                }
                else{
                    header("location: ../RecursoDidactico.php?jump=2");
                    die();
                }
            }
        }
        else{
            header("location: ../RecursoDidactico.php?jump=2");
            die();
        }
    } elseif ($_GET["edit"] == 2) {
        if(isset($_GET["a"])){ 
            if($_GET["a"] == 1){ 
                $edit3 = $_SESSION["editar"];
                if(isset($_POST["procedimiento"])){
                    if(!empty($_POST["procedimiento"]))
                    {
                       $edit3["ayuda"]["modificar"]["procedimiento"] = $_POST["procedimiento"];          
                    }
                    else
                    {
                       $edit3["ayuda"]["modificar"]["procedimiento"] = null; 
                    }
                }

                if(isset($_POST["aplicaciones"])){
                    if(!empty($_POST["aplicaciones"]))
                    {
                       $edit3["ayuda"]["modificar"]["aplicaciones"] = $_POST["aplicaciones"];
                    }
                    else
                    {
                       $edit3["ayuda"]["modificar"]["aplicaciones"] = null;
                    }
                }

                if(isset($_POST["procesamiento"])){
                    if(!empty($_POST["procesamiento"]))
                    {
                       $edit3["ayuda"]["modificar"]["procesamiento"] = $_POST["procesamiento"];
                    }
                    else
                    {
                       $edit3["ayuda"]["modificar"]["procesamiento"] = null;
                    }
                }

                if(isset($_POST["lenguaje"])){
                    if(!empty($_POST["lenguaje"]))
                    {
                       $edit3["ayuda"]["modificar"]["lenguaje"] = $_POST["lenguaje"];
                    }
                    else
                    {
                       $edit3["ayuda"]["modificar"]["lenguaje"] = null;
                    }
                }

                if(isset($_POST["modelos"])){
                    if(!empty($_POST["modelos"]))
                    {
                       $edit3["ayuda"]["modificar"]["modelos"] = $_POST["modelos"];
                    }
                    else
                    {
                       $edit3["ayuda"]["modificar"]["modelos"] = null; 
                    }
                }

                if(isset($_POST["conclusiones"])){
                    if(!empty($_POST["conclusiones"]))
                    {
                       $edit3["ayuda"]["modificar"]["conclusiones"] = $_POST["conclusiones"];
                    }
                    else
                    {
                       $edit3["ayuda"]["modificar"]["conclusiones"] = null;
                    }

                }

                if(current($edit3["ayuda"]["modificar"])){
                   $_SESSION["editar"] = $edit3;
                }
                else
                {
                   $_SESSION["editar"] = $edit3;
                   header("location: ../RecursoDidactico.php?jump=3&vacio=1#submit2");
                   die(); 
                }

                 header("location: ../RecursoDidactico.php?jump=3&submit=100#submit2");
                 die();
            }
            elseif ($_GET["a"] == 2)
            {
                $edit3 = $_SESSION["editar"];
                $edit3["ayuda"]["modificar"] = null;
                $_SESSION["editar"] = $edit3;
                header("location: ../RecursoDidactico.php?jump=3&cancel=1");
                die();
            } else
            {
                header("location: ../RecursoDidactico.php?jump=3");
                die();
            }
            
        }
        else{
            header("location: ../RecursoDidactico.php");
            die();
        }
    }
    
    header("location: ../RecursoDidactico.php");
    die();
}
header("location: ../error.php?error=404");
die();