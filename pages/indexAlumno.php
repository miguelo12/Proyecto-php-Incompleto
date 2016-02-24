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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inicio Docente</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/simple-sidebar.css" rel="stylesheet">
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
                <li class="active"><a href="#">Inicio</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="CrearUnidad.php">Crear una actividad</a></li>
                    <li><a href="Biblioteca.php">Ir a biblioteca</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Recuerda</li>
                    <li><a href="#">Crear Asignatura o Sección</a></li>
                  </ul>
                </li>
                <li><a href="#contact">Contáctenos</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right hidden-xs">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php echo $alumno["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="Perfil.php"><i class="fa fa-gear fa-fw"></i> Configuracion</a></li>
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
                        Menu Alumno
                    </a>
                </li>
                <li class="active"> 
                      <a href="#">Inicio</a>
                </li>
                <li> 
                      <a href="CrearUnidad.php">Construir Unidad</a>
                </li>
                <li> 
                      <a href="Evaluar.php">Evaluar Proyectos</a>
                </li>
                <li> 
                      <a href="Biblioteca.php">Rúbrica</a>
                </li>
                <li> 
                      <a href="Biblioteca.php">Biblioteca</a>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $alumno["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="Perfil.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Configuracion</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout/Salir</a></li>
                  </ul>
                </li>
            </ul>
        </div>
        </nav>
            
        <br/>
        <br/>
        <br/>
        
        <div id="page-content-wrapper content" >
        <div class="container separate-rows tall-rows">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                    <div class="well well-lg">
                    <div class="text-center">
                        <h2><ins>Sugerencias que púedes<br/> elegir</ins></h2>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 text-right">
                            <br/>
                            <br/>
                            <?php //meter contenido de grilla :D?>
                            <a class="lead" href="CrearUnidad.php">Crear Actividad<br> Heuristica Movil</a>
                            <br/>
                        </div>
                        <div class="col-xs-6">
                            <br/>
                            <p><img src="img/actividad.png" alt="lista" width="100" height="100"></p>
                        </div>
                        
                        <div class="clearfix visible-xs"></div>

                        <div class="col-xs-6 text-right">
                            <br/>
                            <?php //meter contenido de grilla :D?>
                            <a class="lead" href="Biblioteca.php">Biblioteca de<br/> Actividades</a>
                            <br/>
                        </div>
                        <div class="col-xs-6">
                            <br/>
                            <p><img src="img/biblioteca.png" alt="lista" width="76" height="80"></p>
                        </div>
                        
                        <div class="clearfix visible-xs"></div>
                        
                        <div class="col-xs-6 text-right">
                            <br/>
                            <?php //meter contenido de grilla :D?>
                            <a class="lead" href="Evaluar.php">Evaluar<br> Proyectos</a>
                            <br/>
                        </div>
                        <div class="col-xs-6">
                            <br/>
                            <p><img src="img/lista.png" alt="lista" width="76" height="80"></p>
                        </div>
                        <div class="clearfix visible-xs"></div>
                        
                        <div class="col-xs-6 text-right">
                            <br/>
                            <br/>
                            <?php //meter contenido de grilla :D?>
                            <a class="lead">Rúbrica</a>
                            <br/>
                        </div>
                        <div class="col-xs-6">
                            <p><img src="img/evaluacion.png" alt="lista" width="100" height="100"></p>
                        </div>
                        <div class="clearfix visible-xs"></div>
                    </div>
                    </div>
                </div>
                <div class="hidden-xs col-sm-5 col-md-5 col-lg-5 text-center well well-lg">
                    <div class="text-center">
                        <h2><ins>Portal Alumno</ins></h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ver más...
                    </div>
                    <!-- .panel-heading -->
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">¿Qué es la Heurística?</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        &nbsp;Según la Real Académia de la Lengua Española (RAE) la heurística es una técnica de la indagación y del descubrimiento. En el ámbito de las ciencias, es un método que busca la solución de un problema mediante la comprobación de una hipótesis, siendo esta última una explicación tentativa para un conjunto de observaciones.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">¿Qué es un diagrama heurístico?</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        &nbsp;Un diagrama heurístico es un esquema visual que se utiliza como un recurso para organizar ideas e información y que permite evidenciar lo que un estudiante comprende acerca de un tema en particular. Su diseño corresponde a una derivación de la V de Gowin, instrumento ideado por el profesor norteamericano Bob Gowin que se basa en un diagrama que representa la estructura del conocimiento que facilita el proceso de "aprender a aprender". Su utilidad comprende el análisis de una lectura, para llevar a cabo un proceso de investigación, para preparar material didáctico de una clase o para llevar a cabo el análisis de un currículo.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">¿Cómo se desarrolla un diagrama heurístico?</a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        &nbsp;José Antonio Chamizo (Chamizo, 2007) propuso un diagrama heurístico que contiene tres características conceptuales (aplicación, lenguaje, y modelos) y tres características procedimentales (procedimiento y recolección de datos, procesamiento de datos y resultados). Por ejemplo, para responder la pregunta de investigación: ¿Por qué no aumenta el nivel del agua cuando se funde un cubo de hielo? Chamizo propone el siguiente esquema:
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">¿Qué es la heurística móvil?</a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        &nbsp;Heurística móvil es un software que facilitar el diseño,  desarrollo y evaluación integral de procesos que promueven el aprendizaje heurístico, mediante la construcción de archivos SCORM compatibles con dispositivos móviles y exportables a moodle. El software ha sido diseñado para facilitar el proceso de enseñanza-aprendizaje del público en general, pero principalmente para comunidades conformadas por estudiantes, docentes, administrativos y profesionales pertenecientes a instituciones de educación básica, media y superior. Contiene un portal docente que facilita el diseño de unidades de aprendizaje centradas en un diagrama heurístico, el cual puede ser complementado con diversos recursos de información (texto, documentos de word, diapositivas de power point), actividades de aprendizaje (cuestionarios) y distintos instrumentos de evaluación (autoevaluación, coevaluación y rúbricas). Por otra parte, contiene un portal estudiante que facilita el desarrollo de un diagrama heurístico de manera individual o por un grupo de estudiantes, quienes pueden utilizar el laboratorio móvil para registrar, graficar o tabular mediciones de distintas magnitudes físicas, químicas y biológicas u otras señales capturadas por un chip que se instala en dispositivos móviles. Si bien, Heurística Móvil responde a los requerimientos de asignaturas de índole científico, sus recursos y herramientas puede ser editados y adaptados para ser utilizado en cualquier asignatura. El software se encuentra disponible en el sitio web www.heuristicamovil.com y puede ser descargado de app.store como una aplicación para móviles compatible con sistemas ios y android.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

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
