<?php session_start(); 
  error_reporting(0);
  ob_start();
  if(!isset($_SESSION["docente"]))
      { 
        if(!isset($_SESSION["alumno"])){
          header("location: ../pages/inicio.php");
          die();
        }
        else
        {
          header("location: ../pages/indexAlumno.php");
          die();
        }
      }
  else
      {
       $docente = $_SESSION["docente"];
       
       include '../pages/php/CRUD/Rubrica.php';
       $result = new Rubrica();
       $result->setDocente_idDocente($docente["id"]);
       $rubricaresult = $result->DevolverRubrica();
       
       include '../pages/php/CRUD/UnidadAprendizaje.php';
       $resultunidad = new UnidadAprendizaje();
       $resultunidad->setDocente_idDocente($docente["id"]);
       $Unidadresult = $resultunidad->DevolverUnidadDocente();
       
        unset($_SESSION["autoevaluacion"]);
        unset($_SESSION["coevaluacion"]);
        unset($_SESSION["evaluacion"]);
        unset($_SESSION["rubrica"]);
        unset($_SESSION["ver"]);
        unset($_SESSION["edita"]);
        unset($_SESSION["publicar"]);
        unset($_SESSION["Actividad"]);
        unset($_SESSION["actividades"]);
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
    <title>Biblioteca</title>


    <!-- Loading -->
    <link href="css/loading.css" rel="stylesheet" type="text/css"/>
    
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    
    <!-- Bootstrap Core CSS -->
    <link href="../component/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    
    <!-- Custom Fonts -->
    <link href="../component/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="none" onload="if(media!='all')media='all'">

    <!-- MetisMenu CSS -->
    <link href="../component/metisMenu/dist/metisMenu.min.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'">

    <link href="css/simple-sidebar.css" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    
    <noscript>
    <!-- Loading -->
    <link href="css/loading.css" rel="stylesheet" type="text/css"/>
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="../component/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../component/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- MetisMenu CSS -->
    <link href="../component/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    </noscript>
    
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
        <div id="cargando">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="center-block text-center">
                        <div class="cssload-container">
                            <div class="cssload-arc">
                                <div class="cssload-arc-cube"></div>
                            </div>
                            <div id="fountainTextG" style="margin-top: 140px; margin-left: 60px"><div id="fountainTextG_1" class="fountainTextG">c</div><div id="fountainTextG_2" class="fountainTextG">a</div><div id="fountainTextG_3" class="fountainTextG">r</div><div id="fountainTextG_4" class="fountainTextG">g</div><div id="fountainTextG_5" class="fountainTextG">a</div><div id="fountainTextG_6" class="fountainTextG">n</div><div id="fountainTextG_7" class="fountainTextG">d</div><div id="fountainTextG_8" class="fountainTextG">o</div><div id="fountainTextG_9" class="fountainTextG">.</div><div id="fountainTextG_10" class="fountainTextG">.</div><div id="fountainTextG_11" class="fountainTextG">.</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="listo" style="display: none;">
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
                <a class="navbar-brand" style="margin-left: 10px" href="indexDocente.php"><img src="img/logo.PNG" class="imagelogo" alt="" height="100" width="200"/></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right hidden-xs" style="margin-top: 80px; margin-right: 0px">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="Perfil.php"><i class="fa fa-gear fa-fw"></i> Configuracion</a></li>
                    <?php if($docente["admin"]==1):?>
                      <li><a href="indexAdmin.php"><i class="fa fa-gear fa-fw"></i>&nbsp;Cambiar a Administrador</a></li>
                    <?php endif;?>  
                    <li role="separator" class="divider"></li>
                    <li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout/Salir</a></li>
                  </ul>
                </li>
              </ul>
              <h1 class="navbar-text navbar-right" style="margin-top: 50px; margin-right: 80px">Biblioteca</h1>  
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
                        Menu Docente
                    </a>
                </li>
                <li> 
                    <a href="indexDocente.php">Inicio</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="CrearUnidad.php">Crear una actividad</a></li>
                    <li class="active"><a href="#">Ir a biblioteca</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Recuerda</li>
                    <li><a href="cursos.php">Crear Asignatura o Sección</a></li>
                  </ul>
                </li>
                <li> 
                      <a href="Evaluar.php">Evaluar Proyectos</a>
                </li>
                <li> 
                      <a href="Biblioteca.php">Biblioteca</a>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="Perfil.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Configuración</a></li>
                    <?php if($docente["admin"]==1):?>
                      <li><a href="indexAdmin.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cambiar a Administrador</a></li>
                    <?php endif;?>  
                    <li role="separator" class="divider"></li>
                    <li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout/Salir</a></li>
                  </ul>
                </li>
            </ul>
        </div>
        </nav>
        </div>
        
        <?php if(isset($_GET["error"])):
                if($_GET["error"]=="202"):?>
                    <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong >Error, </strong> no puedes editar una unidad, ya publicada.<br/> Primero finaliza la actividad y podras editar la unidad.
                    </div>
        <?php endif; endif; ?>
        <?php if(isset($_GET["creado"])):
                if($_GET["creado"]=="1"):?>
                    <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong >Listo, </strong> se ha creado una unidad de aprendizaje.
                    </div>
        <?php endif; endif; ?>
        <?php if(isset($_GET["creado"])):
                if($_GET["creado"]=="2"):?>
                    <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Listo, </strong> una rubrica nueva.
                    </div>
        <?php endif; endif; ?>
        <?php if(isset($_GET["editado"])):
                if($_GET["editado"]=="1"):?>
                    <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Listo, </strong> se ha editado con exito la unidad de aprendizaje.
                    </div>
        <?php endif; endif; ?>
        <?php if(isset($_GET["editado"])):
                if($_GET["editado"]=="2"):?>
                    <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Listo, </strong> se ha editado con exito la rubrica.
                    </div>
        <?php endif; endif; ?>
        <div id="page-content-wrapper content" >
          <div class="container separate-rows tall-rows">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default panel-footer">
                    <div class="row">
                        <div class="hidden-xs hidden-sm col-md-1 col-lg-1">
                            <br/>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">
                            <h2><ins>Unidades de Aprendizaje</ins></h2>
                            <br/>
                            <p class="lead">Presenta on-line o edita tus Unidades de Aprendizaje.</p>
                            <br/>
                            <ul class="list-group">
                                <?php if(isset($Unidadresult)): foreach($Unidadresult as $de):?>
                                <li class="list-group-item text-left hidden-xs"><i class="fa fa-angle-right fa-fw"></i><?= $de["Titulo"]?><span class="pull-right"><a class="label label-warning" href="php/creacionUnidad.php?editar=<?= $de["idUnidadAprendizaje"] ?>">Editar</a>&nbsp;&nbsp;&nbsp;<a class="label label-success" href="php/publicar.php?publicar=<?= $de["idUnidadAprendizaje"] ?>&name=<?= $de["Titulo"] ?>">Publicar</a>&nbsp;&nbsp;&nbsp;<a class="label label-default" href="#">Exportar</a></span></li>
                                <li class="list-group-item text-center hidden-lg hidden-md hidden-sm"><i class="fa fa-angle-right fa-fw"></i><?= $de["Titulo"]?> <a class="label label-warning" href="php/creacionUnidad.php?editar=<?= $de["idUnidadAprendizaje"] ?>">Editar</a>&nbsp;&nbsp;&nbsp;<a class="label label-success" href="php/publicar.php?publicar=<?= $de["idUnidadAprendizaje"] ?>&name=<?= $de["Titulo"] ?>">Publicar</a>&nbsp;&nbsp;&nbsp;<a class="label label-default" href="#">Exportar</a></li>
                                <?php endforeach; else: ?>
                                <li class="list-group-item disabled text-center">No tienes aún una unidad de aprendizaje</li>
                                <?php endif; ?>
                            </ul>
                            <a href="CrearUnidad.php?new=1" class="btn btn-info btn-lg hidden-xs">Nueva unidad de aprendizaje</a>
                            <a href="CrearUnidad.php?new=1" class="btn btn-info btn-lg hidden-lg hidden-md hidden-sm">Nueva unidad de <br/> aprendizaje</a>
                        </div>
                        <div class="hidden-xs hidden-sm col-md-5 col-lg-5 text-center">
                            <br/>
                            <br/>
                            <img src="../pages/img/libro.png" alt="libros" class="img-rounded">
                        </div>
                        
                    </div>
                    </div>
                </div>
                <br/>
                <div class="col-xs-12">
                    <div class="panel panel-default panel-footer">
                    <div class="row">
                        <div class="hidden-xs hidden-sm col-md-1 col-lg-1">
                            <br/>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-center">
                            <h2><ins>Rubricas</ins></h2>
                            <br/>
                            <p class="lead">Selecciona la rubrica, que quieras utilizar para tu nueva unidad de aprendizaje.</p>
                            <br/>
                            <ul class="list-group text-left">
                                  <?php if(isset($rubricaresult)): foreach($rubricaresult as $da): if($da["nombre"]=="Predeterminado"):?>
                                  <li class="list-group-item hidden-xs"><i class="fa fa-angle-right fa-fw"></i><?=$da["nombre"]?><span class="pull-right"><a class="label label-primary" href="php/rubricas.php?idRubrica=<?=$da["idRubrica"]?>&ver=<?=$da["idRubrica"]?>">Ver</a>&nbsp;&nbsp;&nbsp;<a class="label label-success" href="CrearUnidad.php">Seleccionar</a></span></li>
                                  <li class="list-group-item text-center hidden-lg hidden-md hidden-sm"><i class="fa fa-angle-right fa-fw"></i><?=$da["nombre"]?> <a class="label label-primary" href="php/rubricas.php?idRubrica=<?=$da["idRubrica"]?>&ver=<?=$da["idRubrica"]?>">Ver</a>&nbsp;&nbsp;&nbsp;<a class="label label-success" href="CrearUnidad.php">Seleccionar</a></li>
                                  <?php else: ?>
                                  <li class="list-group-item hidden-xs"><i class="fa fa-angle-right fa-fw"></i><?=$da["nombre"]?><span class="pull-right"><a class="label label-primary" href="php/rubricas.php?idRubrica=<?=$da["idRubrica"]?>&ver=<?=$da["idRubrica"]?>">Ver</a>&nbsp;&nbsp;&nbsp;<a class="label label-warning" href="php/rubricas.php?idRubrica=<?=$da["idRubrica"]?>&new=2">Editar</a>&nbsp;&nbsp;&nbsp;<a class="label label-success" href="php/creacionUnidad.php?idRubrica=<?=$da["idRubrica"]?>">Seleccionar</a></span></li>
                                  <li class="list-group-item text-center hidden-lg hidden-md hidden-sm"><i class="fa fa-angle-right fa-fw"></i><?=$da["nombre"]?> <a class="label label-primary" href="php/rubricas.php?idRubrica=<?=$da["idRubrica"]?>&ver=<?=$da["idRubrica"]?>">Ver</a>&nbsp;&nbsp;&nbsp;<a class="label label-warning" href="php/rubricas.php?idRubrica=<?=$da["idRubrica"]?>&new=2">Editar</a>&nbsp;&nbsp;&nbsp;<a class="label label-success" href="php/creacionUnidad.php?idRubrica=<?=$da["idRubrica"]?>">Seleccionar</a></li>
                                  <?php endif; endforeach; endif; ?>
                            </ul> 
                            <a href="php/rubricas.php?new=1" class="btn btn-info btn-lg">Nueva rubrica</a>
                        </div>
                        <div class="hidden-xs hidden-sm col-md-5 col-lg-5 text-center">
                            <br/>
                            <br/>
                            <br/>
                            <img src="../pages/img/rubri.png" alt="libros" class="img-rounded">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        <br/>
        <br/>
        </div>
    
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
    $('#listo').delay(1500).fadeIn(400);
    });
    </script>
</body>

</html>