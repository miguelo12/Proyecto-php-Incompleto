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
                <li class="active"><a href="indexAdmin.php">Inicio</a></li>
                <li><a href="#">Administrar</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right hidden-xs">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="indexDocente.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;Cambiar a Docente</a></li>
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
                        Menu Administrador
                    </a>
                </li>
                <li> 
                    <a href="indexAdmin.php">Inicio</a>
                </li>
                <li class="active"> 
                    <a href="#">Administrar Cuentas</a>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a href="indexDocente.php"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;Cambiar a Docente</a></li>
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
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php //Agregar for... ?>
                            <div>
                                <table class="table table-bordered text-center" style=" margin: 0 auto;">
                                    <caption><h2 class="text-center"><ins>Cuentas Docentes</ins></h2></caption>
                                    <tr>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Habilitar/Desahibiltar</th>
                                        <th class="text-center">Actualizar</th>
                                    </tr>
                                    
                                    <?php foreach($docentetodos as $do):
                                    if(!($do["idDocente"]==$docente["id"])):
                                        if($do["habilitado"]==1):?>
                                    <tr>
                                            <td><?= $do["nombre"] ?></td> 
                                            <td><?= $do["email"]?></td> 
                                            <td><a class="btn btn" href="php/UsuarioAction.php?user=1&action=2&id=<?=$do["idDocente"]?>">Deshabilitar</a></td>
                                            <td><a class="btn btn" href="php/UsuarioAction.php?user=1&action=3&id=<?=$do["idDocente"]?>">Actualizar</a></td>
                                            </tr>
                                        <?php else: ?>
                                            <tr>
                                            <td><?=$do["nombre"]?></td>
                                            <td><?=$do["email"]?></td>
                                            <td><a class="btn btn" href="php/UsuarioAction.php?user=1&action=2&id=<?=$do["idDocente"]?>">Habilitar</a></td>
                                            <td><a class="btn btn" id="myLink" href="php/UsuarioAction.php?user=1&action=3&id=<?=$do["idDocente"]?>">Actualizar</a></td>
                                            </tr>
                                        <?php endif; endif; endforeach;?>
                                </table>
                            </div>
                        </div> 
                        
                    </div>
                        <!--boton activador del modal-->
                        <br/>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Crear nueva cuenta</button>
                        
                        <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                                    <form action="php/UsuarioAction.php?user=1&action=1" method="POST" id="formulario" autocomplete="off">
                                        <fieldset> 
                                        <div class="col-xs-12">
                                            <br/>
                                            <br/>
                                            <label>nombre</label>
                                            <input class="form-control" type="text" name="nombre1" value="" id="nombre1" placeholder="Ingrese aquí el nombre"/>
                                            <br/>
                                        </div>
                                        <div class="col-xs-12">

                                            <label>email</label>
                                            <input class="form-control" type="text" name="email2" value="" placeholder="Ingrese aquí el email"/>
                                            <br/>
                                        </div>                            
                                        <div class="col-xs-12">

                                            <label>password</label>
                                            <input class="form-control" type="password" name="password3" value="" placeholder="Ingrese aquí la contraseña"/>
                                            <br/>
                                        </div>                            
                                        <div class="col-xs-12">
                                            <fieldset>
                                            <label>Es administrador?</label>
                                            <br/>
                                            &nbsp;&nbsp;&nbsp;<label><input type="radio" name="admin4" id="si" value="1" class="radio-inline">Si</label>&nbsp;&nbsp;&nbsp;<b>o</b>&nbsp;&nbsp;
                                            <label><input type="radio" name="admin4" id="no" value="0" class="radio-inline" checked="">No</label>
                                            <br/>
                                            </fieldset>
                                            <br/>
                                        </div>
                                        </fieldset>
                                        <div class="clearfix visible-xs"></div>

                                        <div class="clearfix visible-xs"></div>

                                        <div class="modal-footer">
                                        <button type="submit" style="float: right;" class="btn btn-success">Ingresar Docente</button>
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
                'nombre1': {
                    required: true,
                    maxlength: 15,
                    lettersonly: true
                },
                'email2': {
                    required: true,
                    emailnew: true
                },
                'password3': {
                    required: true,
                    maxlength: 15
                }
//                'confirm_pass': {
//                    required: true,
//                    maxlength: 20,
//                    equalTo: "#pass"
//                }
            },
           messages: {
               'nombre1': {
                    required: "Ingrese un nombre.",
                    maxlength: "A superado el numero de caracter.."
                },
                'email2': {
                    required: "Ingrese un email.",
                },
                'password3': {
                    required: "Ingrese una password.",
                    maxlength: "A superado el numero de caracter.."
                }
                
//                'confirm_pass': {
//                    required: "Esta casilla se requiere.",
//                    maxlength: "A superado el numero de caracter..",
//                    equalTo: "No coincide con la password."
//                }
            }
        });
        
        jQuery.validator.addMethod("emailnew", function(value, element) {
          return this.optional(element) || /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(value);
        }, "Debe cumplir el formato de un email. Ej: user@dominio.com");
        
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
</body>
</html>