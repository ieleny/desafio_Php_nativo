-- verão MARIADB
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema produtos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema produtos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `produtos` DEFAULT CHARACTER SET utf8 ;
USE `produtos` ;

-- -----------------------------------------------------
-- Table `produtos`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produtos`.`produtos` (
  `id_produtos` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `sku_produtos` VARCHAR(45) NULL,
  `quantidade_produtos` INT NULL,
  `preco_produtos` DOUBLE NULL,
  `nome_produtos` VARCHAR(45) NULL,
  `descricao_produtos` VARCHAR(45) NULL,
  PRIMARY KEY (`id_produtos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `produtos`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produtos`.`categoria` (
  `id_categoria` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_categoria` VARCHAR(45) NULL,
  `codigo_categoria` VARCHAR(45) NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `produtos`.`produtos_has_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `produtos`.`produtos_has_categoria` (
  `produtos_id_produtos` INT UNSIGNED NOT NULL,
  `categoria_id_categoria` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`produtos_id_produtos`, `categoria_id_categoria`),
  INDEX `fk_produtos_has_categoria_categoria1_idx` (`categoria_id_categoria` ASC) ,
  INDEX `fk_produtos_has_categoria_produtos_idx` (`produtos_id_produtos` ASC)
  CONSTRAINT `fk_produtos_has_categoria_produtos`
    FOREIGN KEY (`produtos_id_produtos`)
    REFERENCES `produtos`.`produtos` (`id_produtos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_has_categoria_categoria1`
    FOREIGN KEY (`categoria_id_categoria`)
    REFERENCES `produtos`.`categoria` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
