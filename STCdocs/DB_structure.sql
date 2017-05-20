-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema documentator
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `unit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `unit` ;

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit_title` VARCHAR(45) NOT NULL,
  `unit_parent_id` INT(10) UNSIGNED NULL,
  `unit_ratio` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`unit_id`),
  UNIQUE INDEX `id_UNIQUE` (`unit_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `category` ;

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_title` VARCHAR(255) NOT NULL,
  `category_desc` VARCHAR(255) NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE INDEX `category_id_UNIQUE` (`category_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `currency`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `currency` ;

CREATE TABLE IF NOT EXISTS `currency` (
  `currency_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `currency_code` VARCHAR(45) NOT NULL,
  `currency_value` DECIMAL(12,6) UNSIGNED NULL,
  PRIMARY KEY (`currency_id`),
  UNIQUE INDEX `currency_id_UNIQUE` (`currency_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `material`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `material` ;

CREATE TABLE IF NOT EXISTS `material` (
  `material_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `material_title` VARCHAR(255) NOT NULL,
  `material_price` DECIMAL(12,4) UNSIGNED NOT NULL,
  `material_article` VARCHAR(12) NULL,
  `material_category_id` INT(10) UNSIGNED NULL,
  `material_unit_id` INT(10) UNSIGNED NOT NULL,
  `material_currency_type` INT(10) UNSIGNED NULL,
  `material_delivery` DECIMAL(10,2) UNSIGNED NULL,
  PRIMARY KEY (`material_id`),
  UNIQUE INDEX `material_id_UNIQUE` (`material_id` ASC),
  INDEX `fk_material_unit_idx` (`material_unit_id` ASC),
  INDEX `fk_material_category_idx` (`material_category_id` ASC),
  INDEX `fk_material_currency_idx` (`material_currency_type` ASC),
  CONSTRAINT `fk_material_unit`
    FOREIGN KEY (`material_unit_id`)
    REFERENCES `unit` (`unit_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_material_category`
    FOREIGN KEY (`material_category_id`)
    REFERENCES `category` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_material_currency`
    FOREIGN KEY (`material_currency_type`)
    REFERENCES `currency` (`currency_id`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `recipe`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `recipe` ;

CREATE TABLE IF NOT EXISTS `recipe` (
  `recipe_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Sealant formulation',
  `recipe_title` VARCHAR(255) NOT NULL,
  `recipe_note` MEDIUMTEXT NULL,
  `recipe_date` DATETIME NOT NULL,
  `recipe_update` DATETIME NOT NULL,
  `recipe_approved` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Approved / not approved recipe',
  PRIMARY KEY (`recipe_id`),
  UNIQUE INDEX `recipe_id_UNIQUE` (`recipe_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mr`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mr` ;

CREATE TABLE IF NOT EXISTS `mr` (
  `mr_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mr_percentage` DECIMAL(5,2) UNSIGNED NOT NULL COMMENT 'Percentage of the content of this material in the recipe',
  `mr_recipe_id` INT(10) UNSIGNED NOT NULL,
  `mr_material_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`mr_id`),
  UNIQUE INDEX `idmaterial_to_recipe_UNIQUE` (`mr_id` ASC),
  INDEX `fk_mr_recipe_idx` (`mr_recipe_id` ASC),
  INDEX `fk_mr_material_idx` (`mr_material_id` ASC),
  UNIQUE INDEX `mr_recipe_aterial` (`mr_recipe_id` ASC, `mr_material_id` ASC),
  CONSTRAINT `fk_mr_recipe`
    FOREIGN KEY (`mr_recipe_id`)
    REFERENCES `recipe` (`recipe_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mr_material`
    FOREIGN KEY (`mr_material_id`)
    REFERENCES `material` (`material_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `category_product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `category_product` ;

CREATE TABLE IF NOT EXISTS `category_product` (
  `category_product_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_product_title` VARCHAR(255) NOT NULL,
  `category_product_desc` VARCHAR(255) NULL,
  `category_product_img` VARCHAR(255) NULL,
  PRIMARY KEY (`category_product_id`),
  UNIQUE INDEX `category_id_UNIQUE` (`category_product_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `product` ;

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_title` VARCHAR(255) NOT NULL,
  `product_capacity_hour` INT(10) UNSIGNED NOT NULL COMMENT 'productivity of current product per hour',
  `product_date` DATETIME NOT NULL,
  `product_update` DATETIME NOT NULL,
  `product_unit_id` INT(10) UNSIGNED NOT NULL,
  `product_price` DECIMAL(12,2) UNSIGNED NULL COMMENT 'Selling price',
  `product_category_id` INT(11) UNSIGNED NULL,
  `product_weight` INT(12) UNSIGNED NULL,
  `product_length` INT(12) UNSIGNED NULL,
  `product_width` INT(12) UNSIGNED NULL,
  `product_thickness` INT(12) UNSIGNED NULL,
  `product_note` MEDIUMTEXT NULL,
  `product_recipe_id` INT(10) UNSIGNED NULL,
  `product_vendor_code` VARCHAR(45) NULL,
  `product_archiv` TINYINT(1) UNSIGNED NULL DEFAULT 0,
  `product_tech_map` VARCHAR(255) NULL,
  `product_tech_desc` VARCHAR(255) NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE INDEX `product_id_UNIQUE` (`product_id` ASC),
  INDEX `fk_product_unit_idx` (`product_unit_id` ASC),
  INDEX `product_category_id` (`product_category_id` ASC),
  INDEX `fk_product_recipe_idx` (`product_recipe_id` ASC),
  CONSTRAINT `fk_product_unit`
    FOREIGN KEY (`product_unit_id`)
    REFERENCES `unit` (`unit_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_category`
    FOREIGN KEY (`product_category_id`)
    REFERENCES `category_product` (`category_product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_recipe`
    FOREIGN KEY (`product_recipe_id`)
    REFERENCES `recipe` (`recipe_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pm`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pm` ;

CREATE TABLE IF NOT EXISTS `pm` (
  `pm_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pm_product_id` INT(10) UNSIGNED NOT NULL,
  `pm_material_id` INT(10) UNSIGNED NOT NULL,
  `pm_quantity` DECIMAL(12,4) UNSIGNED NOT NULL,
  `pm_unit_id` INT(10) UNSIGNED NOT NULL,
  `pm_square` TINYINT(1) UNSIGNED NULL,
  PRIMARY KEY (`pm_id`),
  UNIQUE INDEX `pm_id_UNIQUE` (`pm_id` ASC),
  INDEX `fk_pm_unit_idx` (`pm_unit_id` ASC),
  INDEX `fk_pm_material_idx` (`pm_material_id` ASC),
  INDEX `fk_pm_product_idx` (`pm_product_id` ASC),
  UNIQUE INDEX `product_material` (`pm_product_id` ASC, `pm_material_id` ASC),
  CONSTRAINT `fk_pm_unit`
    FOREIGN KEY (`pm_unit_id`)
    REFERENCES `unit` (`unit_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pm_material`
    FOREIGN KEY (`pm_material_id`)
    REFERENCES `material` (`material_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pm_product`
    FOREIGN KEY (`pm_product_id`)
    REFERENCES `product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `file`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `file` ;

CREATE TABLE IF NOT EXISTS `file` (
  `file_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_data` MEDIUMBLOB NOT NULL,
  `file_product_id` INT(10) UNSIGNED NOT NULL,
  `file_title` VARCHAR(255) NOT NULL,
  `file_desc` VARCHAR(255) NULL,
  PRIMARY KEY (`file_id`),
  UNIQUE INDEX `file_id_UNIQUE` (`file_id` ASC),
  INDEX `fk_file_product_idx` (`file_product_id` ASC),
  CONSTRAINT `fk_file_product`
    FOREIGN KEY (`file_product_id`)
    REFERENCES `product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pack`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pack` ;

CREATE TABLE IF NOT EXISTS `pack` (
  `pack_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pack_title` VARCHAR(255) NOT NULL,
  `pack_desc` VARCHAR(255) NULL,
  `pack_price` DECIMAL(12,4) UNSIGNED NOT NULL,
  `pack_weight` DECIMAL(12,4) UNSIGNED NULL,
  PRIMARY KEY (`pack_id`),
  UNIQUE INDEX `pack_id_UNIQUE` (`pack_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pap`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pap` ;

CREATE TABLE IF NOT EXISTS `pap` (
  `pap_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pap_pack_id` INT(10) UNSIGNED NOT NULL,
  `pap_product_id` INT(10) UNSIGNED NOT NULL,
  `pap_capacity` DECIMAL(12,2) UNSIGNED NULL,
  PRIMARY KEY (`pap_id`),
  UNIQUE INDEX `pap_id_UNIQUE` (`pap_id` ASC),
  INDEX `fk_pap_pack_idx` (`pap_pack_id` ASC),
  INDEX `fk_pap_product_idx` (`pap_product_id` ASC),
  INDEX `pack_product` (`pap_pack_id` ASC, `pap_product_id` ASC),
  CONSTRAINT `fk_pap_pack`
    FOREIGN KEY (`pap_pack_id`)
    REFERENCES `pack` (`pack_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pap_product`
    FOREIGN KEY (`pap_product_id`)
    REFERENCES `product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `position`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `position` ;

CREATE TABLE IF NOT EXISTS `position` (
  `position_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `position_title` VARCHAR(255) NOT NULL,
  `position_desc` VARCHAR(255) NULL,
  `position_salary_hour` DECIMAL(12,2) UNSIGNED NULL COMMENT 'Salary per hour',
  PRIMARY KEY (`position_id`),
  UNIQUE INDEX `position_id_UNIQUE` (`position_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pop`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pop` ;

CREATE TABLE IF NOT EXISTS `pop` (
  `pop_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pop_position_id` INT(10) UNSIGNED NOT NULL,
  `pop_product_id` INT(10) UNSIGNED NOT NULL,
  `pop_num` DECIMAL(10,2) UNSIGNED NOT NULL COMMENT 'number workers on current position for  this product',
  PRIMARY KEY (`pop_id`),
  UNIQUE INDEX `pop_pop_UNIQUE` (`pop_id` ASC),
  INDEX `fk_pop_product_idx` (`pop_product_id` ASC),
  INDEX `fk_pop_position_idx` (`pop_position_id` ASC),
  UNIQUE INDEX `product_position` (`pop_position_id` ASC, `pop_product_id` ASC),
  CONSTRAINT `fk_pop_product`
    FOREIGN KEY (`pop_product_id`)
    REFERENCES `product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pop_position`
    FOREIGN KEY (`pop_position_id`)
    REFERENCES `position` (`position_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loss`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `loss` ;

CREATE TABLE IF NOT EXISTS `loss` (
  `loss_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `loss_title` VARCHAR(255) NOT NULL COMMENT 'Table of additional losses in the production of current product',
  `loss_desc` VARCHAR(255) NULL,
  PRIMARY KEY (`loss_id`),
  UNIQUE INDEX `loss_loss_UNIQUE` (`loss_id` ASC))
ENGINE = InnoDB
COMMENT = 'table for additional losses ';


-- -----------------------------------------------------
-- Table `lp`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lp` ;

CREATE TABLE IF NOT EXISTS `lp` (
  `lp_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lp_loss_id` INT(10) UNSIGNED NOT NULL,
  `lp_product_id` INT(10) UNSIGNED NOT NULL,
  `lp_percentage` DECIMAL(10,2) UNSIGNED NOT NULL,
  PRIMARY KEY (`lp_id`),
  UNIQUE INDEX `lp_lp_UNIQUE` (`lp_id` ASC),
  INDEX `fk_lp_loss_idx` (`lp_loss_id` ASC),
  INDEX `fk_lp_product_idx` (`lp_product_id` ASC),
  UNIQUE INDEX `loss_product` (`lp_loss_id` ASC, `lp_product_id` ASC),
  CONSTRAINT `fk_lp_loss`
    FOREIGN KEY (`lp_loss_id`)
    REFERENCES `loss` (`loss_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_lp_product`
    FOREIGN KEY (`lp_product_id`)
    REFERENCES `product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `other_expenses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `other_expenses` ;

CREATE TABLE IF NOT EXISTS `other_expenses` (
  `other_expenses_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `other_expenses_title` VARCHAR(255) NOT NULL,
  `other_expenses_desc` VARCHAR(255) NULL,
  PRIMARY KEY (`other_expenses_id`),
  UNIQUE INDEX `other_expenses_id_UNIQUE` (`other_expenses_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `op`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `op` ;

CREATE TABLE IF NOT EXISTS `op` (
  `op_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `op_other_id` INT(10) UNSIGNED NOT NULL,
  `op_product_id` INT(10) UNSIGNED NOT NULL,
  `op_cost_hour` DECIMAL(12,4) UNSIGNED NOT NULL,
  PRIMARY KEY (`op_id`),
  UNIQUE INDEX `op_id_UNIQUE` (`op_id` ASC),
  INDEX `fk_op_other_idx` (`op_other_id` ASC),
  INDEX `fk_op_product_idx` (`op_product_id` ASC),
  UNIQUE INDEX `other_product` (`op_other_id` ASC, `op_product_id` ASC),
  CONSTRAINT `fk_op_other`
    FOREIGN KEY (`op_other_id`)
    REFERENCES `other_expenses` (`other_expenses_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_op_product`
    FOREIGN KEY (`op_product_id`)
    REFERENCES `product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `solution`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `solution` ;

CREATE TABLE IF NOT EXISTS `solution` (
  `solution_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `solution_title` VARCHAR(255) NOT NULL,
  `solution_desc` MEDIUMBLOB NULL,
  PRIMARY KEY (`solution_id`),
  UNIQUE INDEX `solution_id_UNIQUE` (`solution_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sp`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sp` ;

CREATE TABLE IF NOT EXISTS `sp` (
  `sp_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sp_solution_id` INT(10) UNSIGNED NOT NULL,
  `sp_product_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`sp_id`),
  UNIQUE INDEX `sp_id_UNIQUE` (`sp_id` ASC),
  INDEX `fk_sp_solution_idx` (`sp_solution_id` ASC),
  INDEX `fk_sp_product_idx` (`sp_product_id` ASC),
  UNIQUE INDEX `solution_product` (`sp_solution_id` ASC, `sp_product_id` ASC),
  CONSTRAINT `fk_sp_solution`
    FOREIGN KEY (`sp_solution_id`)
    REFERENCES `solution` (`solution_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sp_product`
    FOREIGN KEY (`sp_product_id`)
    REFERENCES `product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `parameter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `parameter` ;

CREATE TABLE IF NOT EXISTS `parameter` (
  `parameter_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parameter_title` VARCHAR(255) NOT NULL,
  `parameter_desc` VARCHAR(255) NULL,
  PRIMARY KEY (`parameter_id`),
  UNIQUE INDEX `parameter_id_UNIQUE` (`parameter_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `papr`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `papr` ;

CREATE TABLE IF NOT EXISTS `papr` (
  `papr_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `papr_parameter_id` INT(10) UNSIGNED NOT NULL,
  `papr_product_id` INT(10) UNSIGNED NOT NULL,
  `papr_value` VARCHAR(45) NULL,
  `papr_unit_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`papr_id`),
  UNIQUE INDEX `papr_id_UNIQUE` (`papr_id` ASC),
  INDEX `fk_papr_parameter_idx` (`papr_parameter_id` ASC),
  INDEX `fk_papr_product_idx` (`papr_product_id` ASC),
  INDEX `fk_papr_unit_idx` (`papr_unit_id` ASC),
  UNIQUE INDEX `product_parameter` (`papr_parameter_id` ASC, `papr_product_id` ASC),
  CONSTRAINT `fk_papr_parameter`
    FOREIGN KEY (`papr_parameter_id`)
    REFERENCES `parameter` (`parameter_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_papr_product`
    FOREIGN KEY (`papr_product_id`)
    REFERENCES `product` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_papr_unit`
    FOREIGN KEY (`papr_unit_id`)
    REFERENCES `unit` (`unit_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `calculation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `calculation` ;

CREATE TABLE IF NOT EXISTS `calculation` (
  `calculation_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `calculation_product_id` INT(10) UNSIGNED NULL,
  `calculation_product_title` VARCHAR(255) NOT NULL,
  `calculation_date` DATETIME NOT NULL,
  `calculation_note` MEDIUMTEXT NULL,
  `calculation_product_capacity_hour` INT(10) UNSIGNED NOT NULL,
  `calculation_weight` INT(12) UNSIGNED NULL,
  `calculation_length` INT(12) UNSIGNED NULL,
  `calculation_width` INT(12) UNSIGNED NULL,
  `calculation_thickness` INT(12) UNSIGNED NULL,
  `calculation_unit` VARCHAR(255) NULL,
  `calculation_materials_data` MEDIUMTEXT NULL,
  `calculation_recipe_data` MEDIUMTEXT NULL,
  `calculation_packs_data` MEDIUMTEXT NULL,
  `calculation_positions_data` MEDIUMTEXT NULL,
  `calculation_expenses_data` MEDIUMTEXT NULL,
  `calculation_losses_data` MEDIUMTEXT NULL,
  `calculation_archive` SMALLINT(1) UNSIGNED NULL,
  PRIMARY KEY (`calculation_id`),
  UNIQUE INDEX `calculation_id_UNIQUE` (`calculation_id` ASC),
  INDEX `fk_calc_prod_idx` (`calculation_product_id` ASC),
  CONSTRAINT `fk_calc_prod`
    FOREIGN KEY (`calculation_product_id`)
    REFERENCES `product` (`product_id`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
