# Code to create a simple joke table

CREATE TABLE person (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(255),
	lastname VARCHAR(255),
	email VARCHAR(255)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;


# Adding Accounts to Table

INSERT INTO person SET
firstname = 'David',
lastname = 'Herscher',
email = 'heer3906@chawk.cecil.edu';

INSERT INTO person SET
firstname = 'Bruce',
lastname = 'Lee',
email = 'brucelee@karate.com';

INSERT INTO person SET
firstname = 'Chuck',
lastname = 'Norris',
email = 'walker@texaxranger.com';

# Adding user
