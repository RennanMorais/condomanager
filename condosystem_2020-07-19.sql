# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.13-MariaDB)
# Base de Dados: condosystem
# Tempo de Geração: 2020-07-20 01:49:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela condominios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `condominios`;

CREATE TABLE `condominios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL DEFAULT '',
  `cnpj` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(150) DEFAULT NULL,
  `endereco` varchar(150) NOT NULL DEFAULT '',
  `numero` varchar(15) NOT NULL DEFAULT '',
  `complemento` varchar(150) DEFAULT NULL,
  `bairro` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `condominios` WRITE;
/*!40000 ALTER TABLE `condominios` DISABLE KEYS */;

INSERT INTO `condominios` (`id`, `nome`, `cnpj`, `email`, `endereco`, `numero`, `complemento`, `bairro`)
VALUES
	(7,'Condominio Teste 2','12.345.678/9101-22','condominioteste2@gmail.com','Rua Mais Outra Coisa','132','','Vila Mais Alguma'),
	(8,'Condominio Teste 3','12.345.678/9101-33','condominioteste3@gmail.com','Rua Outra Coisa','321','teste','Vila Alguma'),
	(9,'Condominio Teste 4','41.234.567/8910-14','condominioteste4@gmail.com','Rua Mais Outra Coisa Legal ','231','Muro Verde Amarelo','Vila Mais Alguma Legal'),
	(11,'Condominio Teste 1','12.345.678/9101-11','condominioteste1@gmail.com','Rua Alguma Coisa','123','','Vila Alguma'),
	(16,'Condominio Teste 5','23.423.454/5677-55','condominioteste5@gmail.com','Rua Raul Marques Marinho','436','teste','Vila Inglesa');

/*!40000 ALTER TABLE `condominios` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela predios
# ------------------------------------------------------------

DROP TABLE IF EXISTS `predios`;

CREATE TABLE `predios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL DEFAULT '',
  `condominio` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `predios` WRITE;
/*!40000 ALTER TABLE `predios` DISABLE KEYS */;

INSERT INTO `predios` (`id`, `nome`, `condominio`)
VALUES
	(7,'Predio 1 save teste','Condominio Teste 1'),
	(8,'Predio 2 save teste','Condominio Teste 1');

/*!40000 ALTER TABLE `predios` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela statements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `statements`;

CREATE TABLE `statements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `text` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `statements` WRITE;
/*!40000 ALTER TABLE `statements` DISABLE KEYS */;

INSERT INTO `statements` (`id`, `name`, `text`, `date`)
VALUES
	(11,'Administração','Esse é o primeiro teste de comunicado do sistema de condomínio!','2020-07-15 19:24:57'),
	(12,'Administração','Esse é o segundo teste de comunicado do sistema de condomínio!','2020-07-15 19:26:03'),
	(13,'Administração','Esse é o terceiro teste de comunicado do sistema de condomínio!','2020-07-15 19:27:41'),
	(14,'Administração','Esse é o quarto teste de comunicado do sistema de condomínio!','2020-07-15 19:27:49'),
	(15,'Administração','Esse é o quinto teste de comunicado do sistema de condomínio!','2020-07-15 19:28:44'),
	(16,'Administração','Esse é o sexto teste de comunicado do sistema de condomínio!','2020-07-15 19:28:52'),
	(17,'Administração','Esse é o setimo teste de comunicado do sistema de condomínio!','2020-07-16 17:15:56'),
	(18,'Administração','Esse é o oitavo teste de comunicado do sistema de condomínio!','2020-07-18 15:59:01');

/*!40000 ALTER TABLE `statements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  `rg` varchar(20) DEFAULT '',
  `cpf` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `condominio` varchar(150) DEFAULT NULL,
  `predio` varchar(150) DEFAULT NULL,
  `apto` varchar(20) DEFAULT NULL,
  `access` int(11) NOT NULL DEFAULT 1,
  `token` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rg`, `cpf`, `phone`, `tipo`, `condominio`, `predio`, `apto`, `access`, `token`)
VALUES
	(1,'Rennan Morais','rennan.morais@outlook.com','$2y$10$FwAFKY3D7BFq2FDQoEVKa.ATeC6vRNx4JqaovzE6nlkvvcoB86sOy','',NULL,'11971833250',NULL,NULL,NULL,NULL,1,'ad4f052cddf64f5a9d02ebc716b0cff2'),
	(2,'Chamir dos Santos Melo','chamirrmelo@gmail.com','$2y$10$2cmgDwurEIF9edV1NZ.eZuzT7S4N8LoSqclqXmbcXrbCLx2eV1.p2','493181696','40912451882','11974888011','Proprietário','Condominio Teste 1','Predio 2 save teste','104',3,'e82b2eccfec0e51745529675de986352'),
	(3,'Rafaela Morais Pacheco','rafaela@gmail.com','$2y$10$T3ZndP2CFxFQyMhIHNU4pOGHH6p59CEVyv2wuT8zphjy.jHtNF/CK','493181697','40912451884','11974884012','Morador','Condominio Teste 1','Predio 1 save teste','12',3,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
