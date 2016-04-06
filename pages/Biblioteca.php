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

    <title>Inicio Docente</title>

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
    
    <style>
        body {
            background-image: url("./img/book.png");
            background-repeat: repeat;
            background-attachment: fixed;
            background-color: hsl(114, 87%, 90%);
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
              <a class="navbar-brand" href="#">Heuristica Movil</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  <li ><a href="indexDocente.php">Inicio</a></li>
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
                <li><a href="#contact">Contáctenos</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right hidden-xs">
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
        <br/>
        <br/>
        <br/>
        
        <?php if(isset($_GET["creado"])):
                if($_GET["creado"]=="1"):?>
                    <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Listo, </strong> se ha creado una unidad de aprendizaje.
                    </div>
        <?php endif; endif; ?>
        <div id="page-content-wrapper content" >
          <div class="container separate-rows tall-rows">
            <div class="row">
                <div class="col-xs-12">
                    <div class="well well-lg">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center">
                            <br/>
                            <h2><ins>Biblioteca</ins></h2>
                            <br/>
                            <br/>
                            <p class="lead">Presenta on-line o edita tus Unidades de Aprendizaje.</p>
                            <br/>
                            <div class="panel panel-primary">
                              <div class="panel-body">
                                  <?php if(isset($Unidadresult)): foreach($Unidadresult as $de):?>
                                  <i class="fa fa-chevron-circle-right">&nbsp;</i><a href="php/creacionUnidad.php?editar=<?= $de["idUnidadAprendizaje"] ?>">Editar</a>&nbsp;&nbsp;&nbsp;<a href="#">Publicar</a>&nbsp;&nbsp;&nbsp;<a href="#">Exportar</a>&nbsp;&nbsp;&nbsp;<?= $de["Titulo"] ?><br/>
                                  <?php endforeach; else: ?>
                                  <p>No tienes aún una unidad de aprendizaje</p>
                                  <?php endif; ?>
                              </div>
                            </div> 
                            <a href="CrearUnidad.php" class="btn btn-info btn-lg">Nueva Unidad de aprendizaje</a>
                        </div>
                        <div class="hidden-xs hidden-sm col-md-4 col-lg-4 text-left">
                            <br/>
                            <br/>
                            <br/>
                            <img src="../pages/img/libro.png" alt="libros" class="img-rounded">
                        </div>
                        
                    </div>
                    </div>
                </div>
                <br/>
                <div class="col-xs-12">
                    <div class="well well-lg">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center">
                            <br/>
                            <h2><ins>Rubricas</ins></h2>
                            <br/>
                            <br/>
                            <p class="lead">Selecciona la rubrica, que quieras utilizar para tu nueva unidad de aprendizaje.</p>
                            <br/>
                            <div class="panel panel-primary">
                              <div class="panel-body">
                                  <?php if(isset($rubricaresult)): foreach($rubricaresult as $da): if($da["nombre"]=="Predeterminado"):?>
                                  <i class="fa fa-chevron-circle-right"></i></span>&nbsp;<?=$da["nombre"]?>&nbsp;&nbsp;&nbsp;<a href="#">Ver</a>&nbsp;&nbsp;&nbsp;<a href="#">Editar</a>&nbsp;&nbsp;&nbsp;<a href="CrearUnidad.php">Seleccionar</a>
                                  <?php else: ?>
                                  <i class="fa fa-chevron-circle-right"></i></span>&nbsp;<?=$da["nombre"]?>&nbsp;&nbsp;&nbsp;<a href="#">Ver</a>&nbsp;&nbsp;&nbsp;<a href="php/rubricas.php?idRubrica=<?=$da["idRubrica"]?>">Editar</a>&nbsp;&nbsp;&nbsp;<a href="php/creacionUnidad.php?idRubrica=<?=$da["idRubrica"]?>">Seleccionar</a>   
                                  <?php endif; endforeach; endif; ?>
                              </div>
                            </div>  
                            <a href="php/rubricas.php?new=1" class="btn btn-info btn-lg">Nueva rubrica</a>
                        </div>
                        <div class="hidden-xs hidden-sm col-md-4 col-lg-4 text-left">
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

    <!-- jQuery -->
    <script src="../component/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../component/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>

</html>