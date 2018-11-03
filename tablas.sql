CREATE TABLE personal(
	id_personal int(10) PRIMARY KEY,
	nombre varchar(100) NOT NULL
	);
CREATE TABLE tipo_usuario(
	id_tipo int(10) PRIMARY KEY,
	tipo varchar(100) NOT NULL
);
CREATE TABLE usuario(
	id_usuario int(10) PRIMARY KEY,
	nombre_usuario varchar(100) NOT NULL,
	password varchar(20) NOT NULL,
	id_personal int(10) NOT NULL,
	id_tipo int(10) NOT NULL
);
