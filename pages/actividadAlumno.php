<?php session_start();
  error_reporting(0);
  if(!isset($_SESSION["docente"]))
      { 
        if(!isset($_SESSION["alumno"])){
          header("location: ../pages/inicio.php");
          die();
        }
        else
        {
           $alumno = $_SESSION["alumno"];
           if(isset($_SESSION["idActividad"])){
               //preguntar si tiene un grupo en alumnogrupo.
               include_once '../pages/php/CRUD/AlumnosGrupo.php';
               $AlumnoGrupo = new AlumnosGrupo();
               $AlumnoGrupo->setidAlumno($alumno["id"]);
               $AlumnoGrupo->setActividad_idActividad($_SESSION["idActividad"][0]["Actividad_idActividad"]);
               $grupoexiste = $AlumnoGrupo->ExistegrupoenActividad();
           }
           else{
           header("location: ../pages/inicio.php");
           die();    
           }
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
    <title>Actividad</title>

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
                <a class="navbar-brand" style="margin-left: 10px" href="indexAlumno.php"><img src="img/logo.PNG" class="imagelogo" alt="" height="100" width="200"/></a>
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
        
        <?php  if(isset($_GET["errorenvio"])): if($_GET["errorenvio"]==1):?>
        <div class="alert alert-danger">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> el email introducido ya existe.</p>
        </div>
        <?php endif; endif;?>
        <?php if(isset($_GET["exitoenvio"])): if($_GET["exitoenvio"]==1):?>
        <?php if(isset($_SESSION["idAlumno"])):?>
        <div class="alert alert-success">
           <a href="#" class="close" data-dismiss="alert" aria-label="close" onclick="sacar()">&times;</a>
           <p class="text-center"><strong>Listo, </strong> se acaba de enviar el email.</p>
           <p class="text-center">El codigo de tu alumno es <strong><?= $_SESSION["idAlumno"]?></strong></p>
           <p class="text-center">Este mensaje se eliminara en <span id="timer"></span> segundos. <button onclick="sacar()">Eliminar Mensaje</button></p>
        </div>
        <?php endif;?>
        <?php endif; endif;?>
        <div class="hidden-md hidden-xs hidden-sm">
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        </div>
        <div id="page-content-wrapper content" >
            <div class="container-fluid separate-rows tall-rows">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">                      
                            <?php if(!$grupoexiste): ?>
                            <div id="paso1">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12 text-center">
                                        <a id="opcion1" class="lead" href="#"><p><img src="img/actividad.png" alt="lista" class="img-circle hidden-lg hidden-md" width="80" height="80"><img src="img/actividad.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p>Crear Grupo</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12 text-center">
                                        <a id="opcion2" class="lead" href="#"><p><img src="img/actividad.png" alt="lista" class="img-circle hidden-lg hidden-md" width="80" height="80"><img src="img/actividad.png" alt="lista" class="img-circle hidden-xs hidden-sm" width="200" height="200"></p>Unirse a Grupo</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                            <div id="paso2">
                                <div class="col-md-6 col-md-offset-3">
                                    <form class="form-horizontal" role="form" method="POST" action="php/grupo.php?accion=2">
                                      <fieldset>
                                      <legend><h1>Creación del grupo:</h1></legend>
                                      <div class="form-group">
                                        <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingresa un nombre">
                                            <p class="help-block text-center">Recuerda que al crear el grupo no hay vuelta atras.</p>
                                        </div>
                                      </div> 
                                      <div class="form-group pull-right"> 
                                        <div class="col-xs-12">
                                          <button type="submit" class="btn btn-success">Crear</button>
                                        </div>
                                      </div>
                                      </fieldset>
                                    </form>
                                    <?php  if(isset($_GET["error"])): if($_GET["error"]==1):?>
                                    <div class="alert alert-danger">
                                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                       <p class="text-center"><strong>Error, </strong> ya existe ese nombre.</p>
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
                                <div class="col-xs-12">
                                    <div class="hidden-lg hidden-md"><button class="pull-right btn btn-default volver" ><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver</button></div>
                                    <div class="hidden-sm hidden-xs"><button class="pull-right btn btn-default volver" style="margin-right: 50px"><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver</button></div>
                                </div>
                            </div>
                            
                            <div id="paso3">
                                <div class="col-md-6 col-md-offset-3">
                                    <form class="form-horizontal" role="form" method="POST" action="php/grupo.php?accion=3">
                                      <fieldset id="resultado">
                                          <legend><h1>Ingrese a una Grupo:</h1></legend>
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="grupo">grupo:</label>
                                            <div class="col-sm-10">
                                                <select id="grupo" name="grupo" class="form-control">
                                                </select>
                                                <p class="help-block text-center">Recuerda que si te unes no podras salirte del grupo.</p>
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
                                <div class="col-xs-12">
                                    <div class="hidden-lg hidden-md"><button class="pull-right btn btn-default volver" ><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver</button></div>
                                    <div class="hidden-sm hidden-xs"><button class="pull-right btn btn-default volver" style="margin-right: 50px"><i class="fa fa-undo fa-1x fa-fw" aria-hidden="true"></i> Volver</button></div>
                                </div>
                            </div>
                            <?php else:?>
                            
                            <?php endif;?>
                        </div>
                    </div>     
                </div>
            </div>
        </div>

    <script>
    $().ready(function(){
        <?php if(isset($_GET["error"]) || isset($_GET["exito"])):?>
        $("#paso3").hide();
        $("#paso2").show();
        $("#paso1").hide();
        <?php else: ?>
        $("#paso1").show();
        $("#paso2").hide();
        $("#paso3").hide();   
        <?php endif;?>
        $("#opcion1").click(function(){
            $("#paso2").fadeIn("fast");
            $("#paso3").hide();
            $("#paso1").hide();
        });
        $("#opcion2").click(function(){
            $("#paso3").fadeIn("fast");
            $("#paso2").hide();
            $("#paso1").hide();
            
            $.ajax({
                url:   'php/grupo.php?accion=1',
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
                        $('select#grupo').prop( "disabled", false );
                        $("select#grupo option").remove(); // Remove all <option> child tags.
                        if(response !== null){
                        $('select#grupo').prop( "disabled", false );
                        $('#enviar').prop( "disabled", false );
                        $.each(response, function(index, item) { // Iterates through a collection
                            $("select#grupo").append( // Append an object to the inside of the select box
                                $("<option></option>") // Yes you can do this.
                                    .text(item.Nombre)
                                    .val(item.idGrupo)
                            );
                        });
                        }
                        else{
                            $('select#grupo').prop( "disabled", true );
                            $('#enviar').prop( "disabled", true );
                            $("select#grupo").append( // Append an object to the inside of the select box
                            $("<option></option>") // Yes you can do this.
                            .text("No hay grupos.")
                            );
                        }
                },
                error: function(xhr, status) {
                    $("#resultado1").hide();
                    $("#resultado").show();
                    $('select#grupo').prop( "disabled", true );
                    $('#enviar').prop( "disabled", true );
                    $("select#grupo option").remove(); // Remove all <option> child tags.
                    $("select#grupo").append( // Append an object to the inside of the select box
                        $("<option></option>") // Yes you can do this.
                            .text("Ocurrio un error inprevisto... reinicie la pagina.")
                    );
                }
            });
            
        });
        $(".volver").click(function(){
            $("#paso1").fadeIn("fast");
            $("#paso2").hide();
            $("#paso3").hide();
        });
    });
    </script>    
        
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    
    <script>
    $(window).load(function (){
    // Una vez se cargue al completo la página desaparecerá el div "cargando"
    $('#cargando').delay(1200).fadeOut(200);
    $('#listo').delay(1600).fadeIn(400);
    });
    </script>
</body>
</html>