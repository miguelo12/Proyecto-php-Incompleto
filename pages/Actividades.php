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
       if(isset($_SESSION["Actividad"]))
       {
            $actividad = $_SESSION["Actividad"];        
       }
       else{
          if(isset($_GET["idActividad"])){
            $actividad = $_GET["idActividad"];
            $_SESSION["Actividad"] = $actividad;
          }
          else{
          header('Location:' . getenv('HTTP_REFERER'));
          die();
          }
       }
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
    <title>Biblioteca</title>

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
    
        <!-- jQuery -->
    <script src="../component/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../component/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

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
                <a class="navbar-brand" style="margin-left: 10px" href="indexDocente.php"><img src="img/logo.PNG" class="imagelogo" alt="" height="100" width="200"/></a>
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
              <h1 class="navbar-text navbar-right" style="margin-top: 50px; margin-right: 80px">Actividad</h1>  
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
        
        <?php if(isset($_GET["creado"])):
                if($_GET["creado"]=="1"):?>
                    <div class="alert alert-success text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong >Listo, </strong> se ha creado una unidad de aprendizaje.
                    </div>
        <?php endif; endif; ?>
        <div id="page-content-wrapper content" >
          <div class="container separate-rows tall-rows">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 text-center">
                    <fieldset class="form-horizontal">
                        <legend><p>Información:</p></legend>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Pin Actividad</label>
                          <div class="col-sm-8">
                            <p class="form-control-static"><?= $actividad["id"]?></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Unidad de Aprendizaje</label>
                          <div class="col-sm-8">
                              <p class="form-control-static"><?= $actividad["Unidad"]?></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Fecha Inicio</label>
                          <div class="col-sm-8">
                              <p class="form-control-static"><?= $actividad["FechaInicio"]?></p>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Fecha Termino</label>
                          <div class="col-sm-8">
                              <p class="form-control-static"><?= $actividad["FechaTermino"]?></p>
                          </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="hidden-sm hidden-xs">
                        <br/>
                        <br/>
                    </div>
                    <table class="table table-condensed table-striped table-bordered">
                        <th class="text-center">
                            Asignatura
                        </th>
                        <th class="text-center">
                            Seccion
                        </th>
                        <tr>
                            <td class="text-center">
                                <?= $actividad["Asignatura"]?>
                            </td>
                            <td class="text-center">
                                <?= $actividad["CodigoSeccion"]?>
                            </td>
                        </tr>
                    </table>
                    <br/>
                    
                    <fieldset id="resultado" class="text-center">
                    <table id="add-table" class="table table-condensed table-striped table-bordered">
                        <th class="text-center" style="width: 40%">
                            Nombre
                        </th>
                        <th class="text-center" style="width: 60%">
                            Correo Electronico
                        </th>
                        <tr>
                            <td class="text-center">
                               
                            </td>
                            <td class="text-center">
                                
                            </td>
                        </tr>
                    </table>
                    </fieldset>
                    
                    <fieldset id="resultado1" class="text-center">
                        <label class="control-label" for="cargar"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i>
                        <span class="sr-only">Espere esta cargando...</span>
                        <br/><br/>
                        <p>&nbsp;Cargando...</p></label>
                    </fieldset>
                </div>
            </div>
        </div>
        </div>
        <br/>
        <br/>
     
    
    <script>
    $().ready(function(){
        $("#resultado").hide();
        $("#resultado1").show();
    });
    </script>    
        
    <script>
    setInterval(function() {
            $.ajax({
                url:   'php/actividades.php?accion=7',
                type:  'post',
                dataType: 'json',
                cache: false,
                beforeSend: function () {
                        $("#resultado").hide();
                        $("#resultado1").show();
                },
                success:  function (response) {
                        $("#resultado1").hide();
                        $("#resultado").show();
                        
                        // 1. remove all existing rows
                        $("#add-table tr:has(td)").remove();
                        
                        if(response!==null){
                        $.each(response, function(i, item) {
                        var $tr = $('<tr>').append(
                                $('<td>').text(item.nombre),
                                $('<td>').text(item.email)
                            ).appendTo('#add-table');
                        });
                        }                          
                }
            });
    }, 8000); //5 seconds  
    </script>
    
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
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