-- MySQL Script generated by MySQL Workbench
-- 05/22/16 22:58:26
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema heuristica
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `heuristica` ;

-- -----------------------------------------------------
-- Schema heuristica
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `heuristica` DEFAULT CHARACTER SET utf8 ;
USE `heuristica` ;

-- -----------------------------------------------------
-- Table `heuristica`.`Docente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`Docente` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`Docente` (
  `idDocente` VARCHAR(20) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `password` VARCHAR(25) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `admin` TINYINT(1) NOT NULL,
  `habilitado` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idDocente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`Asignatura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`Asignatura` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`Asignatura` (
  `idAsignatura` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Docente_idDocente` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idAsignatura`),
  INDEX `fk_Asignatura_Docente1_idx` (`Docente_idDocente` ASC),
  CONSTRAINT `fk_Asignatura_Docente1`
    FOREIGN KEY (`Docente_idDocente`)
    REFERENCES `heuristica`.`Docente` (`idDocente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`Seccion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`Seccion` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`Seccion` (
  `idSeccion` VARCHAR(6) NOT NULL,
  `Docente_idDocente` VARCHAR(20) NOT NULL,
  `Asignatura_idAsignatura` INT NOT NULL,
  `Codigo` INT NOT NULL,
  `Habilitar` TINYINT(1) NULL,
  INDEX `fk_Seccion_Docente1_idx` (`Docente_idDocente` ASC),
  PRIMARY KEY (`idSeccion`),
  INDEX `fk_Seccion_Asignatura1_idx` (`Asignatura_idAsignatura` ASC),
  CONSTRAINT `fk_Seccion_Docente1`
    FOREIGN KEY (`Docente_idDocente`)
    REFERENCES `heuristica`.`Docente` (`idDocente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Seccion_Asignatura1`
    FOREIGN KEY (`Asignatura_idAsignatura`)
    REFERENCES `heuristica`.`Asignatura` (`idAsignatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 0;


-- -----------------------------------------------------
-- Table `heuristica`.`Alumno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`Alumno` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`Alumno` (
  `idAlumno` VARCHAR(20) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `password` VARCHAR(25) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `habilitado` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idAlumno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`AlumnoSeccion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`AlumnoSeccion` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`AlumnoSeccion` (
  `idAlumnoSeccion` INT NOT NULL AUTO_INCREMENT,
  `Seccion_idSeccion` VARCHAR(6) NOT NULL,
  `Alumno_idAlumno` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idAlumnoSeccion`),
  INDEX `fk_AlumnoSeccion_Seccion1_idx` (`Seccion_idSeccion` ASC),
  INDEX `fk_AlumnoSeccion_Alumno1_idx` (`Alumno_idAlumno` ASC),
  CONSTRAINT `fk_AlumnoSeccion_Seccion1`
    FOREIGN KEY (`Seccion_idSeccion`)
    REFERENCES `heuristica`.`Seccion` (`idSeccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AlumnoSeccion_Alumno1`
    FOREIGN KEY (`Alumno_idAlumno`)
    REFERENCES `heuristica`.`Alumno` (`idAlumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`Rubrica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`Rubrica` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`Rubrica` (
  `idRubrica` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) NOT NULL,
  `Docente_idDocente` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idRubrica`),
  INDEX `fk_Rubrica_Docente1_idx` (`Docente_idDocente` ASC),
  CONSTRAINT `fk_Rubrica_Docente1`
    FOREIGN KEY (`Docente_idDocente`)
    REFERENCES `heuristica`.`Docente` (`idDocente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`UnidadAprendizaje`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`UnidadAprendizaje` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`UnidadAprendizaje` (
  `idUnidadAprendizaje` INT NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NOT NULL,
  `Rubrica_idRubrica` INT NOT NULL,
  `Docente_idDocente` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idUnidadAprendizaje`),
  INDEX `fk_UnidadAprendizaje_Rubrica1_idx` (`Rubrica_idRubrica` ASC),
  INDEX `fk_UnidadAprendizaje_Docente1_idx` (`Docente_idDocente` ASC),
  CONSTRAINT `fk_UnidadAprendizaje_Rubrica1`
    FOREIGN KEY (`Rubrica_idRubrica`)
    REFERENCES `heuristica`.`Rubrica` (`idRubrica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UnidadAprendizaje_Docente1`
    FOREIGN KEY (`Docente_idDocente`)
    REFERENCES `heuristica`.`Docente` (`idDocente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`RecursosDidacticos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`RecursosDidacticos` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`RecursosDidacticos` (
  `idRecursosDidacticos` INT NOT NULL AUTO_INCREMENT,
  `UnidadAprendizaje_idUnidadAprendizaje` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(60) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `url` VARCHAR(200) NULL,
  PRIMARY KEY (`idRecursosDidacticos`),
  INDEX `fk_RecursosDidacticos_UnidadAprendizaje1_idx` (`UnidadAprendizaje_idUnidadAprendizaje` ASC),
  CONSTRAINT `fk_RecursosDidacticos_UnidadAprendizaje1`
    FOREIGN KEY (`UnidadAprendizaje_idUnidadAprendizaje`)
    REFERENCES `heuristica`.`UnidadAprendizaje` (`idUnidadAprendizaje`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`Actividad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`Actividad` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`Actividad` (
  `idActividad` VARCHAR(9) NOT NULL,
  `fecha_inicio` VARCHAR(45) NOT NULL,
  `fecha_termino` VARCHAR(45) NOT NULL,
  `finalizada` TINYINT(1) NOT NULL,
  `UnidadAprendizaje_idUnidadAprendizaje` INT NOT NULL,
  `Seccion_idSeccion` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`idActividad`),
  INDEX `fk_Actividad_UnidadAprendizaje1_idx` (`UnidadAprendizaje_idUnidadAprendizaje` ASC),
  INDEX `fk_Actividad_Seccion1_idx` (`Seccion_idSeccion` ASC),
  CONSTRAINT `fk_Actividad_UnidadAprendizaje1`
    FOREIGN KEY (`UnidadAprendizaje_idUnidadAprendizaje`)
    REFERENCES `heuristica`.`UnidadAprendizaje` (`idUnidadAprendizaje`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Actividad_Seccion1`
    FOREIGN KEY (`Seccion_idSeccion`)
    REFERENCES `heuristica`.`Seccion` (`idSeccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`Grupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`Grupo` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`Grupo` (
  `idGrupo` INT NOT NULL AUTO_INCREMENT,
  `Actividad_idActividad` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`idGrupo`),
  INDEX `fk_Grupo_Actividad1_idx` (`Actividad_idActividad` ASC),
  CONSTRAINT `fk_Grupo_Actividad1`
    FOREIGN KEY (`Actividad_idActividad`)
    REFERENCES `heuristica`.`Actividad` (`idActividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`AlumnosGrupo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`AlumnosGrupo` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`AlumnosGrupo` (
  `idAlumnosGrupo` INT NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` VARCHAR(200) NOT NULL,
  `Grupo_idGrupo` INT NOT NULL,
  PRIMARY KEY (`idAlumnosGrupo`),
  INDEX `fk_AlumnosGrupo_Alumno1_idx` (`Alumno_idAlumno` ASC),
  INDEX `fk_AlumnosGrupo_Grupo1_idx` (`Grupo_idGrupo` ASC),
  CONSTRAINT `fk_AlumnosGrupo_Alumno1`
    FOREIGN KEY (`Alumno_idAlumno`)
    REFERENCES `heuristica`.`Alumno` (`idAlumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AlumnosGrupo_Grupo1`
    FOREIGN KEY (`Grupo_idGrupo`)
    REFERENCES `heuristica`.`Grupo` (`idGrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`ResolverActividad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`ResolverActividad` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`ResolverActividad` (
  `idResolverActividad` INT NOT NULL AUTO_INCREMENT,
  `Pregunta` VARCHAR(200) NULL,
  `Actividad_idActividad` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`idResolverActividad`),
  INDEX `fk_Respuestas_Actividad1_idx` (`Actividad_idActividad` ASC),
  CONSTRAINT `fk_Respuestas_Actividad1`
    FOREIGN KEY (`Actividad_idActividad`)
    REFERENCES `heuristica`.`Actividad` (`idActividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`ResultadoCoevaluacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`ResultadoCoevaluacion` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`ResultadoCoevaluacion` (
  `idResultadoCoevaluacion` INT NOT NULL AUTO_INCREMENT,
  `PuntajeObtenido` INT NULL,
  `ComentarioCoe` VARCHAR(200) NULL,
  `AlumnosGrupo_idAlumnosGrupo` INT NOT NULL,
  `ResolverActividad_idResolverActividad` INT NOT NULL,
  PRIMARY KEY (`idResultadoCoevaluacion`),
  INDEX `fk_ResultadoCoevaluacion_AlumnosGrupo1_idx` (`AlumnosGrupo_idAlumnosGrupo` ASC),
  INDEX `fk_ResultadoCoevaluacion_ResolverActividad1_idx` (`ResolverActividad_idResolverActividad` ASC),
  CONSTRAINT `fk_ResultadoCoevaluacion_AlumnosGrupo1`
    FOREIGN KEY (`AlumnosGrupo_idAlumnosGrupo`)
    REFERENCES `heuristica`.`AlumnosGrupo` (`idAlumnosGrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ResultadoCoevaluacion_ResolverActividad1`
    FOREIGN KEY (`ResolverActividad_idResolverActividad`)
    REFERENCES `heuristica`.`ResolverActividad` (`idResolverActividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`TipoCriterioRubrica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`TipoCriterioRubrica` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`TipoCriterioRubrica` (
  `idTipoCriterioRubrica` INT NOT NULL AUTO_INCREMENT,
  `tipos` INT NOT NULL,
  `Rubrica_idRubrica` INT NOT NULL,
  PRIMARY KEY (`idTipoCriterioRubrica`),
  INDEX `fk_TipoCriterioRubrica_Rubrica1_idx` (`Rubrica_idRubrica` ASC),
  CONSTRAINT `fk_TipoCriterioRubrica_Rubrica1`
    FOREIGN KEY (`Rubrica_idRubrica`)
    REFERENCES `heuristica`.`Rubrica` (`idRubrica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`Criterio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`Criterio` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`Criterio` (
  `idCriterio` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(100) NOT NULL,
  `TipoCriterioRubrica_idTipoCriterioRubrica` INT NOT NULL,
  PRIMARY KEY (`idCriterio`),
  INDEX `fk_Criterio_TipoCriterioRubrica1_idx` (`TipoCriterioRubrica_idTipoCriterioRubrica` ASC),
  CONSTRAINT `fk_Criterio_TipoCriterioRubrica1`
    FOREIGN KEY (`TipoCriterioRubrica_idTipoCriterioRubrica`)
    REFERENCES `heuristica`.`TipoCriterioRubrica` (`idTipoCriterioRubrica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`NivelCompetencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`NivelCompetencia` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`NivelCompetencia` (
  `idNivelCompetencia` INT NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(200) NOT NULL,
  `Puntaje` INT NOT NULL,
  `Criterio_idCriterio` INT NOT NULL,
  PRIMARY KEY (`idNivelCompetencia`),
  INDEX `fk_NivelCompetencia_Criterio1_idx` (`Criterio_idCriterio` ASC),
  CONSTRAINT `fk_NivelCompetencia_Criterio1`
    FOREIGN KEY (`Criterio_idCriterio`)
    REFERENCES `heuristica`.`Criterio` (`idCriterio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`ResultadoEvaluacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`ResultadoEvaluacion` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`ResultadoEvaluacion` (
  `idResultadoEvaluacion` INT NOT NULL AUTO_INCREMENT,
  `Grupo_idGrupo` INT NOT NULL,
  `PuntajeObtenido` INT NULL,
  `ResolverActividad_idResolverActividad` INT NOT NULL,
  PRIMARY KEY (`idResultadoEvaluacion`),
  INDEX `fk_ResultadoRubricaEvaluacion_Grupo1_idx` (`Grupo_idGrupo` ASC),
  INDEX `fk_ResultadoRubricaEvaluacion_ResolverActividad1_idx` (`ResolverActividad_idResolverActividad` ASC),
  CONSTRAINT `fk_ResultadoRubricaEvaluacion_Grupo1`
    FOREIGN KEY (`Grupo_idGrupo`)
    REFERENCES `heuristica`.`Grupo` (`idGrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ResultadoRubricaEvaluacion_ResolverActividad1`
    FOREIGN KEY (`ResolverActividad_idResolverActividad`)
    REFERENCES `heuristica`.`ResolverActividad` (`idResolverActividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`Ayuda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`Ayuda` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`Ayuda` (
  `idAyuda` INT NOT NULL AUTO_INCREMENT,
  `procedimiento` VARCHAR(150) NULL,
  `aplicaciones` VARCHAR(150) NULL,
  `procesamiento` VARCHAR(150) NULL,
  `lenguaje` VARCHAR(150) NULL,
  `modelos` VARCHAR(150) NULL,
  `conclusiones` VARCHAR(150) NULL,
  `UnidadAprendizaje_idUnidadAprendizaje` INT NOT NULL,
  PRIMARY KEY (`idAyuda`),
  INDEX `fk_Ayuda_UnidadAprendizaje1_idx` (`UnidadAprendizaje_idUnidadAprendizaje` ASC),
  CONSTRAINT `fk_Ayuda_UnidadAprendizaje1`
    FOREIGN KEY (`UnidadAprendizaje_idUnidadAprendizaje`)
    REFERENCES `heuristica`.`UnidadAprendizaje` (`idUnidadAprendizaje`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`Preguntas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`Preguntas` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`Preguntas` (
  `idPreguntas` INT NOT NULL AUTO_INCREMENT,
  `preguntas` VARCHAR(100) NOT NULL,
  `UnidadAprendizaje_idUnidadAprendizaje` INT NOT NULL,
  PRIMARY KEY (`idPreguntas`),
  INDEX `fk_Preguntas_UnidadAprendizaje1_idx` (`UnidadAprendizaje_idUnidadAprendizaje` ASC),
  CONSTRAINT `fk_Preguntas_UnidadAprendizaje1`
    FOREIGN KEY (`UnidadAprendizaje_idUnidadAprendizaje`)
    REFERENCES `heuristica`.`UnidadAprendizaje` (`idUnidadAprendizaje`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`AlumnoUnidadAprendizaje`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`AlumnoUnidadAprendizaje` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`AlumnoUnidadAprendizaje` (
  `idAlumnoUnidadAprendizaje` INT NOT NULL AUTO_INCREMENT,
  `Alumno_idAlumno` VARCHAR(20) NOT NULL,
  `Actividad_idActividad` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`idAlumnoUnidadAprendizaje`),
  INDEX `fk_AlumnoUnidadAprendizaje_Alumno1_idx` (`Alumno_idAlumno` ASC),
  INDEX `fk_AlumnoUnidadAprendizaje_Actividad1_idx` (`Actividad_idActividad` ASC),
  CONSTRAINT `fk_AlumnoUnidadAprendizaje_Alumno1`
    FOREIGN KEY (`Alumno_idAlumno`)
    REFERENCES `heuristica`.`Alumno` (`idAlumno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AlumnoUnidadAprendizaje_Actividad1`
    FOREIGN KEY (`Actividad_idActividad`)
    REFERENCES `heuristica`.`Actividad` (`idActividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`ResultadoAutoevaluacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`ResultadoAutoevaluacion` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`ResultadoAutoevaluacion` (
  `idResultadoAutoevaluacion` INT NOT NULL AUTO_INCREMENT,
  `PuntajeObtenido` INT NULL,
  `ComentarioAutoevaluacion` VARCHAR(200) NULL,
  `AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje` INT NOT NULL,
  `ResolverActividad_idResolverActividad` INT NOT NULL,
  PRIMARY KEY (`idResultadoAutoevaluacion`),
  INDEX `fk_ResultadoRubricaAutoevaluacion_AlumnoUnidadAprendizaje1_idx` (`AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje` ASC),
  INDEX `fk_ResultadoRubricaAutoevaluacion_ResolverActividad1_idx` (`ResolverActividad_idResolverActividad` ASC),
  CONSTRAINT `fk_ResultadoRubricaAutoevaluacion_AlumnoUnidadAprendizaje1`
    FOREIGN KEY (`AlumnoUnidadAprendizaje_idAlumnoUnidadAprendizaje`)
    REFERENCES `heuristica`.`AlumnoUnidadAprendizaje` (`idAlumnoUnidadAprendizaje`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ResultadoRubricaAutoevaluacion_ResolverActividad1`
    FOREIGN KEY (`ResolverActividad_idResolverActividad`)
    REFERENCES `heuristica`.`ResolverActividad` (`idResolverActividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`ResultadoRubrica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`ResultadoRubrica` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`ResultadoRubrica` (
  `idResultadoRubrica` INT NOT NULL AUTO_INCREMENT,
  `ResultadoRubricaAutoevaluacion_idResultadoRubricaAutoevaluacion` INT NOT NULL,
  `ResultadoCoevaluacion_idResultadoCoevaluacion` INT NOT NULL,
  `ResultadoRubricaEvaluacion_idResultadoRubricaEvaluacion` INT NOT NULL,
  `Actividad_idActividad` INT NOT NULL,
  PRIMARY KEY (`idResultadoRubrica`),
  INDEX `fk_ResultadoRubrica_ResultadoRubricaAutoevaluacion1_idx` (`ResultadoRubricaAutoevaluacion_idResultadoRubricaAutoevaluacion` ASC),
  INDEX `fk_ResultadoRubrica_ResultadoCoevaluacion1_idx` (`ResultadoCoevaluacion_idResultadoCoevaluacion` ASC),
  INDEX `fk_ResultadoRubrica_ResultadoRubricaEvaluacion1_idx` (`ResultadoRubricaEvaluacion_idResultadoRubricaEvaluacion` ASC),
  CONSTRAINT `fk_ResultadoRubrica_ResultadoRubricaAutoevaluacion1`
    FOREIGN KEY (`ResultadoRubricaAutoevaluacion_idResultadoRubricaAutoevaluacion`)
    REFERENCES `heuristica`.`ResultadoAutoevaluacion` (`idResultadoAutoevaluacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ResultadoRubrica_ResultadoCoevaluacion1`
    FOREIGN KEY (`ResultadoCoevaluacion_idResultadoCoevaluacion`)
    REFERENCES `heuristica`.`ResultadoCoevaluacion` (`idResultadoCoevaluacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ResultadoRubrica_ResultadoRubricaEvaluacion1`
    FOREIGN KEY (`ResultadoRubricaEvaluacion_idResultadoRubricaEvaluacion`)
    REFERENCES `heuristica`.`ResultadoEvaluacion` (`idResultadoEvaluacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `heuristica`.`Respuestas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `heuristica`.`Respuestas` ;

CREATE TABLE IF NOT EXISTS `heuristica`.`Respuestas` (
  `idRespuestas` INT NOT NULL AUTO_INCREMENT,
  `respuesta` VARCHAR(200) NOT NULL,
  `ResolverActividad_idResolverActividad` INT NOT NULL,
  `Criterio_idCriterio` INT NOT NULL,
  PRIMARY KEY (`idRespuestas`),
  INDEX `fk_Respuestas_ResolverActividad1_idx` (`ResolverActividad_idResolverActividad` ASC),
  INDEX `fk_Respuestas_Criterio1_idx` (`Criterio_idCriterio` ASC),
  CONSTRAINT `fk_Respuestas_ResolverActividad1`
    FOREIGN KEY (`ResolverActividad_idResolverActividad`)
    REFERENCES `heuristica`.`ResolverActividad` (`idResolverActividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Respuestas_Criterio1`
    FOREIGN KEY (`Criterio_idCriterio`)
    REFERENCES `heuristica`.`Criterio` (`idCriterio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
