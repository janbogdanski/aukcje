#Metadata Plugin - przerobiony
nie na podstawie tablicy tylko bazy

Schema
CREATE TABLE `metadatas` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`path` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`plugin` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`controller` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`action` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`title` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
	`description` TEXT NULL COLLATE 'utf8_unicode_ci',
	`keywords` TEXT NULL COLLATE 'utf8_unicode_ci',
	`og_title` VARCHAR(255) NULL DEFAULT NULL,
	`og_description` TEXT NULL,
	`og_image` TEXT NULL DEFAULT NULL,
	`created` DATETIME NULL DEFAULT NULL,
	`modified` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB;


path to sam slug np. jak-zarabiac-18-dolarow-rocznie
plugin etc - powinny byc malymi literami

ustawia zmienne do widoku, np. w layoucie po uruchomieniu
this->Metadata->meta()

<?php echo $this->get('DESCRIPTION'); ?>
+<?php echo $this->get('KEYWORDS'); ?>
+<?php echo $this->get('OG_TITLE'); ?>
+<?php echo $this->get('OG_DESCRIPTION'); ?>
+<?php echo $this->get('OG_IMAGE'); ?>