-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para condosystem
CREATE DATABASE IF NOT EXISTS `condosystem` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `condosystem`;

-- Copiando estrutura para tabela condosystem.access
CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.access: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `access` DISABLE KEYS */;
INSERT INTO `access` (`id`, `access`) VALUES
	(1, 'Administrador'),
	(2, 'Porteiro'),
	(3, 'Morador'),
	(4, 'Desativado');
/*!40000 ALTER TABLE `access` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.areascomums
CREATE TABLE IF NOT EXISTS `areascomums` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `id_condominio` int(11) DEFAULT NULL,
  `condominio` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.areascomums: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `areascomums` DISABLE KEYS */;
INSERT INTO `areascomums` (`id`, `nome`, `id_condominio`, `condominio`) VALUES
	(13, 'Churrasqueira CA', 20, 'Condomínio A'),
	(14, 'Churrasqueira CB', 21, 'Condomínio B'),
	(15, 'Salão CA', 20, 'Condomínio A'),
	(16, 'Salão CB', 21, 'Condomínio B');
/*!40000 ALTER TABLE `areascomums` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.assembleias
CREATE TABLE IF NOT EXISTS `assembleias` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `local` varchar(150) DEFAULT NULL,
  `local_condominio` varchar(150) DEFAULT NULL,
  `descricao_local` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.assembleias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `assembleias` DISABLE KEYS */;
/*!40000 ALTER TABLE `assembleias` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.categoria_contas
CREATE TABLE IF NOT EXISTS `categoria_contas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.categoria_contas: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_contas` DISABLE KEYS */;
INSERT INTO `categoria_contas` (`id`, `nome`) VALUES
	(7, 'Luz'),
	(8, 'Água'),
	(9, 'Gás'),
	(10, 'Internet'),
	(11, 'Condomínio'),
	(12, 'Despesa');
/*!40000 ALTER TABLE `categoria_contas` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.condominios
CREATE TABLE IF NOT EXISTS `condominios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL DEFAULT '',
  `cnpj` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(150) DEFAULT NULL,
  `endereco` varchar(150) NOT NULL DEFAULT '',
  `numero` varchar(15) NOT NULL DEFAULT '',
  `complemento` varchar(150) DEFAULT NULL,
  `bairro` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.condominios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `condominios` DISABLE KEYS */;
INSERT INTO `condominios` (`id`, `nome`, `cnpj`, `email`, `endereco`, `numero`, `complemento`, `bairro`) VALUES
	(20, 'Condomínio A', '12.345.678/9123-45', 'condominio1@gmail.com', 'Avenida exemplo 1', '123', '', 'Bairro exemplo 1'),
	(21, 'Condomínio B', '98.765.432/1987-65', 'condominio2@gmail.com', 'Avenida exemplo 2', '321', '', 'Bairro exemplo 2');
/*!40000 ALTER TABLE `condominios` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.fornecedores
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `cnpj` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `site` varchar(150) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(150) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.fornecedores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.ocorrencias
CREATE TABLE IF NOT EXISTS `ocorrencias` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `id_condominio` int(11) DEFAULT NULL,
  `condominio` varchar(150) DEFAULT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `morador` varchar(150) DEFAULT NULL,
  `contato` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.ocorrencias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ocorrencias` DISABLE KEYS */;
INSERT INTO `ocorrencias` (`id`, `data`, `descricao`, `id_condominio`, `condominio`, `id_morador`, `morador`, `contato`, `status`, `feedback`) VALUES
	(30, '2020-08-26', 'ASDASDASDASDASDADASDASD', 20, 'Condomínio A', 24, 'Fulano 3', '(11) 98765-4321', 'Finalizado', 'SDNAJKSGASDHGAJSDGVAKDHGASKDASD'),
	(31, '2020-08-26', 'ASDASDASDASDA', 20, 'Condomínio A', 22, 'Fulano 1', '(11) 98765-4321', 'Finalizado', 'ASDASDASDASDASD');
/*!40000 ALTER TABLE `ocorrencias` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.pagar_contas
CREATE TABLE IF NOT EXISTS `pagar_contas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `pago_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.pagar_contas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pagar_contas` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagar_contas` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.pets
CREATE TABLE IF NOT EXISTS `pets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `sexo` varchar(100) DEFAULT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `morador` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.pets: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` (`id`, `nome`, `tipo`, `sexo`, `id_morador`, `morador`, `phone`) VALUES
	(4, 'Pet 1', 'Cachorro', 'Masculino', 22, 'Fulano 1', '(11) 98765-4321'),
	(5, 'Pet 2', 'Cachorro', 'Feminino', 23, 'Fulano 2', '(11) 98765-4321');
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.predios
CREATE TABLE IF NOT EXISTS `predios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL DEFAULT '',
  `id_condominio` int(11) DEFAULT NULL,
  `condominio` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.predios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `predios` DISABLE KEYS */;
