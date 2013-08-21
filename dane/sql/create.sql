CREATE  TABLE IF NOT EXISTS `math`.`uzytkownicy` (
  `login` VARCHAR(30) NOT NULL,
  `hash` VARCHAR(50) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `imie` VARCHAR(100) NULL,
  `nazwisko` VARCHAR(100) NULL,
  PRIMARY KEY (`login`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
