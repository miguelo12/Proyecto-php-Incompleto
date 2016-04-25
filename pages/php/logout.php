<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["alumno"]);
unset($_SESSION["docente"]);
session_destroy();
header("location: ../inicio.php");