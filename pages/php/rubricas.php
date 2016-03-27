<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ob_start();
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

        foreach ($arraycriterio as $ti){
        $nivelcompetencia->setCriterio_idCriterio($ti["idCriterio"]);
        $arraycompetencia[] = $nivelcompetencia->DevolverNivelCompetencia();
        }

        $RubricaCompleta = array("rubrica" => $rubricadocente,"tipo"=>$tipocriteriorubricaarray,"criterio"=>$arraycriterio,"competencia"=>$arraycompetencia);
        $_SESSION["rubrica"] = $RubricaCompleta;
        
        if(isset($_SESSION["rubrica"])){
        header("location: ../rubrica.php");
        die();
        }
        else
        {
        header("location: ../indexDocente.php");
        die();
        }
    }
    elseif($_GET["new"]==2){
        
    }
    elseif($_GET["new"]==3){
      unset($_SESSION["rubrica"]);
      header("location: ../indexDocente.php");
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

        foreach ($arraycriterio as $ti){
        $nivelcompetencia->setCriterio_idCriterio($ti["idCriterio"]);
        $arraycompetencia[] = $nivelcompetencia->DevolverNivelCompetencia();
        }

        $RubricaCompleta = array("rubrica" => $rubricadocente,"tipo"=>$tipocriteriorubricaarray,"criterio"=>$arraycriterio,"competencia"=>$arraycompetencia);
        $_SESSION["rubrica"] = $RubricaCompleta;

        if(isset($_SESSION["rubrica"])){
        header("location: ../rubrica.php");
        die();
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