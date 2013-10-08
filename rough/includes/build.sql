# .sql to initialize rental database

#Create person table
CREATE TABLE person (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	studentid VARCHAR(128),
	type ENUM('Admin', 'Frontend', 'Student') NOT NULL,
	status ENUM('active', 'disabled') NOT NULL,
	firstname VARCHAR(255),
	lastname VARCHAR(255),
	address1 VARCHAR(255),
	address2 VARCHAR(255),
	zip INT(9),
	email VARCHAR(128)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

#Create equipment table
CREATE TABLE equipment (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	serialNo VARCHAR(255) NOT NULL,
	addedDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	name VARCHAR(128) NOT NULL,
	description VARCHAR(512),
	status ENUM('rented', 'repair', 'inactive', 'available') DEFAULT 'available',
	rentedTo VARCHAR(128) DEFAULT 'available'
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

# Adding equipment to equipment table
INSERT INTO equipment SET
serialNo = '002ws5xj7',
name = 'camera 1',
description = 'This is a sweet camera',
status = 'available';



# Adding Accounts to person table

INSERT INTO person SET
studentid = '00001',
type = 'Admin',
status = 'active',
firstname = 'David',
lastname = 'Herscher',
address1 = '122 Gladstone Way',
address2 = 'Newark DE',
zip = '17702',
email = 'heer3906@chawk.cecil.edu';

INSERT INTO person SET
studentid = '00002',
type = 'Frontend',
status = 'active',
firstname = 'Bruce',
lastname = 'Lee',
address1 = '441 Madstone Dr',
address2 = 'Newark DE',
zip = '17702',
email = 'brucelee@karate.com';

INSERT INTO person SET
studentid = '00003',
type = 'Student',
status = 'active',
firstname = 'Chuck',
lastname = 'Norris',
address1 = '356 Poopy Ct',
address2 = 'Newark DE',
zip = '17702',
email = 'walker@texaxranger.com';