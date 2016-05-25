<?php session_start(); 
  error_reporting(0);
  ob_start();
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
       if(isset($_SESSION["publicar"])){
       $docente = $_SESSION["docente"];
       
       include_once '../pages/php/CRUD/Asignatura.php';
       include_once '../pages/php/CRUD/UnidadAprendizaje.php';
       $resultunidad = new UnidadAprendizaje();
       $asignatura = new Asignatura();
       
       $resultunidad->setDocente_idDocente($docente["id"]);
       $Unidadresult = $resultunidad->DevolverUnidadDocente();
        
       $asignatura->setDocente_idDocente($docente["id"]);
       $arrayAsignatura = $asignatura->DevolverAsignaturasDocente();  
       
       }
       else{
        header("location: Biblioteca.php");
        die();
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
    <title>Publicar</title>

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
    
    <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    
    <link href="css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
    
    <link href="css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="../component/jquery/dist/jquery.min.js"></script>
    
    <script src="../js/jquery.maskedinput.min.js" type="text/javascript"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../component/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <script src="../js/jquery.validate.min.js"></script>
    
    <script src="../js/jquery-ui.min.js" type="text/javascript"></script>
    
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    
            
    <script>
      $(document).ready(function() {
          $('#btn').click(function() {
            $("#fechainicio").focus();
        });
          $('#btn1').click(function() {
            $("#fechatermino").focus();
        });
      });
      
      $(function() {
        $( "#fechainicio" ).datepicker({gotoCurrent: true, currentText: "Now",altField: "#fechainicio",
            onSelect: function( selectedDate ) {
            $( "#fechatermino" ).datepicker( "option", "minDate", selectedDate );},
            beforeShow: function(input, inst)
            {
                inst.dpDiv.css({marginLeft: input.offsetWidth-200  + 'px'});
            }
      });
        $( "#fechatermino" ).datepicker({defaultDate: "+7",altField: "#fechatermino",
            onSelect: function( selectedDate ) {
            $( "#fechainicio" ).datepicker( "option", "maxDate", selectedDate );},
            beforeShow: function(input, inst)
            {
                inst.dpDiv.css({marginLeft: input.offsetWidth-200 + 'px'});
            }
      });
      });
      
      $(function() {
        $("#fechainicio").keypress(function(event) {event.preventDefault();});
        $("#fechatermino").keypress(function(event) {event.preventDefault();});
      });
      
      $.datepicker.setDefaults({
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        firstDay: 1,
        maxDate: "+1m +7d",
        minDate: "0",
        constrainInput: false,
        dateFormat:"dd/mm/yy",
        showOptions: { direction: "down" }
      });
    </script>
    
            
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
                    'fechainicio': {
                        required: true
                    },
                    'fechatermino': {
                        required: true
                    },
                    'asignatura': {
                        valueNotEquals: "-1"
                    }
                },
               messages: {
                   'fechainicio': {
                        required: "Esta en blanco."
                    },
                    'fechatermino': {
                        required: "Esta en blanco."
                    },
                    'asignatura':{
                        valueNotEquals: "Selecciona una asignatura."
                    }
                }
            });
            
            jQuery.validator.addMethod("valueNotEquals", function(value, element, arg){
              return arg !== value;
            }, "Value must not equal arg.");
            
        </script>
        
        <script>
        $('select#asignatura').on('change',function(){
            var valor = $(this).val();
            if(valor !== "-1"){
            var parametros = {"id" : valor};
            $.ajax({
                data:  parametros,
                url:   'php/publicar.php?buscar=1',
                type:  'post',
                dataType: 'json',
                cache: false,
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html("");
                        $("select#seccion option").remove(); // Remove all <option> child tags.
                        $.each(response, function(index, item) { // Iterates through a collection
                            $("select#seccion").append( // Append an object to the inside of the select box
                                $("<option></option>") // Yes you can do this.
                                    .text(item.Codigo)
                                    .val(item.idSeccion)
                            );
                        });
                }
            });
            
            $('select#seccion').prop( "disabled", false );
            }
            else{
            $('select#seccion').prop( "disabled", true );
            $("select#seccion option").remove(); // Remove all <option> child tags.
            $("select#seccion").append( // Append an object to the inside of the select box
                $("<option></option>") // Yes you can do this.
                    .text("Elige una asignatura")
            );
            }
        });
        </script>
        
        <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
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
                <a class="navbar-brand hidden-xs hidden-sm" style="margin-left: 10px" href="indexDocente.php"><img src="img/logo.PNG" alt="" height="100" width="200"/></a>
                <a class="navbar-brand hidden-md hidden-lg" style="margin-left: 10px" href="indexDocente.php"><img src="img/logo.PNG" alt="" height="90" width="150"/></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right hidden-xs" style="margin-top: 80px; margin-right: 0px">
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
              <h1 class="navbar-text navbar-right" style="margin-top: 50px; margin-right: 80px">Crear Actividad</h1>
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
                    <li class="active"><a href="#">Ir a biblioteca</a></li>
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
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        
        <?php  if(isset($_GET["error"])): if($_GET["error"]==100):?>
        <div class="alert alert-danger">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> no corresponde a una fecha correcta.</p>
        </div>
        <?php endif; endif;?>

        <div id="page-content-wrapper content" >
          <div class="container separate-rows tall-rows">
            <div class="row">
                <div class="col-xs-12">
                    <div>
                    <div class="row">
                        <form method="post" action="php/publicar.php?crear=1" autocomplete="off" id="formulario">
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 text-center">
                        <fieldset>
                           <legend><p>PrePublicación:</p></legend>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        Fecha Inicio: &nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                    <input class="form-control text-center" placeholder="Selecciona una fecha" name="fechainicio" id="fechainicio" type="text">
                                    <span class="input-group-addon" id="btn" style="cursor:pointer;">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        Fecha Termino:
                                    </span>
                                    <input class="form-control text-center" placeholder="Selecciona una fecha" name="fechatermino" id="fechatermino" type="text">
                                    <span class="input-group-addon" id="btn1" style="cursor:pointer;">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                           <div class="alert alert-info" role="alert"><p>Si la fecha de inicio y la fecha de termino son iguales pasando el dia, se cerrara o mediante autorizacion suya.</p></div>
                           
                        </fieldset>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <div class="hidden-sm hidden-xs">
                                <br/>
                                <br/>
                            </div>
                            <table class="table table-condensed table-striped table-bordered">
                                <tr>
                                    <td style="width: 50%" class="text-center">
                                        <span class="text-primary">Unidad de aprendizaje:</span>
                                    </td>
                                    <td style="width: 50%" class="text-center">
                                        <span class="text-success"><?= $_SESSION["publicar"]["nombre"] ?></span>
                                    </td>
                                </tr>
                                <th class="text-center">
                                    Asignatura
                                </th>
                                <th class="text-center">
                                    Seccion
                                </th>
                                <tr>
                                    <td class="text-center">
                                        <select class="form-control" name="asignatura" id="asignatura">
                                            <option value="-1">Elige alguna opción</option>
                                            <?php if(isset($arrayAsignatura)):?>
                                            <?php foreach ($arrayAsignatura as $du):?>
                                            <option value="<?= $du["idAsignatura"]?>"><?= $du["Nombre"]?></option>
                                            <?php endforeach;?>
                                            <?php endif;?>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <select class="form-control" name="seccion" id="seccion" disabled="true">
                                            <option>Elige una asignatura</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <p class="text-center" id="resultado"></p>
                        </div>
                        <div class="col-xs-12 hidden-xs hidden-sm">
                            <br/>
                            <br/>
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Crear Actividad">   
                        </div>
                        <div class="col-xs-12 hidden-lg hidden-md">
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Crear Actividad">   
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                <br/>
            </div>
        </div>
        </div>
        
        <br/>
        <br/>

</body>
</html>
