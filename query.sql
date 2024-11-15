create database if not exists clientes;
CREATE TABLE if not exists lista (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    contrasena VARCHAR(50) NOT NULL
);
 CREATE TABLE IF NOT EXISTS clientes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            apellido VARCHAR(50) NOT NULL,
            coche VARCHAR(50) NOT NULL,
            foto VARCHAR(100) NOT NULL
        );
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    coche VARCHAR(100) NOT NULL,
    foto VARCHAR(255) NOT NULL
);
INSERT INTO lista (nombre, contrasena) VALUES ('pepe', 'abc123');
INSERT INTO lista (nombre, contrasena) VALUES ('rober', 'roberprofe');
INSERT INTO lista (nombre, contrasena) VALUES ('prueba', 'prueba');
/*valores clientes*/
INSERT INTO clientes (nombre, apellido, coche,foto) VALUES ('ÁNGEL', 'CANALLA ALFONSO','Ford Fiesta 2019 116cv','fotos/angel.jpg');
INSERT INTO clientes (nombre, apellido, coche,foto) VALUES ('PEPEa', 'RODRIGUEZ TUMBA', 'Mazda 3 2018 120cv','fotos/pepe.png');
INSERT INTO clientes (nombre, apellido, coche,foto VALUES ('JUAN', 'ZUMBADO RICK','Audi a3 2009 106 cv', 'fotos/juan.png');