-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema gamepane_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `gamepane_db` ;

-- -----------------------------------------------------
-- Schema gamepane_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gamepane_db` DEFAULT CHARACTER SET utf8 ;
USE `gamepane_db` ;

-- -----------------------------------------------------
-- Table `gamepane_db`.`gp_paises`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gamepane_db`.`gp_paises` ;

CREATE TABLE IF NOT EXISTS `gamepane_db`.`gp_paises` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(32) NULL,
  `abr` VARCHAR(8) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gamepane_db`.`gp_usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gamepane_db`.`gp_usuarios` ;

CREATE TABLE IF NOT EXISTS `gamepane_db`.`gp_usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(16) NOT NULL,
  `email` VARCHAR(64) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `nombre` VARCHAR(24) NULL,
  `apellido` VARCHAR(24) NULL,
  `sexo` INT NULL,
  `paises_id` INT NULL,
  `fechanac` DATETIME NULL,
  `coins` INT NULL DEFAULT 0,
  `validacion` TINYINT NULL DEFAULT 0,
  `vip` TINYINT NULL DEFAULT 0,
  `conexion` DATETIME NULL,
  `creado` DATETIME NULL,
  `actualizado` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_gp_usuarios_gp_paises_idx` (`paises_id` ASC),
  CONSTRAINT `fk_gp_usuarios_gp_paises`
    FOREIGN KEY (`paises_id`)
    REFERENCES `gamepane_db`.`gp_paises` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
