<?php session_start(); 
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

    <!-- Morris Charts CSS -->
    <link href="../component/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../component/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/simple-sidebar.css" rel="stylesheet">
    
    <link href="css/tab.css" rel="stylesheet">
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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="Perfil.php"><i class="fa fa-gear fa-fw"></i> Configuracion</a></li>
                    <?php if($docente["admin"]==1){
                    echo "<li><a href='indexAdmin.php'><i class='fa fa-gear fa-fw'></i> Cambiar a Administrador</a></li>";} ?>
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
                <li class="active"> 
                      <a href="#">Inicio</a>
                </li>
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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="Perfil.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Configuración</a></li>
                    <?php if($docente["admin"]==1){
                    echo "<li><a href='indexAdmin.php'><i class='fa fa-gear fa-fw'></i>&nbsp;&nbsp;&nbsp;Cambiar a Administrador</a></li>";} ?>
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
                <div class="col-xs-12">
                    <div class="well well-lg">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <br/>
                                <label class="lead">Recursos para crear conflicto cognitivo</label>
                                <br/>
                            </div>
                            <div class="col-xs-12">
                                <div id="rootwizard">        
                                <!--navbar starts -->
                                <div class="navbar">
                                        <div class="navbar-inner">
                                            <div class="row">
                                                <ul class="nav nav-pills">
                                                    <li class="col-xs-2 col-xs-push-2"><a href="#tab1" data-toggle="tab" style="text-align: center"><img src="img/text.png" width="64" height="64" alt="Text"/><br/>Texto</a></li>
                                                    <li class="col-xs-2 col-xs-push-2"><a href="#tab2" data-toggle="tab" style="text-align: center"><img src="img/word.png" width="64" height="64" alt="word"/><br/>Word</a></li>
                                                    <li class="col-xs-2 col-xs-push-2"><a href="#tab3" data-toggle="tab" style="text-align: center"><img src="img/ppt.png" width="64" height="64" alt="ppt"/><br/>PowerPoint</a></li>
                                                    <li class="col-xs-2 col-xs-push-2"><a href="#tab4" data-toggle="tab" style="text-align: center"><img src="img/camera.png" width="64" height="64" alt="camera"/><br/>Imagen</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                                <!--navbar ends -->


                                <!-- form wizard content starts -->
                                <div class="tab-content">
                                        <!-- wizard step 1 starts-->
                                        <div class="tab-pane" id="tab1">
                                            <div class="form-group">
                                                <form method="POST" action="upload.php?tipo=1">
                                                <input type="text" class="form-control" placeholder="Ingrese una Descripción.">
                                                <label for="exampleInputFile">Sube tu archivo.</label>
                                                <input type="file" id="exampleInputFile">
                                                <p class="help-block">Solamente se aceptan .txt</p>
                                                <button type="submit" class="btn btn-default">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- wizard step 1 ends-->					
                                        <div class="tab-pane" id="tab2">
                                            <div class="form-group">
                                                            

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            <div class="form-group">

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab4">
                                            <div class="form-group">

                                            </div>
                                        </div>
                                </div>	
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
        

    <!-- jQuery -->
    <script src="../component/jquery/dist/jquery.min.js"></script>
   
    <!-- Bootstrap wizard -->
    <script src="../js/jquery.bootstrap.wizard.min.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../component/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../component/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    
    <script type="text/javascript">
	$(document).ready(function() {
		$('#rootwizard').bootstrapWizard();
	});
</script>
</body>

</html>
