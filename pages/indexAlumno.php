<?php session_start(); 
  if(!isset($_SESSION["docente"]))
      { 
        if(!isset($_SESSION["alumno"])){
          header("location: ../pages/inicio.php");
          die();
        }
        else
        {
           $alumno = $_SESSION["alumno"];
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="img/icon.png"/>
    <title>Inicio Alumno</title>

    <!-- Bootstrap Core CSS -->
    <link href="../component/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../component/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../component/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/simple-sidebar.css" rel="stylesheet">

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
        <?php if(isset($_GET["error"]) || isset($_GET["exito"])):?>
        $("#paso3").show();
        $("#paso2").hide();
        $("#paso1").hide();
        $("#paso4").hide();
        $("#paso5").hide();
        <?php else: ?>
        $("#paso1").show();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").hide();
        $("#paso5").hide();    
        <?php endif;?>
        $("#opcion2").click(function(){
            $("#paso2").fadeIn("fast");
            $("#paso1").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").hide();
        });
        $("#opcion3").click(function(){
            $("#paso3").fadeIn("fast");
            $("#paso2").hide();
            $("#paso1").hide();
            $("#paso4").hide();
            $("#paso5").hide();
        });
        $("#opcion4").click(function(){
            $("#paso4").fadeIn("fast");
            $("#paso2").hide();
            $("#paso1").hide();
            $("#paso3").hide();
            $("#paso5").hide();
            
            $.ajax({
                url:   'php/actividades.php?accion=5',
                type:  'post',
                dataType: 'json',
                cache: false,
                beforeSend: function () {
                        $("#resultado").hide();
                        $("#resultado1").show();
                },
                success:  function (response) {
                        $("#resultado1").hide();
                        $("#resultado").show();
                        $('select#seccion').prop( "disabled", false );
                        $("select#seccion option").remove(); // Remove all <option> child tags.
                        if(response !== null){
                        $('select#seccion').prop( "disabled", false );
                        $('#enviar').prop( "disabled", false );
                        $.each(response, function(index, item) { // Iterates through a collection
                            $("select#seccion").append( // Append an object to the inside of the select box
                                $("<option></option>") // Yes you can do this.
                                    .text(item.asignatura)
                                    .val(item.idactividad)
                            );
                        });
                        }
                        else{
                            $('select#seccion').prop( "disabled", true );
                            $('#enviar').prop( "disabled", true );
                            $("select#seccion").append( // Append an object to the inside of the select box
                            $("<option></option>") // Yes you can do this.
                            .text("Sin actividad.")
                            );
                        }
                },
                error: function(xhr, status) {
                    $("#resultado1").hide();
                    $("#resultado").show();
                    $('select#seccion').prop( "disabled", true );
                    $('#enviar').prop( "disabled", true );
                    $("select#seccion option").remove(); // Remove all <option> child tags.
                    $("select#seccion").append( // Append an object to the inside of the select box
                        $("<option></option>") // Yes you can do this.
                            .text("Ocurrio un error inprevisto... reinicie la pagina.")
                    );
                }
            });
            
        });
        $("#opcion5").click(function(){
            $("#paso5").fadeIn("fast");
            $("#paso2").hide();
            $("#paso1").hide();
            $("#paso3").hide();
            $("#paso4").hide();
        });
        $(".volver").click(function(){
            $("#paso1").fadeIn("fast");
            $("#paso2").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").hide();
        });
        $(".volver1").click(function(){
            $("#paso2").fadeIn("fast");
            $("#paso1").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#paso5").hide();
        });
    });
    </script>

</head>

