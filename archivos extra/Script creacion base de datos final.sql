-- MySQL Script generated by MySQL Workbench
-- 03/04/19 14:04:33
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema SolicitudRenovacion
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema SolicitudRenovacion
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SolicitudRenovacion` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `SolicitudRenovacion` ;

-- -----------------------------------------------------
-- Table `SolicitudRenovacion`.`TA_AcreditaDomicilio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SolicitudRenovacion`.`TA_AcreditaDomicilio` (
  `id_archivo` INT NOT NULL AUTO_INCREMENT,
  `nombre_archivo` VARCHAR(255) NOT NULL,
  `ruta_archivo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_archivo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `SolicitudRenovacion`.`TA_Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SolicitudRenovacion`.`TA_Persona` (
  `id_persona` INT NOT NULL AUTO_INCREMENT,
  `rut_persona` VARCHAR(12) NOT NULL,
  `nombre_persona` VARCHAR(40) NOT NULL,
  `apellidop_persona` VARCHAR(50) NOT NULL,
  `apellidom_persona` VARCHAR(50) NOT NULL,
  `fechaNacimiento_persona` DATE NOT NULL,
  `sexo_persona` ENUM('No Especifica', 'Femenino', 'Masculino') NOT NULL DEFAULT 'No Especifica',
  `correo_persona` VARCHAR(50) NOT NULL,
  `telefono_persona` VARCHAR(12) NOT NULL,
  UNIQUE INDEX `rut_persona_UNIQUE` (`rut_persona` ASC),
  PRIMARY KEY (`id_persona`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `SolicitudRenovacion`.`TA_Licencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SolicitudRenovacion`.`TA_Licencia` (
  `id_licencia` INT NOT NULL AUTO_INCREMENT,
  `clase_licencia` ENUM('A1', 'A2', 'A3', 'A4', 'A5', 'B', 'C', 'D', 'A1-A2 Ley 18.290') NOT NULL,
  `origen_licencia` VARCHAR(100) NOT NULL,
  `fechacontrol_licencia` DATE NOT NULL,
  PRIMARY KEY (`id_licencia`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `SolicitudRenovacion`.`TA_Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SolicitudRenovacion`.`TA_Usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `rut_usuario` VARCHAR(12) NOT NULL,
  `nombre_usuario` VARCHAR(45) NOT NULL,
  `apellidop_usuario` VARCHAR(45) NOT NULL,
  `apellidom_usuario` VARCHAR(45) NOT NULL,
  `correo_usuario` VARCHAR(70) NOT NULL,
  `pass_usuario` VARCHAR(255) NOT NULL,
  `tipo_usuario` ENUM('Funcionario', 'Administrador', 'Inactivo') NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `correo_usuario_UNIQUE` (`correo_usuario` ASC),
  UNIQUE INDEX `rut_usuario_UNIQUE` (`rut_usuario` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `SolicitudRenovacion`.`TA_Direccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SolicitudRenovacion`.`TA_Direccion` (
  `id_direccion` INT NOT NULL AUTO_INCREMENT,
  `ciudad` VARCHAR(50) NOT NULL,
  `comuna` VARCHAR(50) NOT NULL,
  `calle` VARCHAR(70) NOT NULL,
  `blockedificio` VARCHAR(45) NULL,
  `numero` INT NOT NULL,
  `fk_id_persona` INT NOT NULL,
  PRIMARY KEY (`id_direccion`),
  INDEX `fk_TA_Direccion_TA_Persona1_idx` (`fk_id_persona` ASC),
  CONSTRAINT `fk_TA_Direccion_TA_Persona1`
    FOREIGN KEY (`fk_id_persona`)
    REFERENCES `SolicitudRenovacion`.`TA_Persona` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SolicitudRenovacion`.`TA_Fecha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SolicitudRenovacion`.`TA_Fecha` (
  `id_fecha` INT NOT NULL AUTO_INCREMENT,
  `fecha_asignada` DATE NOT NULL,
  `cupo_maximo` INT NOT NULL,
  PRIMARY KEY (`id_fecha`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SolicitudRenovacion`.`TA_Hora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SolicitudRenovacion`.`TA_Hora` (
  `id_hora` INT NOT NULL AUTO_INCREMENT,
  `hora_asignada` TIME NOT NULL,
  `fk_id_fecha` INT NOT NULL,
  `valor_cupo` INT NOT NULL,
  PRIMARY KEY (`id_hora`),
  INDEX `fk_TA_Hora_TA_Fecha1_idx` (`fk_id_fecha` ASC),
  CONSTRAINT `fk_TA_Hora_TA_Fecha1`
    FOREIGN KEY (`fk_id_fecha`)
    REFERENCES `SolicitudRenovacion`.`TA_Fecha` (`id_fecha`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SolicitudRenovacion`.`TA_Solicitud`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SolicitudRenovacion`.`TA_Solicitud` (
  `id_solicitud` INT NOT NULL AUTO_INCREMENT,
  `TA_Persona_id_persona` INT NOT NULL,
  `TA_Fecha_id_fecha` INT NOT NULL,
  `TA_Hora_id_hora` INT NOT NULL,
  `TA_Direccion_id_direccion` INT NOT NULL,
  `TA_AcreditaDomicilio_id_archivo` INT NOT NULL,
  `TA_Licencia_id_licencia` INT NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  INDEX `fk_TA_Solicitud_TA_Persona1_idx` (`TA_Persona_id_persona` ASC),
  INDEX `fk_TA_Solicitud_TA_Fecha1_idx` (`TA_Fecha_id_fecha` ASC),
  INDEX `fk_TA_Solicitud_TA_Hora1_idx` (`TA_Hora_id_hora` ASC),
  INDEX `fk_TA_Solicitud_TA_Direccion1_idx` (`TA_Direccion_id_direccion` ASC),
  INDEX `fk_TA_Solicitud_TA_AcreditaDomicilio1_idx` (`TA_AcreditaDomicilio_id_archivo` ASC),
  INDEX `fk_TA_Solicitud_TA_Licencia1_idx` (`TA_Licencia_id_licencia` ASC),
  CONSTRAINT `fk_TA_Solicitud_TA_Persona1`
    FOREIGN KEY (`TA_Persona_id_persona`)
    REFERENCES `SolicitudRenovacion`.`TA_Persona` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TA_Solicitud_TA_Fecha1`
    FOREIGN KEY (`TA_Fecha_id_fecha`)
    REFERENCES `SolicitudRenovacion`.`TA_Fecha` (`id_fecha`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TA_Solicitud_TA_Hora1`
    FOREIGN KEY (`TA_Hora_id_hora`)
    REFERENCES `SolicitudRenovacion`.`TA_Hora` (`id_hora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TA_Solicitud_TA_Direccion1`
    FOREIGN KEY (`TA_Direccion_id_direccion`)
    REFERENCES `SolicitudRenovacion`.`TA_Direccion` (`id_direccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TA_Solicitud_TA_AcreditaDomicilio1`
    FOREIGN KEY (`TA_AcreditaDomicilio_id_archivo`)
    REFERENCES `SolicitudRenovacion`.`TA_AcreditaDomicilio` (`id_archivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TA_Solicitud_TA_Licencia1`
    FOREIGN KEY (`TA_Licencia_id_licencia`)
    REFERENCES `SolicitudRenovacion`.`TA_Licencia` (`id_licencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;