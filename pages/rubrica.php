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
        
        if(isset($_SESSION["rubrica"]))
       {
           if(!isset($_SESSION["autoevaluacion"])){
           $arrey[0] = array("id"=> 0, "pregunta"=> "Cumplí con mis compromisos.", "unico"=>null);
           $_SESSION["autoevaluacion"] = $arrey;}
       
           if(!isset($_SESSION["coevaluacion"])){
           $arrey[0] = array("id"=> 0, "pregunta"=> "Cumplí con mis compromisos.", "unico"=>null);
           $_SESSION["coevaluacion"] = $arrey;}
       }
       else
       {
          header("location: ../pages/error404.php");
          die();
       }
        
//        include '../pages/php/CRUD/Seccion.php';
//        include '../pages/php/CRUD/Asignatura.php';
//        
//        $seccion = new Seccion();
//        $asignatura = new Asignatura();
//        
//        $seccion->setDocente_idDocente($docente["id"]);
//        $arraySeccion = $seccion->DevolverSeccionDocente();
//        
//        $asignatura->setDocente_idDocente($docente["id"]);
//        $arrayAsignatura = $asignatura->DevolverAsignaturasDocente();  
//        
//        unset($conteo);
//        $du = 0;
//        $conteo;
//        foreach ($arrayAsignatura as $tq)
//        {
//           foreach ($arraySeccion as $tk)
//           {
//              if($tq["idAsignatura"] == $tk["Asignatura_idAsignatura"])
//              {
//                $du = $du + 1;
//              }
//           }
//           $conteo[] = $du;
//           $du = 0;
//        } 
        
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
    
    <style>
        body {
            background-image: url("./img/laptop.png");
            background-repeat: repeat;
            background-attachment: fixed;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../component/jquery/dist/jquery.min.js"></script>
    <script src="../component/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/jquery.bootstrap.wizard.min.js"></script>
    
    <script>
    $(document).ready(function() {
            $('#rootwizard').bootstrapWizard();
           
            $('#pills').bootstrapWizard({
                 //bloquear los tabs de arriba.
                'tabClass': 'nav nav-tabs'
            });
		window.prettyPrint && prettyPrint()
            //que hace el boton finish
            $('#pills .finish').click(function() {
                <?php if(isset($_SESSION["autoevaluacion"]) && isset($_SESSION["coevaluacion"]) && isset($_SESSION["recursosdidacticos"])): ?>
                    document.getElementById("finalform").submit();
                <?php else: ?>
                    alert('No puedes terminar la unidad lea los requisitos.');
                <?php endif; ?>
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
              <a class="navbar-brand" href="#">Heuristica Movil</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                  <li><a data-toggle="modal" data-target="#myModal" href="#">Inicio</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#myModal" href="#">Crear una actividad</a></li>
                    <li><a data-toggle="modal" data-target="#myModal" href="#">Ir a biblioteca</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Recuerda</li>
                    <li class="active"><a data-toggle="modal" data-target="#myModal" href="#">Crear Asignatura o Sección</a></li>
                  </ul>
                </li>
                <li><a data-toggle="modal" data-target="#myModal" href="#">Contáctenos</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right hidden-xs">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i> <?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i> Configuracion</a></li>
                    <?php if($docente["admin"]==1):?>
                      <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;Cambiar a Administrador</a></li>
                    <?php endif;?>  
                    <li role="separator" class="divider"></li>
                    <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-sign-out fa-fw"></i> Logout/Salir</a></li>
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
           <p class="text-center"><strong>Listo, </strong> se acaba de enviar el email.</p>
        </div>
        <?php endif; endif;?>
        <div id="page-content-wrapper content" >
          <div class="container separate-rows tall-rows">
            <div class="row">
                <div class="col-xs-12">
                    <div class="well well-lg">
                        <div class="row">
                            <div class="col-xs-12"> 
                            <section id="wizard">
                                <div class="page-header">
                                <h1>Rubricas</h1>
                                </div>
                                <div id="pills">
                                    <ul>
                                            <li><a href="#tabi1" data-toggle="tab">Editar Autoevaluación</a></li>
                                            <li><a href="#tabi2" data-toggle="tab">Editar Coevaluación</a></li>
                                            <li><a href="#tabi3" data-toggle="tab">Editar Evaluación</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane well" id="tabi1">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th class="text-center">Seleccionar:</th>
                                                    <th class="text-center">Criterios</th>
                                                    <th class="text-center">Nota</th>
                                                </tr>
                                                <form method="POST" action="php/AvanceDidactico.php?pre=3" id="formulario1" autocomplete="off">
                                                    <?php if(isset($_SESSION["autoevaluacion"])):
                                                          $autoeval = $_SESSION["autoevaluacion"];
                                                          foreach($autoeval as $pu):?>
                                                    <tr>
                                                    <td style="width: 7%">
                                                        <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist1[]">
                                                    </td>
                                                    <td style="width: 78%">
                                                        <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                    </td>
                                                    <td style="width: 15%">
                                                        <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                    </td>
                                                    </tr>
                                                    <?php endforeach; endif;?>
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
                                                                <button type="submit" formaction="php/AvanceDidactico.php?pre=3&a=3" class="btn btn-danger" style="float:right;">Eliminar</button>&nbsp;&nbsp;&nbsp;
                                                                <button type="submit" formaction="php/AvanceDidactico.php?pre=3&a=2" class="btn btn-warning" style="float:right;">Guardar</button>&nbsp;&nbsp;&nbsp;
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
                                                                <button type="submit" formaction="php/AvanceDidactico.php?pre=3&a=1" class="btn btn-success" style="float:right;">Agregar</button>&nbsp;&nbsp;&nbsp;
                                                                <p class="help-block" style="float:right;">Al guardar se modificara.&nbsp;&nbsp;&nbsp;</p>
                                                                <a name="submit3"></a>
                                                            </div>
                                                        </td>
                                                        <?php	
                                                        if(isset($_GET['pre'])):
                                                            if($_GET['pre']=="102"):?>
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Error, </strong> el nuevo criterio no puede estar en blanco.
                                                                </div>
                                                        <?php endif; endif;?>
                                                    </tr>
                                                </form>
                                            </table>
                                        </div>
                                        <div class="tab-pane well" id="tabi2">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th colspan="2" class="text-center">Criterios</th>
                                                    <th colspan="5" class="text-center">integrantes</th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">Selecciona:</th>
                                                    <th class="text-center"></th>
                                                    
                                                    <?php // Detecta la cantidad de alumnos estan en la tabla.
                                                          if(isset($_SESSION["tabla"])):
                                                          if($_SESSION["tabla"]==1):?>
                                                        <th class="text-center">1</th>
                                                    <?php elseif($_SESSION["tabla"]==2):?>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                    <?php elseif($_SESSION["tabla"]==3):?>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                        <th class="text-center">3</th>
                                                    <?php elseif($_SESSION["tabla"]==4):?>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                        <th class="text-center">3</th>
                                                        <th class="text-center">4</th>
                                                    <?php elseif($_SESSION["tabla"]==5):?>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                        <th class="text-center">3</th>
                                                        <th class="text-center">4</th>
                                                        <th class="text-center">5</th>
                                                    <?php endif; else:?>
                                                        <th class="text-center">1</th>
                                                        <th class="text-center">2</th>
                                                        <th class="text-center">3</th>
                                                    <?php endif;?>
                                                </tr>
                                                <form method="POST" action="php/AvanceDidactico.php?pre=4" id="formulario2" autocomplete="off">
                                                        <?php // Meter un for para mostrar la cantidad de criterios e integrantes.
                                                              if(isset($_SESSION["tabla"])):
                                                              if($_SESSION["tabla"]==1):
                                                              if(isset($_SESSION["coevaluacion"])):
                                                              $autoeval = $_SESSION["coevaluacion"];
                                                              foreach($autoeval as $pu):?>
                                                        <tr>
                                                        <td style="width: 7%">
                                                            <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                        </td>
                                                        <td style="width: 86%">
                                                            <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        </tr>
                                                        <?php endforeach; endif; elseif($_SESSION["tabla"]==2):
                                                              if(isset($_SESSION["coevaluacion"])):
                                                              $autoeval = $_SESSION["coevaluacion"];
                                                              foreach($autoeval as $pu):?>
                                                        <tr>
                                                            <td style="width: 7%">
                                                                <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                            </td>
                                                            <td style="width: 79%">
                                                                <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                            </td>
                                                            <td style="width: 7%">
                                                                <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                            </td>
                                                            <td style="width: 7%">
                                                                <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; endif; elseif($_SESSION["tabla"]==4):
                                                              if(isset($_SESSION["coevaluacion"])):
                                                              $autoeval = $_SESSION["coevaluacion"];
                                                              foreach($autoeval as $pu):?>
                                                        <tr>
                                                        <td style="width: 7%">
                                                            <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                        </td>
                                                        <td style="width: 65%">
                                                            <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
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
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        </tr>
                                                        <?php endforeach; endif; elseif($_SESSION["tabla"]==5):
                                                              if(isset($_SESSION["coevaluacion"])):
                                                              $autoeval = $_SESSION["coevaluacion"];
                                                              foreach($autoeval as $pu):?>
                                                        <tr>
                                                        <td style="width: 7%">
                                                            <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                        </td>
                                                        <td style="width: 58%">
                                                            <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
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
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        <td style="width: 7%">
                                                            <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                        </td>
                                                        </tr>
                                                        <?php endforeach; endif; elseif($_SESSION["tabla"]==3):
                                                               if(isset($_SESSION["coevaluacion"])):
                                                              $autoeval = $_SESSION["coevaluacion"];
                                                              foreach($autoeval as $pu):?>
                                                        <tr>
                                                        <td style="width: 7%">
                                                            <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                        </td>
                                                        <td style="width: 72%">
                                                            <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
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
                                                        <?php endforeach; endif; endif; 
                                                              else:
                                                              if(isset($_SESSION["coevaluacion"])):
                                                              $autoeval = $_SESSION["coevaluacion"];
                                                              foreach($autoeval as $pu):?>
                                                        
                                                        <tr>
                                                            <td style="width: 7%">
                                                                <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist[]">
                                                            </td>
                                                            <td style="width: 72%">
                                                                <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
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
                                                        <?php endforeach; endif; endif;?>
                                                    <tr>
                                                        <td colspan="7">
                                                            <a name="submit4"></a>
                                                            <label for="moreinput">Agregar Comentario</label>
                                                            <br/>
                                                            <textarea class="form-control" rows="2" name="procedimiento" disabled="true"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="7">
                                                            <div class="form-group">
                                                                <button type="submit" formaction="php/AvanceDidactico.php?pre=4&a=3" class="btn btn-danger" style="float:right;">Eliminar</button>&nbsp;&nbsp;&nbsp;
                                                                <button type="submit" formaction="php/AvanceDidactico.php?pre=4&a=2" class="btn btn-warning" style="float:right;">Editar</button>&nbsp;&nbsp;&nbsp;
                                                                <p class="help-block" style="float:right;">Selecciona cual quieres eliminar o editar.&nbsp;&nbsp;&nbsp;</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="7" class="text-center">Crear Nuevos Criterios</th>
                                                    </tr>
                                                    <tr>                                                 
                                                        <td colspan="7">
                                                            <input class="form-control" type="text" name="preguntas">
                                                        </td>
                                                    </tr>
                                                    <tr>                                                 
                                                        <td colspan="7">
                                                            <div class="form-group">                                                             
                                                                <button type="submit" formaction="php/AvanceDidactico.php?pre=4&a=1" class="btn btn-success" style="float:right;">Agregar</button>&nbsp;&nbsp;&nbsp;
                                                                <p class="help-block" style="float:right;">Al guardar se modificara.&nbsp;&nbsp;&nbsp;</p>
                                                            </div>
                                                        </td>
                                                        <?php if(isset($_GET['pre'])):
                                                            if($_GET['pre']=="103"):?>  
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Error, </strong> el nuevo criterio no puede estar en blanco.
                                                                </div> 
                                                        <?php endif;endif;?>        
                                                    </tr>
                                                </form>
                                            </table>
                                            <br/>
                                            
                                            <!--a lo mejor usaremos php y no javascript-->
                                            <form method="post" action="php/AvanceDidactico.php?pre=5">
                                            <button type="submit" class="btn btn-primary" style="float:right; margin-top: 44px">Modificar</button>
                                            <div class="row">
                                                <div class="col-xs-2" style="float:right;">
                                                    <label for="textocantidadalumno">Cantidad de alumnos por evaluar</label>
                                                    <input type="text" id="textocantidadalumno" name="cantidad" maxlength="1" onkeypress="return event.charCode >= 49 && event.charCode <= 53" class="form-control">
                                                    <p class="help-block">Modificara la tabla. (Minimo 1 | Maximo 5 )</p>
                                                </div>
                                            </div>
                                            <br/>
                                            </form>
                                            
                                        </div>
                                        <div class="tab-pane well" id="tabi3">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th class="text-center">Criterios</th>
                                                    <?php //puntaje ?>
                                                    <th class="text-center"><input class="form-control" type="text" value="" name="procedimiento"></th>
                                                    <?php ?>
                                                </tr>
                                                <form method="POST" action="php/AvanceDidactico.php?pre=3" id="formulario1" autocomplete="off">
                                                    <tr>
                                                        <td style="width: 35%">
                                                            <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                        </td>
                                                        <td>
                                                            <textarea class="form-control" rows="4" name="procedimiento"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="form-group text-center" style="margin: 0px auto">
                                                                <button type="submit" formaction="php/AvanceDidactico.php?pre=3&a=3" class="btn btn-danger" >Eliminar Criterio</button>&nbsp;&nbsp;&nbsp;
                                                                <button type="submit" formaction="php/AvanceDidactico.php?pre=3&a=2" class="btn btn-warning" >Agregar Criterio</button>&nbsp;&nbsp;&nbsp;
                                                                <br/>
                                                                <br/>
                                                                <button type="submit" formaction="php/AvanceDidactico.php?pre=3&a=1" class="btn btn-danger" >Eliminar Competencia</button>&nbsp;&nbsp;&nbsp;
                                                                <button type="submit" formaction="php/AvanceDidactico.php?pre=3&a=1" class="btn btn-warning" >Agregar Competencia</button>&nbsp;&nbsp;&nbsp;
                                                                <br/>
                                                                <br/>
                                                                <button type="submit" formaction="php/AvanceDidactico.php?pre=3&a=1" class="btn btn-success" >Guardar</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>                                                 
                                                        <?php	
                                                        if(isset($_GET['pre'])):
                                                            if($_GET['pre']=="102"):?>
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Error, </strong> el nuevo criterio no puede estar en blanco.
                                                                </div>
                                                        <?php endif; endif;?>
                                                    </tr>
                                                </form>
                                            </table>
                                        </div>                                        
                                        <ul class="pager wizard">
                                                <li class="previous first" style="display:none;"><a href="javascript:;">First</a></li>
                                                <li class="previous" style="display:none;"><a href="javascript:;">Previous</a></li>
                                                <li class="next last" style="display:none;"><a href="javascript:;">Last</a></li>
                                                <li class="next" style="display:none;"><a href="javascript:;">Next</a></li>
                                                <li class="finish" style="display:none;"><a href="javascript:;">Finish</a></li>
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
    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" autocomplete="off">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Vas a salir de esta pagina...</h4>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro que quieres salir?, se perdera todo lo que ha avanzado.</p>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No, quiero volver.</button>
                    <a class="btn btn-primary" href="php/rubricas.php?new=3">Sí, estoy seguro.</a>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

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
</body>

</html>
