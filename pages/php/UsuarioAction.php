<?php
ob_start();
session_start();
if(isset($_GET["user"])){

    if($_GET["user"]==1){
        include_once("./CRUD/Docente.php");
        include_once("./CRUD/Rubrica.php");
        include_once("./CRUD/TipoCriterioRubrica.php");  
        include_once("./CRUD/Criterio.php");
        include_once("./CRUD/NivelCompetencia.php");
        if(isset($_GET["action"])){
            if($_GET["action"]==1){
                $nombre = "";
                $password = "";
                $correo = "";
                $admin = "";

                if(isset($_POST["nombre1"]) && isset($_POST["email2"]) && isset($_POST["password3"]) && isset($_POST["admin4"]))
                {
                    $nombre = $_POST["nombre1"];
                    $correo = $_POST["email2"];
                    $password = $_POST["password3"];
                    $admin = $_POST["admin4"];

                    try
                    {
                        $docente = new Docente();
                        $docente->setNombre($nombre);
                        $docente->setEmail($correo);
                        $docente->setPassword($password);
                        $docente->setAdmin($admin);
                        
                        if(!$docente->Existeono())
                        {
                            if($docente->Ingresar())
                            {
                                $rubrica = new Rubrica();
                                $idDocente = $docente->id();
                                $rubrica->setDocente_idDocente($idDocente);
                                $rubrica->setnombre("Predeterminado");
                                $idrubrica = $rubrica->Ingresar();
                                
                                $idtipocriteriorubrica;
                                for ($i = 1; $i <= 3; $i++){
                                  $tipocriteriorubrica = new TipoCriterioRubrica();
                                  $tipocriteriorubrica->setRubrica_idRubrica($idrubrica);
                                  $tipocriteriorubrica->settipos($i);
                                  $idtipocriteriorubrica[$i] = $tipocriteriorubrica->Ingresar();
                                  unset($tipocriteriorubrica);
                                }
                                
                                $array_criterios = array("Hechos","Pregunta","Conceptos","Metodologia", "Conclusion y/o respuesta");
                                
                                $H3 = "Se identifican hechos, algunos conceptos y algunos aspectos metodologicos.";
                                $H2 = "Se identifican hechos y algunos conceptos.";
                                $H1 = "Se identifican hechos.";
                                $H0 = "No hay hechos.";
                                $array_descripuntaje[] = array(array("puntos"=>3,"text"=>$H3),array("puntos"=>2,"text"=>$H2),array("puntos"=>1,"text"=>$H1),array("puntos"=>0,"text"=>$H0));
                                $P3 = "Hay una pregunta basada en los hechos, que incluye conceptos y que sugiere aspectos metodologicos.";
                                $P2 = "Hay una pregunta basada en los hechos y que incluye conceptos.";
                                $P1 = "Hay una pregunta basada en los hechos.";
                                $P0 = "No hay pregunta.";
                                $array_descripuntaje[] = array(array("puntos"=>3,"text"=>$P3),array("puntos"=>2,"text"=>$P2),array("puntos"=>1,"text"=>$P1),array("puntos"=>0,"text"=>$P0));
                                $C3 = "Se identifican aplicaciones, el lenguaje y el modelo o modelos";
                                $C2 = "Se identifican aplicaciones y el lenguaje.";
                                $C1 = "Se identifican aplicaciones.";
                                $C0 = "No hay conceptos.";
                                $array_descripuntaje[] = array(array("puntos"=>3,"text"=>$C3),array("puntos"=>2,"text"=>$C2),array("puntos"=>1,"text"=>$C1),array("puntos"=>0,"text"=>$C0)); 
                                $M3 = "Con los datos procesados se obtiene un resultado.";
                                $M2 = "Los datos son procesados, ya sea a traves de tablas y/o graficas.";
                                $M1 = "Hay una recoleccion de datos.";
                                $M0 = "No hay metodologia.";
                                $array_descripuntaje[] = array(array("puntos"=>3,"text"=>$M3),array("puntos"=>2,"text"=>$M2),array("puntos"=>1,"text"=>$M1),array("puntos"=>0,"text"=>$M0)); 
                                $R3 = "La conclusion incorpora además del resultado de la parte metodologica, los hechos y los conceptos.";
                                $R2 = "La conclusion incorpora además del resultado de la parte metodologica y los hechos.";
                                $R1 = "La conclusion es muy semejante al resultado de la parte metodologica.";
                                $R0 = "No hay conclusion.";
                                $array_descripuntaje[] = array(array("puntos"=>3,"text"=>$R3),array("puntos"=>2,"text"=>$R2),array("puntos"=>1,"text"=>$R1),array("puntos"=>0,"text"=>$R0)); 
                                
                                $conteo=0;
                                //evaluacion.
                                foreach ($array_criterios as $da){
                                 $criterio = new Criterio();
                                 $criterio->setNombre($da);
                                 $criterio->setTipoCriterioRubrica_idTipoCriterioRubrica($idtipocriteriorubrica[1]);
                                 $idCriterio = $criterio->Ingresar();
                                 
                                 for($i = 0; $i <= 3; $i++){
                                 $nivelcompetencia = new NivelCompetencia();
                                 $nivelcompetencia->setCriterio_idCriterio($idCriterio);
                                 $nivelcompetencia->setDescripcion($array_descripuntaje[$conteo][$i]["text"]);
                                 $nivelcompetencia->setPuntaje($array_descripuntaje[$conteo][$i]["puntos"]);
                                 $nivelcompetencia->Ingresar();
                                 unset($nivelcompetencia);
                                 }
                                 $conteo = $conteo + 1;
                                }             
                                
                                //autoevaluacion.
                                $array_criterios1 = array("Cumpli con mis compromisos","Participe de forma activa","Me esforce para alcanzar los objetivos","Demostre mis habilidades durante el trabajo");
                                foreach ($array_criterios1 as $da){
                                 $criterio = new Criterio();
                                 $criterio->setNombre($da);
                                 $criterio->setTipoCriterioRubrica_idTipoCriterioRubrica($idtipocriteriorubrica[2]);
                                 $idCriterio = $criterio->Ingresar();
                                }
                                
                                //coevaluacion
                                $array_criterios2 = array("Participa de forma activa","Realiza aportes al trabajo grupal","Es responsable en sus compromisos","Dedica el tiempo suficiente al trabajo grupal", "Comparte sus conocimientos");
                                foreach ($array_criterios2 as $da){
                                 $criterio = new Criterio();
                                 $criterio->setNombre($da);
                                 $criterio->setTipoCriterioRubrica_idTipoCriterioRubrica($idtipocriteriorubrica[3]);
                                 $idCriterio = $criterio->Ingresar();
                                }
                                
                                //no existe y se crea.
                                header("location: ../adminCuentas.php?exito=1");
                                die();
                            }
                        }
                        else 
                        {
                            //existe
                            header("location: ../adminCuentas.php?error=3");
                            die();
                        }

                    }
                    catch(Exception $e)
                    {
                        header("location: ../error404.php");
                        die();
                    }

                }
                else
                {
                    //campos vacios
                    header("location: ../adminCuentas.php?error=1");
                    die();
                }
            } elseif($_GET["action"]==2){
                //eliminar
                if(isset($_GET["id"]))
                {
                   
                   $id = $_GET["id"];
                   try{    
                       $docente = new Docente();
                       $docente->setidDocente($id);
                       
                       if($docente->ExisteonoPorID())
                       {   
                           if($docente->isHabilitado()==0){
                               $docente->sethabilitado(1);
                               $da = $docente->Habilitarono();
                               header("location: ../adminCuentas.php?exito={$da}");
                               die();
                           }elseif ($docente->isHabilitado()==1) {
                               $docente->sethabilitado(0);
                               $da = $docente->Habilitarono();
                               header("location: ../adminCuentas.php?exito={$da}");
                               die();
                           }
                       }
                       else
                       {
                           //hubo modificacion
                       }
                   }
                   catch (mysqli_sql_exception $ex)
                   {
                       header("location: ../error404.php");
                        die();
                   }
                }
                else
                {
                    //ERROR SIN ID
                }
            } elseif($_GET["action"]==3){
                //actualiza
            }
            }
            else
            {
                // ERROR INTENTO DE MODIFICAR URL
            }
        }
        elseif ($_GET["user"]==2) 
        {
        //Genera una accion.
        if(isset($_GET["action"])){
            if($_GET["action"]==1){
                //Agregar alumno por Docente
                include_once("./CRUD/Alumno.php");
                if(isset($_POST["email1"]))
                {
                  $alumno = new Alumno();
                  $alumno->setEmail($_POST["email1"]);
                  $alumno->setNombre("Sin nombre");
                  $alumno->setPassword("1A*2b#3C9R*");   
                  
                  if(!$alumno->Existeono()){
                      if($alumno->Ingresar())
                      {
                          $_SESSION["idAlumno"] = $alumno->DevolverIdporEmail();
                          header("location: ../indexDocente.php?exitoenvio=1");
                          die();
                      }
                  }
                  else
                  {
                      header("location: ../indexDocente.php?errorenvio=1");
                      die();
                  }
                }
            }elseif($_GET["action"]==2){
               //Modificar Alumno
               include_once("./CRUD/Alumno.php");
               if(isset($_POST["codigo"]) && isset($_POST["email1"]) && isset($_POST["nombre"]) && isset($_POST["password"]))
               {
                 $codigo = $_POST["codigo"];  
                   
                 $alumno = new Alumno();
                 $alumno->setidAlumno($codigo.trim());
                 $alumno->setNombre($_POST["nombre"]);
                 $alumno->setEmail($_POST["email1"]);
                 $alumno->setPassword($_POST["password"]);
                 $alumno->sethabilitado(1);
                         
                 if($alumno->ExisteonoPorID())
                 {  
                    //modificar
                    if(!$alumno->FueActualizado()){
                        if($alumno->Actualizar())
                        {
                          header("location: ../loginAlumno.php?exito=1");
                          die();
                        }
                        else
                        {
                          //error sql :(
                          header("location: ../loginAlumno.php?error=9000");
                          die();
                        }
                    }
                    else
                    {
                        //fue creado y actualizado..
                        header("location: ../loginAlumno.php?error=4");
                        die();
                    }
                 }
                 else
                 {
                    //noexiste su id.
                    header("location: ../crearAlumno.php?error=20");
                    die();  
                 }

               }
            } elseif($_GET["action"]==3){
              unset($_SESSION["idAlumno"]);
              header("location: ../indexDocente.php");
              die(); 
            }
       }
       else
       {
           //ERROR INTENTO MODIFICAR URL..
       }
    }
    else
    {
       header("location: ../error404.php");
       die();  
    }
}
ob_end_flush();