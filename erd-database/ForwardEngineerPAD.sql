-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema PAD
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema PAD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PAD` DEFAULT CHARACTER SET utf8 ;
USE `PAD` ;

-- -----------------------------------------------------
-- Table `PAD`.`Admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PAD`.`Admin` (
  `email` VARCHAR(45) NOT NULL,
  `wachtwoord` VARCHAR(72) NOT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PAD`.`Blok`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PAD`.`Blok` (
  `id_blok` VARCHAR(4) NOT NULL,
  `kleur` VARCHAR(45) NULL,
  PRIMARY KEY (`id_blok`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PAD`.`Stalling`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PAD`.`Stalling` (
  `id_stalling` INT NOT NULL AUTO_INCREMENT,
  `id_blok` VARCHAR(4) NOT NULL,
  `soort_voertuig` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_stalling`, `id_blok`),
  INDEX `fk_verzinzelf2_idx` (`id_blok` ASC) VISIBLE,
  CONSTRAINT `fk_verzinzelf2`
    FOREIGN KEY (`id_blok`)
    REFERENCES `PAD`.`Blok` (`id_blok`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PAD`.`Parkeerplaats`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PAD`.`Parkeerplaats` (
  `id_sensor` INT NOT NULL AUTO_INCREMENT,
  `id_stalling` INT NOT NULL,
  `id_blok` VARCHAR(4) NOT NULL,
  `bezet_datum` DATETIME NULL,
  `bezet` TINYINT(1) NOT NULL,
  PRIMARY KEY (`id_sensor`, `id_stalling`, `id_blok`),
  INDEX `fk_verzinzelf3_idx` (`id_stalling` ASC, `id_blok` ASC) VISIBLE,
  CONSTRAINT `fk_verzinzelf3`
    FOREIGN KEY (`id_stalling` , `id_blok`)
    REFERENCES `PAD`.`Stalling` (`id_stalling` , `id_blok`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `PAD`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PAD`.`user` (
  `username` VARCHAR(16) NOT NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(32) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