<body>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" id="menu-toggle" href="#menu-toggle" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" style="margin-left: 10px" href="#"><img src="img/logo.PNG" class="imagelogo" alt="" height="100" width="200"/></a>
                <h3 class="navbar-text navbar-right pull-right titulolandscape" style="margin-top: 30px; margin-right: 80px">Portal Alumno</h3>
            </div>          
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right hidden-xs" style="margin-top: 80px; margin-right: 0px">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php echo $alumno["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="Perfil.php"><i class="fa fa-gear fa-fw"></i> Configuracion</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout/Salir</a></li>
                  </ul>
                </li>
              </ul>
              <h1 class="navbar-text navbar-right" style="margin-top: 50px; margin-right: 80px">Portal Alumno</h1> 
            </div><!--/.nav-collapse -->
          </div>
        </nav>
        
        
        <div id="wrapper">
         <nav class="navbar-inverse" role="navigation">
         <div id="sidebar-wrapper">
            <ul class="sidebar-nav navbar-nav">
                <br/> 
                <br/> 
                <br/> 
                <br/> 
                <li class="sidebar-brand">
                    <a href="#">
                        Menu Alumno
                    </a>
                </li>
                <li class="active"> 
                      <a href="#">Inicio</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="actividadAlumno.php">Unete a una actividad</a></li>
                    <li><a href="#">Ver unidades de aprendizaje</a></li>
                    <li><a href="#">Responde una Actividad</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Crea un grupo</a></li>
                  </ul>
                </li>
                <li><a href="#contact">Contáctenos</a></li>
                <li class="dropdown hidden-lg hidden-md">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $alumno["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="Perfil.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Configuración</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout/Salir</a></li>
                  </ul>
                </li>
            </ul>
        </div>
        </nav>
        </div>
        
        
        <div class="hidden-xs hidden-md hidden-lg">
        <br/>
        </div>
        <div class="hidden-xs hidden-md hidden-sm">
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        </div>
        <div id="page-content-wrapper content" >
            <div class="container separate-rows tall-rows">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div id="paso1">
                                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                                    <div class="text-center">
                                        <h4 style="float: right; margin-right: 20px" class="pretitulolandscape">Portal Estudiante</h4>
                                        <br class="pretitulolandscape" />
                                        <h1 style="float: top">¿<ins>Qué deseas hacer</ins>?</h1>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">                       
                                            <a class="lead" href="actividadAlumno.php"><p><img src="img/actividad.png" alt="lista" class="img-circle hidden-lg hidden-md" width="100" height="100"><img src="img/actividad.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p>Revisar Unidad de Aprendizaje</a>
                                            <p>Ve todas las unidades de aprendizajes entregadas por tu profesor o ingresa a uno nuevo.</p>
                                        </div>     
                                    </div>
                                </div>

                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">                                    
                                            <div>
                                            <a class="lead" href="#"><p><img src="img/actividad.png" alt="lista" class="img-circle hidden-lg hidden-md" width="100" height="100"><img src="img/actividad.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p> Responder Diagrama Heurístico </a>
                                            <p>Hace la actividad entregada por tu profesor, debes pertenecer a un grupo o tambien puede hacerlo solo.</p>
                                            </div>
                                        </div>

                                    </div>        
                                </div>


                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">
                                            <a id="opcion2" class="lead" href="#"><p><img src="img/actividad.png" alt="lista" class="img-circle hidden-lg hidden-md" width="100" height="100"><img src="img/actividad.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p>Otros</a>
                                            <p>Aquí para unirse a una seccion, grupo o actividad.</p>
                                        </div>
                                    </div>    
                                </div>
                               
                            </div>    
                            
                            <div id="paso2">
                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">                       
                                            <a class="lead" href="#" id="opcion3"><p><img src="img/actividad.png" alt="lista" class="img-circle hidden-lg hidden-md" width="100" height="100"><img src="img/actividad.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p>Unirse a una Sección</a>
                                        </div>     
                                    </div>
                                </div>

                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">                                    
                                            <div>
                                                <a class="lead" id="opcion4" href="#"><p><img src="img/actividad.png" alt="lista" class="img-circle hidden-lg hidden-md" width="100" height="100"><img src="img/actividad.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p>Unirse a una actividad</a>
                                            </div>
                                        </div>

                                    </div>        
                                </div>


                                <div class="col-xs-4 col-md-4 col-lg-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-lg-12 text-center">
                                            <a class="lead" id="opcion5" href="#"><p><img src="img/actividad.png" alt="lista" class="img-circle hidden-lg hidden-md" width="100" height="100"><img src="img/actividad.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p>Grupo</a>
                                        </div>
                                    </div>    
                                </div>
                                
                                <div class="col-xs-12">
                                    <button class="pull-right btn btn-default volver"><i class="fa fa-arrow-left fa-1x fa-fw" aria-hidden="true"></i> Volver</button>
                                </div>
                            </div> 
                            <div id="paso3">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                <br/>
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <form class="form-horizontal" role="form" method="POST" action="php/actividades.php?accion=4">
                                              <fieldset>
                                              <legend><h1>Ingrese PIN Sección:</h1></legend>
                                              <div class="form-group">
                                                <label class="control-label col-sm-2" for="pin">PIN:</label>
                                                <div class="col-sm-10">
                                                    <input type="pin" name="pin" class="form-control" id="pin" placeholder="Ingresa el pin">
                                                </div>
                                              </div> 
                                              <div class="form-group pull-right"> 
                                                <div class="col-xs-12">
                                                  <button type="submit" class="btn btn-success">Enviar</button>
                                                </div>
                                              </div>
                                              </fieldset>
                                            </form>
                                            <?php  if(isset($_GET["error"])): if($_GET["error"]==1):?>
                                            <div class="alert alert-danger">
                                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                               <p class="text-center"><strong>Error, </strong> ya estas en esta seccion o curso.</p>
                                            </div>
                                            <?php endif; endif;?>
                                            <?php  if(isset($_GET["error"])): if($_GET["error"]==2):?>
                                            <div class="alert alert-danger">
                                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                               <p class="text-center"><strong>Error, </strong> el pin de la seccion o curso ingresada no existe.</p>
                                            </div>
                                            <?php endif; endif;?>
                                            <?php if(isset($_GET["exito"])): if($_GET["exito"]==1):?>
                                            <div class="alert alert-success">
                                               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                               <p class="text-center"><strong>Listo, </strong> acabas de ingresar a una seccion.</p>
                                            </div>
                                            <?php endif; endif;?>
                                        </div>   
                                    </div>
                                </div>
                                
                                <div class="col-xs-12">
                                    <button class="pull-right btn btn-default volver1"><i class="fa fa-arrow-left fa-1x fa-fw" aria-hidden="true"></i> Volver</button>
                                </div>
                                
                            </div>
                            <div id="paso4">
                                <br/>
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <form class="form-horizontal" role="form" method="POST" action="php/actividades.php?accion=6">
                                              <fieldset id="resultado">
                                                  <legend><h1>Ingrese a una Actividad:</h1></legend>
                                                  <div class="form-group">
                                                    <label class="control-label col-sm-2" for="email">Actividad:</label>
                                                    <div class="col-sm-10">
                                                        <select id="seccion" name="actividad" class="form-control">
                                                        </select>
                                                    </div>
                                                  </div> 
                                                  <div class="form-group pull-right"> 
                                                    <div class="col-xs-12">
                                                        <button type="submit" id="enviar" class="btn btn-success">Enviar</button>
                                                    </div>
                                                  </div>
                                              </fieldset>
                                              <fieldset id="resultado1" class="text-center">
                                                  <label class="control-label" for="email"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i>
                                                  <span class="sr-only">Espere esta cargando...</span>
                                                  <br/><br/>
                                                  <p>&nbsp;Cargando...</p></label>
                                              </fieldset>
                                            </form>
                                        </div>   
                                    </div>
                                </div>
                                
                                <div class="col-xs-12">
                                    <button class="pull-right btn btn-default volver1">Volver</button>
                                </div>

                            </div> 
                            <div id="paso5">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 col-lg-12 text-center">                       
                                                    <a class="lead" href="#"><p><img src="img/actividad.png" alt="lista" class="img-circle hidden-lg hidden-md" width="100" height="100"><img src="img/actividad.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p>Grupo nuevo</a>
                                                </div>     
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-md-6 col-lg-6">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-12 col-lg-12 text-center">                                    
                                                    <div>
                                                    <a class="lead" href="#"><p><img src="img/actividad.png" alt="lista" class="img-circle hidden-lg hidden-md" width="100" height="100"><img src="img/actividad.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p>Unirse a un Grupo</a>
                                                    </div>
                                                </div>

                                            </div>        
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12">
                                    <button class="pull-right btn btn-default volver1"><i class="fa fa-arrow-left fa-1x fa-fw" aria-hidden="true"></i> Volver</button>
                                </div>   
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>
        
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script> 
</body>
</html>