CREATE DATABASE v3;

USE v3;

CREATE TABLE `marca` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO marca(descricao) VALUES
('Little descp'),
('One more'),
('And the last');

SELECT * FROM marca;
