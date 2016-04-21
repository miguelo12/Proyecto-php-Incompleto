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
        
        include '../pages/php/CRUD/Seccion.php';
        include '../pages/php/CRUD/Asignatura.php';
        
        $seccion = new Seccion();
        $asignatura = new Asignatura();
        
        $seccion->setDocente_idDocente($docente["id"]);
        $arraySeccion = $seccion->DevolverSeccionDocente();
        
        $asignatura->setDocente_idDocente($docente["id"]);
        $arrayAsignatura = $asignatura->DevolverAsignaturasDocente();  
        
        unset($conteo);
        $du = 0;
        $conteo;
        foreach ($arrayAsignatura as $tq)
        {
           foreach ($arraySeccion as $tk)
           {
              if($tq["idAsignatura"] == $tk["Asignatura_idAsignatura"])
              {
                $du = $du + 1;
              }
           }
           $conteo[] = $du;
           $du = 0;
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
    <link rel="shortcut icon" type="image/png" href="img/icon.png"/>
    <title>Cursos</title>

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
  <script src="../component/jquery/dist/jquery.min.js"></script>
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
                  <li><a href="indexDocente.php">Inicio</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="CrearUnidad.php">Crear una actividad</a></li>
                    <li><a href="Biblioteca.php">Ir a biblioteca</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Recuerda</li>
                    <li class="active"><a href="#">Crear Asignatura o Sección</a></li>
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
                    <li><a href="Biblioteca.php">Ir a biblioteca</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Recuerda</li>
                    <li class="active"><a href="#">Crear Asignatura o Sección</a></li>
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
        
        <?php  if(isset($_GET["error"])): if($_GET["error"]==2):?>
        <div class="alert alert-warning">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> ocurrio un algo inesperado.</p>
        </div>
        <?php elseif ($_GET["error"]==3):?>
        <div class="alert alert-warning">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> el codigo de seccion ya existe.</p>
        </div>
        <?php endif; endif;?>
        <?php if(isset($_GET["succes"])): if($_GET["succes"]==1):?>
        <div class="alert alert-success">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Listo, </strong> se agrego una seccion y/o asignatura.</p>
        </div>
        <?php endif; endif;?>
        <div id="page-content-wrapper content" >
          <div class="container separate-rows tall-rows">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-info panel-footer">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <div style="text-align: center; overflow-x: auto">
                                <table class="table table-bordered table-condensed">
                                    <caption><h2 class="text-center" style="color: #23527c"><ins>Secciones o Cursos</ins></h2></caption>
                                    <tr>
                                        <th class="text-center" style="width: 30%">Nombre Asignatura</th>
                                        <th class="text-center" style="width: 20%">curso o sección</th>
                                        <th class="text-center" style="width: 30%">PIN</th>
                                        <th class="text-center" style="width: 20%">Habilitar / Deshabilitar</th>
                                    </tr>
                                    <?php if(isset($arrayAsignatura)): $tp = 0?>
                                    <?php foreach ($arrayAsignatura as $du):?>
                                    <tr>
                                        <td rowspan="<?= $conteo[$tp] ?>">
                                            <p><?= $du["Nombre"] ?></p>
                                        </td>
                                    <?php if(isset($arraySeccion)): ?> 
                                    <?php $do = true; foreach ($arraySeccion as $de):
                                          if($du["idAsignatura"] == $de["Asignatura_idAsignatura"]):?>
                                    <?php if($do): ?>     
                                        <td>
                                            <?= $de["Codigo"]?>
                                        </td>
                                        <td>
                                            <?= $de["idSeccion"]?>
                                        </td>
                                        <?php if($de["Habilitar"] == 1):?>
                                        <td>
                                            <a href="php/creacionAS.php?Seccion=<?= $de["idSeccion"]?>&Habilitar=false" class="btn btn-primary" data-original-title="Deshabilitar" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-eye"></i></a>
                                        </td>
                                        <?php else:?>
                                        <td>
                                            <a href="php/creacionAS.php?Seccion=<?= $de["idSeccion"]?>&Habilitar=true" class="btn btn-primary" data-original-title="Habilitar" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-eye-slash"></i></a>
                                        </td>
                                        <?php endif;?>
                                    </tr>
                                    <?php $do=false; else: ?>
                                    <tr>
                                        <td>
                                            <?= $de["Codigo"]?>
                                        </td>
                                        <td>
                                            <?= $de["idSeccion"]?>
                                        </td>
                                        <?php if($de["Habilitar"] == 1):?>
                                        <td>
                                            <a href="php/creacionAS.php?Seccion=<?= $de["idSeccion"]?>&Habilitar=false" class="btn btn-primary" data-original-title="Deshabilitar" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-eye"></i></a>
                                        </td>
                                        <?php else:?>
                                        <td>
                                            <a href="php/creacionAS.php?Seccion=<?= $de["idSeccion"]?>&Habilitar=true" class="btn btn-primary" data-original-title="Habilitar" data-toggle="tooltip" data-placement="top" title=""><i class="fa fa-eye-slash"></i></a>
                                        </td>
                                        <?php endif;?>
                                    </tr>
                                    <?php endif;
                                          endif;
                                          endforeach;  
                                          else: ?>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php $tp = $tp +1; endforeach; endif; ?>
                                </table>
                            </div>
                        </div> 
                        
                    </div>
                        <!--boton activador del modal-->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Crear asignatura</button>
                        
                        <!-- Modal -->
                    <div id="myModal1" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Crear Asignatura</h4>
                            </div>
                            <div class="modal-body">
                            <!-- Inicio Formulario-->     
                            <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="well well-lg">
                                <div class="text-center">
                                    <br/>
                                    <h2><ins>Creacion de Seccion</ins></h2>
                                </div>
                                <div class="row">
                                    <form action="php/creacionAS.php" method="POST" id="formulario" autocomplete="off">
                                        <fieldset> 
                                        <div class="col-xs-12">
                                            <br/>
                                            <br/>
                                            <label>Nombre Asignatura:</label>
                                            <input class="form-control" type="text" name="nombre" value="" placeholder="Ingrese aquí el nombre"/>
                                            <br/>
                                        </div>
                                        <div class="col-xs-12">

                                            <label>Codigo de la Seccion o Curso:</label>
                                            <input class="form-control" type="text" name="codigo" value="" placeholder="Ingrese aquí el nombre"/>
                                            <br/>
                                        </div>                             
                                        </fieldset>
                                        <div class="clearfix visible-xs"></div>

                                        <div class="clearfix visible-xs"></div>

                                        <div class="modal-footer">
                                        <button type="submit" style="float: right;" class="btn btn-success">Guardar Sección</button>
                                        <button type="button" style="float: left;" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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
                </div>
            </div>
          </div>
        </div>
        
        
        
    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
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
                'nombre': {
                    required: true,
                    maxlength: 20,
                    lettersonly: true
                },
                'codigo': {
                    required: true,
                    maxlength: 10,
                    number: true
                }
            },
           messages: {
               'nombre': {
                    required: "Ingrese un nombre.",
                    maxlength: "A superado el numero de caracter.."
                },
                'codigo': {
                    required: "Ingrese un codigo.",
                    maxlength: "A superado el numero de caracter..",
                    number: "Se permite numero..."
                }
            }
        });
        
        jQuery.validator.addMethod("lettersonly", function(value, element) {
          return this.optional(element) || /^[a-z ]+$/i.test(value);
        }, "Solamente letras, sin acento."); 
    </script>
    
    <script>
    $('#myLink').addClass('disabled');
    </script>
    
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    
    <script>
         $('[data-toggle="tooltip"]').tooltip();
    </script>
</body>

</html>