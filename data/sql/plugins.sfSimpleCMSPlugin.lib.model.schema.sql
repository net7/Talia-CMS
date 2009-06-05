
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_simple_cms_page
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_simple_cms_page`;


CREATE TABLE `sf_simple_cms_page`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(255),
	`tree_left` INTEGER  NOT NULL,
	`tree_right` INTEGER  NOT NULL,
	`tree_parent` INTEGER,
	`topic_id` INTEGER,
	`template` VARCHAR(100),
	`is_published` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `sf_simple_cms_page_slug_unique` (`slug`),
	INDEX `sf_simple_cms_page_FI_1` (`tree_parent`),
	CONSTRAINT `sf_simple_cms_page_FK_1`
		FOREIGN KEY (`tree_parent`)
		REFERENCES `sf_simple_cms_page` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_simple_cms_slot
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `sf_simple_cms_slot`;


CREATE TABLE `sf_simple_cms_slot`
(
	`page_id` INTEGER  NOT NULL,
	`culture` VARCHAR(7)  NOT NULL,
	`name` VARCHAR(100)  NOT NULL,
	`type` VARCHAR(100) default 'Text' NOT NULL,
	`value` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`page_id`,`culture`,`name`),
	CONSTRAINT `sf_simple_cms_slot_FK_1`
		FOREIGN KEY (`page_id`)
		REFERENCES `sf_simple_cms_page` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
