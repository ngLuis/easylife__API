
-- -----------------------------------------------------
-- Schema dbeasylife
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbeasylife
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbeasylife` DEFAULT CHARACTER SET utf8 ;
USE `dbeasylife` ;

-- -----------------------------------------------------
-- Table `dbeasylife`.`Categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbeasylife`.`Categorias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `imagen` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbeasylife`.`Servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbeasylife`.`Servicios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `idCategoria` INT NULL,
  `precio` DECIMAL(5,2) NOT NULL,
  `imagen` VARCHAR(255) NULL,
  `descripcion` TEXT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk1_servicios_idx` (`idCategoria` ASC),
  CONSTRAINT `fk1_servicios`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `dbeasylife`.`Categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbeasylife`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbeasylife`.`Usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `telefono` INT NOT NULL,
  `direccion` VARCHAR(255) NOT NULL,
  `dni` VARCHAR(9) NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `acreditacion` VARCHAR(45) NULL,
  `contrasenya` VARCHAR(255) NOT NULL,
  `imagen` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `DNI_UNIQUE` (`dni` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbeasylife`.`Compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbeasylife`.`Compra` (
  `idServicio` INT NOT NULL,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`idServicio`, `idUsuario`),
  INDEX `fk2_compras_idx` (`idUsuario` ASC),
  CONSTRAINT `fk1_compras`
    FOREIGN KEY (`idServicio`)
    REFERENCES `dbeasylife`.`Servicios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk2_compras`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `dbeasylife`.`Usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbeasylife`.`Provee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbeasylife`.`Provee` (
  `idServicio` INT NOT NULL,
  `idProveedor` INT NOT NULL,
  PRIMARY KEY (`idServicio`, `idProveedor`),
  INDEX `fk2_provee_idx` (`idProveedor` ASC),
  CONSTRAINT `fk1_provee`
    FOREIGN KEY (`idServicio`)
    REFERENCES `dbeasylife`.`Servicios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk2_provee`
    FOREIGN KEY (`idProveedor`)
    REFERENCES `dbeasylife`.`Usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbeasylife`.`Colaboradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbeasylife`.`Colaboradores` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `imagen` VARCHAR(255) NULL,
  PRIMARY KEY (`Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbeasylife`.`Colabora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbeasylife`.`Colabora` (
  `idServicio` INT NOT NULL,
  `idColaborador` INT NOT NULL,
  PRIMARY KEY (`idServicio`, `idColaborador`),
  INDEX `fk2_colabora_idx` (`idColaborador` ASC),
  CONSTRAINT `fk1_colabora`
    FOREIGN KEY (`idServicio`)
    REFERENCES `dbeasylife`.`Servicios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk2_colabora`
    FOREIGN KEY (`idColaborador`)
    REFERENCES `dbeasylife`.`Colaboradores` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbeasylife`.`ImagenesCarrousel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbeasylife`.`ImagenesCarrousel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `imagen` VARCHAR(255) NOT NULL,
  `titulo` VARCHAR(100) NULL,
  `descripcion` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;