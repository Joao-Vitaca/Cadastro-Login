/*Cria o banco se não existe*/
CREATE DATABASE  IF NOT EXISTS `banco`;
USE `banco`;

/*Apaga tabela clientes se já existe*/
DROP TABLE IF EXISTS `clientes`;

/*Cria tabela clientes*/
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;