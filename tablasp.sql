CREATE TABLE leche(
	id_personal int(10) PRIMARY KEY,
	sabor varchar(100) NOT NULL,
	tamanio varchar(100) NOT NULL,
	precio float(30) NOT NULL
	);
CREATE TABLE papas(
	id_tipo int(10) PRIMARY KEY,
	sabor varchar(100) NOT NULL,
	tamanio varchar(100) NOT NULL,
	precio float(30) NOT NULL

);
CREATE TABLE papel(
	id_usuario int(10) PRIMARY KEY,
	sabor varchar(100) NOT NULL,
	tamanio varchar(20) NOT NULL,
	precio float(30) NOT NULL

);
CREATE TABLE shampoo(
	id_personal int(10) PRIMARY KEY,
	marca varchar(100) NOT NULL,
	tamanio varchar(100) NOT NULL,
	precio float(30) NOT NULL

);
CREATE TABLE huevos(
	id_tipo int(10) PRIMARY KEY,
	cantidad varchar(100) NOT NULL,
	precio float(30) NOT NULL

);
CREATE TABLE azucar(
	id_usuario int(10) PRIMARY KEY,
	peso varchar(100) NOT NULL,
	precio float(30) NOT NULL

);