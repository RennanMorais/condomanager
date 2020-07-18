# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.13-MariaDB)
# Base de Dados: condosystem
# Tempo de Geração: 2020-07-18 04:42:34 +0000
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `condominios` WRITE;
/*!40000 ALTER TABLE `condominios` DISABLE KEYS */;

INSERT INTO `condominios` (`id`, `nome`, `cnpj`, `email`, `endereco`, `numero`, `complemento`, `bairro`)
VALUES
	(6,'Condominio Teste 5','55.555.555/5555-55','condominioteste5@gmail.com','Rua Alguma Coisa da Quinta','125','Muro preto','Vila Alguma Legal'),
	(7,'Condominio Teste 2','12.345.678/9101-22','condominioteste2@gmail.com','Rua Mais Outra Coisa','132','','Vila Mais Alguma'),
	(8,'Condominio Teste 3','12.345.678/9101-33','condominioteste3@gmail.com','Rua Outra Coisa','321','','Vila Alguma'),
	(9,'Condominio Teste 4','41.234.567/8910-14','condominioteste4@gmail.com','Rua Mais Outra Coisa Legal ','231','Muro Verde Amarelo','Vila Mais Alguma Legal'),
	(11,'Condominio Teste 1','12.345.678/9101-11','condominioteste1@gmail.com','Rua Alguma Coisa','123','','Vila Alguma'),
	(12,'Condominio Teste 6','12.345.678/9101-66','condominioteste6@gmail.com','Rua Mais Outra Coisa Legal','126','','Bairro tal'),
	(13,'Teste celular','12.345.689/6383-76','rennan@gmail.com','Rua tal teste','111','','Bairro tal'),
	(14,'Teste celular 2 pc','55.555.555/5555-55','teste@gmail.com','Rua teste celular','121','Muro azul','Bairro teste ');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `predios` WRITE;
/*!40000 ALTER TABLE `predios` DISABLE KEYS */;

INSERT INTO `predios` (`id`, `nome`, `condominio`)
VALUES
	(7,'Predio 1 save teste','Condominio Teste 1'),
	(8,'Predio 2 save teste','Condominio Teste 2'),
	(9,'Predio 3 save teste','Condominio Teste 3');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

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
	(17,'Administração','Esse é o setimo teste de comunicado do sistema de condomínio!','2020-07-16 17:15:56');

/*!40000 ALTER TABLE `statements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `phone` varchar(11) DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  `condominio` varchar(150) DEFAULT NULL,
  `predio` varchar(150) DEFAULT NULL,
  `access` int(1) NOT NULL DEFAULT 1,
  `token` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `condominio`, `predio`, `access`, `token`)
VALUES
	(1,'Rennan Morais','rennan.morais@outlook.com','11971833250','$2y$10$FwAFKY3D7BFq2FDQoEVKa.ATeC6vRNx4JqaovzE6nlkvvcoB86sOy',NULL,NULL,1,'34d94b21a3e3b4d69ad9ae59638d064c');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
