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
       $problem = FALSE;
       if(isset($_SESSION["titulocreacion"]))
       {
          $problem = true;
       }
       unset($_SESSION["autoevaluacion"]);
       unset($_SESSION["coevaluacion"]);
       unset($_SESSION["evaluacion"]);
       unset($_SESSION["rubrica"]);
       unset($_SESSION["edita"]);
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
    <title>Indice Docente</title>

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
    <?php if(isset($_GET["exitoenvio"])): if($_GET["exitoenvio"]==1):?>
    <?php if(isset($_SESSION["idAlumno"])):?>
    <script>
        function countDown(i, callback) {
            callback = callback || function(){};
            var int = setInterval(function() {
                document.getElementById("timer").innerHTML = i;
                i-- || (clearInterval(int), callback());
            }, 1000);
        }
        countDown(120, function(){
            window.location="php/UsuarioAction.php?user=2&action=3";
        });
        
        function sacar(){
            window.location="php/UsuarioAction.php?user=2&action=3";
        }
    </script>
    <?php endif;?>
    <?php endif; else:?>
    <?php if(isset($_SESSION["idAlumno"])):
          header("location: php/UsuarioAction.php?user=2&action=3");
          die();
          endif;?>
    <?php endif;?>
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
        
        <div id="page-content-wrapper content" >
            <div class="container separate-rows tall-rows">
                
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-info panel-footer">
                        <div class="text-center">
                            <br/>
                            <h4 style="float: right; margin-right: 20px; color: #23527c">Portal Docente</h4>
                            <br/>
                            <h1><ins style="color: #23527c">Sugerencias que puedes elegir</ins></h1>
                            <br/>
                        </div>
                        <div class="row">
                         
                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12 text-center">                       
                                        <a class="lead" href="CrearUnidad.php"><p><img src="img/actividad.png" alt="lista" width="200" height="200"></p> Crear Actividad</a>
                                        <br/>
                                        <p>Crea una nueva unidad de aprendizaje con diagramas heurísticos, recursos didácticos y diversos tipos de evaluaciones.</p>
                                    </div>     
                                </div>
                            </div>
                            

                            <div class="clearfix visible-xs"></div>

                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12 text-center">                                    
                                        <div>
                                        <a class="lead" href="Biblioteca.php"><p><img src="img/biblioteca.png" alt="lista" width="200" height="200"></p> Biblioteca y Rúbricas</a>
                                        <p>Revisa las actividades y rúbricas ya creadas para compartilas con tus alumnos</p>
                                        <br/>
                                        </div>
                                    </div>
                                    
                                </div>        
                            </div>
                            
                            <div class="clearfix visible-xs"></div>
                            
                            <div class="col-xs-12 col-md-4 col-lg-4">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-lg-12 text-center">
                                        <a class="lead" href="#"><p><img src="img/lista.png" alt="lista" width="200" height="200"></p>Evaluar</a>
                                        <p>Evalua los proyectos realizados con las rúbricas predeterminadas con anterioridad</p>
                                        <br/>
                                    </div>
                                    
                                </div>    
                            </div>    
                                
                            <div   class="clearfix visible-xs"></div>
                            
                        </div>
                        </div>
                    </div>     
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-info panel-footer">
                        <div class="row">
                            <div class="hidden-xs col-sm-12 col-md-6 col-lg-6 text-center">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8 text-center ">
                                        <div class="text-center">
                                            <br/>
                                            <br/>
                                            <p class="lead" style="color: #23527c">Invita a tus estudiantes por correo electrónico y forma distintos cursos o secciones.</p>
                                            <input style="margin-top: 10px" data-toggle="modal" data-target="#myModal" type="button" value="Generar invitación." name="btn3" class="btn btn-primary"/>
                                        </div>
                                    </div> 
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 text-center">
                                        <div class="text-center">
                                            <br/>
                                            <br/>
                                            <img src="img/mail.png" alt="mail" width="128" height="128"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden-xs col-sm-12 col-md-6 col-lg-6 text-center">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8 text-center">
                                        <div class="text-center">
                                            <br/>
                                            <br/>
                                            <br/>
                                            <p class="lead" style="color: #23527c">Administración de Cursos o Secciones.</p>
                                            <br/>
                                            <a  class="btn btn-primary" href="cursos.php">Administre sus Cursos</a>
                                            <br/>
                                        </div>        
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 text-center">
                                        <div class="text-center">
                                            <br/>
                                            <br/>
                                            <img src="img/folder.png" alt="folder" width="128" height="128"/>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class=" hidden-sm hidden-md hidden-lg text-center">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <div class="text-center">
                                            <br/>
                                            <br/>
                                            <img src="img/mail.png" alt="mail" width="120" height="120"/>
                                            <p class="lead" style="color: #23527c">Invita a tus estudiantes por correo electrónico y forma distintos cursos o secciones.</p>
                                            <input style="margin-top: 10px" data-toggle="modal" data-target="#myModal" type="button" value="Generar invitación." name="btn3" class="btn btn-primary"/>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="hidden-sm hidden-md hidden-lg text-center">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <div class="text-center">
                                            <br/>
                                            <br/>
                                            <br/>
                                            <img src="img/folder.png" alt="folder" width="120" height="120"/>
                                            <p class="lead" style="color: #23527c">Administración de Cursos o Secciones.</p>
                                            <a  class="btn btn-primary" href="cursos.php">Administre sus Cursos</a>
                                            <br/>
                                        </div>        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/><br/>
                    </div>
                </div>
                <!--Fin seccion de cursos-->
                </div>
            </div>
        </div>
                <!--Fin seccion de invitacion-->
                <!--Inicio seccion de cursos-->
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" autocomplete="off" id="formulario" action="php/UsuarioAction.php?user=2&action=1">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Para invitar ingrese un correo.</h4>
                </div>
                <div class="modal-body">
                    <input class="form-control" type="text" name="email1" id="email1" value="" placeholder="Ingrese aquí el correo."/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
     
    <!-- Modal -->
    <div class="modal fade" id="myModal1" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" autocomplete="off">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Hemos detectado un problema.</h4>
                </div>
                <div class="modal-body">
                    <p>Tienes creado una unidad sin guardar, ¿Deseas volver o eliminar?.</p>
                    
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" href="CrearUnidad.php">Quiero seguir.</a>
                    <a class="btn btn-primary" href="php/creacionUnidad.php?action=0">Eliminalo.</a>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
        
    <!-- jQuery -->
    <script src="../component/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../component/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!--//nueva forma de llamar phptag-->
    <?php if($problem):?>
    <script> $('#myModal1').modal('show');</script>
    <?php endif;?>
  
    <script src="../js/jquery.validate.min.js"></script>
    
    <script>
          $.validator.setDefaults({
            errorElement: "span",
            errorClass: "help-block",
            highlight: function(element) {
                $(element).parent().removeClass('has-success').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).parent().removeClass('has-error').addClass('has-success');
            },
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length || element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
            });
            
            $("#formulario").validate({
            rules: {
                'email1': {
                    required: true,
                    emailnew: true,
                    email: false
                }
            },
           messages: {
                'email1': {
                    required: "Ingrese un email.",
                }
            }
        });
        
        jQuery.validator.addMethod("emailnew", function(value, element) {
          return this.optional(element) || /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(value);
        }, "Debe cumplir el formato de un email. Ej: user@dominio.com");
    </script>
    
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>

</html>