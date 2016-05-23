<?php session_start(); 
  if(!isset($_SESSION["docente"]))
      { 
        if(isset($_SESSION["alumno"]))
        {
          header("location: ../pages/indexAlumno.php");
          die();
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
    <link rel="shortcut icon" type="image/png" href="img/icon.png"/>
    <title>Nueva Cuenta</title>

    <!-- Bootstrap Core CSS -->
    <link href="../component/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../component/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../component/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand hidden-xs hidden-sm" style="margin-left: 10px" href="#"><img src="img/logo.PNG" alt="" height="100" width="200"/></a>
                    <a class="navbar-brand hidden-md hidden-lg" style="margin-left: 10px" href="#"><img src="img/logo.PNG" alt="" height="90" width="160"/></a>
                </div>
            </div>
    </nav>
    <?php  if(isset($_GET["error1"])): if($_GET["error1"]==4):?>
        <div class="alert alert-danger">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> el usuario existe y fue actualizado.</p>
        </div>
    <?php endif; endif;?>
    <?php  if(isset($_GET["error1"])): if($_GET["error1"]==20):?>
        <div class="alert alert-danger">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> el codigo de invitacion es erronea.</p>
        </div>
    <?php endif; endif;?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                        <div class="login-panel panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Crear cuenta</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST" id="formulario" action="php/UsuarioAction.php?user=2&action=2" autocomplete="off">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Codigo de Invitacion" name="codigo" type="text" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Nombre" name="nombre" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="E-mail" name="email1" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Password" id="confiPassword" name="password" type="password" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Confirma password" name="confiPassword" type="password" autofocus required>
                                        </div>

                                        <!-- Change this to a button or input when using this as a form -->
                                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Crear">
                                        <input type="button" class="btn btn-lg btn-success btn-block" value="Atras" onclick=" window.location='../pages/inicio.php'  ">
                                        </fieldset>
                                </form>
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
                'codigo': {
                    required: true,
                    maxlength: 15
                },
                'nombre': {
                    required: true,
                    maxlength: 15,
                    lettersonly: true
                },
                'email1': {
                    required: true,
                    emailnew: true,
                    email: false
                },
                'password': {
                    required: true,
                    maxlength: 15
                },
                'confiPassword': {
                    required: true,
                    maxlength: 20,
                    equalTo: "#confiPassword"
                }
            },
           messages: {
               'codigo': {
                    required: "Ingrese un codigo de creación.",
                    maxlength: "A superado el numero de caracter.."
                },
               'nombre': {
                    required: "Ingrese un nombre.",
                    maxlength: "A superado el numero de caracter.."
                },
                'email1': {
                    required: "Ingrese un email.",
                },
                'password': {
                    required: "Ingrese una password.",
                    maxlength: "A superado el numero de caracter.."
                },             
                'confiPassword': {
                    required: "Vuelva a ingresar la password.",
                    maxlength: "A superado el numero de caracter..",
                    equalTo: "No coincide con la password."
                }
            }
        });
        
        jQuery.validator.addMethod("emailnew", function(value, element) {
          return this.optional(element) || /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(value);
        }, "Debe cumplir el formato de un email. Ej: user@dominio.com");
        
        jQuery.validator.addMethod("lettersonly", function(value, element) {
          return this.optional(element) || /^[a-z ]+$/i.test(value);
        }, "Solamente letras, sin acento."); 
    </script>

</body>

</html>
