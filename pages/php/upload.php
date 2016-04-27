<?php
session_start();
ob_start();
if(!isset($_SESSION["editar"])){
    if(isset($_COOKIE["titulocreacion"])){
        if(isset($_GET["tipo"])){
            if($_GET["tipo"]==1){
                date_default_timezone_set('Chile/Continental');
                $date = date("mY");
                $docente = $_SESSION["docente"];
                $target_upload = "uploads";
                $target_username = "uploads/{$docente["id"]}";
                $target_dir = "uploads/{$docente["id"]}/{$_COOKIE["titulocreacion"]}-{$date}/";
                $target_file = $target_dir . basename($_FILES["resume1"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                if(isset($_POST["subirarchivo"])) {
                    if($imageFileType == "txt"){
                        $uploadOk = 1;

                        if (!(file_exists($target_upload))){
                            mkdir($target_upload);
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
                        if(isset($_COOKIE["recursosdidacticos"])){
                        $Recursos = array("nombre" => $_FILES["resume1"]["name"], "tamaño" => $_FILES["resume1"]["size"],"tipo" => $_FILES["resume1"]["type"], "descripcion" => $_POST["descripcion1"], "url" => $target_file);
                        $recu = json_decode($_COOKIE["recursosdidacticos"],true);
                        $recu[] = $Recursos;
                        setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                        header("location: ../RecursoDidactico.php?success=1");
                        die;
                        }
                        else
                        {
                        $Recursos = array("nombre" => $_FILES["resume1"]["name"], "tamaño" => $_FILES["resume1"]["size"],"tipo" => $_FILES["resume1"]["type"], "descripcion" => $_POST["descripcion1"], "url" => $target_file);
                        $recu[] = $Recursos;
                        setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
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
                $target_upload = "uploads";
                $target_username = "uploads/{$docente["id"]}";
                $target_dir = "uploads/{$docente["id"]}/{$_COOKIE["titulocreacion"]}-{$date}/";
                $target_file = $target_dir . basename($_FILES["resume2"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                if(isset($_POST["subirarchivo"])) {
                    if($imageFileType == "doc" || $imageFileType == "docx"){
                        $uploadOk = 1;

                        if (!(file_exists($target_upload))){
                             mkdir($target_upload);
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
                    if (move_uploaded_file($_FILES["resume2"]["tmp_name"], $target_file)) {
                        if(isset($_COOKIE["recursosdidacticos"])){
                        $Recursos = array("nombre" => $_FILES["resume2"]["name"], "tamaño" => $_FILES["resume2"]["size"],"tipo" => $_FILES["resume2"]["type"], "descripcion" => $_POST["descripcion2"], "url" => $target_file);
                        $recu = json_decode($_COOKIE["recursosdidacticos"],true);
                        $recu[] = $Recursos;
                        setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                        header("location: ../RecursoDidactico.php?success=1");
                        die;
                        }
                        else
                        {
                        $Recursos = array("nombre" => $_FILES["resume2"]["name"], "tamaño" => $_FILES["resume2"]["size"],"tipo" => $_FILES["resume2"]["type"], "descripcion" => $_POST["descripcion2"], "url" => $target_file);
                        $recu[] = $Recursos;
                        setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
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
                $target_upload = "uploads";
                $target_username = "uploads/{$docente["id"]}";
                $target_dir = "uploads/{$docente["id"]}/{$_COOKIE["titulocreacion"]}-{$date}/";
                $target_file = $target_dir . basename($_FILES["resume3"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                if(isset($_POST["subirarchivo"])) {
                    if($imageFileType == "pdf"){
                        $uploadOk = 1;

                        if (!(file_exists($target_upload))){
                             mkdir($target_upload);
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
                    if (move_uploaded_file($_FILES["resume3"]["tmp_name"], $target_file)) {
                        if(isset($_COOKIE["recursosdidacticos"])){
                        $Recursos = array("nombre" => $_FILES["resume3"]["name"], "tamaño" => $_FILES["resume3"]["size"],"tipo" => $_FILES["resume3"]["type"], "descripcion" => $_POST["descripcion3"], "url" => $target_file);
                        $recu = json_decode($_COOKIE["recursosdidacticos"],true);
                        $recu[] = $Recursos;
                        setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                        header("location: ../RecursoDidactico.php?success=1");
                        die;
                        }
                        else
                        {
                        $Recursos = array("nombre" => $_FILES["resume3"]["name"], "tamaño" => $_FILES["resume3"]["size"],"tipo" => $_FILES["resume3"]["type"], "descripcion" => $_POST["descripcion3"], "url" => $target_file);
                        $recu[] = $Recursos;
                        setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
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
                $target_upload = "uploads";
                $target_username = "uploads/{$docente["id"]}";
                $target_dir = "uploads/{$docente["id"]}/{$_COOKIE["titulocreacion"]}-{$date}/";
                $target_file = $target_dir . basename($_FILES["resume4"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                if(isset($_POST["subirarchivo"])) {
                    if($imageFileType == "ppt" || $imageFileType == "pptx"){
                        $uploadOk = 1;

                        if (!(file_exists($target_upload))){
                             mkdir($target_upload);
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
                    if (move_uploaded_file($_FILES["resume4"]["tmp_name"], $target_file)) {
                        if(isset($_COOKIE["recursosdidacticos"])){
                        $Recursos = array("nombre" => $_FILES["resume4"]["name"], "tamaño" => $_FILES["resume4"]["size"],"tipo" => $_FILES["resume4"]["type"], "descripcion" => $_POST["descripcion4"], "url" => $target_file);
                        $recu = json_decode($_COOKIE["recursosdidacticos"],true);
                        $recu[] = $Recursos;
                        setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                        header("location: ../RecursoDidactico.php?success=1");
                        die;
                        }
                        else
                        {
                        $Recursos = array("nombre" => $_FILES["resume4"]["name"], "tamaño" => $_FILES["resume4"]["size"],"tipo" => $_FILES["resume4"]["type"], "descripcion" => $_POST["descripcion4"], "url" => $target_file);
                        $recu[] = $Recursos;
                        echo json_encode($recu);
                        setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                        header("location: ../RecursoDidactico.php?success=1");
                        die;
                        }
                    } else {
                        header("location: ../RecursoDidactico.php?errorSubir=6");
                        die;
                    }
                }
            }
            
            elseif ($_GET["tipo"]==5) {
                date_default_timezone_set('Chile/Continental');
                $date = date("mY");
                $docente = $_SESSION["docente"];
                $target_upload = "uploads";
                $target_username = "uploads/{$docente["id"]}";
                $target_dir = "uploads/{$docente["id"]}/{$_COOKIE["titulocreacion"]}-{$date}/";
                $target_file = $target_dir . basename($_FILES["resume5"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                if(isset($_POST["subirarchivo"])) {
                    $check = getimagesize($_FILES["resume5"]["tmp_name"]);
                    if($check !== false) {
                        if (!(file_exists($target_upload))){
                             mkdir($target_upload);
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
                    if (move_uploaded_file($_FILES["resume5"]["tmp_name"], $target_file)) {
                        if(isset($_COOKIE["recursosdidacticos"])){
                        $Recursos = array("nombre" => $_FILES["resume5"]["name"], "tamaño" => $_FILES["resume5"]["size"],"tipo" => $_FILES["resume5"]["type"], "descripcion" => $_POST["descripcion5"], "url" => $target_file);
                        $recu = json_decode($_COOKIE["recursosdidacticos"],true);
                        $recu[] = $Recursos;
                        setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                        header("location: ../RecursoDidactico.php?success=1");
                        die;
                        }
                        else
                        {
                        $Recursos = array("nombre" => $_FILES["resume5"]["name"], "tamaño" => $_FILES["resume5"]["size"],"tipo" => $_FILES["resume5"]["type"], "descripcion" => $_POST["descripcion5"], "url" => $target_file);
                        $recu[] = $Recursos;
                        setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
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
} else{
    $edita = $_SESSION["editar"];
    //MODO EDITAR
    if(isset($_GET["tipo"])){
        if($_GET["tipo"]==1){
            $cadena = $edita["recursosdidacticos"][0]["url"];
            $num = strlen($edita["recursosdidacticos"][0]["nombre"]);
            $cadena1 = substr($cadena, 0, -$num);
            $docente = $_SESSION["docente"];
            $target_file = $cadena1 . basename($_FILES["resume1"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                if($imageFileType == "txt"){
                    $uploadOk = 1;
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
                    if(isset($_COOKIE["recursosdidacticos"])){
                    $Recursos = array("nombre" => $_FILES["resume1"]["name"], "tamaño" => $_FILES["resume1"]["size"],"tipo" => $_FILES["resume1"]["type"], "descripcion" => $_POST["descripcion1"], "url" => $target_file);
                    $recu = json_decode($_COOKIE["recursosdidacticos"],true);
                    $recu[] = $Recursos;
                    setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                    else
                    {
                    $Recursos = array("nombre" => $_FILES["resume1"]["name"], "tamaño" => $_FILES["resume1"]["size"],"tipo" => $_FILES["resume1"]["type"], "descripcion" => $_POST["descripcion1"], "url" => $target_file);
                    $recu[] = $Recursos;
                    setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                } else {
                    header("location: ../RecursoDidactico.php?errorSubir=2");
                    die;
                }
            }
        } elseif ($_GET["tipo"]==2) {
             $cadena = $edita["recursosdidacticos"][0]["url"];
            $num = strlen($edita["recursosdidacticos"][0]["nombre"]);
            $cadena1 = substr($cadena, 0, -$num);
            $docente = $_SESSION["docente"];
            $target_file = $cadena1 . basename($_FILES["resume2"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                if($imageFileType == "doc" || $imageFileType == "docx"){
                    $uploadOk = 1;
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
                if (move_uploaded_file($_FILES["resume2"]["tmp_name"], $target_file)) {
                    if(isset($_COOKIE["recursosdidacticos"])){
                    $Recursos = array("nombre" => $_FILES["resume2"]["name"], "tamaño" => $_FILES["resume2"]["size"],"tipo" => $_FILES["resume2"]["type"], "descripcion" => $_POST["descripcion2"], "url" => $target_file);
                    $recu = json_decode($_COOKIE["recursosdidacticos"],true);
                    $recu[] = $Recursos;
                    setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                    else
                    {
                    $Recursos = array("nombre" => $_FILES["resume2"]["name"], "tamaño" => $_FILES["resume2"]["size"],"tipo" => $_FILES["resume2"]["type"], "descripcion" => $_POST["descripcion2"], "url" => $target_file);
                    $recu[] = $Recursos;
                    setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                } else {
                    header("location: ../RecursoDidactico.php?errorSubir=4");
                    die;
                }
            }
        } elseif ($_GET["tipo"]==3) {
             $cadena = $edita["recursosdidacticos"][0]["url"];
            $num = strlen($edita["recursosdidacticos"][0]["nombre"]);
            $cadena1 = substr($cadena, 0, -$num);
            $docente = $_SESSION["docente"];
            $target_file = $cadena1 . basename($_FILES["resume3"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                if($imageFileType == "pdf"){
                    $uploadOk = 1;
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
                if (move_uploaded_file($_FILES["resume3"]["tmp_name"], $target_file)) {
                    if(isset($_COOKIE["recursosdidacticos"])){
                    $Recursos = array("nombre" => $_FILES["resume3"]["name"], "tamaño" => $_FILES["resume3"]["size"],"tipo" => $_FILES["resume3"]["type"], "descripcion" => $_POST["descripcion3"], "url" => $target_file);
                    $recu = json_decode($_COOKIE["recursosdidacticos"],true);
                    $recu[] = $Recursos;
                    setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                    else
                    {
                    $Recursos = array("nombre" => $_FILES["resume3"]["name"], "tamaño" => $_FILES["resume3"]["size"],"tipo" => $_FILES["resume3"]["type"], "descripcion" => $_POST["descripcion3"], "url" => $target_file);
                    $recu[] = $Recursos;
                    setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                } else {
                    header("location: ../RecursoDidactico.php?errorSubir=6");
                    die;
                }
            }
        } elseif ($_GET["tipo"]==4) {
            $cadena = $edita["recursosdidacticos"][0]["url"];
            $num = strlen($edita["recursosdidacticos"][0]["nombre"]);
            $cadena1 = substr($cadena, 0, -$num);
            $docente = $_SESSION["docente"];
            $target_file = $cadena1 . basename($_FILES["resume4"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                if($imageFileType == "ppt" || $imageFileType == "pptx"){
                    $uploadOk = 1;
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
                if (move_uploaded_file($_FILES["resume4"]["tmp_name"], $target_file)) {
                    if(isset($_COOKIE["recursosdidacticos"])){
                    $Recursos = array("nombre" => $_FILES["resume4"]["name"], "tamaño" => $_FILES["resume4"]["size"],"tipo" => $_FILES["resume4"]["type"], "descripcion" => $_POST["descripcion4"], "url" => $target_file);
                    $recu = json_decode($_COOKIE["recursosdidacticos"],true);
                    $recu[] = $Recursos;
                    setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                    else
                    {
                    $Recursos = array("nombre" => $_FILES["resume4"]["name"], "tamaño" => $_FILES["resume4"]["size"],"tipo" => $_FILES["resume4"]["type"], "descripcion" => $_POST["descripcion4"], "url" => $target_file);
                    $recu[] = $Recursos;
                    setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                } else {
                    header("location: ../RecursoDidactico.php?errorSubir=6");
                    die;
                }
            }
        } elseif ($_GET["tipo"]==5) {
             $cadena = $edita["recursosdidacticos"][0]["url"];
            $num = strlen($edita["recursosdidacticos"][0]["nombre"]);
            $cadena1 = substr($cadena, 0, -$num);
            $docente = $_SESSION["docente"];
            $target_file = $cadena1 . basename($_FILES["resume5"]["name"]);
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                $check = getimagesize($_FILES["resume5"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
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
                if (move_uploaded_file($_FILES["resume5"]["tmp_name"], $target_file)) {
                    if(isset($_COOKIE["recursosdidacticos"])){
                    $Recursos = array("nombre" => $_FILES["resume5"]["name"], "tamaño" => $_FILES["resume5"]["size"],"tipo" => $_FILES["resume5"]["type"], "descripcion" => $_POST["descripcion5"], "url" => $target_file);
                    $recu = json_decode($_COOKIE["recursosdidacticos"],true);
                    $recu[] = $Recursos;
                    setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
                    header("location: ../RecursoDidactico.php?success=1");
                    die;
                    }
                    else
                    {
                    $Recursos = array("nombre" => $_FILES["resume5"]["name"], "tamaño" => $_FILES["resume5"]["size"],"tipo" => $_FILES["resume5"]["type"], "descripcion" => $_POST["descripcion5"], "url" => $target_file);
                    $recu[] = $Recursos;
                    setcookie("recursosdidacticos", json_encode($recu), time()+86400, "/", "",  0);
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