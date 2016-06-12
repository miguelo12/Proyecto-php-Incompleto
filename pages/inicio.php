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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="img/icon.png"/>
    
    <title>Heuristica Movil</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="../component/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <div id="cargando">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="center-block text-center">
                        <div class="cssload-container">
                            <div class="cssload-arc">
                                <div class="cssload-arc-cube"></div>
                            </div>
                            <div id="fountainTextG" style="margin-top: 140px; margin-left: 60px"><div id="fountainTextG_1" class="fountainTextG">c</div><div id="fountainTextG_2" class="fountainTextG">a</div><div id="fountainTextG_3" class="fountainTextG">r</div><div id="fountainTextG_4" class="fountainTextG">g</div><div id="fountainTextG_5" class="fountainTextG">a</div><div id="fountainTextG_6" class="fountainTextG">n</div><div id="fountainTextG_7" class="fountainTextG">d</div><div id="fountainTextG_8" class="fountainTextG">o</div><div id="fountainTextG_9" class="fountainTextG">.</div><div id="fountainTextG_10" class="fountainTextG">.</div><div id="fountainTextG_11" class="fountainTextG">.</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="listo" style="display: none;">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" style="margin-left: 10px" href="#"><img src="img/logo.PNG" class="imagelogo" alt="" height="100" width="200"/></a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div id="warnning">
                    <a class="btn" id="help1" data-placement="right" title="Nueva actualización 29/05/2016:">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-exclamation-triangle shake text-danger"></i>
                        </span>
                    </a>
                    <div id="popover_content_wrapper" style="display: none">
                      <div>
                            <ul>
                                <li style="font-size: 16px">Publicar una unidad de aprendizaje:<span style="color: green;">Habilitado</span></li>
                                <li style="font-size: 16px">Evaluar o revisar, accesible:<span style="color: green;">Habilitado</span></li>
                                <li style="font-size: 16px">Nuevo modelo, tanto para docente como alumno:<span style="color: green;">Habilitado</span></li>
                                <li style="font-size: 16px">Nuevo aviso al crear una unidad sin seleccionar una rubrica:<span style="color: green;">Habilitado</span></li>
                                <li style="font-size: 16px">Nuevos iconos, temas responsive, nuevo header, inicio alumno cambiado.</li>
                                <li style="font-size: 16px">Se corrigieron errores de la pagina, entre otras cosas.</li>
                            </ul>
                      </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row" id="paso1">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <!-- Botones donde se dirige -->
                            <br/>
                            <div class="row">
                                <div class="center-block repo">
                                   <a class="btn" id="profe"><img src="img/docente.png" class="img-thumbnail img-circle hidden-xs" height="180" width="180" alt=""/><img src="img/docente.png" class="img-thumbnail img-circle hidden-sm hidden-md hidden-lg" height="120" width="120" alt=""/></a>
                                </div>
                            </div>
                            <p class="text-center lead">Profesor</p>
                        </div>
                        <div class="col-xs-6 col-sm-6  col-md-6 col-lg-6">
                            <!-- Botones donde se dirige -->
                            <br/>
                            <div class="row">
                                <div class="center-block repo">
                                    <a class="btn" id="alu"><img src="img/alumno.png" class="img-thumbnail img-circle hidden-xs" height="180" width="180" alt=""/><img src="img/alumno.png" class="img-thumbnail img-circle hidden-sm hidden-md hidden-lg" height="120" width="120" alt=""/></a>
                                </div>
                            </div>
                            <p class="text-center lead">Alumno</p>
                        </div>
                    </div>
                    <div class="row" id="paso2">
                        <div class="hidden-xs hidden-sm col-md-5 col-lg-5">
                            <!-- Botones donde se dirige -->
                            <br/>
                            <div class="row">
                                <div class="center-block" style="width:190px; height: 190px">
                                  <a><img src="img/docente.png" id="profe" class="img-thumbnail img-circle" height="180" width="180" alt=""/></a>
                                </div>
                            </div>
                            <p class="text-center lead">Profesor</p>
                        </div>
                        <div class="col-xs-12 col-sm-12  col-md-7 col-lg-7">
                            <!-- Botones donde se dirige -->
                            <form role="form" method="POST" action="php/loginDocente.php">
                                    <fieldset>
                                    <legend><h1>Acceso Docente:</h1></legend>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                                            </span>
                                            <input class="form-control" placeholder="E-mail" name="email" id="email" type="email" autofocus>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-key fa-fw" aria-hidden="true"></i>
                                            </span>
                                            <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
                                        </div>                               
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>

                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block"><i class="fa fa-sign-in fa-1x fa-fw" aria-hidden="true"></i> Ingresar</button>
                                    <button type="button" class="btn btn-lg btn-success btn-block opened"><i class="fa fa-arrow-left fa-1x fa-fw" aria-hidden="true"></i> Atras</button>
                                    </fieldset>

                                    <?php	
                                    if(isset($_GET['error'])){
                                        if($_GET['error']=="error"){
                                            echo "<div class='alert alert-warning'>";
                                            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                            echo "<strong>Error, </strong> ingrese nuevamente su correo y su contraseña.";
                                            echo "</div>"; 
                                        }
                                    }
                                    ?>
                            </form>
                        </div>
                    </div>
                    <div class="row" id="paso3">
                        <div class="hidden-xs hidden-sm col-md-5 col-lg-5">
                            <!-- Botones donde se dirige -->
                            <br/>
                            <div class="row">
                                <div class="center-block" style="width:190px; height: 190px">
                                   <a class="center-block"><img src="img/alumno.png" id="alu" class="img-thumbnail img-circle" height="180" width="180" alt=""/></a>
                                </div>
                            </div>
                            <p class="text-center lead">Alumno</p>
                        </div>
                        <div class="col-xs-12 col-sm-12  col-md-7 col-lg-7">
                            <!-- Botones donde se dirige -->
                            <form role="form" method="POST" action="php/loginAlumno.php">
                                <fieldset>
                                    <legend><h1>Acceso Alumno:</h1></legend>
                                    <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                                        </span>
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-key fa-fw" aria-hidden="true"></i>
                                        </span>
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                        </div> 
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>

                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block"><i class="fa fa-sign-in fa-1x fa-fw" aria-hidden="true"></i> Ingresar</button>
                                    <button type="button" id="crear" class="btn btn-lg btn-success btn-block"><i class="fa fa-user-plus fa-1x fa-fw" aria-hidden="true"></i> Crear Cuenta</button>
                                    <button type="button" class="btn btn-lg btn-success btn-block opened"><i class="fa fa-arrow-left fa-1x fa-fw" aria-hidden="true"></i> Atras</button>
                                    </fieldset>
                                    <br/>
                                    <?php	
                                    if(isset($_GET['error1'])){
                                        if($_GET['error1']=="error"){
                                            echo "<div class='alert alert-warning'>";
                                            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                            echo "<strong>Error, </strong> ingrese nuevamente su correo y su contraseña.";
                                            echo "</div>"; 
                                        }
                                    }
                                    ?>

                                    <?php	
                                    if(isset($_GET['exito1'])){
                                        if($_GET['exito1']==1){
                                            echo "<div class='alert alert-success'>";
                                            echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                            echo "Se ha podido <strong>Actualizar</strong> el alumno, ahora ingrese.";
                                            echo "</div>"; 
                                        }
                                    }
                                    ?>
                            </form>
                        </div>
                    </div>
                    <div class="row" id="paso4">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">                      
                            <form role="form" method="POST" id="formulario" action="php/UsuarioAction.php?user=2&action=2" autocomplete="off">
                                <fieldset>
                                    <legend><h1>Crear Alumno:</h1></legend>
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
                                    <?php  if(isset($_GET["error1"])): if($_GET["error1"]==1):?>
                                        <div class="alert alert-danger">
                                           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                           <p class="text-center"><strong>Error, </strong> el usuario existe y fue actualizado.</p>
                                        </div>
                                    <?php endif; endif;?>
                                     <?php  if(isset($_GET["error2"])): if($_GET["error2"]==2):?>
                                        <div class="alert alert-danger">
                                           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                           <p class="text-center"><strong>Error, </strong> el codigo de invitacion es erronea.</p>
                                        </div>
                                    <?php endif; endif;?>

                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block"><i class="fa fa-user-plus fa-1x fa-fw" aria-hidden="true"></i> Crear</button>
                                    <button type="button" class="btn btn-lg btn-success btn-block opened"><i class="fa fa-arrow-left fa-1x fa-fw" aria-hidden="true"></i> Atras</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
            <br/>
            <br/>
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
    
    <script>
    $().ready(function(){
        <?php if(isset($_GET['error'])):?>
        $("#paso1").hide();
        $("#paso2").show();
        $("#paso3").hide();
        $("#paso4").hide();
        $("#warnning").hide();
        <?php elseif(isset($_GET['error1']) || isset($_GET['exito1'])):?>
        $("#paso1").hide();
        $("#paso2").hide();
        $("#paso3").show();
        $("#paso4").hide();
        $("#warnning").hide();
        <?php elseif(isset($_GET['error2']) || isset($_GET['exito2'])):?>
        $("#paso1").hide();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").show();
        $("#warnning").hide();
        <?php else:?>
        $("#paso1").show();
        $("#paso2").hide();
        $("#paso3").hide();
        $("#paso4").hide();
        $("#warnning").show();
        <?php endif;?>
        $("#profe").click(function(){
            $("#paso2").fadeIn("fast");
            $("#paso1").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#warnning").hide();
        });
        $("#alu").click(function(){
            $("#paso3").fadeIn("fast");
            $("#paso4").hide(); 
            $("#paso2").hide();
            $("#paso1").hide();
            $("#warnning").hide();
        });
        $("#crear").click(function(){
            $("#paso4").fadeIn("fast");
            $("#paso3").hide();
            $("#paso2").hide();
            $("#paso1").hide();
            $("#warnning").hide();
        });
        $(".opened").click(function(){
            $("#paso1").fadeIn("fast");
            $("#paso2").hide();
            $("#paso3").hide();
            $("#paso4").hide();
            $("#warnning").show();
        });
    });
    </script>
    <script>
    $(document).ready(function(){
      $('#help1').popover({ 
        html : true,
        content: function() {
          return $('#popover_content_wrapper').html();
        }
      });
    });
    </script>
    
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
    
    <script>
    $(window).load(function (){
    // Una vez se cargue al completo la página desaparecerá el div "cargando"
    $('#cargando').delay(1200).fadeOut(200);
    $('#listo').delay(1600).fadeIn(400);
    });
    </script>
</body>

</html>

