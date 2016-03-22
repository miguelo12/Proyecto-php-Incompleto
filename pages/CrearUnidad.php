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
       include '../pages/php/CRUD/Rubrica.php';
       
       $docente = $_SESSION["docente"];

       $result = new Rubrica();
       $result->setDocente_idDocente($docente["id"]);
       $rubricaresult = $result->DevolverRubrica();
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
                <li><?php if(!isset($_SESSION["recursosdidacticos"])):?>
                    <a href="indexDocente.php">Inicio</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#">Inicio</a>
                    <?php endif;?></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li class="active"><?php if(!isset($_SESSION["recursosdidacticos"])):?>
                      <a href="CrearUnidad.php">Crear una actividad</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#">Crear una actividad</a>
                    <?php endif;?></li>
                    <li><?php if(!isset($_SESSION["recursosdidacticos"])):?>
                      <a href="Biblioteca.php">Ir a biblioteca</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#">Ir a biblioteca</a>
                    <?php endif;?></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Recuerda</li>
                    <li><?php if(!isset($_SESSION["recursosdidacticos"])):?>
                        <a href="cursos.php">Crear Asignatura o Sección</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#">Crear Asignatura o Sección</a>
                    <?php endif;?></li>
                  </ul>
                </li>
                <li><?php if(!isset($_SESSION["recursosdidacticos"])):?>
                      <a href="#contact">Contáctenos</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#">Contáctenos</a>
                    <?php endif;?></li>
              </ul>
              <ul class="nav navbar-nav navbar-right hidden-xs">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><?php if(!isset($_SESSION["recursosdidacticos"])):?>
                      <a href="Perfil.php"><i class="fa fa-gear fa-fw"></i> Configuracion</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a>
                    <?php endif;?></li>
                    <?php if($docente["admin"]==1): ?>
                    <li>
                    <?php if(!isset($_SESSION["recursosdidacticos"])):?>
                      <a href="indexAdmin.php"><i class="fa fa-gear fa-fw"></i>&nbsp;Cambiar a Administrador</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;Cambiar a Administrador</a>
                    <?php endif;?>
                     </li>
                    <?php endif; ?>
                    <li role="separator" class="divider"></li>
                    <li><?php if(!isset($_SESSION["recursosdidacticos"])):?>
                      <a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout/Salir</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-sign-out fa-fw"></i> Logout/Salir</a>
                    <?php endif;?></li>
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
                      <?php if(!isset($_SESSION["recursosdidacticos"])):?>
                          <a href="indexDocente.php">Inicio</a>
                      <?php else:?>
                          <a data-toggle="modal" data-target="#myModal" href="#">Inicio</a>
                      <?php endif;?>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li class="active"><?php if(!isset($_SESSION["recursosdidacticos"])):?>
                          <a href="CrearUnidad.php">Crear una actividad</a>
                        <?php else:?>
                          <a data-toggle="modal" data-target="#myModal" href="#">Crear una actividad</a>
                        <?php endif;?></li>
                    <li><?php if(!isset($_SESSION["recursosdidacticos"])):?>
                          <a href="Biblioteca.php">Ir a biblioteca</a>
                        <?php else:?>
                          <a data-toggle="modal" data-target="#myModal" href="#">Ir a biblioteca</a>
                        <?php endif;?></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Recuerda</li>
                    <li><?php if(!isset($_SESSION["recursosdidacticos"])):?>
                        <a href="cursos.php">Crear Asignatura o Sección</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#">Crear Asignatura o Sección</a>
                    <?php endif;?></li>
                  </ul>
                </li>
                <li> 
                    <?php if(!isset($_SESSION["recursosdidacticos"])):?>
                      <a href="Evaluar.php">Evaluar Proyectos</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#">Evaluar Proyectos</a>
                    <?php endif;?>
                </li>
                <li> 
                    <?php if(!isset($_SESSION["recursosdidacticos"])):?>
                      <a href="Biblioteca.php">Biblioteca</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#">Biblioteca</a>
                    <?php endif;?>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><?php if(!isset($_SESSION["recursosdidacticos"])):?>
                      <a href="Perfil.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Configuración</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Configuración</a>
                    <?php endif;?></li>
                    <?php if($docente["admin"]==1): ?>
                    <li>
                    <?php if(!isset($_SESSION["recursosdidacticos"])):?>
                      <a href="indexAdmin.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;Cambiar a Administrador</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;Cambiar a Administrador</a>
                    <?php endif;?>
                     </li>
                    <?php endif; ?>
                    <li role="separator" class="divider"></li>
                    <li><?php if(!isset($_SESSION["recursosdidacticos"])):?>
                      <a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout/Salir</a>
                    <?php else:?>
                      <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-sign-out fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout/Salir</a>
                    <?php endif;?></li>
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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row well well-lg">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="">
                            <div class="text-center">
                                <br/>
                                <h2><ins>Crear Unidad de Aprendizaje</ins></h2>
                            </div>
                            <div class="row">
                                <form action="php/creacionUnidad.php" method="POST" id="formulario" autocomplete="off">
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <div class="panel panel-default" id="contenido">
                                      <div class="panel-heading">
                                    <br/>
                                    <label>Titulo</label>
                                    <div class="text-center">
                                    <?php if(isset($_SESSION["recursosdidacticos"])):?>
                                    <input class="form-control" type="text" name="nameActivity" value="<?php if(isset($_SESSION["titulocreacion"])){echo $_SESSION["titulocreacion"];}?>" placeholder="Ingrese aquí el titulo" readonly="true"/>
                                    <p>Para cambiar de nombre debes volver al portal docente cancelar la creacion de esta unidad, perdiendo todo lo avanzado.</p>
                                    <?php else:?>
                                    <input class="form-control" type="text" name="nameActivity" value="<?php if(isset($_SESSION["titulocreacion"])){echo $_SESSION["titulocreacion"];}?>" placeholder="Ingrese aquí el titulo"/>
                                    <p>Una vez sea agregado los documentos, ppt, txt entre otros.<br/> No podras cambiar el título.</p>
                                    <?php endif;?>
                                    </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="clearfix visible-xs"></div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center">
                                    <div class="panel panel-warning" id="contenido">
                                      <div class="panel-heading">
                                        <h3><ins>Rubrica Evaluativa</ins></h3>
                                        <br/>

                                        <?php if(isset($rubricaresult)):?>
                                        <select name="RubricaSelect">
                                        <?php foreach ($rubricaresult as $dw):
                                              $di= 0?>

                                            <?php if($di == 0):?>
                                            <option value="<?= $dw["idRubrica"] ?>" selected="si"><?= $dw["nombre"] ?></option>
                                            <?php $di = $di+1; else:?>
                                            <option value="<?= $dw["idRubrica"] ?>"><?= $dw["nombre"] ?></option>
                                            <?php endif;?>

                                        <?php endforeach;?> 
                                        </select>
                                        <?php endif; ?>
                                        <br/>
                                        <br/>
                                        <br/>
                                    </div>
                                    </div>
                                </div>
                                <div class="clearfix visible-xs"></div>
                                <div class="col-xs-12 text-center">

                                    <input value="&nbsp; Agregar Recursos Didácticos  &nbsp;" name="boton1" type="submit" class="btn btn-default btn-lg btn-block"/>
                                    <br/>
                                </div>

                                <div class="clearfix visible-xs"></div>

                                <div class="col-xs-12 text-center">

                                    <?php //meter contenido de grilla :D?>
                                    <input formaction="php/creacionUnidad.php?action=1" value="Guardar Unidad de aprendizaje" name="boton2" type="submit" class="btn btn-success btn-lg btn-block"/>

                                </div>

                                <div class="clearfix visible-xs"></div>

                                <div class="col-xs-12 text-center">
                                    <br/>
                                    <?php //meter contenido de grilla :D?>
                                    <input data-toggle="modal" data-target="#myModal" type="button" value="Volver al Portal Docente" name="btn3" class="btn btn-primary"/>
                                    <br/>
                                    <br/>
                                    <?php	
                                        if(isset($_GET['error'])){
                                            if($_GET['error']=="1"){
                                                echo "<div class='alert alert-warning'>";
                                                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                                echo "<strong>Error, </strong> debe ingresar un nombre al recurso didáctico.";
                                                echo "</div>"; 
                                            }
                                        }
                                        ?>
                                    <br/>
                                </div>
                                </form>
                                <form action="php/creacionUnidad.php" method="POST" autocomplete="off">
                                 <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Advertencia aun no guarda el contenido</h4>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Esta seguro en salir, sin guardar?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">No, quiero volver</button>
                                                    <button type="submit" class="btn btn-primary" formaction="php/creacionUnidad.php?action=0">Si, seguro</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </form>
                                <div class="clearfix visible-xs"></div>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../component/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="../js/jquery.validate.min.js"></script>
    <?php if(!isset($_SESSION["recursosdidacticos"])):?>
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
                'nameActivity': {
                    required: true,
                    maxlength: 20
                }
            },
           messages: {
                'nameActivity': {
                    required: "Ingrese un Titulo.",
                    maxlength: "A superado el numero de caracter.."
                }
            }
        });
    </script>
    <?php endif;?>
    
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>

</html>
