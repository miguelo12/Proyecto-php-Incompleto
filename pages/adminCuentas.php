<?php session_start();
      error_reporting(E_ALL ^ E_WARNING);
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
          include '../pages/php/CRUD/Docente.php';
        $docente = $_SESSION["docente"];
        if($docente["admin"]==0)
        {
           header("location: ../pages/indexDocente.php");
           die(); 
        }
        else
        {
          $result = new Docente();
          $docentetodos = $result->DevolverDocentes();
        }
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

    <title>Administrar cuentas</title>

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
<!--jquery code -->
    <link rel="stylesheet" href="../pages/css/validationEngine.jquery.css" type="text/css">
    <link rel="stylesheet" href="../pages/css/template.css" type="text/css">
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>   
    <script src="../js/languages/jquery.validationEngine-es.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formulario").validationEngine('attach', {promptPosition : "bottomLeft", autoPositionUpdate : true});
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
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            <br/>
                            <h2 class="text-center"><ins>Cuentas de profesores</ins></h2>
                            <br/>
                            <br/>
                            <br/>
                            <?php //Agregar for... ?>
                            <pre><ul class="list-unstyled"><?php foreach($docentetodos as $do){echo "<li>[Nombre]: ".$do["nombre"]." [Email]: ".$do["email"]." <a href='php/UsuarioAction.php?user=1&action=2&id=".$do["idDocente"]."'>Eliminar</a>"." <a href='php/UsuarioAction.php?user=1&action=3&id=".$do["idDocente"]."'>Actualizar</a></li>"; }?></ul></pre>
                        </div> 
                    </div>
                        <!--boton activador del modal-->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Crear nueva cuenta</button>
                        
                        <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Crear Docente</h4>
                            </div>
                            <div class="modal-body">
                            <!-- Inicio Formulario-->     
                            <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="well well-lg">
                                <div class="text-center">
                                    <br/>
                                    <h2><ins>Crear nuevo docente</ins></h2>
                                </div>
                                <div class="row">
                                    <form action="php/UsuarioAction.php?user=1&action=1" method="POST" id="formulario">
                                    <fieldset> 
                                    <div class="col-xs-12">
                                        <br/>
                                        <br/>
                                        <label>nombre</label>
                                        <input class="form-control validate[required] text-input" type="text" name="nombre1" value="" placeholder="Ingrese aquí el nombre"/>
                                        <br/>
                                    </div>
                                    <div class="col-xs-12">
                                        
                                        <label>email</label>
                                        <input class="form-control validate[required,custom[email]] text-input" type="text" name="email2" value="" placeholder="Ingrese aquí el email"/>
                                        <br/>
                                    </div>                            
                                    <div class="col-xs-12">
                                        
                                        <label>password</label>
                                        <input class="form-control validate[required] text-input" type="password" name="password3" value="" placeholder="Ingrese aquí la contraseña"/>
                                        <br/>
                                    </div>                            
                                    <div class="col-xs-12">
                                        
                                        <label>Es administrador?</label>
                                        </br>
                                        <label>Si</label>
                                        <input type="radio" name="admin4" id="si" value="1" class="validate[required] radio">
                                        <label>No</label>
                                        <input type="radio" name="admin4" id="no" value="0" class="validate[required] radio">
                                        <br/>
                                        <br/>
                                        <br/>
                                    </div>
                                </fieldset>
                            <div class="clearfix visible-xs"></div>

                            <div class="clearfix visible-xs"></div>
                           
                        <div class="modal-footer">
                            <input value="Guardar nuevo docente" name="boton2" type="submit" class="submit btn btn-default btn-lg btn-block"/>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        </form> 
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
