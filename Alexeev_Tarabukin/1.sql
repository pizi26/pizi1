-- MySQL Script generated by MySQL Workbench
-- Thu Dec 13 17:10:03 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema AlekseevStanislavDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema AlekseevStanislavDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `AlekseevStanislavDB` DEFAULT CHARACTER SET utf8 ;
USE `AlekseevStanislavDB` ;

CREATE TABLE IF NOT EXISTS `AlekseevStanislavDB`.`Workers` (
  `Passport` INT NOT NULL,
  `First_Name` VARCHAR(45) NULL DEFAULT NULL,
  `Last_Name` VARCHAR(45) NULL DEFAULT NULL,
  `Fathers_Name` VARCHAR(45) NULL DEFAULT NULL,
  `Science_degree` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`Passport`));

CREATE TABLE IF NOT EXISTS `AlekseevStanislavDB`.`Patients` (
  `idPatients` INT NOT NULL,
  `First_Name` VARCHAR(45) NULL DEFAULT NULL,
  `Last_Name` VARCHAR(45) NULL DEFAULT NULL,
  `Fathers_Name` VARCHAR(45) NULL DEFAULT NULL,
  `Passport_Series` INT NULL DEFAULT NULL,
  `Passport_Number` INT NULL DEFAULT NULL,
  `Adress` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idPatients`));

CREATE TABLE IF NOT EXISTS `AlekseevStanislavDB`.`Specialisations` (
  `idSpecializations` INT NOT NULL,
  `SpName` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idSpecializations`));

CREATE TABLE IF NOT EXISTS `AlekseevStanislavDB`.`ConsultingRooms` (
  `idCab` INT NOT NULL,
  `NUMcab` INT NULL DEFAULT NULL,
  `StartWork` TIME NULL DEFAULT NULL,
  `EndWork` TIME NULL DEFAULT NULL,
  PRIMARY KEY (`idCab`));

CREATE TABLE IF NOT EXISTS `AlekseevStanislavDB`.`Specialists` (
  `idSpecialist` INT NOT NULL,
  PRIMARY KEY (`idSpecialist`),
  `PassportSP` INT REFERENCES `AlekseevStanislavDB`.`Workers` (`Passport`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  `idSpecializationsSP` INT REFERENCES `AlekseevStanislavDB`.`Specialisations` (`idSpecializations`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  `idCabSP` INT REFERENCES `AlekseevStanislavDB`.`ConsultingRooms` (`idCab`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `AlekseevStanislavDB`.`PatientsCard` (
  `idPatientsSP` int REFERENCES `AlekseevStanislavDB`.`Patients` (`idPatients`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  `First_NameSP` VARCHAR(45) REFERENCES `AlekseevStanislavDB`.`Patients` (`First_Name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  `Last_NameSP` VARCHAR(45) REFERENCES `AlekseevStanislavDB`.`Patients` (`Last_Name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  `Fathers_NameSP` VARCHAR(45) REFERENCES `AlekseevStanislavDB`.`Patients` (`Fathers_Name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
   `idsessionsSP` int REFERENCES `AlekseevStanislavDB`.`sessions` (`idsessions`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,);

CREATE TABLE IF NOT EXISTS `AlekseevStanislavDB`.`diagnosis` (
  `iddiagnosis` INT NOT NULL,
  `nameDia` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`iddiagnosis`));

CREATE TABLE IF NOT EXISTS `AlekseevStanislavDB`.`sessions` (
  `idsessions` INT NOT NULL,
  `Specialists_idSpecialists` INT REFERENCES `AlekseevStanislavDB`.`Specialists` (`idSpecialist`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  `timeStart` TIME NULL DEFAULT NULL,
  `timeFinish` TIME NULL DEFAULT NULL,
  `Patients_idPatients` INT REFERENCES `AlekseevStanislavDB`.`Patients` (`idPatients`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  `diagnosis_iddiagnosis` INT REFERENCES `AlekseevStanislavDB`.`diagnosis` (`iddiagnosis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  `lechenie` VARCHAR(45) NULL DEFAULT NULL,
  `sledSpec` INT REFERENCES `AlekseevStanislavDB`.`Specialisations` (`idSpecializations`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    PRIMARY KEY (`idsessions`));

CREATE TABLE IF NOT EXISTS `AlekseevStanislavDB`.`PatientsDiagnosis` (
  `Patients_idPatients` INT REFERENCES `AlekseevStanislavDB`.`Patients` (`idPatients`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  `diagnosis_iddiagnosis` INT REFERENCES `AlekseevStanislavDB`.`diagnosis` (`iddiagnosis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;