INSERT INTO `predios` (`id`, `nome`, `id_condominio`, `condominio`) VALUES
	(27, 'Prédio A1', 20, 'Condomínio A'),
	(28, 'Prédio A2', 20, 'Condomínio A'),
	(29, 'Prédio B1', 21, 'Condomínio B'),
	(30, 'Prédio B2', 21, 'Condomínio B');
/*!40000 ALTER TABLE `predios` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.receber_contas
CREATE TABLE IF NOT EXISTS `receber_contas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `id_condominio` int(11) DEFAULT NULL,
  `condominio` varchar(150) DEFAULT NULL,
  `pago_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.receber_contas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `receber_contas` DISABLE KEYS */;
/*!40000 ALTER TABLE `receber_contas` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.reservas
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_condominio` int(11) DEFAULT NULL,
  `condominio` varchar(150) DEFAULT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `morador` varchar(150) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `area_comum` varchar(150) DEFAULT NULL,
  `evento` varchar(150) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `inicio` time DEFAULT NULL,
  `termino` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.reservas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` (`id`, `id_condominio`, `condominio`, `id_morador`, `morador`, `id_area`, `area_comum`, `evento`, `data`, `inicio`, `termino`, `status`) VALUES
	(27, 20, 'Condomínio A', 22, 'Fulano 1', 13, 'Churrasqueira CA', 'Evento teste', '2020-08-28', '12:00:00', '17:00:00', 'Pendente'),
	(28, 20, 'Condomínio A', 22, 'Fulano 1', 13, 'Churrasqueira CA', 'Evento teste', '2020-08-29', '12:00:00', '18:00:00', 'Pendente');
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.statements
CREATE TABLE IF NOT EXISTS `statements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `text` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.statements: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `statements` DISABLE KEYS */;
/*!40000 ALTER TABLE `statements` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  `rg` varchar(20) DEFAULT '',
  `cpf` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `id_condominio` int(11) DEFAULT NULL,
  `condominio` varchar(150) DEFAULT NULL,
  `id_predio` int(11) DEFAULT NULL,
  `predio` varchar(150) DEFAULT NULL,
  `apto` varchar(20) DEFAULT NULL,
  `id_access` int(11) NOT NULL DEFAULT 1,
  `nome_access` varchar(50) DEFAULT '1',
  `token` varchar(200) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.users: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `rg`, `cpf`, `phone`, `tipo`, `id_condominio`, `condominio`, `id_predio`, `predio`, `apto`, `id_access`, `nome_access`, `token`, `avatar`) VALUES
	(20, 'Rennan Morais', 'sindico@condosoftware.com', '$2y$10$Nsosqbb7MLOBmabWpUkrCOzMscsZjTsqlIiyD5PUs/mC09Zjcyg/u', '49.318.169-6', '392.752.248-11', '(11) 97183-3250', '', 20, 'Condomínio A', 27, 'Prédio A1', 'Sindico', 1, 'Administrador', '89be26783c97d4d5054d09f697bc0aa1', '0f29e12bb8b6f8eb404649f16840fcb2.jpg'),
	(21, 'Porteiro A', 'porteiro1@condosoftware.com', '$2y$10$SM0fLOvoaIjKqMBLjTYsXOm01504tUy2nk.1TmXMGgGQzB0Rzxh9.', '12.345.678-9', '123.456.789-00', '(11) 97183-3250', '', 20, 'Condomínio A', 27, 'Prédio A1', '', 2, 'Porteiro', '498d9f4678aac5948c5e40e2a75a0f44', '4dadec2f3d576b02f30ade010a69e876.jpg'),
	(22, 'Fulano 1', 'fulano1@gmail.com', '$2y$10$C71PcBq8MYEbNM8ARzMvvudi6Xxep3gzhZkkRhKldzCgH1ADgOqcm', '12.345.678-9', '123.456.789-10', '(11) 98765-4321', 'Morador', 20, 'Condomínio A', 27, 'Prédio A1', '50', 3, 'Morador', 'afb3ab5c225128de52505157fefa6e8d', 'default.jpg'),
	(23, 'Fulano 2', 'fulano2@gmail.com', '$2y$10$PqYguMyFe0TSMKNi7frDn.zLfZjLWoGnDOoFBnim.TcHPwIsKYWKq', '12.345.678-9', '12345678910', '(11) 98765-4321', 'Proprietário', 20, 'Condomínio A', 27, 'Prédio A1', '55', 3, 'Morador', 'a917e3214f2a7c5f487cabe09f4e3c94', 'ccf1a656b5f53baff7e160aa01201c8f.jpg'),
	(24, 'Fulano 3', 'fulano3@gmail.com', '$2y$10$B.Hu8wIvraehfm5pVe0JCu0efuoeR.vBXfMfb83Zaa0q03dtXgOTW', '12.345.678-9', '12345678910', '(11) 98765-4321', 'Morador', 20, 'Condomínio A', 28, 'Prédio A2', '45', 3, 'Morador', NULL, 'default.jpg'),
	(25, 'Fulano 4', 'fulano4@gmail.com', '$2y$10$6AWL1C1KGHMfHbITgerZ8OP49PEmw5Iu1gc6VD7MYFcPkqTNvqzxG', '12.345.678-9', '12345678910', '(11) 98765-4321', 'Morador', 21, 'Condomínio B', 29, 'Prédio B1', '46', 3, 'Morador', NULL, 'default.jpg'),
	(26, 'Fulano 5', 'fulano5@gmail.com', '$2y$10$zJFhAvKd.L/JhkCeLFyv3uJjK9OdjhbsOJPUMJnTJIdY5orcW2wDu', '12.345.678-9', '12345678910', '(11) 98765-4321', 'Morador', 21, 'Condomínio B', 30, 'Prédio B2', '60', 3, 'Morador', NULL, 'default.jpg'),
	(27, 'Fulano 6', 'fulano6@gmail.com', '$2y$10$BW94ot09j74Zfh4j0cabc.mfUYbClWXZR/FuD27jqCdGRfSKjXU4K', '12.345.678-9', '12345678910', '(11) 98765-4321', 'Proprietário', 21, 'Condomínio B', 30, 'Prédio B2', '61', 3, 'Morador', NULL, 'default.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.veiculos
CREATE TABLE IF NOT EXISTS `veiculos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_condominio` int(11) DEFAULT NULL,
  `condominio` varchar(150) DEFAULT NULL,
  `id_predio` int(11) DEFAULT NULL,
  `predio` varchar(100) DEFAULT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `morador` varchar(150) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `placa` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.veiculos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `veiculos` DISABLE KEYS */;
