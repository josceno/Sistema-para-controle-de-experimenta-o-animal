CREATE DATABASE login;
USE login;

CREATE TABLE `login`.`usuario` (
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(200) NOT NULL,
  `senha` CHAR(6) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `data_cadastro` DATETIME NOT NULL,
  `telefone` CHAR(12) NOT NULL,
  `funcao` VARCHAR(30) NOT NULL,
  `data_nasci` CHAR(10) NOT NULL,
  PRIMARY KEY (`usuario_id`));
