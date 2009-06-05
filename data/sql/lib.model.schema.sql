
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_guard_user_profile
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_guard_user_profile`;


CREATE TABLE `sf_guard_user_profile`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`first_name` VARCHAR(20),
	`last_name` VARCHAR(20),
	`birthday` DATE,
	`email` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `sf_guard_user_profile_FI_1` (`user_id`),
	CONSTRAINT `sf_guard_user_profile_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- products
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `products`;


CREATE TABLE `products`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`label` VARCHAR(255),
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- product_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `product_i18n`;


CREATE TABLE `product_i18n`
(
	`name` VARCHAR(255),
	`description` TEXT,
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `product_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `products` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- product_category
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `product_category`;


CREATE TABLE `product_category`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`label` VARCHAR(255),
	`tree_left` INTEGER,
	`tree_right` INTEGER,
	`tree_parent` INTEGER,
	`topic_id` INTEGER,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- product_category_i18n
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `product_category_i18n`;


CREATE TABLE `product_category_i18n`
(
	`name` VARCHAR(255),
	`description` TEXT,
	`id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	PRIMARY KEY (`id`,`culture`),
	CONSTRAINT `product_category_i18n_FK_1`
		FOREIGN KEY (`id`)
		REFERENCES `product_category` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
