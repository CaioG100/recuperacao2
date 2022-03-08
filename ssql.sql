DROP DATABASE ssql;
CREATE DATABASE ssql ;
USE ssql;

CREATE TABLE frutas(
ID INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255) NOT NULL,
cor VARCHAR(255) NOT NULL,
codigo INT NOT NULL UNIQUE
);

SELECT * FROM frutas;