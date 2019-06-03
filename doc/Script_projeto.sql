
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Projeto_cliente
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `PROJETO_CLIENTE` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `PROJETO_CLIENTE` ;

-- -----------------------------------------------------
-- Table Projeto_cliente.usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `PROJETO_CLIENTE`.`USUARIO` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `LOGIN` VARCHAR(150) NOT NULL,
  `SENHA` VARCHAR(50) NOT NULL,
  `TIPO_PERFIL` CHAR(1) ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table Projeto_cliente.cliente
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `PROJETO_CLIENTE`.`CLIENTE` (
  `ID_CLIENTE` INT NOT NULL AUTO_INCREMENT,
  `NOME_COMPLETO` VARCHAR(150) NOT NULL,
  `NOME_USUARIO` VARCHAR(50) NOT NULL,
  `RG` int(11) ,
   `EMAIL` varchar(200) ,
    `ENDERECO` CHAR(200) ,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
