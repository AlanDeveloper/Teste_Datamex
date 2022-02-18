-- INIT DATABASE

CREATE DATABASE IF NOT EXISTS `datamex`;

-- INIT TABLES

CREATE TABLE IF NOT EXISTS `pessoas` (
	`id` INT UNIQUE NOT NULL,
	`nome` VARCHAR(45) NOT NULL,
	`idade` INT NOT NULL CHECK(`idade` >= 0),
	PRIMARY KEY (`nome`)
) ENGINE=InnoDB;	
CREATE TABLE IF NOT EXISTS `filhos` (
	`pessoas_id` INT NOT NULL,
	`nome` VARCHAR(45) NOT NULL,
	`idade` INT NOT NULL CHECK(`idade` >= 0),
	PRIMARY KEY (`nome`),
	FOREIGN KEY (`pessoas_id`) REFERENCES `pessoas` (`id`)
) ENGINE=InnoDB;

-- SEED TABLES

INSERT INTO `pessoas` (id, nome, idade) VALUES 
	(1, 'Alan', 21), (2, 'Fulano', 26), (3, 'Ciclano', 17), (4, 'Julia', 24), (5, 'Ciclana', 35), (6, 'Zeca', 31);
INSERT INTO `filhos` (pessoas_id, nome, idade) VALUES 
	(1, 'Joana', 11), (1, 'Mario', 8), (1, 'Guilherme', 15), (3, 'Ana', 18), (4, 'Helena', 3);