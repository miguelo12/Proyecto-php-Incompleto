<?php
session_start();
if(isset($_SESSION["titulocreacion"])){
    if(isset($_GET["tipo"])){
        if($_GET["tipo"]==1){
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["resume1"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                if($imageFileType == "txt"){
                    echo "File is a txt"." $target_file";
                    $uploadOk = 1;
                }
                else
                {
                    echo "File is not a txt.";
                    $uploadOk = 0;
                }
            }
        } elseif ($_GET["tipo"]==2) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["resume2"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                if($imageFileType == "doc" || $imageFileType == "docx"){
                    echo "File is a doc or docx "." $target_file";
                    $uploadOk = 1;
                }
                else
                {
                    echo "File is not a doc or docx.";
                    $uploadOk = 0;
                }
            } 
        } elseif ($_GET["tipo"]==3) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["resume3"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                if($imageFileType == "ppt" || $imageFileType == "pptx"){
                    echo "File is a ppt or pptx "." $target_file";
                    $uploadOk = 1;
                }
                else
                {
                    echo "File is not a ppt or pttx.";
                    $uploadOk = 0;
                }
            } 
        } elseif ($_GET["tipo"]==4) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["resume4"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["subirarchivo"])) {
                $check = getimagesize($_FILES["resume4"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . "."." $target_file";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            } 
        }
    }
}