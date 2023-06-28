# RetoPHP

Tatiana Alejandra Paredes Calderon
Apolo Team 1

CREATE DATABASE campuslands;
USE campuslands;
CREATE TABLE pais(
	idPais INT AUTO_INCREMENT ,
	nombrePais VARCHAR(50) NOT NULL UNIQUE,
	CONSTRAINT PK_idPais PRIMARY KEY (idPais)
);
CREATE TABLE departamento(
	idDep INT AUTO_INCREMENT,
	nombreDep VARCHAR(50),
	idPais INT,
	CONSTRAINT PK_idDep PRIMARY KEY (idDep),
	CONSTRAINT FK_idDep_idPais FOREIGN KEY (idPais) REFERENCEs pais(idPais)
);
CREATE TABLE region(
	idReg INT AUTO_INCREMENT,
	nombreReg VARCHAR(50),
	idDep INT,
	CONSTRAINT PK_idReg PRIMARY KEY (idReg),
	CONSTRAINT FK_idReg_idDep FOREIGN KEY (idDep) REFERENCES departamento(idDep)
);
CREATE TABLE campers(
	idCamper VARCHAR(20) UNIQUE,
	nombreCamper VARCHAR(50),
	apellidoCamper VARCHAR(50),
	fechaNac DATE,
	idReg INT,
	CONSTRAINT PK_idCamper PRIMARY KEY (idCamper),
	CONSTRAINT FK_campers_idReg FOREIGN KEY (idReg) REFERENCES region(idReg)
);

INSERT INTO pais(nombrePais) VALUES ('Colombia'),('Paraguay'),('Venezuela'),('Brasil');

INSERT INTO departamento(idPais,nombreDep) VALUES (1,'Santander'),(1,'Sucre'),(1,'Meta');
INSERT INTO departamento(idPais,nombreDep) VALUES (2,'Alto Paraguay'),(2,'Alto Paraná'),(2,'Amambay');
INSERT INTO departamento(idPais,nombreDep) VALUES (3,'Apure'),(3,'Bolivar'),(3,'Trujillo');
INSERT INTO departamento(idPais,nombreDep) VALUES (4,'Acre'),(4,'Alagoas'),(4,'Amapá');


INSERT INTO region(idDep,nombreReg) VALUES (1,'Bucaramanga'),(1,'Floridablanca'),(1,'Piedecuesta');
INSERT INTO region(idDep,nombreReg) VALUES (2,'Coveñas'),(2,'Corozal');
INSERT INTO region(idDep,nombreReg) VALUES (3,'Villacicencio'),(3,'Guamal'),(3,'El Dorado');
INSERT INTO region(idDep,nombreReg) VALUES (4,'Fuerte Olimpo'),(4,'Puerto Casado');
INSERT INTO region(idDep,nombreReg) VALUES (5,'Hernandarias'),(5,'Ñacunday'),(5,'Ciudad del Este');
INSERT INTO region(idDep,nombreReg) VALUES (6,'Cerro Corá'),(6,'Chiriguelo');
INSERT INTO region(idDep,nombreReg) VALUES (7,'Bruzual'),(7,'El nula'),(7,'Elorza');
INSERT INTO region(idDep,nombreReg) VALUES (8,'Ciudad Bolivar'),(8,'Maripa'),(8,'Upata');
INSERT INTO region(idDep,nombreReg) VALUES (9,'Ciudad de trujillo');
INSERT INTO region(idDep,nombreReg) VALUES (10,'Rio Branco'),(10,'Brasileia');
INSERT INTO region(idDep,nombreReg) VALUES (11,'Maceió'),(11,'Roteiro'),(11,'Maragogi');
INSERT INTO region(idDep,nombreReg) VALUES (12,'Macapa'),(12,'Oipoque'),(12,'Santana');
