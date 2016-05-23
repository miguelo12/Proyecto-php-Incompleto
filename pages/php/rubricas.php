<?php
ob_start();
error_reporting(0);
session_start();
include_once("./CRUD/RecursosDidacticos.php");
include_once("./CRUD/UnidadAprendizaje.php");
include_once("./CRUD/TipoCriterioRubrica.php");
include_once("./CRUD/Criterio.php");
include_once("./CRUD/Rubrica.php");
include_once("./CRUD/NivelCompetencia.php");
if(isset($_GET["new"])){
    if($_GET["new"]==1)
    {
        unset($_SESSION["rubrica"]);
        unset($_SESSION["autoevaluacion"]);
        unset($_SESSION["coevaluacion"]);
        unset($_SESSION["evaluacion"]);
        unset($tipocriteriorubrica);
        unset($nivelcompetencia);
        unset($criterio);
        unset($rubrica);
        $tipocriteriorubrica = new TipoCriterioRubrica();
        $nivelcompetencia = new NivelCompetencia();
        $criterio = new Criterio();
        $rubrica = new Rubrica();

        $docente = $_SESSION["docente"];

        $rubrica->setDocente_idDocente($docente["id"]);
        $rubricadocente = $rubrica->DevolverRubricaPredeterminada();

        $tipocriteriorubrica->setRubrica_idRubrica($rubricadocente["idRubrica"]);
        $tipocriteriorubricaarray = $tipocriteriorubrica->DevolverTipoCriterioRubrica();

        foreach ($tipocriteriorubricaarray as $ti){
        $criterio->setTipoCriterioRubrica_idTipoCriterioRubrica($ti["idTipoCriterioRubrica"]);
        $arraycriterio[] = $criterio->DevolverCriterio(); 
        }
        
        foreach($arraycriterio[0] as $doif){
            $nivelcompetencia->setCriterio_idCriterio($doif["idCriterio"]);
            $arraycompetencia[] = $nivelcompetencia->DevolverNivelCompetencia();
        }
            
        
        
        $RubricaCompleta = array("rubrica" => $rubricadocente,"tipo"=>$tipocriteriorubricaarray,"criterio"=>$arraycriterio,"competencia"=>$arraycompetencia);
        
        if(isset($RubricaCompleta["rubrica"])){
               $_SESSION["rubrica"] =  $RubricaCompleta;
               unset($_SESSION["ver"]);
               header("location: ../rubrica.php");
               die(); 
        }
        else
        {
        header("location: ../error.php?error=404");
        die();
        }
    }
    elseif($_GET["new"]==2){
        //modo editar
        if (isset($_GET["idRubrica"])) {

            unset($tipocriteriorubrica);
            unset($nivelcompetencia);
            unset($criterio);
            unset($rubrica);
            $tipocriteriorubrica = new TipoCriterioRubrica();
            $nivelcompetencia = new NivelCompetencia();
            $criterio = new Criterio();
            $rubrica = new Rubrica();

            $docente = $_SESSION["docente"];

            $rubrica->setDocente_idDocente($docente["id"]);
            $rubrica->setIdRubrica($_GET["idRubrica"]);
            $rubricadocente = $rubrica->DevolverRubricaid();

            $tipocriteriorubrica->setRubrica_idRubrica($rubricadocente["idRubrica"]);
            $tipocriteriorubricaarray = $tipocriteriorubrica->DevolverTipoCriterioRubrica();

            foreach ($tipocriteriorubricaarray as $ti){
            $criterio->setTipoCriterioRubrica_idTipoCriterioRubrica($ti["idTipoCriterioRubrica"]);
            $arraycriterio[] = $criterio->DevolverCriterio(); 
            }

            foreach ($arraycriterio[0] as $ti){
            $nivelcompetencia->setCriterio_idCriterio($ti["idCriterio"]);
            $arraycompetencia[] = $nivelcompetencia->DevolverNivelCompetencia();
            }

            $RubricaCompleta = array("rubrica" => $rubricadocente,"tipo"=>$tipocriteriorubricaarray,"criterio"=>$arraycriterio,"competencia"=>$arraycompetencia);

            if(isset($RubricaCompleta["rubrica"])){
                $_SESSION["edita"] =  $RubricaCompleta;
                header("location: ../rubrica.php");
                die(); 
            }
            else
            {
                header("location: ../indexDocente.php");
                die();
            }
        }
        
    } else{
      header("location: ../error.php?error=404");
      die(); 
    }
}
else{
    if (isset($_GET["idRubrica"])) {

        unset($tipocriteriorubrica);
        unset($nivelcompetencia);
        unset($criterio);
        unset($rubrica);
        $tipocriteriorubrica = new TipoCriterioRubrica();
        $nivelcompetencia = new NivelCompetencia();
        $criterio = new Criterio();
        $rubrica = new Rubrica();

        $docente = $_SESSION["docente"];

        $rubrica->setDocente_idDocente($docente["id"]);
        $rubrica->setIdRubrica($_GET["idRubrica"]);
        $rubricadocente = $rubrica->DevolverRubricaid();

        $tipocriteriorubrica->setRubrica_idRubrica($rubricadocente["idRubrica"]);
        $tipocriteriorubricaarray = $tipocriteriorubrica->DevolverTipoCriterioRubrica();

        foreach ($tipocriteriorubricaarray as $ti){
        $criterio->setTipoCriterioRubrica_idTipoCriterioRubrica($ti["idTipoCriterioRubrica"]);
        $arraycriterio[] = $criterio->DevolverCriterio(); 
        }

        foreach ($arraycriterio[0] as $ti){
        $nivelcompetencia->setCriterio_idCriterio($ti["idCriterio"]);
        $arraycompetencia[] = $nivelcompetencia->DevolverNivelCompetencia();
        }

        $RubricaCompleta = array("rubrica" => $rubricadocente,"tipo"=>$tipocriteriorubricaarray,"criterio"=>$arraycriterio,"competencia"=>$arraycompetencia);

        if(isset($RubricaCompleta["rubrica"])){
            if(isset($_GET["ver"])){
               $_SESSION["rubrica"] =  $RubricaCompleta;
               $_SESSION["ver"] =  true;
               header("location: ../rubrica.php");
               die(); 
            }else{
               $_SESSION["rubrica"] =  $RubricaCompleta;
               unset($_SESSION["ver"]);
               header("location: ../rubrica.php");
               die(); 
            }
        }
        else
        {
        header("location: ../indexDocente.php");
        die();
        }
    }
    else
    {
        header("location: ../indexDocente.php");
        die();
    }
}
ob_end_flush();