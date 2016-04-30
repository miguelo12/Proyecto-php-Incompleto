<?php session_start();
//  error_reporting(0);
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
        
        if(isset($_SESSION["edita"])){
            
            $rubrica = $_SESSION["edita"];
          
            foreach ($rubrica["tipo"] as $tipo){

            if($tipo["tipos"]==2){
               if(!isset($_SESSION["autoevaluacion"])){
                    foreach ($rubrica["criterio"] as $criterio){
                        for($x = 0;$x<=count($criterio)-1;$x++){
                        if($tipo["idTipoCriterioRubrica"] == $criterio[$x]["TipoCriterioRubrica_idTipoCriterioRubrica"]){
                        $arrey1[$x] = array("id"=> $x, "pregunta"=> $criterio[$x]["Nombre"], "Cambios"=>null, "unico"=>$criterio[$x]["idCriterio"]);}}
                        }
                    $_SESSION["autoevaluacion"] = $arrey1;
                }
            }

            if($tipo["tipos"]==3){
               if(!isset($_SESSION["coevaluacion"])){
                   foreach ($rubrica["criterio"] as $criterio){
                       for($x = 0;$x<=count($criterio)-1;$x++){
                       if($tipo["idTipoCriterioRubrica"] == $criterio[$x]["TipoCriterioRubrica_idTipoCriterioRubrica"]){
                       $arrey2[$x] = array("id"=> $x, "pregunta"=> $criterio[$x]["Nombre"], "Cambios"=>null, "unico"=>$criterio[$x]["idCriterio"]);}}
                    }
                $_SESSION["coevaluacion"] = $arrey2;
                }
            }

            if($tipo["tipos"]==1){
               if(!isset($_SESSION["evaluacion"])){
                    foreach ($rubrica["criterio"] as $criterio){
                        for($x = 0;$x<=count($criterio)-1;$x++){
                            if($tipo["idTipoCriterioRubrica"] == $criterio[$x]["TipoCriterioRubrica_idTipoCriterioRubrica"]){
                            foreach ($rubrica["competencia"] as $competencia){
                                for($y = 0;$y<=count($competencia)-1;$y++){
                                   if($competencia[$y]["Criterio_idCriterio"] == $criterio[$x]["idCriterio"]){         
                                   $arreyi[] = array("Descripcion"=> $competencia[$y]["Descripcion"], "Puntaje"=> $competencia[$y]["Puntaje"], "Cambios"=>null);}
                                }   
                            }
                            $arrey[] = array("id"=> $criterio[$x]["idCriterio"], "Criterio"=> $criterio[$x]["Nombre"], "NivelCompetencia"=> $arreyi, "Cambios"=>null);
                            unset($arreyi);
                            } 
                        }
                    } 
                $_SESSION["evaluacion"] = $arrey;
               }
            }
            }
        }
        else{
            if(isset($_SESSION["rubrica"]))
            {
               $rubrica = $_SESSION["rubrica"];

               foreach ($rubrica["tipo"] as $tipo){

                   if($tipo["tipos"]==2){
                       if(!isset($_SESSION["autoevaluacion"])){
                            foreach ($rubrica["criterio"] as $criterio){
                                for($x = 0;$x<=count($criterio)-1;$x++){
                                if($tipo["idTipoCriterioRubrica"] == $criterio[$x]["TipoCriterioRubrica_idTipoCriterioRubrica"]){
                                $arrey1[$x] = array("id"=>$x, "pregunta"=> $criterio[$x]["Nombre"], "unico"=>-1);}}
                                }
                            $_SESSION["autoevaluacion"] = $arrey1;
                        }
                   }

                   if($tipo["tipos"]==3){
                       if(!isset($_SESSION["coevaluacion"])){
                           foreach ($rubrica["criterio"] as $criterio){
                               for($x = 0;$x<=count($criterio)-1;$x++){
                               if($tipo["idTipoCriterioRubrica"] == $criterio[$x]["TipoCriterioRubrica_idTipoCriterioRubrica"]){
                               $arrey2[$x] = array("id"=>$x, "pregunta"=> $criterio[$x]["Nombre"], "unico"=>-1);}}
                            }
                        $_SESSION["coevaluacion"] = $arrey2;
                        }
                   }

                   if($tipo["tipos"]==1){
                       if(!isset($_SESSION["evaluacion"])){
                            foreach ($rubrica["criterio"] as $criterio){
                                for($x = 0;$x<=count($criterio)-1;$x++){
                                    if($tipo["idTipoCriterioRubrica"] == $criterio[$x]["TipoCriterioRubrica_idTipoCriterioRubrica"]){
                                    foreach ($rubrica["competencia"] as $competencia){
                                        for($y = 0;$y<=count($competencia)-1;$y++){
                                           if($competencia[$y]["Criterio_idCriterio"] == $criterio[$x]["idCriterio"]){         
                                           $arreyi[] = array("Descripcion"=> $competencia[$y]["Descripcion"], "Puntaje"=> $competencia[$y]["Puntaje"]);}
                                        }   
                                    }
                                    $arrey[] = array("Criterio"=> $criterio[$x]["Nombre"], "NivelCompetencia"=> $arreyi);
                                    unset($arreyi);
                                    } 
                                }
                            } 
                        $_SESSION["evaluacion"] = $arrey;
                       }
                   }
               }
            }
            else
            {
              header("location: ../pages/error404.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="img/icon.png"/>
    <title>Rubrica</title>

    <!-- Bootstrap Core CSS -->
    <link href="../component/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

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
                      <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;Cambiar a Administrador</a></li>
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
                    <a data-toggle="modal" data-target="#myModal" href="#">Inicio</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actividades <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#myModal" href="#">Crear una actividad</a></li>
                    <li><a data-toggle="modal" data-target="#myModal" href="#">Ir a biblioteca</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Recuerda</li>
                    <li><a data-toggle="modal" data-target="#myModal" href="#">Crear Asignatura o Sección</a></li>
                  </ul>
                </li>
                <li> 
                      <a data-toggle="modal" data-target="#myModal" href="#">Evaluar Proyectos</a>
                </li>
                <li> 
                      <a data-toggle="modal" data-target="#myModal" href="#">Biblioteca</a>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $docente["nombre"]; ?> <i class="fa fa-caret-down"></i></a>
                  <ul class="dropdown-menu">
                    <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Configuración</a></li>
                    <?php if($docente["admin"]==1):?>
                      <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-gear fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cambiar a Administrador</a></li>
                    <?php endif;?>  
                    <li role="separator" class="divider"></li>
                    <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-sign-out fa-fw"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout/Salir</a></li>
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
        <?php  if(isset($_GET["error"])): if($_GET["error"]==100):?>
        <div class="alert alert-danger">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <p class="text-center"><strong>Error, </strong> nombre de rubrica no ingresado.</p>
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
                                            <?php if(!isset($_SESSION["ver"])): ?>
                                            <li><a href="#tabi4" data-toggle="tab">Guardar Rubrica</a></li>
                                            <?php else: ?>
                                            <li><a href="#tabi4" data-toggle="tab">Modo vista</a></li>
                                            <?php endif; ?>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane well" id="tabi1" style="overflow-x: auto;">
                                            <table class="table table-bordered" style="min-width:500px" >
                                                <tr>
                                                    <th class="text-center">Seleccionar:</th>
                                                    <th class="text-center">Criterios</th>
                                                    <th class="text-center">Nota</th>
                                                </tr>
                                                <form method="POST" action="php/RubricaEdit.php?pre=1" id="formulario1" autocomplete="off">
                                                    <?php if(isset($_SESSION["autoevaluacion"])):
                                                          $autoeval = $_SESSION["autoevaluacion"];
                                                          foreach($autoeval as $pu): if($pu["unico"]==-1): ?>
                                                    <tr>
                                                    <td style="width: 7%">
                                                        <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist1[]">
                                                    </td>
                                                    <td style="width: 83%">
                                                        <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                    </td>
                                                    <td style="width: 10%">
                                                        <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                    </td>
                                                    </tr>
                                                    <?php else:?>
                                                    <tr>
                                                    <td style="width: 7%" class="info">
                                                        <input class="checkbox" type="checkbox" value="<?= $pu["id"] ?>" name="checklist1[]">
                                                    </td>
                                                    <td style="width: 83%" class="info">
                                                        <input class="form-control" type="text" value="<?= $pu["pregunta"]?>" name="preg[]">
                                                    </td>
                                                    <td style="width: 10%" class="info">
                                                        <input class="form-control" type="text" value="" name="procedimiento" disabled="true">
                                                    </td>
                                                    </tr>
                                                    <?php endif; endforeach; endif;?>
                                                    <tr>
                                                        <td colspan="3">
                                                            <label for="moreinput">Agregar Comentario</label>
                                                            <br/>
                                                            <textarea class="form-control" rows="2" name="procedimiento" disabled="true"></textarea>
                                                        </td>
                                                    </tr>
                                                    <?php if(!isset($_SESSION["ver"])): ?>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="form-group">
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=1&a=3" class="btn btn-danger" style="float:right;">Eliminar</button>&nbsp;&nbsp;&nbsp;
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=1&a=2" class="btn btn-warning" style="float:right;">Guardar</button>&nbsp;&nbsp;&nbsp;
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
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=1&a=1" class="btn btn-success" style="float:right;">Agregar</button>&nbsp;&nbsp;&nbsp;
                                                                <p class="help-block" style="float:right;">Al guardar se modificara.&nbsp;&nbsp;&nbsp;</p>
                                                                <a name="submit3"></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <?php	
                                                        if(isset($_GET['pre'])):
                                                            if($_GET['pre']=="102"):?>
                                                        <td colspan="3">
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Error, </strong> el nuevo criterio no puede estar en blanco.
                                                                </div>
                                                        </td>
                                                        <?php endif; endif;?>
                                                    </tr>
                                                    <?php else: ?>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="text-center">
                                                                <br/>
                                                                    <a class="btn btn-info" href="php/RubricaEdit.php?pre=-1">Volver a Biblioteca</a>
                                                                <br/>
                                                            </div>  
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                                </form>
                                            </table>
                                        </div>
                                        <div class="tab-pane well" id="tabi2" style="overflow-x: auto;">
                                            <table class="table table-bordered" style="min-width:500px">
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
                                                <form method="POST" action="php/RubricaEdit.php?pre=2" id="formulario2" autocomplete="off">
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
                                                    <?php if(!isset($_SESSION["ver"])): ?>
                                                    <tr>
                                                        <td colspan="7">
                                                            <div class="form-group">
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=2&a=3" class="btn btn-danger" style="float:right;">Eliminar</button>&nbsp;&nbsp;&nbsp;
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=2&a=2" class="btn btn-warning" style="float:right;">Editar</button>&nbsp;&nbsp;&nbsp;
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
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=2&a=1" class="btn btn-success" style="float:right;">Agregar</button>&nbsp;&nbsp;&nbsp;
                                                                <p class="help-block" style="float:right;">Al guardar se modificara.&nbsp;&nbsp;&nbsp;</p>
                                                            </div>
                                                        </td>
                                                        <?php if(isset($_GET['pre'])):
                                                            if($_GET['pre']=="103"):?>
                                                        <td colspan="7">
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Error, </strong> el nuevo criterio no puede estar en blanco.
                                                                </div>
                                                        </td>
                                                        <?php endif;endif;?>        
                                                    </tr>
                                                    <?php else: ?>
                                                    <tr>                                                 
                                                        <td colspan="7">
                                                            <div class="text-center">
                                                                <br/>
                                                                    <a class="btn btn-info" href="php/RubricaEdit.php?pre=-1">Volver a Biblioteca</a>
                                                                <br/>
                                                            </div> 
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                                </form>
                                            </table>
                                            <br/>
                                            
                                            <!--a lo mejor usaremos php y no javascript-->
<!--                                            <form method="post" action="php/AvanceDidactico.php?pre=5">
                                            <button type="submit" class="btn btn-primary" style="float:right; margin-top: 44px">Modificar</button>
                                            <div class="row">
                                                <div class="col-xs-2" style="float:right;">
                                                    <label for="textocantidadalumno">Cantidad de alumnos por evaluar</label>
                                                    <input type="text" id="textocantidadalumno" name="cantidad" maxlength="1" onkeypress="return event.charCode >= 49 && event.charCode <= 53" class="form-control">
                                                    <p class="help-block">Modificara la tabla. (Minimo 1 | Maximo 5 )</p>
                                                </div>
                                            </div>
                                            <br/>
                                            </form>-->
                                            
                                        </div>
                                        <div class="tab-pane well" id="tabi3" style="overflow-x: auto;">
                                            <form method="POST" action="php/RubricaEdit.php?pre=3" id="formulario1" autocomplete="off">
                                            <table class="table table-bordered" style="min-width:800px">
                                                <tr>
                                                    <th class="text-center" style="width: 22%;">Criterios</th>
                                                    <?php $a = $_SESSION["evaluacion"];
                                                          foreach($a[0]["NivelCompetencia"] as $key1): ?>
                                                    <th><input class="form-control text-center" type="text" value="<?= $key1["Puntaje"]?>" name="puntaje[]"></th>
                                                    <?php endforeach;?>
                                                </tr>
                                                    <?php $a = $_SESSION["evaluacion"]; $linea = 0;
                                                          foreach($a as $key1 => $innerArray): ?>
                                                    <tr>
                                                        <td>
                                                            <input class="form-control" type="text" value="<?= $innerArray["Criterio"]?>" name="criterios[]">
                                                        </td>
                                                        <?php foreach($innerArray["NivelCompetencia"] as $key1 => $value): ?>
                                                        <td>
                                                            <textarea style="resize: none;" class="form-control" rows="4" name="nivelcompetencia<?= $linea?>[]"><?= $value["Descripcion"]?></textarea>
                                                        </td>
                                                        <?php endforeach; $linea++;?>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <?php if(!isset($_SESSION["ver"])): ?>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="form-group text-center" style="margin: 0px auto">
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=3&a=3" class="btn btn-danger" >Eliminar Criterio</button>&nbsp;&nbsp;&nbsp;
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=3&a=1" class="btn btn-warning" >Agregar Criterio</button>&nbsp;&nbsp;&nbsp;
                                                                <br/>
                                                                <br/>
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=3&a=4" class="btn btn-danger" >Eliminar Competencia</button>&nbsp;&nbsp;&nbsp;
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=3&a=2" class="btn btn-warning" >Agregar Competencia</button>&nbsp;&nbsp;&nbsp;
                                                                <br/>
                                                                <br/>
                                                                <button type="submit" formaction="php/RubricaEdit.php?pre=3&a=5" class="btn btn-success" >Guardar</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>  
                                                        <?php	
                                                        if(isset($_GET['pre'])):
                                                            if($_GET['pre']=="102"):?>
                                                        <td colspan="6">
                                                                <div class="alert alert-warning">
                                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                <strong>Error, </strong> el nuevo criterio no puede estar en blanco.
                                                                </div>
                                                        </td>
                                                        <?php endif; endif;?>
                                                    </tr>
                                                    <?php else: ?>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="text-center">
                                                                <br/>
                                                                    <a class="btn btn-info" href="php/RubricaEdit.php?pre=-1">Volver a Biblioteca</a>
                                                                <br/>
                                                            </div> 
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                            </table>
                                            </form>
                                        </div>
                                        <div class="tab-pane well" id="tabi4" style="overflow-x: auto;">
                                            <?php if(!isset($_SESSION["ver"])): ?>
                                            <form method="POST" action="php/RubricaEdit.php?pre=4" id="formulario1" autocomplete="off">
                                                <div class="panel panel-success" id="contenido">
                                                    <div class="panel-heading text-center">
                                                        <h2>
                                                            Guardar Rubrica
                                                        </h2>
                                                        <label style="float: left">Nombre:</label>
                                                        <input type="text" value="" name="nombre" placeholder="Ingrese nombre." class="form-control text-center" />
                                                        <p>Ingresar nombre antes de guardar.</p>
                                                        <button name="boton" class="btn btn-success" type="submit">Guardar</button>  
                                                    </div>
                                                </div>
                                            </form>
                                            <?php else: ?>
                                            <div class="panel panel-success" id="contenido">
                                                    <div class="panel-heading text-center">
                                                        <h2>
                                                            Modo vista
                                                        </h2>
                                                        <p>No se puede editar o guardar una rubrica.</p>
                                                        <br/>
                                                        <a class="btn btn-info" href="php/RubricaEdit.php?pre=-1">Volver a Biblioteca</a>
                                                        <br/>
                                                    </div>
                                                </div>
                                            <?php endif;?>
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
                    <a class="btn btn-primary" href="php/RubricaEdit.php?pre=-1">Sí, estoy seguro.</a>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
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
