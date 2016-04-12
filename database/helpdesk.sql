SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `SGV_helpdesk` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `SGV_helpdesk` ;

-- -----------------------------------------------------
-- Table `SGV_helpdesk`.`admins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SGV_helpdesk`.`admins` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `admin_type` INT NULL,
  `created_time` TIMESTAMP NULL,
  `updated_time` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `iduser_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SGV_helpdesk`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SGV_helpdesk`.`employee` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cbs_lastname` VARCHAR(45) NOT NULL,
  `cbs_firstname` VARCHAR(45) NULL,
  `admins_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idemployee_UNIQUE` (`id` ASC),
  INDEX `fk_employee_admins1_idx` (`admins_id` ASC),
  CONSTRAINT `fk_employee_admins1`
    FOREIGN KEY (`admins_id`)
    REFERENCES `SGV_helpdesk`.`admins` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SGV_helpdesk`.`reports`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SGV_helpdesk`.`reports` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(255) NULL,
  `top1` VARCHAR(255) NOT NULL,
  `top2` VARCHAR(255) NOT NULL,
  `top3` VARCHAR(255) NOT NULL,
  `tnf` INT NULL,
  `lan_cable` INT NULL,
  `ip_phone` INT NULL,
  `remarks` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idreports_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SGV_helpdesk`.`problem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SGV_helpdesk`.`problem` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `problem_type` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NULL,
  `top1` VARCHAR(255) NOT NULL,
  `top2` VARCHAR(255) NOT NULL,
  `top3` VARCHAR(255) NOT NULL,
  `reports_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idproblem_UNIQUE` (`id` ASC),
  INDEX `fk_problem_reports1_idx` (`reports_id` ASC),
  CONSTRAINT `fk_problem_reports1`
    FOREIGN KEY (`reports_id`)
    REFERENCES `SGV_helpdesk`.`reports` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SGV_helpdesk`.`common`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SGV_helpdesk`.`common` (
  `id` INT NOT NULL,
  `problem_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_common_problem1_idx` (`problem_id` ASC),
  CONSTRAINT `fk_common_problem1`
    FOREIGN KEY (`problem_id`)
    REFERENCES `SGV_helpdesk`.`problem` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SGV_helpdesk`.`record`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SGV_helpdesk`.`record` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `employee_name` VARCHAR(45) NOT NULL,
  `action_taken` VARCHAR(255) NOT NULL,
  `date_recieved` DATETIME NULL,
  `remarks` VARCHAR(255) NULL,
  `employee_id` INT NOT NULL,
  `common_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_record_employee1_idx` (`employee_id` ASC),
  INDEX `fk_record_common1_idx` (`common_id` ASC),
  CONSTRAINT `fk_record_employee1`
    FOREIGN KEY (`employee_id`)
    REFERENCES `SGV_helpdesk`.`employee` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_record_common1`
    FOREIGN KEY (`common_id`)
    REFERENCES `SGV_helpdesk`.`common` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
