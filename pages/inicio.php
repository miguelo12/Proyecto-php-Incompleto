<?php session_start(); 
  if(!isset($_SESSION["docente"]))
      { 
        if(isset($_SESSION["alumno"]))
        {
          header("location: ../pages/indexAlumno.php");
          die();
        }
      }
  else
      {
       header("location: ../pages/indexDocente.php");
       die();
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="img/icon.png"/>
    
    <title>Heuristica Movil</title>

    <!-- Bootstrap Core CSS -->
    <link href="../component/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../component/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../component/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- jQuery -->
    <script src="../component/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../component/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <script>
    $().ready(function(){
        <?php if(isset($_GET['error'])):?>
        $("#paso1").hide();
        $("#paso2").show();
        $("#paso3").hide();
        <?php elseif(isset($_GET['error1']) || isset($_GET['exito1'])):?>
        $("#paso1").hide();
        $("#paso2").hide();
        $("#paso3").show();
        <?php else:?>
        $("#paso1").show();
        $("#paso2").hide();
        $("#paso3").hide();
        <?php endif;?>
        $("#profe").click(function(){
            $("#paso2").fadeIn("slow");
            $("#paso1").hide();
            $("#paso3").hide();
        });
        $("#alu").click(function(){
            $("#paso3").fadeIn("slow");
            $("#paso2").hide();
            $("#paso1").hide();   
        });
        $(".opened").click(function(){
            $("#paso1").fadeIn("slow");
            $("#paso2").hide();
            $("#paso3").hide(); 
        });
    });
    </script>

</head>

<body>
    
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" style="margin-left: 10px" href="#"><img src="img/logo.PNG" alt="" height="100" width="200"/></a>   
        </div>
    </div>
</nav>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="row" id="paso1">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <!-- Botones donde se dirige -->
                        <br/>
                        <br/>
                        <a type="button" class="btn btn-block" id="profe"><img src="img/docente.png" class="img-thumbnail img-circle" height="180" width="180" alt=""/></a>
                        <p class="text-center lead">Profesor</p>
                    </div>
                    <div class="col-xs-12 col-sm-12  col-md-6 col-lg-6">
                        <!-- Botones donde se dirige -->
                        <br/>
                        <br/>
                        <a type="button" class="btn btn-block"><img src="img/alumno.png" id="alu" class="img-thumbnail img-circle" height="180" width="180" alt=""/></a>
                        <p class="text-center lead">Alumno</p>
                    </div>
                </div>
                <div class="row" id="paso2">
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <!-- Botones donde se dirige -->
                        <br/>
                        <br/>
                        <a type="button" class="btn btn-lg btn-block"><img src="img/docente.png" id="profe" class="img-thumbnail img-circle" height="180" width="180" alt=""/></a>
                        <p class="text-center lead">Profesor</p>
                    </div>
                    <div class="col-xs-12 col-sm-12  col-md-7 col-lg-7">
                        <!-- Botones donde se dirige -->
                        <br/>
                        <br/>
                        <form role="form" method="POST" action="php/loginDocente.php">
                                <fieldset>
                                <legend><h1>Acceso:</h1></legend>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                        <input class="form-control" placeholder="E-mail" name="email" id="email" type="email" autofocus>
                                    </div> 
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                        </span>
                                        <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
                                    </div>                               
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Ingresar">
                                <input type="button" class="btn btn-lg btn-success btn-block opened" value="Atras">
                                </fieldset>

                                <?php	
                                if(isset($_GET['error'])){
                                    if($_GET['error']=="error"){
                                        echo "<div class='alert alert-warning'>";
                                        echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                        echo "<strong>Error, </strong> ingrese nuevamente su correo y su contraseña.";
                                        echo "</div>"; 
                                    }
                                }
                                ?>
                        </form>
                    </div>
                </div>
                <div class="row" id="paso3">
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        <!-- Botones donde se dirige -->
                        <br/>
                        <br/>
                        <a type="button" class="btn btn-lg btn-block"><img src="img/alumno.png" id="alu" class="img-thumbnail img-circle" height="180" width="180" alt=""/></a>
                        <p class="text-center lead">Alumno</p>
                    </div>
                    <div class="col-xs-12 col-sm-12  col-md-7 col-lg-7">
                        <!-- Botones donde se dirige -->
                        <br/>
                        <br/>
                        <form role="form" method="POST" action="php/loginAlumno.php">
                            <fieldset>
                                <legend><h1>Acceso:</h1></legend>
                                <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </span>
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key" aria-hidden="true"></i>
                                    </span>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div> 
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Ingresar">
                                <input type="button" class="btn btn-lg btn-success btn-block" value="Crear Cuenta" onclick=" window.location='../pages/crearAlumno.php'">
                                <input type="button" class="btn btn-lg btn-success btn-block opened " value="Atras">
                                </fieldset>
                                <br/>
                                <?php	
                                if(isset($_GET['error1'])){
                                    if($_GET['error1']=="error"){
                                        echo "<div class='alert alert-warning'>";
                                        echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                        echo "<strong>Error, </strong> ingrese nuevamente su correo y su contraseña.";
                                        echo "</div>"; 
                                    }
                                }
                                ?>
                                
                                <?php	
                                if(isset($_GET['exito1'])){
                                    if($_GET['exito1']==1){
                                        echo "<div class='alert alert-success'>";
                                        echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                        echo "Se ha podido <strong>Actualizar</strong> el alumno, ahora ingrese.";
                                        echo "</div>"; 
                                    }
                                }
                                ?>
                        </form>
                    </div>
                </div>
        <br/>
        <br/>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <div class="panel panel-info" id="contenido">
                      <div class="panel-heading">
                        <h3>Actualización 06/05/2016:</h3>
                        <ul>
                            <li style="font-size: 16px">Creacion de Rubrica:<span style="color: green;">Habilitado</span></li>
                            <li style="font-size: 16px">Editar Rubrica:<span style="color: green;">Habilitado</span></li>
                            <li style="font-size: 16px">Ver Rubrica:<span style="color: green;">Habilitado</span></li>
                            <li style="font-size: 16px">Correcciones menores de colores, fondo entre otras cosas.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

