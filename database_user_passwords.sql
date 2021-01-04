CREATE TABLE IF NOT EXISTS `user_doctor` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(50) NOT NULL,
  	`password` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



INSERT INTO user_doctor
(id , username , password , email )
SELECT doctorID ,  REPLACE(CONCAT(LOWER(first_name) ,'.',  LOWER(last_name)) , ' ', '') ,  telephone_number , email
FROM doctor;



CREATE TABLE IF NOT EXISTS `user_patient` (
	`id` varchar(11) NOT NULL ,
  	`username` varchar(50) NOT NULL,
  	`password` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO user_patient
(id , username , password , email )
SELECT SSN ,  REPLACE(CONCAT(LOWER(first_name) ,'.',  LOWER(last_name)) , ' ', '') ,  telephone_number , email
FROM patient;


CREATE TABLE IF NOT EXISTS `user_company` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(50) NOT NULL,
  	`password` varchar(255) NOT NULL,
  	`email` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO user_company
(id , username , password , email )
SELECT companyID , LOWER(name)  ,  telephone_number , email
FROM company;


CREATE TABLE IF NOT EXISTS `user_pharmacy` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  	`username` varchar(50) NOT NULL,
  	`password` varchar(255) NOT NULL,
  	`website` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO user_pharmacy
(id , username , password , website )
SELECT TIN , CONCAT(TIN ,'.',  number )  ,  telephone_number , website
FROM pharmacy;
