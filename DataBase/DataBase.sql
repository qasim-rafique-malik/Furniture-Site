
-- table for admin role
CREATE TABLE IF NOT EXISTS `admin_role` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`admin_role` ENUM("Superadmin", "Subadmin") DEFAULT 'Subadmin',
	`role_status` ENUM("Active","Inactive") DEFAULT 'Active',
	CONSTRAINT pk_admin_role PRIMARY KEY(id)
);

-- Table for admin login
CREATE TABLE IF NOT EXISTS `admin_login`(
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(255) NOT NULL,
	`last_name` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`role_id` INT(255) NOT NULL,
	`admin_status` ENUM("Active", "Inacitve"),
	CONSTRAINT pK_admin_login PRIMARY KEY(id),
	CONSTRAINT fk_admin_role FOREIGN KEY(role_id) REFERENCES admin_role(id)	
)
