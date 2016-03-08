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

    <title>Inicio Docente</title>

    <!-- Bootstrap Core CSS -->
    <link href="../component/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../component/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../component/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../component/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/simple-sidebar.css" rel="stylesheet">
    
    <link href="css/tab.css" rel="stylesheet">
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
              <a class="navbar-brand" data-toggle="modal" data-target="#myModal1">Heuristica Movil</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a data-toggle="modal" data-target="#myModal1">Inicio</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a  href='#' data-toggle="modal" data-target="#myModal1">Crear una actividad</a></li>
                    <li><a href='#' data-toggle="modal" data-target="#myModal1">Ir a biblioteca</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Recuerda</li>
                    <li><a href='#' data-toggle="modal" data-target="#myModal1">Crear Asignatura o Sección</a></li>
                  </ul>
                </li>
                <li><a href="#contact">Contáctenos</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right hidden-xs">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                      <li><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-gear fa-fw"></i> Configuracion</a></li>
                    <?php if($docente["admin"]==1){
                    echo "<li><a href='#' data-toggle='modal' data-target='#myModal1'><i class='fa fa-gear fa-fw'></i> Cambiar a Administrador</a></li>";} ?>
                    <li role="separator" class="divider"></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-sign-out fa-fw"></i> Logout/Salir</a></li>
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
                      <a data-toggle="modal" data-target="#myModal1">Inicio</a>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#myModal1">Crear una actividad</a></li>
                    <li><a data-toggle="modal" data-target="#myModal1">Ir a biblioteca</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Recuerda</li>
                    <li><a data-toggle="modal" data-target="#myModal1">Crear Asignatura o Sección</a></li>
                  </ul>
                </li>
                <li> 
                      <a data-toggle="modal" data-target="#myModal1">Evaluar Proyectos</a>
                </li>
                <li> 
                      <a data-toggle="modal" data-target="#myModal1">Rúbrica</a>
                </li>
                <li> 
                      <a data-toggle="modal" data-target="#myModal1">Biblioteca</a>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                  <a href="#"class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#myModal1"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Configuración</a></li>
                    <?php if($docente["admin"]==1){
                    echo "<li><a data-toggle='modal' data-target='#myModal1'><i class='fa fa-gear fa-fw'></i>&nbsp;&nbsp;&nbsp;Cambiar a Administrador</a></li>";} ?>
                    <li role="separator" class="divider"></li>
                    <li><a data-toggle="modal" data-target="#myModal1"><i class="fa fa-sign-out fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout/Salir</a></li>
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
                            <div class="col-xs-12"> 
                            <section id="wizard">
                                <div class="page-header">
                                <h1>Crea tu unidad de aprendizaje</h1>
                                </div>
                                <div id="pills">
                                    <ul>
                                            <li><a href="#tabi1" data-toggle="tab">Agregar Archivos</a></li>
                                            <li><a href="#tabi2" data-toggle="tab">Verificar</a></li>
                                            <li><a href="#tabi3" data-toggle="tab">Agregar preguntas</a></li>
                                            <li><a href="#tabi4" data-toggle="tab">Ayudas</a></li>
                                            <li><a href="#tabi5" data-toggle="tab">Editar Autoevaluación</a></li>
                                            <li><a href="#tabi6" data-toggle="tab">Editar Coevaluación</a></li>
                                            <li><a href="#tabi7" data-toggle="tab">Finalizar</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane well" id="tabi1">
                                            <br/>
                                            <br/>
                                              <div id="rootwizard">        
                                                <!--navbar starts -->
                                                <div class="navbar">
                                                        <div class="navbar-inner">
                                                            <div class="row">
                                                                <ul class="nav nav-pills">
                                                                    <li class="col-xs-2 col-xs-push-2"><a href="#tab1" data-toggle="tab" style="text-align: center"><img src="img/text.png" width="64" height="64" alt="Text"/><br/>Texto</a></li>
                                                                    <li class="col-xs-2 col-xs-push-2"><a href="#tab2" data-toggle="tab" style="text-align: center"><img src="img/word.png" width="64" height="64" alt="word"/><br/>Word</a></li>
                                                                    <li class="col-xs-2 col-xs-push-2"><a href="#tab3" data-toggle="tab" style="text-align: center"><img src="img/ppt.png" width="64" height="64" alt="ppt"/><br/>PowerPoint</a></li>
                                                                    <li class="col-xs-2 col-xs-push-2"><a href="#tab4" data-toggle="tab" style="text-align: center"><img src="img/camera.png" width="64" height="64" alt="camera"/><br/>Imagen</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                </div>
                                                <!--navbar ends -->

                                                <!-- form wizard content starts -->
                                                <div class="tab-content">
                                                        <!-- wizard step 1 starts-->
                                                        <div class="tab-pane" id="tab1">
                                                            <div class="form-group">
                                                                <form method="POST" name="myform1" action="php/upload.php?tipo=1" enctype="multipart/form-data" id="f1">
                                                                <input type="text" name="descripcion1" id="descripcion1" class="form-control" placeholder="Ingrese una Descripción.">
                                                                <input type="file" name="resume1" id="resume1"  style="visibility: hidden">
                                                                <label for="exampleInputFile">Sube tu archivo.</label>
                                                                <p id="archivo1" class="well"></p>
                                                                <p class="help-block">Solamente se aceptan .txt</p>
                                                                <button type="button" id="resume_link1" class="btn btn-default">Agregar Archivo</button>
                                                                <button type="submit" name="subirarchivo" class="btn btn-success" disabled="true">Subir Archivo</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- wizard step 1 ends-->					
                                                        <div class="tab-pane" id="tab2">
                                                            <div class="form-group">
                                                                <form method="POST" name="myform2" action="php/upload.php?tipo=2" enctype="multipart/form-data">
                                                                <input type="text" name="descripcion2" id="descripcion2" class="form-control" placeholder="Ingrese una Descripción.">
                                                                <input type="file" name="resume2" id="resume2"  style="visibility: hidden">
                                                                <label for="exampleInputFile">Sube tu archivo.</label>
                                                                <p id="archivo2" class="well"></p>
                                                                <p class="help-block">Solamente se aceptan .doc o .docx</p>
                                                                <button type="button" id="resume_link2" class="btn btn-default">Agregar Archivo</button>
                                                                <button type="submit" name="subirarchivo" class="btn btn-success" disabled="true">Subir Archivo</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab3">
                                                            <div class="form-group">
                                                                <form method="POST" name="myform3" action="php/upload.php?tipo=3" enctype="multipart/form-data">
                                                                <input type="text" name="descripcion3" id="descripcion3" class="form-control" placeholder="Ingrese una Descripción.">
                                                                <input type="file" name="resume3" id="resume3"  style="visibility: hidden">
                                                                <label for="exampleInputFile">Sube tu archivo.</label>
                                                                <p id="archivo3" class="well"></p>
                                                                <p class="help-block">Solamente se aceptan .powerpoint</p>
                                                                <button type="button" id="resume_link3" class="btn btn-default">Agregar Archivo</button>
                                                                <button type="submit" name="subirarchivo" class="btn btn-success" disabled="true">Subir Archivo</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab4">
                                                            <div class="form-group">
                                                                <form method="POST" name="myform4" action="php/upload.php?tipo=4" enctype="multipart/form-data">
                                                                <input type="text" name="descripcion4" id="descripcion4" class="form-control" placeholder="Ingrese una Descripción.">
                                                                <input type="file" name="resume4" id="resume4"  style="visibility: hidden">
                                                                <label for="exampleInputFile">Sube tu archivo.</label>
                                                                <p id="archivo4" class="well"></p>
                                                                <p class="help-block">Solamente se aceptan .jpg o .png</p>
                                                                <button type="button" id="resume_link4" class="btn btn-default">Agregar Archivo</button>
                                                                <button type="submit" name="subirarchivo" class="btn btn-success" disabled="true">Subir Archivo</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                </div>	
                                            </div>
                                            <br/>
                                            <br/>
                                        </div>
                                        <div class="tab-pane well" id="tabi2">
                                            <form method="POST" action="">
                                            <br/>
                                            <label for="moreinput">Estos son tus archivos subidos.</label>
                                            <br/>
                                            <?php if(isset($_SESSION["recursosdidacticos"]))
                                                {
                                                  echo "<ul>";
                                                  $recursos = $_SESSION["recursosdidacticos"];
                                                  foreach($recursos as $do)
                                                  {
                                                     echo "<li><img alt='im' src='img/desconocido.png'/><br/>";
                                                     echo "[Nombre]: ".$do["nombre"]." [Descripción]: ".$do["descripcion"]."</li>";
                                                  }
                                                  echo "</ul>";
                                                }?>
                                            <br/>
                                            <br/>
                                            </form>
                                        </div>
                                        <div class="tab-pane well" id="tabi3"> 
                                            <table class="editinplace table table-hover">
                                                <tr>
                                                    <th colspan="3">Sugerencias de Preguntas de Investigación</th>
                                                </tr>
                                                <form method="POST" action="php/AvanceDidactico.php" autocomplete="off">
                                                <?php if(isset($_SESSION["preguntas"])):
                                                    $preg = $_SESSION["preguntas"];
                                                    foreach($preg as $de):?>
                                                <tr>
                                                    <td style="width: 90%">
                                                        <input class="form-control" type="text" value="<?= $de["pre"]?>" name="preguntas<?= $de["id"] ?>">
                                                    </td>
                                                    <td style="width: 5%">
                                                        <button class="btn btn-warning" type="submit" formaction="php/AvanceDidactico.php?pre=1&a=2&id=<?= $de["id"]?>">Editar</button>
                                                    </td>
                                                    <td style="width: 5%">
                                                        <button class="btn btn-danger" type="submit" formaction="php/AvanceDidactico.php?pre=1&a=3&id=<?= $de["id"]?>">Eliminar</button>
                                                    </td>
                                                </tr>
                                                <?php
                                                endforeach; endif;?>
                                                </form>
                                                <form method="POST" action="php/AvanceDidactico.php?pre=1&a=1" autocomplete="off">
                                                <tr>                                                 
                                                    <td colspan="3">
                                                            <input class="form-control" type="text" name="preguntas">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                            <button type="submit" class="btn btn-success" style="float:right;">Agregar Pregunta</button>
                                                            <p class="help-block">No agregue signo de interrogación.</p>
                                                    </td>
                                                </tr>
                                                </form>
                                            </table>
                                        </div>
                                        <div class="tab-pane well" id="tabi4">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th colspan="2" class="text-center">Ayuda(Recomendado)</th>
                                                </tr>
                                                <form method="POST" action="php/AvanceDidactico.php?pre=2" autocomplete="off">
                                                    <?php if(isset($_SESSION["Ayuda"])): 
                                                    $yo = $_SESSION["Ayuda"];?>
                                                    <?php endif;?>
                                                    <tr>
                                                        <td style="width: 15%;">
                                                            <p>Procedimiento</p>
                                                        </td>
                                                        <td style="width: 85%">
                                                            <input class="form-control" type="text" value="<?php if(isset($yo["procedimiento"])){echo $yo["procedimiento"];}?>" name="procedimiento">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 15%">
                                                            <p>Aplicaciones</p>
                                                        </td>
                                                        <td style="width: 85%">
                                                            <input class="form-control" type="text" value="<?php if(isset($yo["aplicaciones"])){echo $yo["aplicaciones"];}?>" name="aplicaciones">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 15%">
                                                            <p>Procesamiento</p>
                                                        </td>
                                                        <td style="width: 85%">
                                                            <input class="form-control" type="text" value="<?php if(isset($yo["procesamiento"])){echo $yo["procesamiento"];}?>" name="procesamiento">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10%">
                                                            <p>Lenguaje</p>
                                                        </td>
                                                        <td style="width: 90%">
                                                            <input class="form-control" type="text" value="<?php if(isset($yo["lenguaje"])){echo $yo["lenguaje"];}?>" name="lenguaje">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10%">
                                                            <p>Modelos</p>
                                                        </td>
                                                        <td style="width: 90%">
                                                            <input class="form-control" type="text" value="<?php if(isset($yo["modelos"])){echo $yo["modelos"];}?>" name="modelos">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10%">
                                                            <p>Conclusiones</p>
                                                        </td>
                                                        <td style="width: 90%">
                                                            <input class="form-control" type="text" value="<?php if(isset($yo["conclusiones"])){echo $yo["conclusiones"];}?>" name="conclusiones">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success" style="float:right;">Guardar</button>
                                                                <p class="help-block" style="float:right;">Al guardar se modificara.&nbsp;&nbsp;&nbsp;</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </form>
                                            </table>
                                        </div>
                                        <div class="tab-pane well" id="tabi5">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th class="text-center">Seleccionar:</th>
                                                    <th class="text-center">Criterios</th>
                                                    <th class="text-center">Nota</th>
                                                </tr>
                                                <form method="POST" action="php/AvanceDidactico.php?pre=3" autocomplete="off">
                                                    <tr>
                                                        <td style="width: 7%">
                                                            <input class="checkbox" type="checkbox" value="true" name="procedimiento">
                                                        </td>
                                                        <td style="width: 78%">
                                                            <p>Cumplí con mis compromisos.</p>
                                                        </td>
                                                        <td style="width: 15%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <label for="moreinput">Agregar Comentario</label>
                                                            <br/>
                                                            <textarea class="form-control" rows="2" name="procedimiento" disabled="true"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-danger" style="float:right;">Eliminar</button>&nbsp;&nbsp;&nbsp;
                                                                <button type="submit" class="btn btn-warning" style="float:right;">Editar</button>&nbsp;&nbsp;&nbsp;
                                                                <p class="help-block" style="float:right;">Selecciona cual quieres eliminar o editar.&nbsp;&nbsp;&nbsp;</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>                                                 
                                                        <th colspan="3" class="text-center">Crear Nuevos Criterios</th>
                                                    </tr>
                                                    <tr>                                                 
                                                        <td colspan="3">
                                                            <input class="form-control" type="text" name="preguntas">
                                                        </td>
                                                    </tr>
                                                    <tr>                                                 
                                                        <td colspan="3">
                                                            <div class="form-group">                                                             
                                                                <button type="submit" class="btn btn-success" style="float:right;">Agregar</button>&nbsp;&nbsp;&nbsp;
                                                                <p class="help-block" style="float:right;">Al guardar se modificara.&nbsp;&nbsp;&nbsp;</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </form>
                                            </table>
                                        </div>
                                        <div class="tab-pane well" id="tabi6">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th colspan="2" class="text-center">Criterios</th>
                                                    <th colspan="3" class="text-center">integrantes</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">Selecciona:</th>
                                                    <th class="text-center"></th>
                                                    <th class="text-center">1</th>
                                                    <th class="text-center">2</th>
                                                    <th class="text-center">3</th>
                                                </tr>
                                                <form method="POST" action="php/AvanceDidactico.php?pre=4" autocomplete="off">
                                                    <tr>
                                                        <td style="width: 7%">
                                                            <input class="checkbox" type="checkbox" value="1" name="1">
                                                        </td>
                                                        <td style="width: 72%">
                                                            <p>Cumplí con mis compromisos.</p>
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5">
                                                            <label for="moreinput">Agregar Comentario</label>
                                                            <br/>
                                                            <textarea class="form-control" rows="2" name="procedimiento" disabled="true"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-danger" style="float:right;">Eliminar</button>&nbsp;&nbsp;&nbsp;
                                                                <button type="submit" class="btn btn-warning" style="float:right;">Editar</button>&nbsp;&nbsp;&nbsp;
                                                                <p class="help-block" style="float:right;">Selecciona cual quieres eliminar o editar.&nbsp;&nbsp;&nbsp;</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>                                                 
                                                        <th colspan="5" class="text-center">Crear Nuevos Criterios</th>
                                                    </tr>
                                                    <tr>                                                 
                                                        <td colspan="5">
                                                            <input class="form-control" type="text" name="preguntas">
                                                        </td>
                                                    </tr>
                                                    <tr>                                                 
                                                        <td colspan="5">
                                                            <div class="form-group">                                                             
                                                                <button type="submit" class="btn btn-success" style="float:right;">Agregar</button>&nbsp;&nbsp;&nbsp;
                                                                <p class="help-block" style="float:right;">Al guardar se modificara.&nbsp;&nbsp;&nbsp;</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </form>
                                            </table>
                                        </div>
                                        <div class="tab-pane well" id="tabi7">
                                            <br/>
                                            <label for="moreinput">Datos generales a subir.</label>
                                            <br/>
                                            <br/>
                                        </div>
                                        
                                        <ul class="pager wizard">
                                                <li class="previous first" style="display:none;"><a href="#">First</a></li>
                                                <li class="previous"><a href="javascript:;">Previous</a></li>
                                                <li class="next last" style="display:none;"><a href="#">Last</a></li>
                                                <li class="next"><a href="javascript:;">Next</a></li>
                                                <li class="finish" style="float:right;"><a href="javascript:;">Finish</a></li>
                                        </ul>
                                    </div>
                                </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
        
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" autocomplete="off" action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Error</h4>
                </div>
                <div class="modal-body">
                    <p>Acaba de ingresar un archivo de extension erronea.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
    <!-- Modal -->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" autocomplete="off" action="php/creacionUnidad.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Esta saliendo de la pagina.</h4>
                </div>
                <div class="modal-body">
                    <p>Aun no ha terminado de crear la Unidad, Quiere salir ?, sera enviado a la pagina de inicio.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary" formaction="php/creacionUnidad.php?action=0">Si, seguro</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
    <!-- JavaScript -->
    <?php //Este es el orden siempre... ?>
    <script src="../component/jquery/dist/jquery.min.js"></script>
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/jquery.bootstrap.wizard.min.js"></script>


    <!-- Metis Menu Plugin JavaScript -->
    <script src="../component/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript CONFLICTO!-->
    <!--<script src="../component/morrisjs/morris.min.js"></script>-->
    <!--<script src="../js/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    
    <script>    
    $('#resume_link1').click(function( e ) {
        if ($('#descripcion1').val() == "") {
             $('#myModal').modal('show');           
        }
        else
        {
            e.preventDefault();
            $('#resume1').trigger('click');
        }
    });
    $('#resume1').on( 'change', function() {
       myfile= $( this ).val();
       var ext = myfile.split('.').pop();
       if(!(ext==="txt")){
           $('#myModal').modal('show');
       }
       else
       {
           document.getElementById("archivo1").innerHTML = myfile;
           document.myform1.subirarchivo.disabled=false;
       }
    });
    </script>
    
    <script>
    var myfile="";
    $('#resume_link2').click(function( e ) {
        if ($('#descripcion2').val() == "") {
             $('#myModal').modal('show');           
        }
        else
        {
            e.preventDefault();
            $('#resume2').trigger('click');
        }
    });
    $('#resume2').on( 'change', function() {
       myfile= $( this ).val();
       var ext = myfile.split('.').pop();
       if(!(ext==="docx" || ext==="doc")){
           $('#myModal').modal('show');
       }
       else
       {
           document.getElementById("archivo2").innerHTML = myfile;
           document.myform2.subirarchivo.disabled=false;
       }
    });
    </script>
    
    <script>
    var myfile="";
    $('#resume_link3').click(function( e ) {
        if ($('#descripcion3').val() == "") {
             $('#myModal').modal('show');           
        }
        else
        {
            e.preventDefault();
            $('#resume3').trigger('click');
        }
    });
    $('#resume3').on( 'change', function() {
       myfile= $( this ).val();
       var ext = myfile.split('.').pop();
       if(!(ext==="ppt" || ext==="pptx")){
           $('#myModal').modal('show');
       }
       else
       {
           document.getElementById("archivo3").innerHTML = myfile;
           document.myform3.subirarchivo.disabled=false;
       }
    });
    </script>
    
    <script>
    var myfile="";
    $('#resume_link4').click(function( e ) {
        if ($('#descripcion4').val() == "") {
             $('#myModal').modal('show');           
        }
        else
        {
            e.preventDefault();
            $('#resume4').trigger('click');
        }
    });
    $('#resume4').on( 'change', function() {
       myfile= $( this ).val();
       var ext = myfile.split('.').pop();
       if(!(ext==="png"|| ext==="jpg")){
           $('#myModal').modal('show');
       }
       else
       {
           document.getElementById("archivo4").innerHTML = myfile;
           document.myform4.subirarchivo.disabled=false;
       }
    });
    </script>
    
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
    
<script>
    $(document).ready(function() {
            $('#rootwizard').bootstrapWizard();
           
            $('#pills').bootstrapWizard({
                 //bloquear los tabs de arriba.
                onTabClick: function(tab, navigation, index) {return false;},
                'tabClass': 'nav nav-tabs'
            });
		window.prettyPrint && prettyPrint()
            //que hace el boton finish
            $('#pills .finish').click(function() {
		alert('Finished!, Starting over!');
	    });
            
            <?php if(isset($_GET["jump"]))
            {
             //permite mostrar que parte del tab cuando genere el post.
             $num = $_GET["jump"];
             echo "$('#pills').bootstrapWizard('show',{$num});";
            }
            ?>
    });
</script>

</body>

</html>
