-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema looper
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `looper`;
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
                                                    `state_id` INT NOT NULL DEFAULT 1,
                                                    PRIMARY KEY (`id`),
    INDEX `fk_exercises_states_idx` (`state_id` ASC) VISIBLE,
    CONSTRAINT `fk_exercises_states`
    FOREIGN KEY (`state_id`)
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
    `slug` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `looper`.`fields`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `looper`.`fields` (
                                                 `id` INT NOT NULL AUTO_INCREMENT,
                                                 `label` LONGTEXT NULL,
                                                 `line_id` INT NOT NULL DEFAULT 1,
                                                 `exercise_id` INT NOT NULL,
                                                 PRIMARY KEY (`id`),
    INDEX `fk_fields_lines_idx` (`line_id` ASC) VISIBLE,
    INDEX `fk_fields_exercises_idx` (`exercise_id` ASC) VISIBLE,
    CONSTRAINT `fk_fields_lines`
    FOREIGN KEY (`line_id`)
    REFERENCES `looper`.`lines` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT `fk_fields_exercises`
    FOREIGN KEY (`exercise_id`)
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
    `field_id` INT NOT NULL,
    `exercise_id` INT NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_answer_fields_idx` (`field_id` ASC) VISIBLE,
    CONSTRAINT `fk_answer_fields`
    FOREIGN KEY (`field_id`)
    REFERENCES `looper`.`fields` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT `fk_answer_exercises`
    FOREIGN KEY (`exercise_id`)
    REFERENCES `looper`.`exercises` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
    ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- Lines

INSERT INTO `looper`.`lines` (`kind`,`slug`) VALUES ('Single line text','single');
INSERT INTO `looper`.`lines` (`kind`,`slug`) VALUES ('List of single lines','list');
INSERT INTO `looper`.`lines` (`kind`,`slug`) VALUES ('Multi-line text','multi');

-- State

INSERT INTO `looper`.`states` (`name`) VALUES ('Building');
INSERT INTO `looper`.`states` (`name`) VALUES ('Answering');
INSERT INTO `looper`.`states` (`name`) VALUES ('Closed');


-- Exercises

INSERT INTO `looper`.`exercises` (`title`, `state_id`) VALUES ('Manger ou bouger ?', '1');
INSERT INTO `looper`.`exercises` (`title`, `state_id`) VALUES ('Le sport pour vous', '2');
INSERT INTO `looper`.`exercises` (`title`, `state_id`) VALUES ('Une enquête unique au sujet de moi', '3');
INSERT INTO `looper`.`exercises` (`title`, `state_id`) VALUES ('Pour combien ?', '2');

-- Fields

INSERT INTO `looper`.`fields` (`label`, `line_id`, `exercise_id`) VALUES ('Cola ou fanta', '2' ,'1');
INSERT INTO `looper`.`fields` (`label`, `line_id`, `exercise_id`) VALUES ('Corde à sauter ou trampoline', '3' ,'1');
INSERT INTO `looper`.`fields` (`label`, `line_id`, `exercise_id`) VALUES ('WWF ou WWE', '2' ,'1');
INSERT INTO `looper`.`fields` (`label`, `line_id`, `exercise_id`) VALUES ('Intéressant ou pas', '1','2');
INSERT INTO `looper`.`fields` (`label`, `line_id`, `exercise_id`) VALUES ('Combien de fois par semaine', '2' ,'2');
INSERT INTO `looper`.`fields` (`label`, `line_id`, `exercise_id`) VALUES ('Je suis beau ?', '3' ,'3');
INSERT INTO `looper`.`fields` (`label`, `line_id`, `exercise_id`) VALUES ('Pour combien, tu sautes', '1' ,'4');
INSERT INTO `looper`.`fields` (`label`, `line_id`, `exercise_id`) VALUES ('Pour combien, tu frappes', '1' ,'4');


-- Answer

INSERT INTO `looper`.`answers` (`answer`, `field_id`,`exercise_id`) VALUES ('Cola', '1','1');
INSERT INTO `looper`.`answers` (`answer`, `field_id`,`exercise_id`) VALUES ('trampoline', '3','1');
INSERT INTO `looper`.`answers` (`answer`, `field_id`,`exercise_id`) VALUES ('WWE', '2','1');