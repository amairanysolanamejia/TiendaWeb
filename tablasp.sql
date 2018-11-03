CREATE TABLE leche(
	id_personal int(10) PRIMARY KEY,
	tamanio varchar(100) NOT NULL,
	precio float(30) NOT NULL
	);
CREATE TABLE papas(
	id_tipo int(10) PRIMARY KEY,
	tamanio varchar(100) NOT NULL,
	precio float(30) NOT NULL

);
CREATE TABLE papel(
	id_usuario int(10) PRIMARY KEY,
	precio float(30) NOT NULL

);
CREATE TABLE shampoo(
	id_personal int(10) PRIMARY KEY,
	tamanio varchar(100) NOT NULL,
	precio float(30) NOT NULL

);
CREATE TABLE huevos(
	id_huvo int(10) PRIMARY KEY,
	cantidad varchar(100) NOT NULL,
	precio float(30) NOT NULL

);
CREATE TABLE azucar(
	id_usuario int(10) PRIMARY KEY,
	peso varchar(100) NOT NULL,
	precio float(30) NOT NULL

);