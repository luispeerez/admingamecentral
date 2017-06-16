ALTER TABLE domains ADD template varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'redesign' AFTER package;

DELIMITER $$
CREATE TRIGGER expiration_date_trigger	
BEFORE UPDATE ON domain_packages
FOR EACH ROW 
BEGIN
IF NEW.expiration_hours <> OLD.expiration_hours 
then
	SET NEW.expiration_date=DATE_ADD(NOW(), INTERVAL NEW.expiration_hours HOUR);
END IF;
END $$
DELIMITER ;

CREATE TABLE IF NOT EXISTS `domain_trust_logos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `domain` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

ALTER TABLE  `domain_packages` ADD  `publication_time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE  `domain_packages` ADD  `expiration_hours` INT NOT NULL;
ALTER TABLE  `domain_packages` ADD  `expiration_date` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00';

ALTER TABLE `packages` ADD `buyers` 10( INT ) NULL ;


ALTER TABLE `domains` ADD `conditions_es` TEXT NULL ,
ADD `conditions_en` TEXT NULL ;

ALTER TABLE  `domains` ADD  `language` varchar(5);

ALTER TABLE  `domains` ADD  `phone_en` VARCHAR( 20 ) NOT NULL AFTER  `phone` ;
ALTER TABLE  `domains` CHANGE  `phone`  `phone_es` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ;
ALTER TABLE  `domains` ADD  `confirmation_es` TEXT NOT NULL AFTER  `conditions_en` ;
ALTER TABLE  `domains` ADD  `confirmation_en` TEXT NOT NULL AFTER  `confirmation_es` ;
ALTER TABLE  `domains` ADD  `email_booking` VARCHAR( 100 ) NOT NULL AFTER  `email` ;
ALTER TABLE  `domains` ADD  `exchange_rate_dollar` VARCHAR( 200 ) NOT NULL DEFAULT  '1' AFTER  `template` ;


ALTER TABLE  `packages` CHANGE  `price`  `price` DOUBLE NOT NULL ;
ALTER TABLE  `packages` CHANGE  `price`  `price` VARCHAR( 200 ) NOT NULL ;


ALTER TABLE  `domain_packages` DROP  `publication_time` ;
ALTER TABLE  `domain_packages` DROP  `expiration_hours` ;
ALTER TABLE  `domain_packages` CHANGE  `expiration_date`  `expiration_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;


DROP TRIGGER IF EXISTS  `expiration_date_trigger`;

ALTER TABLE  `domains` ADD  `faq_es` TEXT NOT NULL AFTER  `confirmation_en` ;
ALTER TABLE  `domains` ADD  `faq_en` TEXT NOT NULL AFTER  `faq_es` ;