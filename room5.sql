-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema fyp
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema fyp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `fyp` DEFAULT CHARACTER SET utf8 ;
USE `fyp` ;

-- -----------------------------------------------------
-- Table `fyp`.`announcement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fyp`.`announcement` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(70) NOT NULL,
  `description` TEXT NOT NULL,
  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fyp`.`student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fyp`.`student` (
  `regNo` VARCHAR(13) NOT NULL,
  `fName` VARCHAR(25) NOT NULL,
  `mName` VARCHAR(25) NULL DEFAULT NULL,
  `lName` VARCHAR(25) NOT NULL,
  `email` VARCHAR(30) NOT NULL,
  `phoneNo` VARCHAR(20) NOT NULL,
  `course` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`regNo`),
  UNIQUE INDEX `regNo` (`regNo` ASC),
  INDEX `lName` (`lName` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fyp`.`supervisor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fyp`.`supervisor` (
  `empId` VARCHAR(13) NOT NULL,
  `fName` VARCHAR(25) NOT NULL,
  `lName` VARCHAR(25) NOT NULL,
  `email` VARCHAR(25) NOT NULL,
  `phoneNo` VARCHAR(15) NOT NULL,
  `expertise` VARCHAR(50) NOT NULL,
  `privilege` VARCHAR(10) NOT NULL DEFAULT 'Normal',
  PRIMARY KEY (`empId`),
  INDEX `empId` (`empId` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fyp`.`project`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fyp`.`project` (
  `projectId` INT(5) NOT NULL AUTO_INCREMENT,
  `projectTitle` VARCHAR(250) NOT NULL,
  `description` TEXT NOT NULL,
  `output` TEXT NOT NULL,
  `supervisor_empId` VARCHAR(13) NOT NULL,
  PRIMARY KEY (`projectId`),
  INDEX `fk_project_supervisor1_idx` (`supervisor_empId` ASC),
  CONSTRAINT `fk_project_supervisor1`
    FOREIGN KEY (`supervisor_empId`)
    REFERENCES `fyp`.`supervisor` (`empId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fyp`.`conceptnote`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fyp`.`conceptnote` (
  `conceptid` VARCHAR(15) NOT NULL,
  `proposedtitle` VARCHAR(100) NOT NULL,
  `problemstatement` TEXT NOT NULL,
  `significance` VARCHAR(120) NOT NULL,
  `expectedoutput` VARCHAR(50) NOT NULL,
  `approval` VARCHAR(20) NULL DEFAULT NULL,
  `student_regNo` VARCHAR(13) NOT NULL,
  `project_projectId` INT(5) NOT NULL,
  PRIMARY KEY (`conceptid`),
  INDEX `fk_conceptnote_student1_idx` (`student_regNo` ASC),
  INDEX `fk_conceptnote_project1_idx` (`project_projectId` ASC),
  CONSTRAINT `fk_conceptnote_student1`
    FOREIGN KEY (`student_regNo`)
    REFERENCES `fyp`.`student` (`regNo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_conceptnote_project1`
    FOREIGN KEY (`project_projectId`)
    REFERENCES `fyp`.`project` (`projectId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fyp`.`grp`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fyp`.`grp` (
  `grpId` INT(7) NOT NULL,
  `grpNo` INT(11) NOT NULL,
  `approval` INT(11) NOT NULL,
  `proposedTitle` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`grpId`),
  INDEX `grpNo` (`grpNo` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fyp`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fyp`.`login` (
  `user` VARCHAR(13) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `role` INT(11) NOT NULL,
  `student_regNo` VARCHAR(13) NOT NULL,
  `supervisor_empId` VARCHAR(13) NOT NULL,
  PRIMARY KEY (`user`),
  INDEX `user` USING BTREE (`user` ASC),
  INDEX `password` (`password` ASC),
  INDEX `fk_login_student_idx` (`student_regNo` ASC),
  INDEX `fk_login_supervisor1_idx` (`supervisor_empId` ASC),
  CONSTRAINT `fk_login_student`
    FOREIGN KEY (`student_regNo`)
    REFERENCES `fyp`.`student` (`regNo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_login_supervisor1`
    FOREIGN KEY (`supervisor_empId`)
    REFERENCES `fyp`.`supervisor` (`empId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fyp`.`progressreport`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fyp`.`progressreport` (
  `reportId` INT(5) NOT NULL AUTO_INCREMENT,
  `reports` BLOB NULL DEFAULT NULL,
  `final` VARCHAR(100) NULL DEFAULT NULL,
  `project_projectId` INT(5) NOT NULL,
  PRIMARY KEY (`reportId`),
  INDEX `fk_progressreport_project1_idx` (`project_projectId` ASC),
  CONSTRAINT `fk_progressreport_project1`
    FOREIGN KEY (`project_projectId`)
    REFERENCES `fyp`.`project` (`projectId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fyp`.`logs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fyp`.`logs` (
  `idlogs` INT(11) NOT NULL AUTO_INCREMENT,
  `time` TIMESTAMP(6) NULL DEFAULT NULL,
  `progressreport_reportId` INT(5) NOT NULL,
  PRIMARY KEY (`idlogs`),
  INDEX `fk_logs_progressreport1_idx` (`progressreport_reportId` ASC),
  CONSTRAINT `fk_logs_progressreport1`
    FOREIGN KEY (`progressreport_reportId`)
    REFERENCES `fyp`.`progressreport` (`reportId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `fyp`.`pastproject`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fyp`.`pastproject` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `title` TEXT NOT NULL,
  `year` YEAR(4) NOT NULL,
  `description` TEXT NOT NULL,
  `output` TEXT NOT NULL,
  `students` TEXT NOT NULL,
  `supervisor_empId` VARCHAR(13) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pastproject_supervisor1_idx` (`supervisor_empId` ASC),
  CONSTRAINT `fk_pastproject_supervisor1`
    FOREIGN KEY (`supervisor_empId`)
    REFERENCES `fyp`.`supervisor` (`empId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `fyp`.`members`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fyp`.`members` (
  `idmembers` INT NOT NULL,
  `members1` VARCHAR(45) NULL,
  `members2` VARCHAR(45) NULL,
  `members3` VARCHAR(45) NULL,
  `grp_grpId` INT(7) NOT NULL,
  PRIMARY KEY (`idmembers`),
  INDEX `fk_members_grp1_idx` (`grp_grpId` ASC),
  INDEX `fk_members_student1_idx` (`members1` ASC, `members2` ASC, `members3` ASC),
  CONSTRAINT `fk_members_grp1`
    FOREIGN KEY (`grp_grpId`)
    REFERENCES `fyp`.`grp` (`grpId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_members_student1`
    FOREIGN KEY (`members1` , `members2` , `members3`)
    REFERENCES `fyp`.`student` (`regNo` , `regNo` , `regNo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
