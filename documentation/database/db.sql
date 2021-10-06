-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema looper
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema looper
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `looper` DEFAULT CHARACTER SET utf8mb4 ;
USE `looper` ;

-- -----------------------------------------------------
-- Table `looper`.`states`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `looper`.`states` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `looper`.`exercises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `looper`.`exercises` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` LONGTEXT NULL,
  `states_id` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  INDEX `fk_exercises_states1_idx` (`states_id` ASC) VISIBLE,
  CONSTRAINT `fk_exercises_states1`
    FOREIGN KEY (`states_id`)
    REFERENCES `looper`.`states` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `looper`.`lines`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `looper`.`lines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `kind` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `looper`.`fields`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `looper`.`fields` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `label` LONGTEXT NULL,
  `lines_id` INT NOT NULL DEFAULT 1,
  `exercises_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_fields_lines_idx` (`lines_id` ASC) VISIBLE,
  INDEX `fk_fields_exercises1_idx` (`exercises_id` ASC) VISIBLE,
  CONSTRAINT `fk_fields_lines`
    FOREIGN KEY (`lines_id`)
    REFERENCES `looper`.`lines` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_fields_exercises1`
    FOREIGN KEY (`exercises_id`)
    REFERENCES `looper`.`exercises` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `looper`.`answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `looper`.`answers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `take` DATETIME NOT NULL DEFAULT now(),
  `answer` LONGTEXT NULL,
  `fields_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_answer_fields1_idx` (`fields_id` ASC) VISIBLE,
  CONSTRAINT `fk_answer_fields1`
    FOREIGN KEY (`fields_id`)
    REFERENCES `looper`.`fields` (`id`)
	ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

#lines

INSERT INTO `looper`.`lines` (`kind`) VALUES ('Single line text');
INSERT INTO `looper`.`lines` (`kind`) VALUES ('List of single lines');
INSERT INTO `looper`.`lines` (`kind`) VALUES ('Multi-line text');

#state

INSERT INTO `looper`.`states` (`name`) VALUES ('Building');
INSERT INTO `looper`.`states` (`name`) VALUES ('Answering');
INSERT INTO `looper`.`states` (`name`) VALUES ('Closed');


#exercises

INSERT INTO `looper`.`exercises` (`title`) VALUES ('nom');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('tz');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('54');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('ztzu');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('tt');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('t5646z');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('t');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('ztzru');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('z657u');
INSERT INTO `looper`.`exercises` (`title`) VALUES ('657');

#fields

INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('0 ou 5', '1');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('tz0 ou 5rz', '2');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('t0 ou 5zrz', '2');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('tzr0 ou 5z', '1');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('tzrz', '4');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('tzrz0 ou 5', '4');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('0 ou 5tzrz', '7');
INSERT INTO `looper`.`fields` (`label`, `exercises_id`) VALUES ('t0 ou 5zr0 ou 5z', '7');


#answer

INSERT INTO `looper`.`answers` (`answer`, `fields_id`) VALUES ('546', '1');
INSERT INTO `looper`.`answers` (`answer`, `fields_id`) VALUES ('546', '2');
INSERT INTO `looper`.`answers` (`answer`, `fields_id`) VALUES ('546', '1');
INSERT INTO `looper`.`answers` (`answer`, `fields_id`) VALUES ('546', '4');
INSERT INTO `looper`.`answers` (`answer`, `fields_id`) VALUES ('546', '2');