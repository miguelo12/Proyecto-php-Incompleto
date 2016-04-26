<?php
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
            setcookie("titulocreacion", $new, time()+86400, "/", "",  0);
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
            $recu = $recursosdidactico->DevolverRecursoEdit();
            
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

          $sec = json_decode($_COOKIE["recursosdidacticos"]);
          $docente = $_SESSION["docente"];
          date_default_timezone_set('Chile/Continental');
          $date = date("mY");
          //elimina los archivos.
          foreach($sec as $do)
          {
              unlink($do["url"]);
          }
          //elimina la carpeta.
          if(rmdir("uploads/".$docente["id"]."/".$_COOKIE["titulocreacion"]."-".$date))
          {
              setcookie('titulocreacion', null, -1, '/');
          }else
          {
              setcookie('titulocreacion', null, -1, '/');
          }

          unset($_SESSION["Ayuda"]);
          unset($_SESSION["preguntas"]);
          setcookie('titulocreacion', null, -1, '/');
          unset($_SESSION["rubrica"]);
          unset($_SESSION["NuevaUnidad"]);
          setcookie('recursosdidacticos', null, -1, '/');
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
                 $titulo = $_COOKIE["titulocreacion"];
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

             setcookie('titulocreacion', null, -1, '/');
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
          if(isset($_COOKIE["recursosdidacticos"]))
          {
              $recursosdidacticos = json_decode($_COOKIE["recursosdidacticos"]);

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
              setcookie('recursosdidacticos', null, -1, '/');
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
            //elimina la sesion y vuelve la normalidad creacion unidad.
            unset($_SESSION["editar"]);
            unset($_SESSION["NuevaUnidad"]);
            unset($_SESSION["preguntas"]);
            $sec = json_decode($_COOKIE["recursosdidacticos"]);
             //elimina los archivos.
            foreach($sec as $do)
            {
                unlink($do["url"]);
            }
            setcookie('recursosdidacticos', null, -1, '/');
            header("location: ../indexDocente.php");
            die();
        } elseif ($_GET["action"]==1) {
            //Verificar primero si hay un recurso, sino devolverlo a la pagina recursosDidactico,
            //si es asi seguir en crearunidad para guardar
            
            $edita = $_SESSION["editar"];
            $contador1 = 0;
            $contador2 = 0;
            foreach($edita["recursosdidacticos"] as $pro){
              $contador2++;
              if($pro["eliminar"]!= null){
                $contador1++;
              }
            }
            
            if($conteo1 == $contador2){
                if(isset($_COOKIE["recursosdidacticos"])){
                   header("location: ../CrearUnidad.php");
                   die();
                }
                else{
                   header("location: ../RecursoDidactico.php?errorRe=1");
                   die();
                }
            }
            else{           
                $_SESSION["NuevaUnidad"] = $edita;
                header("location: ../CrearUnidad.php");
                die();  
            }
        } elseif ($_GET["action"] == 2) {
           if(isset($_SESSION["NuevaUnidad"]))
           {
              //finaliza la unidad.
              $edita = $_SESSION["editar"];
              
              if(isset($_COOKIE["recursosdidacticos"])){
              $newRecursos = json_decode($_COOKIE["recursosdidacticos"]);
              }
              if(isset($_SESSION["preguntas"])){
              $newPreguntas = $_SESSION["preguntas"];
              }
              if(isset($edita["ayuda"]["modificar"])){
              
              }
              
              $recursosdidactico = new RecursosDidacticos();
              $ayuda = new Ayuda();
              $preguntas = new Preguntas();
              
              if(isset($newRecursos)){
                 //editar esto deberia estar en upload cuando edit este activado....
                 //nuevos recursos.
                 foreach ($newRecursos as $dy){
                     $recursosdidactico->setIdUnidadAprendizaje_idUnidadAprendizaje($edita["unidad"]["idUnidadAprendizaje"]);
                     $recursosdidactico->setNombre($dy["nombre"]);
                     $recursosdidactico->setTipo($dy["tipo"]);
                     $recursosdidactico->setDescripcion($dy["descripcion"]);
                     $recursosdidactico->seturl($dy["url"]);
                     $recursosdidactico->Ingresar();    
                 }
              }
              
              if(isset($newPreguntas)){
                  //nuevas preguntas.
                foreach ($newPreguntas as $dy){
                  $preguntas->setUnidadAprendizaje_idUnidadAprendizaje($edita["unidad"]["idUnidadAprendizaje"]);
                  $preguntas->setpreguntas($dy["pre"]);
                  $preguntas->Ingresar();
                }
              }
              
              if(isset($edita["ayuda"]["modificar"])){
                  //editar Ayuda.
                     $ayuda->setidAyuda($edita["ayuda"]["idAyuda"]);
                     if(isset($edita["ayuda"]["modificar"]["aplicaciones"])){
                     $ayuda->setaplicaciones($edita["ayuda"]["modificar"]["aplicaciones"]);
                     }
                     else{
                     $ayuda->setaplicaciones(null);
                     }
                     if(isset($edita["ayuda"]["modificar"]["conclusiones"])){
                     $ayuda->setconclusiones($edita["ayuda"]["modificar"]["conclusiones"]);
                     }
                     else{
                     $ayuda->setconclusiones(null);
                     }
                     if(isset($edita["ayuda"]["modificar"]["lenguaje"])){
                     $ayuda->setlenguaje($edita["ayuda"]["modificar"]["lenguaje"]);
                     }
                     else{
                     $ayuda->setlenguaje(null);
                     }
                     if(isset($edita["ayuda"]["modificar"]["modelos"])){
                     $ayuda->setmodelos($edita["ayuda"]["modificar"]["modelos"]);
                     }
                     else{
                     $ayuda->setmodelos(null); 
                     }
                     if(isset($edita["ayuda"]["modificar"]["procedimiento"])){
                     $ayuda->setprocedimiento($edita["ayuda"]["modificar"]["procedimiento"]);
                     }
                     else{
                     $ayuda->setprocedimiento(null); 
                     }
                     if(isset($edita["ayuda"]["modificar"]["procesamiento"])){
                     $ayuda->setprocesamiento($edita["ayuda"]["modificar"]["procesamiento"]);
                     }
                     else{
                     $ayuda->setprocesamiento(null); 
                     }

                     $ayuda->Actualizar();
                  
              }
              
              foreach($edita["preguntas"] as $preg){
                  if($preg["editar"] != null){
                    $preguntas->setidPreguntas($preg["idPreguntas"]);
                    $preguntas->setpreguntas($preg["editar"]);
                    $preguntas->Actualizar();
                  }
                  
                  if($preg["eliminar"] != null){
                    $preguntas->setidPreguntas($preg["idPreguntas"]);
                    $preguntas->Eliminar();
                  }
              }
              
              setcookie('recursosdidacticos', null, -1, '/');
              unset($_SESSION["editar"]);
              unset($_SESSION["NuevaUnidad"]);
              unset($_SESSION["preguntas"]);
              header("location: ../Biblioteca.php");
              die();
           }
           else{
              header("location: ../CrearUnidad.php?SinTerminar=2");
              die();
           }
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