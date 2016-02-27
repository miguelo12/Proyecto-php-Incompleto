<?php
session_start();
if(isset($_SESSION["titulocreacion"])){
    if(isset($_GET["tipo"])){
        if($_GET["tipo"]==1){
            date_default_timezone_set('Chile/Continental');
            $date = date("mY");
            $docente = $_SESSION["docente"];
            $target_username = "uploads/{$docente["nombre"]}";
            $target_dir = "uploads/{$docente["nombre"]}/{$_SESSION["titulocreacion"]}-{$date}/";
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
            // echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
                
            } else {
                if (move_uploaded_file($_FILES["resume1"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["resume1"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } elseif ($_GET["tipo"]==2) {
            date_default_timezone_set('Chile/Continental');
            $date = date("mY");
            $docente = $_SESSION["docente"];
            $target_username = "uploads/{$docente["nombre"]}";
            $target_dir = "uploads/{$docente["nombre"]}/{$_SESSION["titulocreacion"]}-{$date}/";
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
            // echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
                
            } else {
                if (move_uploaded_file($_FILES["resume2"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["resume2"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } elseif ($_GET["tipo"]==3) {
            date_default_timezone_set('Chile/Continental');
            $date = date("mY");
            $docente = $_SESSION["docente"];
            $target_username = "uploads/{$docente["nombre"]}";
            $target_dir = "uploads/{$docente["nombre"]}/{$_SESSION["titulocreacion"]}-{$date}/";
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
            // echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
                
            } else {
                if (move_uploaded_file($_FILES["resume3"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["resume3"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } elseif ($_GET["tipo"]==4) {
            date_default_timezone_set('Chile/Continental');
            $date = date("mY");
            $docente = $_SESSION["docente"];
            $target_username = "uploads/{$docente["nombre"]}";
            $target_dir = "uploads/{$docente["nombre"]}/{$_SESSION["titulocreacion"]}-{$date}/";
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
            // echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
                
            } else {
                if (move_uploaded_file($_FILES["resume4"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["resume14"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}