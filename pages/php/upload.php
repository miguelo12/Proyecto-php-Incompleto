<?php
session_start();
if(isset($_SESSION["titulocreacion"])){
    if(isset($_GET["tipo"])){
        if($_GET["tipo"]==1){
            date_default_timezone_set('Chile/Continental');
            $date = date("mY");
            $docente = $_SESSION["docente"];
            $target_username = "uploads/{$docente["id"]}";
            $target_dir = "uploads/{$docente["id"]}/{$_SESSION["titulocreacion"]}-{$date}/";
            $target_file = $target_dir . basename($_FILES["resume1"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                if($imageFileType == "txt"){
                    $uploadOk = 1;
                    
                    if (!(file_exists($target_username)))
                    {
                        mkdir($target_username);
                        if (!(file_exists($target_dir)))
                        {
                            mkdir($target_dir);
                        }
                    }
                    else
                    {
                        if (!(file_exists($target_dir)))
                        {
                            mkdir($target_dir);
                        }
                    } 
                }
                else
                {
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }
            
            if ($uploadOk == 0) {
                header("location: ../RecursoDidactico.php?errorSubir=1");
                die;
                
            } else {
                if (move_uploaded_file($_FILES["resume1"]["tmp_name"], $target_file)) {
                    if(isset($_SESSION["recursosdidacticos"])){
                    $Recursos = array("nombre" => $_FILES["resume1"]["name"], "tamaño" => $_FILES["resume1"]["size"],"tipo" => $_FILES["resume1"]["type"], "descripcion" => $_POST["descripcion1"], "url" => $target_file);
                    $recu = $_SESSION["recursosdidacticos"];
                    $recu[] = $Recursos;
                    $_SESSION["recursosdidacticos"] = $recu;
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                    else
                    {
                    $Recursos = array("nombre" => $_FILES["resume1"]["name"], "tamaño" => $_FILES["resume1"]["size"],"tipo" => $_FILES["resume1"]["type"], "descripcion" => $_POST["descripcion1"], "url" => $target_file);
                    $recu[] = $Recursos;
                    $_SESSION["recursosdidacticos"] = $recu;
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                } else {
                    header("location: ../RecursoDidactico.php?errorSubir=2");
                    die;
                }
            }
        } elseif ($_GET["tipo"]==2) {
            date_default_timezone_set('Chile/Continental');
            $date = date("mY");
            $docente = $_SESSION["docente"];
            $target_username = "uploads/{$docente["id"]}";
            $target_dir = "uploads/{$docente["id"]}/{$_SESSION["titulocreacion"]}-{$date}/";
            $target_file = $target_dir . basename($_FILES["resume2"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                if($imageFileType == "doc" || $imageFileType == "docx"){
                    $uploadOk = 1;
                    
                    if (!(file_exists($target_username)))
                    {
                        mkdir($target_username);
                        if (!(file_exists($target_dir)))
                        {
                            mkdir($target_dir);
                        }
                    }
                    else
                    {
                        if (!(file_exists($target_dir)))
                        {
                            mkdir($target_dir);
                        }
                    } 
                }
                else
                {
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
            header("location: ../RecursoDidactico.php?errorSubir=3");
            die;
                
            } else {
                if (move_uploaded_file($_FILES["resume2"]["tmp_name"], $target_file)) {
                    if(isset($_SESSION["recursosdidacticos"])){
                    $Recursos = array("nombre" => $_FILES["resume2"]["name"], "tamaño" => $_FILES["resume2"]["size"],"tipo" => $_FILES["resume2"]["type"], "descripcion" => $_POST["descripcion2"], "url" => $target_file);
                    $recu = $_SESSION["recursosdidacticos"];
                    $recu[] = $Recursos;
                    $_SESSION["recursosdidacticos"] = $recu;
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                    else
                    {
                    $Recursos = array("nombre" => $_FILES["resume2"]["name"], "tamaño" => $_FILES["resume2"]["size"],"tipo" => $_FILES["resume2"]["type"], "descripcion" => $_POST["descripcion2"], "url" => $target_file);
                    $recu[] = $Recursos;
                    $_SESSION["recursosdidacticos"] = $recu;
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                } else {
                    header("location: ../RecursoDidactico.php?errorSubir=4");
                    die;
                }
            }
        } elseif ($_GET["tipo"]==3) {
            date_default_timezone_set('Chile/Continental');
            $date = date("mY");
            $docente = $_SESSION["docente"];
            $target_username = "uploads/{$docente["id"]}";
            $target_dir = "uploads/{$docente["id"]}/{$_SESSION["titulocreacion"]}-{$date}/";
            $target_file = $target_dir . basename($_FILES["resume3"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                if($imageFileType == "ppt" || $imageFileType == "pptx"){
                    $uploadOk = 1;
                    
                    if (!(file_exists($target_username)))
                    {
                        mkdir($target_username);
                        if (!(file_exists($target_dir)))
                        {
                            mkdir($target_dir);
                        }
                    }
                    else
                    {
                        if (!(file_exists($target_dir)))
                        {
                            mkdir($target_dir);
                        }
                    } 
                }
                else
                {
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                header("location: ../RecursoDidactico.php?errorSubir=5");
                die;
                
            } else {
                if (move_uploaded_file($_FILES["resume3"]["tmp_name"], $target_file)) {
                    if(isset($_SESSION["recursosdidacticos"])){
                    $Recursos = array("nombre" => $_FILES["resume3"]["name"], "tamaño" => $_FILES["resume3"]["size"],"tipo" => $_FILES["resume3"]["type"], "descripcion" => $_POST["descripcion3"], "url" => $target_file);
                    $recu = $_SESSION["recursosdidacticos"];
                    $recu[] = $Recursos;
                    $_SESSION["recursosdidacticos"] = $recu;
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                    else
                    {
                    $Recursos = array("nombre" => $_FILES["resume3"]["name"], "tamaño" => $_FILES["resume3"]["size"],"tipo" => $_FILES["resume3"]["type"], "descripcion" => $_POST["descripcion3"], "url" => $target_file);
                    $recu[] = $Recursos;
                    $_SESSION["recursosdidacticos"] = $recu;
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                } else {
                    header("location: ../RecursoDidactico.php?errorSubir=6");
                    die;
                }
            }
        } elseif ($_GET["tipo"]==4) {
            date_default_timezone_set('Chile/Continental');
            $date = date("mY");
            $docente = $_SESSION["docente"];
            $target_username = "uploads/{$docente["id"]}";
            $target_dir = "uploads/{$docente["id"]}/{$_SESSION["titulocreacion"]}-{$date}/";
            $target_file = $target_dir . basename($_FILES["resume4"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                $check = getimagesize($_FILES["resume4"]["tmp_name"]);
                if($check !== false) {
                    if (!(file_exists($target_username)))
                    {
                        mkdir($target_username);
                        if (!(file_exists($target_dir)))
                        {
                            mkdir($target_dir);
                        }
                    }
                    else
                    {
                        if (!(file_exists($target_dir)))
                        {
                            mkdir($target_dir);
                        }
                    } 
                }
                else
                {
                    $uploadOk = 0;
                }
            } 
            // Check if file already exists
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                header("location: ../RecursoDidactico.php?errorSubir=7");
                die;
                
            } else {
                if (move_uploaded_file($_FILES["resume4"]["tmp_name"], $target_file)) {
                    if(isset($_SESSION["recursosdidacticos"])){
                    $Recursos = array("nombre" => $_FILES["resume4"]["name"], "tamaño" => $_FILES["resume4"]["size"],"tipo" => $_FILES["resume4"]["type"], "descripcion" => $_POST["descripcion4"], "url" => $target_file);
                    $recu = $_SESSION["recursosdidacticos"];
                    $recu[] = $Recursos;
                    $_SESSION["recursosdidacticos"] = $recu;
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                    else
                    {
                    $Recursos = array("nombre" => $_FILES["resume4"]["name"], "tamaño" => $_FILES["resume4"]["size"],"tipo" => $_FILES["resume4"]["type"], "descripcion" => $_POST["descripcion4"], "url" => $target_file);
                    $recu[] = $Recursos;
                    $_SESSION["recursosdidacticos"] = $recu;
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                } else {
                    header("location: ../RecursoDidactico.php?errorSubir=8");
                    die;
                }
            }
        }
    }
}