INSERT INTO `veiculos` (`id`, `id_condominio`, `condominio`, `id_predio`, `predio`, `id_morador`, `morador`, `tipo`, `marca`, `modelo`, `placa`) VALUES
	(5, 20, 'Condomínio A', 28, 'Prédio A2', 24, 'Fulano 3', 'Carro', 'VW', 'Fox', 'BOB-9394'),
	(6, 20, 'Condomínio A', 27, 'Prédio A1', 22, 'Fulano 1', 'Moto', 'Honda', 'CG 150', 'ABC-1234');
/*!40000 ALTER TABLE `veiculos` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.visitantes
CREATE TABLE IF NOT EXISTS `visitantes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `tipo_documento` varchar(100) DEFAULT NULL,
  `numero_documento` varchar(20) DEFAULT NULL,
  `id_condominio` int(11) DEFAULT NULL,
  `condominio` varchar(150) DEFAULT NULL,
  `id_predio` int(11) DEFAULT NULL,
  `predio` varchar(150) DEFAULT NULL,
  `id_morador` int(11) DEFAULT NULL,
  `morador` varchar(150) DEFAULT NULL,
  `data_entrada` date DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `data_saida` date DEFAULT NULL,
  `hora_saida` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.visitantes: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `visitantes` DISABLE KEYS */;
INSERT INTO `visitantes` (`id`, `nome`, `tipo_documento`, `numero_documento`, `id_condominio`, `condominio`, `id_predio`, `predio`, `id_morador`, `morador`, `data_entrada`, `hora_entrada`, `data_saida`, `hora_saida`) VALUES
	(12, 'Visitante 1', 'CPF', '123.456.789-10', 20, 'Condomínio A', 27, 'Prédio A1', 22, 'Fulano 1', '2020-08-26', '14:17:00', '2020-08-26', '22:00:00'),
	(13, 'Visitante 1', 'RG', '12.313.123-1', 20, 'Condomínio A', 27, 'Prédio A1', 22, 'Fulano 1', '2020-08-26', '12:00:00', '2020-08-26', '17:00:00');
/*!40000 ALTER TABLE `visitantes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
