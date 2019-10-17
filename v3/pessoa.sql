CREATE DATABASE v3;

USE v3;

CREATE TABLE estado (
  id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  sigla varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

SELECT * FROM estado;

INSERT INTO estado(nome,sigla) VALUES
('Seu Fulano','303'),
('Ian','201'),
('Billy','207'),
('Steve','101'),
('Jhonny','105'),
('John','106'),
('Jeca','304');

#Esporte (código, nome, número de praticantes)
CREATE TABLE esporte (
	cod INTEGER AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(45) NOT NULL,
    nPraticantes FLOAT
);

DROP TABLE esporte;

SELECT * FROM esporte;

INSERT INTO esporte(nome,nPraticantes) VALUES
('Futebol','20.7'),
('Voleibol','10.3'),
('Handebol','4.2'),
('Tênis-de-mesa','8.9'),
('Xadrez','5.1'),
('Queimada','2.8'),
('Basquete','14.6');

#Computador (código, fabricante, processador, memória, hd);
CREATE TABLE computador (
	cod INTEGER AUTO_INCREMENT PRIMARY KEY,
	fabricante VARCHAR(45) NOT NULL,
    processador VARCHAR(50),
    memoria VARCHAR(20),
    hd VARCHAR(10)
);

SELECT * FROM computador;

INSERT INTO computador(fabricante,processador,memoria,hd) VALUES
('ASUS','i5',4,'256'),
('Dell','i7',8,'1000'),
('Samsung','AMD',2,'500'),
('Lenovo','i7',8,'1000'),
('Avell','i9',16,'2000'),
('Dell','Radeon',3,'460'),
('Lenovo','i5',8,'1000');

#Bicicleta (código, fabricante, número de marchas, formação do quadro);
CREATE TABLE bicicleta (
	cod INTEGER AUTO_INCREMENT PRIMARY KEY,
	fabricante VARCHAR(45) NOT NULL,
    nMarchas INTEGER,
    formacaoQuadro VARCHAR(45)
);

SELECT * FROM bicicleta;

INSERT INTO bicicleta(fabricante,nMarchas,formacaoQuadro) VALUES
('Mormaii','21','azul'),
('Caloi','21','redondo'),
('Caloi','12','triangulo retangulo'),
('Viking','19','xepa'),
('Mormaii','28','maruim'),
('Monark','24','tongovei'),
('SKW','28','triangular');

# Prédio (código, nome, número de salas, número de andares);
CREATE TABLE predio (
	cod INTEGER AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(45) NOT NULL,
	nSala VARCHAR(20),
	nAndar VARCHAR(20)
); 

SELECT * FROM predio;

INSERT INTO predio(nome,nSala,nAndar) VALUES
('Seu Fulano','303','3'),
('Ian','201','2'),
('Billy','207','2'),
('Steve','101','1'),
('Jhonny','105','1'),
('John','106','1'),
('Jeca','304','3');

DROP TABLE predio;
