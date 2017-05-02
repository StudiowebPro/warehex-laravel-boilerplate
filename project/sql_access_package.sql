/* ---------------------------------------------------- */
/*  Generated by Enterprise Architect Version 12.1 		*/
/*  Created On : 02-���-2017 1:24:13 				*/
/*  DBMS       : MySql 						*/
/* ---------------------------------------------------- */

SET FOREIGN_KEY_CHECKS=0 
;

/* Drop Tables */

DROP TABLE IF EXISTS `permission_role` CASCADE
;

DROP TABLE IF EXISTS `permissions` CASCADE
;

DROP TABLE IF EXISTS `role_user` CASCADE
;

DROP TABLE IF EXISTS `roles` CASCADE
;

DROP TABLE IF EXISTS `social_logins` CASCADE
;

DROP TABLE IF EXISTS `users` CASCADE
;

/* Create Tables */

CREATE TABLE `permission_role`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`permission_id` INT UNSIGNED NOT NULL,
	`role_id` INT UNSIGNED NOT NULL,
	CONSTRAINT `PK_permission_role` PRIMARY KEY (`id` ASC)
)
ENGINE=InnoDB
DEFAULT CHARSET utf8mb4
COLLATE utf8mb4_unicode_ci

;

CREATE TABLE `permissions`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(191) NOT NULL,
	`display_name` VARCHAR(191) NOT NULL,
	`all` TINYINT 	 NULL,
	`sort` SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	`created_at` TIMESTAMP 	 NULL,
	`updated_at` TIMESTAMP 	 NULL,
	CONSTRAINT `PK_permissions` PRIMARY KEY (`id` ASC)
)
ENGINE=InnoDB
DEFAULT CHARSET utf8mb4
COLLATE utf8mb4_unicode_ci

;

CREATE TABLE `role_user`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_id` INT UNSIGNED NOT NULL,
	`role_id` INT UNSIGNED NOT NULL,
	CONSTRAINT `PK_role_user` PRIMARY KEY (`id` ASC)
)
ENGINE=InnoDB
DEFAULT CHARSET utf8mb4
COLLATE utf8mb4_unicode_ci

;

CREATE TABLE `roles`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(191) NOT NULL,
	`all` TINYINT NOT NULL DEFAULT 0,
	`sort` SMALLINT UNSIGNED NOT NULL DEFAULT 0,
	`created_at` TIMESTAMP 	 NULL,
	`updated_at` TIMESTAMP 	 NULL,
	CONSTRAINT `PK_roles` PRIMARY KEY (`id` ASC)
)
ENGINE=InnoDB
DEFAULT CHARSET utf8mb4
COLLATE utf8mb4_unicode_ci

;

CREATE TABLE `social_logins`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_id` INT UNSIGNED NOT NULL,
	`provider` VARCHAR(32) NOT NULL,
	`provider_id` VARCHAR(191) NOT NULL,
	`token` VARCHAR(191) 	 NULL,
	`avatar` VARCHAR(191) 	 NULL,
	`created_at` TIMESTAMP 	 NULL,
	`updated_at` TIMESTAMP 	 NULL,
	CONSTRAINT `PK_social_logins` PRIMARY KEY (`id` ASC)
)
ENGINE=InnoDB
DEFAULT CHARSET utf8mb4
COLLATE utf8mb4_unicode_ci

;

CREATE TABLE `users`
(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(191) NOT NULL,
	`email` VARCHAR(191) NOT NULL,
	`password` VARCHAR(191) 	 NULL,
	`status` TINYINT UNSIGNED NOT NULL DEFAULT 1,
	`confirmation_code` VARCHAR(191) 	 NULL,
	`confirmed` TINYINT NOT NULL DEFAULT 0,
	`remember_token` VARCHAR(100) 	 NULL,
	`created_at` TIMESTAMP 	 NULL,
	`updated_at` TIMESTAMP 	 NULL,
	`deleted_at` TIMESTAMP 	 NULL,
	CONSTRAINT `PK_users` PRIMARY KEY (`id` ASC)
)
ENGINE=InnoDB
DEFAULT CHARSET utf8mb4
COLLATE utf8mb4_unicode_ci

;

/* Create Primary Keys, Indexes, Uniques, Checks */

ALTER TABLE `permissions` 
 ADD CONSTRAINT `permissions_name_unique` UNIQUE (`name` ASC)
;

ALTER TABLE `roles` 
 ADD CONSTRAINT `roles_name_unique` UNIQUE (`name` ASC)
;

ALTER TABLE `users` 
 ADD CONSTRAINT `users_email_unique` UNIQUE (`email` ASC)
;

/* Create Foreign Key Constraints */

ALTER TABLE `permission_role` 
 ADD CONSTRAINT `permission_role_permission_id_foreign`
	FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE Cascade ON UPDATE No Action
;

ALTER TABLE `permission_role` 
 ADD CONSTRAINT `permission_role_role_id_foreign`
	FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE Cascade ON UPDATE No Action
;

ALTER TABLE `role_user` 
 ADD CONSTRAINT `role_user_role_id_foreign`
	FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE Cascade ON UPDATE No Action
;

ALTER TABLE `role_user` 
 ADD CONSTRAINT `role_user_user_id_foreign`
	FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE Cascade ON UPDATE No Action
;

ALTER TABLE `social_logins` 
 ADD CONSTRAINT `social_logins_user_id_foreign`
	FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE Cascade ON UPDATE No Action
;

SET FOREIGN_KEY_CHECKS=1 
;