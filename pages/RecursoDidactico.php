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
       
       if(isset($_SESSION["editar"])){
       $titu = $_SESSION["editar"];
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
    <title>Recursos Didacticos</title>

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
    
    <link href="css/tab.css" rel="stylesheet">
    
    <!-- JavaScript -->
    <?php //Este es el orden siempre... ?>
    <script src="../component/jquery/dist/jquery.min.js"></script>
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/jquery.bootstrap.wizard.min.js"></script>
    
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
                <?php if(isset($_SESSION["editar"])):?>
                    document.getElementById("finalformedit").submit();
                <?php else:?>
                <?php if(isset($_COOKIE["recursosdidacticos"])): ?>
                    document.getElementById("finalform").submit();
                <?php else: ?>
                    alert('No puedes terminar la unidad lea los requisitos.');
                <?php endif; ?>
                <?php endif;?>
                
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
                    echo "<li><a data-toggle='modal' data-target='#myModal1'><i class='fa fa-gear fa-fw'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cambiar a Administrador</a></li>";} ?>
                    <li role="separator" class="divider"></li>
                    <li><a data-toggle="modal" data-target="#myModal1"><i class="fa fa-sign-out fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout/Salir</a></li>
                  </ul>
                </li>
            </ul>
        </div>
        </nav>
        </div>
        
        <br/>
        <br/>
        <br/>

         <?php  if(isset($_GET["errorSubir"])): if($_GET["errorSubir"]==1):?>
        <div class="alert alert-danger">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> el archivo contiene el mismo nombre que el archivo subido o guardado.</p>
        </div>
        <?php endif; endif;?>
        <div id="page-content-wrapper" >
          <div class="container separate-rows tall-rows">
            <div class="row content">
                <div class="col-xs-12">
                    <div class="well well-lg">
                        <div class="row ">
                            <div class="col-xs-12"> 
                            <section id="wizard">
                                <div class="page-header">
                                <?php if(!isset($_SESSION["editar"])):?>
                                <h1 style="color: #476d97">Crea tu unidad de aprendizaje</h1>
                                <?php else:?>
                                <h1>Editar unidad de aprendizaje</h1>
                                <?php endif;?>
                                </div>
                                <div id="pills">
                                    <ul>
                                            <li><a href="#tabi1" data-toggle="tab">Agregar Archivos</a></li>
                                            <li><a href="#tabi2" data-toggle="tab">Verificar</a></li>
                                            <li><a href="#tabi3" data-toggle="tab">Agregar preguntas</a></li>
                                            <li><a href="#tabi4" data-toggle="tab">Ayudas</a></li>
                                            <li><a href="#tabi5" data-toggle="tab">Finalizar</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane well" style="background-color: #ffffff" id="tabi1">
                                            <br/>
                                            <br/>
                                              <div id="rootwizard">        
                                                <!--navbar starts -->
                                                <div class="navbar">
                                                        <div class="navbar-inner">
                                                            <div class="row">
                                                                <ul class="nav nav-pills">
                                                                    <li class="col-xs-1"></li>
                                                                    <li class="col-xs-2"><a href="#tab1" data-toggle="tab" style="text-align: center"><img src="img/text.png" width="64" height="64" alt="Text"/><br/>Texto</a></li>
                                                                    <li class="col-xs-2"><a href="#tab2" data-toggle="tab" style="text-align: center"><img src="img/word.png" width="64" height="64" alt="word"/><br/>Word</a></li>
                                                                    <li class="col-xs-2"><a href="#tab3" data-toggle="tab" style="text-align: center"><img src="img/pdf.png" width="64" height="64" alt="word"/><br/>PDF</a></li>
                                                                    <li class="col-xs-2"><a href="#tab4" data-toggle="tab" style="text-align: center"><img src="img/ppt.png" width="64" height="64" alt="ppt"/><br/>PowerPoint</a></li>
                                                                    <li class="col-xs-2"><a href="#tab5" data-toggle="tab" style="text-align: center"><img src="img/camera.png" width="64" height="64" alt="camera"/><br/>Imagen</a></li>
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
                                                                <form method="POST" name="myform1" action="php/upload.php?tipo=1" enctype="multipart/form-data" autocomplete="off">
                                                                <label for="descripcion1">Descripcion:</label>
                                                                <input type="text" id="descripcion1" name="descripcion1" id="descripcion1" class="form-control" placeholder="Ingrese una Descripción.">
                                                                <input type="file" name="resume1" id="resume1"  style="visibility: hidden">
                                                                <label for="exampleInputFile">Sube tu archivo.</label>
                                                                <p id="archivo1" class="well"></p>
                                                                <p class="help-block">Solamente se aceptan .txt</p>
                                                                <button type="button" id="resume_link1" class="btn btn-default">Agregar Archivo</button>
                                                                <button type="submit" name="subirarchivo" class="btn btn-success" disabled="true">Subir Archivo</button>
                                                                <br/>
                                                                <br/>
                                                                <p class="help-block text-center">Sugerencia: Es necesario tener una buena descripción de lo que subes.</p>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- wizard step 1 ends-->					
                                                        <div class="tab-pane" id="tab2">
                                                            <div class="form-group">
                                                                <form method="POST" name="myform2" action="php/upload.php?tipo=2" enctype="multipart/form-data" autocomplete="off">
                                                                <label for="descripcion2">Descripcion:</label>
                                                                <input type="text" id="descripcion2" name="descripcion2" id="descripcion2" class="form-control" placeholder="Ingrese una Descripción.">
                                                                <input type="file" name="resume2" id="resume2"  style="visibility: hidden">
                                                                <label for="exampleInputFile">Sube tu archivo.</label>
                                                                <p id="archivo2" class="well"></p>
                                                                <p class="help-block">Solamente se aceptan .doc o .docx</p>
                                                                <button type="button" id="resume_link2" class="btn btn-default">Agregar Archivo</button>
                                                                <button type="submit" name="subirarchivo" class="btn btn-success" disabled="true">Subir Archivo</button>
                                                                <br/>
                                                                <br/>
                                                                <p class="help-block text-center">Sugerencia: Es necesario tener una buena descripción de lo que subes.</p>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab3">
                                                            <div class="form-group">
                                                                <form method="POST" name="myform3" action="php/upload.php?tipo=3" enctype="multipart/form-data" autocomplete="off">
                                                                <label for="descripcion3">Descripcion:</label>
                                                                <input type="text" id="descripcion3" name="descripcion3" id="descripcion3" class="form-control" placeholder="Ingrese una Descripción.">
                                                                <input type="file" name="resume3" id="resume3"  style="visibility: hidden">
                                                                <label for="exampleInputFile">Sube tu archivo.</label>
                                                                <p id="archivo3" class="well"></p>
                                                                <p class="help-block">Solamente se aceptan .pdf</p>
                                                                <button type="button" id="resume_link3" class="btn btn-default">Agregar Archivo</button>
                                                                <button type="submit" name="subirarchivo" class="btn btn-success" disabled="true">Subir Archivo</button>
                                                                <br/>
                                                                <br/>
                                                                <p class="help-block text-center">Sugerencia: Es necesario tener una buena descripción de lo que subes.</p>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab4">
                                                            <div class="form-group">
                                                                <form method="POST" name="myform4" action="php/upload.php?tipo=4" enctype="multipart/form-data" autocomplete="off">
                                                                <label for="descripcion4">Descripcion:</label>
                                                                <input type="text" id="descripcion4" name="descripcion4" id="descripcion4" class="form-control" placeholder="Ingrese una Descripción.">
                                                                <input type="file" name="resume4" id="resume4"  style="visibility: hidden">
                                                                <label for="exampleInputFile">Sube tu archivo.</label>
                                                                <p id="archivo4" class="well"></p>
                                                                <p class="help-block">Solamente se aceptan .powerpoint</p>
                                                                <button type="button" id="resume_link4" class="btn btn-default">Agregar Archivo</button>
                                                                <button type="submit" name="subirarchivo" class="btn btn-success" disabled="true">Subir Archivo</button>
                                                                <br/>
                                                                <br/>
                                                                <p class="help-block text-center">Sugerencia: Es necesario tener una buena descripción de lo que subes.</p>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab5">
                                                            <div class="form-group">
                                                                <form method="POST" name="myform5" action="php/upload.php?tipo=5" enctype="multipart/form-data" autocomplete="off">
                                                                <label for="descripcion5">Descripcion:</label>
                                                                <input type="text" id="descripcion5" name="descripcion5" id="descripcion5" class="form-control" placeholder="Ingrese una Descripción.">
                                                                <input type="file" name="resume5" id="resume5"  style="visibility: hidden">
                                                                <label for="exampleInputFile">Sube tu archivo.</label>
                                                                <p id="archivo5" class="well"></p>
                                                                <p class="help-block">Solamente se aceptan .jpg o .png</p>
                                                                <button type="button" id="resume_link5" class="btn btn-default">Agregar Archivo</button>
                                                                <button type="submit" name="subirarchivo" class="btn btn-success" disabled="true">Subir Archivo</button>
                                                                <br/>
                                                                <br/>
                                                                <p class="help-block text-center">Sugerencia: Es necesario tener una buena descripción de lo que subes.</p>
                                                                </form>
                                                            </div>
                                                        </div>
                                                </div>	
                                            </div>
                                            <br/>
                                            <br/>
                                        </div>
                                        <div class="tab-pane well" style="background-color: #ffffff" id="tabi2">
                                            <form method="POST" action="">
                                            <br/>
                                            <?php if(isset($titu)):?>
                                            <label for="moreinput">Estos son tus archivos guardados.</label>
                                            <br/>
                                            <ul>
                                            <?php foreach($titu["recursosdidacticos"] as $doing):?>
                                               <li><img alt="imagen" src="img/desconocido.png"/>
                                               <br/>
                                               [Nombre]: <?= $doing["nombre"]?> [Descripción]: <?= $doing["descripcion"]?> [url]: <?= $doing["url"]?></li>                                                  
                                            <?php endforeach; ?>
                                            </ul>   
                                            <?php endif;?>
                                            <?php if(isset($_COOKIE["recursosdidacticos"])):?>
                                            
                                                  <label for="moreinput">Estos son tus archivos subidos.</label>
                                                  <br/>
                                                  <ul>
                                                  <?php $recursos = json_decode($_COOKIE["recursosdidacticos"],true);
                                                     foreach($recursos as $do):?>
                                                     <li><img alt="imagen" src="img/desconocido.png"/>
                                                     <br/>
                                                     [Nombre]: <?= $do["nombre"]?> [Descripción]: <?= $do["descripcion"]?> [url]: <?= $do["url"]?></li>                                                  
                                                  <?php endforeach; ?>
                                                  </ul>
                                            <?php else:?>
                                                  <br/>
                                                  <label for="moreinput">No hay archivos subidos.</label>
                                                  <br/>
                                            <?php endif;?>     
                                            <br/>
                                            <br/>
                                            </form>
                                        </div>
                                        <div class="tab-pane well" style="background-color: #ffffff" id="tabi3"> 
                                            <?php if(isset($titu)):?>
                                            <table class="editinplace table table-bordered">
                                                <tr>
                                                    <th colspan="3" style="background-color: #66b3ff">Preguntas Guardadas.</th>
                                                </tr>
                                            <form method="POST" action="php/AvanceDidactico.php?edit=1&a=1" autocomplete="off">
                                                 <?php foreach($titu["preguntas"] as $de1):?>
                                                <?php if($de1["editar"] != null): ?>
                                                <tr>
                                                    <td style="width: 90%" class="warning">
                                                        <input class="form-control" type="text" value="<?= $de1["editar"]?>" name="preguntas<?= $de1["idPreguntas"] ?>">
                                                    </td>
                                                    <td style="width: 5%" class="warning">
                                                        <button class="btn btn-warning" type="submit" formaction="php/AvanceDidactico.php?edit=1&a=1&id=<?= $de1["idPreguntas"]?>">Cancelar</button>
                                                    </td>
                                                    <td style="width: 5%" class="warning">
                                                        <button class="btn btn-danger" type="submit" formaction="php/AvanceDidactico.php?edit=1&a=2&id=<?= $de1["idPreguntas"]?>" disabled="">Eliminar</button>
                                                    </td>
                                                </tr>
                                                <?php elseif ($de1["eliminar"] != null):?>
                                                <tr>
                                                    <td style="width: 90%" class="danger">
                                                        <input class="form-control" type="text" value="<?= $de1["preguntas"]?>" name="preguntas<?= $de1["idPreguntas"] ?>">
                                                    </td>
                                                    <td style="width: 5%" class="danger">
                                                        <button class="btn btn-warning" type="submit" formaction="php/AvanceDidactico.php?edit=1&a=1&id=<?= $de1["idPreguntas"]?>" disabled="">Editar</button>
                                                    </td>
                                                    <td style="width: 5%" class="danger">
                                                        <button class="btn btn-danger" type="submit" formaction="php/AvanceDidactico.php?edit=1&a=2&id=<?= $de1["idPreguntas"]?>">Cancelar</button>
                                                    </td>
                                                </tr>
                                                <?php else:?>
                                                <tr>
                                                    <td style="width: 90%" class="info">
                                                        <input class="form-control" type="text" value="<?= $de1["preguntas"]?>" name="preguntas<?= $de1["idPreguntas"] ?>">
                                                    </td>
                                                    <td style="width: 5%" class="info">
                                                        <button class="btn btn-warning" type="submit" formaction="php/AvanceDidactico.php?edit=1&a=1&id=<?= $de1["idPreguntas"]?>">Editar</button>
                                                    </td>
                                                    <td style="width: 5%" class="info">
                                                        <button class="btn btn-danger" type="submit" formaction="php/AvanceDidactico.php?edit=1&a=2&id=<?= $de1["idPreguntas"]?>">Eliminar</button>
                                                    </td>
                                                </tr>
                                                <?php endif;?>               
                                                <?php endforeach;?>
                                            </form>
                                                <tr>
                                                    <?php if(isset($_GET["pre"])):
                                                            if($_GET["pre"]=="e100"):?>
                                                                <div class="alert alert-danger">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Error, </strong> Está vacio al intentar agregar una pregunta.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                <?php if(isset($_GET["delete"])):
                                                            if($_GET["delete"]=="e1"):?>
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Listo, </strong> se eliminara cuando termine la edición.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                <?php if(isset($_GET["delete"])):
                                                            if($_GET["delete"]=="e2"):?>
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Se ha cancelado</strong>.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                <?php if(isset($_GET["modify"])):
                                                            if($_GET["modify"]=="e1"):?>
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Listo, </strong> al guardar la modificación se efectuara.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                 <?php if(isset($_GET["modify"])):
                                                            if($_GET["modify"]=="e2"):?>
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Se ha cancelado</strong>.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                <?php if(isset($_GET["invalid"])):
                                                            if($_GET["invalid"]=="e1"):?>
                                                                <div class="alert alert-danger">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Incorrecto, </strong> ocurrio algo inesperado.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                </tr>
                                            </table>
                                            <?php endif;?>
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
                                                            <a name="submit1"></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <?php if(isset($_GET["submit"])):
                                                            if($_GET["submit"]=="1"):?>
                                                                <div class="alert alert-success">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Listo, </strong> pregunta agregada.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                    <?php if(isset($_GET["pre"])):
                                                            if($_GET["pre"]=="100"):?>
                                                                <div class="alert alert-danger">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Error, </strong> Está vacio al intentar agregar una pregunta.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                <?php if(isset($_GET["delete"])):
                                                            if($_GET["delete"]=="1"):?>
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Listo, </strong> se ha eliminado una pregunta.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                <?php if(isset($_GET["modify"])):
                                                            if($_GET["modify"]=="1"):?>
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Listo, </strong> se modifico una pregunta.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                    </td>
                                                </tr>
                                                </form>
                                            </table>
                                        </div>
                                        <div class="tab-pane well" style="background-color: #ffffff" id="tabi4">
                                            <?php if($titu["ayuda"]["modificar"] != null):?> 
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th colspan="2" class="text-center">Ayuda(Recomendado)</th>
                                                </tr>
                                                <form method="POST" action="php/AvanceDidactico.php?edit=2&a=2" autocomplete="off">
                                                    <tr>
                                                        <td style="width: 15%;" class="warning">
                                                            <p>Procedimiento</p>
                                                        </td>
                                                        <td style="width: 85%" class="warning">
                                                            <input class="form-control" type="text" value="<?php if($titu["ayuda"]["modificar"]["procedimiento"] != null){echo $titu["ayuda"]["modificar"]["procedimiento"];} ?>" name="procedimiento">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 15%" class="warning">
                                                            <p>Aplicaciones</p>
                                                        </td>
                                                        <td style="width: 85%" class="warning">
                                                            <input class="form-control" type="text" value="<?php if($titu["ayuda"]["modificar"]["aplicaciones"]!= null){echo $titu["ayuda"]["modificar"]["aplicaciones"];} ?>" name="aplicaciones">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 15%" class="warning">
                                                            <p>Procesamiento</p>
                                                        </td>
                                                        <td style="width: 85%" class="warning">
                                                            <input class="form-control" type="text" value="<?php if($titu["ayuda"]["modificar"]["procesamiento"] != null){echo $titu["ayuda"]["modificar"]["procesamiento"];} ?>" name="procesamiento">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10%" class="warning">
                                                            <p>Lenguaje</p>
                                                        </td>
                                                        <td style="width: 90%" class="warning">
                                                            <input class="form-control" type="text" value="<?php if($titu["ayuda"]["modificar"]["lenguaje"] != null){echo $titu["ayuda"]["modificar"]["lenguaje"];} ?>" name="lenguaje">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10%" class="warning">
                                                            <p>Modelos</p>
                                                        </td>
                                                        <td style="width: 90%" class="warning">
                                                            <input class="form-control" type="text" value="<?php if($titu["ayuda"]["modificar"]["modelos"] != null){echo $titu["ayuda"]["modificar"]["modelos"];} ?>" name="modelos">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10%" class="warning">
                                                            <p>Conclusiones</p>
                                                        </td>
                                                        <td style="width: 90%" class="warning">
                                                            <input class="form-control" type="text" value="<?php if($titu["ayuda"]["modificar"]["conclusiones"] != null){echo $titu["ayuda"]["modificar"]["conclusiones"];} ?>" name="conclusiones">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="form-group">
                                                                <button type="submit" name="submit" class="btn btn-danger" style="float:right;">Cancelar</button>
                                                                <p class="help-block" style="float:right;">Al Cancelar volvera a la antigua ayuda.&nbsp;&nbsp;&nbsp;</p>
                                                                <a name="submit2"></a>
                                                            </div>
                                                        </td>
                                                        <?php if(isset($_GET["submit"])):
                                                            if($_GET["submit"]=="100"):?>
                                                                <div class="alert alert-success">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                               <strong>Listo</strong>, se modifico y/o agrego una ayuda.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                    <?php if(isset($_GET["vacio"])):
                                                            if($_GET["vacio"]=="1"):?>
                                                                <div class="alert alert-danger">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                Está <strong>vacío</strong>, no se guardara Ayudas.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                    </tr>
                                                </form>
                                            </table>
                                            <?php elseif(isset($titu)):?>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th colspan="2" class="text-center">Ayuda(Recomendado)</th>
                                                </tr>
                                                <form method="POST" action="php/AvanceDidactico.php?edit=2&a=1" autocomplete="off">
                                                    <tr>
                                                        <td style="width: 15%;">
                                                            <p>Procedimiento</p>
                                                        </td>
                                                        <td style="width: 85%">
                                                            <input class="form-control" type="text" value="<?php if($titu["ayuda"]["procedimiento"] != null){echo $titu["ayuda"]["procedimiento"];} ?>" name="procedimiento">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 15%">
                                                            <p>Aplicaciones</p>
                                                        </td>
                                                        <td style="width: 85%">
                                                            <input class="form-control" type="text" value="<?php if($titu["ayuda"]["aplicaciones"] != null){echo $titu["ayuda"]["aplicaciones"];} ?>" name="aplicaciones">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 15%">
                                                            <p>Procesamiento</p>
                                                        </td>
                                                        <td style="width: 85%">
                                                            <input class="form-control" type="text" value="<?php if($titu["ayuda"]["procesamiento"] != null){echo $titu["ayuda"]["procesamiento"];} ?>" name="procesamiento">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10%">
                                                            <p>Lenguaje</p>
                                                        </td>
                                                        <td style="width: 90%">
                                                            <input class="form-control" type="text" value="<?php if($titu["ayuda"]["lenguaje"] != null){echo $titu["ayuda"]["lenguaje"];} ?>" name="lenguaje">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10%">
                                                            <p>Modelos</p>
                                                        </td>
                                                        <td style="width: 90%">
                                                            <input class="form-control" type="text" value="<?php if($titu["ayuda"]["modelos"] != null){echo $titu["ayuda"]["modelos"];} ?>" name="modelos">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 10%">
                                                            <p>Conclusiones</p>
                                                        </td>
                                                        <td style="width: 90%">
                                                            <input class="form-control" type="text" value="<?php if($titu["ayuda"]["conclusiones"] != null){echo $titu["ayuda"]["conclusiones"];} ?>" name="conclusiones">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="form-group">
                                                                <button type="submit" name="submit" class="btn btn-success" style="float:right;">Guardar</button>
                                                                <p class="help-block" style="float:right;">Al guardar se modificara.&nbsp;&nbsp;&nbsp;</p>
                                                                <a name="submit2"></a>
                                                            </div>
                                                        </td>
                                                        <?php if(isset($_GET["submit"])):
                                                            if($_GET["submit"]=="100"):?>
                                                                <div class="alert alert-success">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                               <strong>Listo</strong>, se modifico y/o agrego una ayuda.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                    <?php if(isset($_GET["vacio"])):
                                                            if($_GET["vacio"]=="1"):?>
                                                                <div class="alert alert-danger">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                Está <strong>vacío</strong>, no se guardara Ayudas.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                    <?php if(isset($_GET["cancel"])):
                                                            if($_GET["cancel"]=="1"):?>
                                                                <div class="alert alert-danger">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                No se <strong>guardaran</strong> cambios, se ha cancelado.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                    </tr>
                                                </form>
                                            </table>
                                            <?php else:?>
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
                                                                <button type="submit" name="submit" class="btn btn-success" style="float:right;">Guardar</button>
                                                                <p class="help-block" style="float:right;">Al guardar se modificara.&nbsp;&nbsp;&nbsp;</p>
                                                                <a name="submit2"></a>
                                                            </div>
                                                        </td>
                                                        <?php if(isset($_GET["submit"])):
                                                            if($_GET["submit"]=="100"):?>
                                                                <div class="alert alert-success">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                               <strong>Listo</strong>, se modifico y/o agrego una ayuda.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                    <?php if(isset($_GET["vacio"])):
                                                            if($_GET["vacio"]=="1"):?>
                                                                <div class="alert alert-danger">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                Está <strong>vacío</strong>, no se guardara Ayudas.
                                                                </div>
                                                    <?php endif; endif; ?>
                                                    </tr>
                                                </form>
                                            </table>
                                            <?php endif?>
                                        </div>                                      
                                        <div class="tab-pane well" style="background-color: #ffffff" id="tabi5">
                                            <br/>
                                            <?php if(isset($_SESSION["editar"])):?>
                                            <label for="contenido">Está es la última parte para Editar tu unidad.</label>
                                            <div class="panel panel-info" id="contenido">
                                              <div class="panel-heading">
                                                <h3>Para poder finalizar tienes que tener al menos este paso:</h3>
                                                <ol>
                                                    <li>Tener un recurso didactico antiguo o nuevo.</li>
                                                </ol>
                                                <p class="help-block text-center">Al guardar se efectuarán los cambios.</p>
                                             </div>
                                            </div>
                                            <p class="lead text-center">Recuerda guardar tu unidad antes de irte.</p>
                                            <form method="post" action="php/creacionUnidad.php?action=1" id="finalformedit" name="finalformedit" hidden="true"></form>
                                            <br/>
                                            <br/>
                                            <?php else:?>
                                            <label for="contenido">Está es la última parte para crear tu unidad.</label>
                                            <div class="panel panel-info" id="contenido">
                                              <div class="panel-heading">
                                                <h3>Para poder finalizar tienes que tener al menos este paso:</h3>
                                                <ol>
                                                    <li>Tener un recurso didactico.</li>
                                                </ol>
                                                <p class="help-block text-center">Recuerda que si no seleccionaste rubrica, se colocara la predeterminada y no se podra cambiar.</p>
                                            </div>
                                            </div>
                                            <p class="lead text-center">Recuerda guardar tu unidad antes de irte.</p>
                                            <form method="post" action="php/creacionUnidad.php?action=2" id="finalform" name="finalform" hidden="true"></form>
                                            <br/>
                                            <br/>
                                            <?php endif;?>
                                        </div>
                                        
                                        <ul class="pager wizard">
                                                <li class="previous first" style="display:none;"><a href="#">First</a></li>
                                                <li class="previous"><a href="javascript:;">Anterior</a></li>
                                                <li class="next last" style="display:none;"><a href="#">Last</a></li>
                                                <li class="next"><a href="javascript:;">Siguiente</a></li>
                                                <li class="finish" style="float:right;"><a href="javascript:;">Finalizar</a></li>
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
                    <h4 class="modal-title" id="myModalLabel">Error documento erroneo</h4>
                </div>
                <div class="modal-body text-center">
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
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" autocomplete="off" action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Error no se encuentra descripcion del archivo</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">No has agregado niuna descripción.</p>
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
    
    <script>    
    $('#resume_link1').click(function( e ) {
        if ($('#descripcion1').val().trim() === "") {
             $('#myModal2').modal('show');           
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
        if ($('#descripcion2').val().trim() === "") {
             $('#myModal2').modal('show');           
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
        if ($('#descripcion3').val().trim() === "") {
             $('#myModal2').modal('show');           
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
       if(!(ext==="pdf")){
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
        if ($('#descripcion4').val().trim() === "") {
             $('#myModal2').modal('show');           
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
       if(!(ext==="ppt" || ext==="pptx")){
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
    var myfile="";
    $('#resume_link5').click(function( e ) {
        if ($('#descripcion5').val().trim() === "") {
             $('#myModal2').modal('show');           
        }
        else
        {
            e.preventDefault();
            $('#resume5').trigger('click');
        }
    });
    $('#resume5').on( 'change', function() {
       myfile= $( this ).val();
       var ext = myfile.split('.').pop();
       if(!(ext==="png"|| ext==="jpg"|| ext==="JPG" || ext==="PNG")){
           $('#myModal').modal('show');
       }
       else
       {
           document.getElementById("archivo5").innerHTML = myfile;
           document.myform5.subirarchivo.disabled=false;
       }
    });
    </script>
    
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
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
            
            $("#formulario1").validate({
            rules: {
                'preguntas': {
                    required: true,
                    maxlength: 30
                }
            },
           messages: {
                'preguntas': {
                    required: "Ingrese un criterio.",
                }
            }
        });
            
            $("#formulario2").validate({
            rules: {
                'preguntas': {
                    required: true,
                    maxlength: 30
                }
            },
           messages: {
                'preguntas': {
                    required: "Ingrese un criterio.",
                }
            }
        });
        
        jQuery.validator.addMethod("emailnew", function(value, element) {
          return this.optional(element) || /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(value);
        }, "Debe cumplir el formato de un email. Ej: user@dominio.com");
    </script>
    
</body>

</html>
