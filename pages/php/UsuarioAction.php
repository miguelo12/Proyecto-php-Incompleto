<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_GET["user"])){
    if($_GET["user"]==1){
        include_once("./CRUD/Docente.php");
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
                           if($docente->Eliminar())
                           {
                               //se elimino
                               header("location: ../adminCuentas.php?exito=2");
                               die();
                           }
                       }
                       else
                       {
                           //hubo modificacion
                       }
                   }
                   catch (Exception $ex)
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
                $idAlumno = "";
                $email = "";
                if(isset($_POST["email3"]))
                {

                }
            }elseif($_GET["action"]==2){
               //Modificar Alumno
               include_once("./CRUD/Alumno.php");
               $idAlumno = "";
               $email = "";
               $nombre = "";
               $password = "";
               if(isset($_POST["codigo"]) && isset($_POST["email"]) && isset($_POST["nombre"]) && isset($_POST["password"]))
               {
                 $alumno = new Alumno();
                 $alumno->setidAlumno($_POST["codigo"]);
                 $alumno->setNombre($_POST["nombre"]);
                 $alumno->setEmail($_POST["email"]);
                 $alumno->setPassword($_POST["password"]);

                 if($alumno->ExisteonoPorID())
                 {  
                    //modificar
                    if($alumno->Actualizar())
                    {
                      header("location: ../loginAlumno.php?exito=1");
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
    