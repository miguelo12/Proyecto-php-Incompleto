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

    <title>Rubrica</title>

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
<!--jquery code -->
    <link rel="stylesheet" href="../pages/css/validationEngine.jquery.css" type="text/css">
    <link rel="stylesheet" href="../pages/css/template.css" type="text/css">
    <script src="../component/jquery/dist/jquery.min.js"></script>   
    <script src="../js/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formulario").validationEngine('attach', {promptPosition : "bottomLeft", autoPositionUpdate : true});
            });
    </script>

    <style>
        td {
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>

<body>
<!-- Navigation -->
        
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
                    <?php if($docente["admin"]==1):?>
                      <li><a href="indexAdmin.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;Cambiar a Administrador</a></li>
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
                    <?php if($docente["admin"]==1):?>
                      <li><a href="indexAdmin.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;Cambiar a Administrador</a></li>
                    <?php endif;?>  
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
        
        
        <div class="container separate-rows tall-rows">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="well well-lg">
                    <div class="text-center">
                        <br/>
                        <h2><ins>Rubrica</ins></h2>
                    </div>
                        
                        <!-- Ejemplo de la rubrica falta programar-->
                        <div class="row">
                            <div class="col-xs-12">
                            <div class="panel panel-default">
                            <div class="panel-body">
                                <!--crear un for para la modifcacion de rubrica-->
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Criterio</th>
                                            <th>1 Puntos</th>
                                            <th>2 Puntos</th>
                                            <th>3 Puntos</th>
                                            <th>4 Puntos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Conceptosssssssssssssssssssssssssssssssssssssssssssss ssssssssssssssssssssssssssssssssssssss</td>
                                            <td>no logrado</td>
                                            <td>medianamente logrado</td>
                                            <td>casi logrado</td>
                                            <td>logrado</td>
                                        </tr>
                                        <tr>
                                            <td>Concepto</td>
                                            <td>no logrado</td>
                                            <td>medianamente logrado</td>
                                            <td>casi logrado</td>
                                            <td>logrado</td>
                                        </tr>
                                        <tr>
                                            <td>Concepto</td>
                                            <td>no logrado</td>
                                            <td>medianamente logrado</td>
                                            <td>casi logrado</td>
                                            <td>logrado</td>
                                        </tr>
                                    </tbody>
                                </table>
                            <!-- /.table-responsive -->
                            </div>
                        <!-- /.panel-body -->
                        <input type="button" class="btn btn-lg btn-success btn-block" value="Editar" onclick=" ">
                        </div>
                            <!-- /.panel -->
                            </div>
                        </div>              
                    </div>    
                </div>
            </div>
        </div>
        </div>
        <!-- Bootstrap Core JavaScript -->
        <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>
        
        <script>
        $('#myLink').addClass('disabled');
        </script>

        <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        </script>
    </body>
</html>
