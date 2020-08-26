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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.areascomums: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `areascomums` DISABLE KEYS */;
INSERT INTO `areascomums` (`id`, `nome`, `id_condominio`, `condominio`) VALUES
	(9, 'Salão de Festas', 18, 'Condominio 1'),
	(10, 'Churrasqueira', 18, 'Condominio 1'),
	(12, 'Churrasqueira Piscina', 19, 'Condominio 2');
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
INSERT INTO `assembleias` (`id`, `titulo`, `descricao`, `data`, `hora`, `local`, `local_condominio`, `descricao_local`) VALUES
	(3, 'Teste', 'Esse é meu teste de assembleia', '2020-07-30', '17:00:00', '18', 'Condominio 1', 'Esse é meu teste de assembleia');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.condominios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `condominios` DISABLE KEYS */;
INSERT INTO `condominios` (`id`, `nome`, `cnpj`, `email`, `endereco`, `numero`, `complemento`, `bairro`) VALUES
	(18, 'Condominio 1', '12.345.678/9101-11', 'condominioteste1@gmail.com', 'Rua Alguma Coisa', '123', 'Muro azul', 'Vila Alguma'),
	(19, 'Condominio 2', '12.345.678/9101-22', 'condominioteste2@gmail.com', 'Rua Outra Coisa', '321', 'Muro Verde Amarelo', 'Vila Mais Alguma');
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
INSERT INTO `fornecedores` (`id`, `nome`, `cnpj`, `email`, `site`, `endereco`, `numero`, `complemento`, `bairro`) VALUES
	(2, 'Nestle', '43.216.549/8732-16', 'atendimento@nestle.com', 'www.nestle.com.br', 'Avenida teste de alguma coisa', 4321, '', 'Bairro de teste');
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.ocorrencias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ocorrencias` DISABLE KEYS */;
INSERT INTO `ocorrencias` (`id`, `data`, `descricao`, `id_condominio`, `condominio`, `id_morador`, `morador`, `contato`, `status`, `feedback`) VALUES
	(25, '2020-08-20', 'asdasdasdasdasdadasd', 18, 'Condominio 1', 13, 'Chamir dos Santos Melo', '(11) 97488-8011', 'Finalizado', 'Ocorrência solucionada');
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

-- Copiando dados para a tabela condosystem.pagar_contas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pagar_contas` DISABLE KEYS */;
INSERT INTO `pagar_contas` (`id`, `nome`, `id_categoria`, `categoria`, `valor`, `data_vencimento`, `pago_status`) VALUES
	(13, 'Cadeiras de Piscina', 12, 'Despesa', 2599.99, '2020-09-01', 'Não'),
	(14, 'Mesas', 12, 'Despesa', 1500, '2020-09-01', 'Não');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.pets: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` (`id`, `nome`, `tipo`, `sexo`, `id_morador`, `morador`, `phone`) VALUES
	(2, 'Sofia', 'Cachorro', 'Feminino', 14, 'Rafaela Silva de Morais Pacheco', '(11) 97418-5296'),
	(3, 'Joca', 'Cachorro', 'Masculino', 16, 'Nilde Silva de Morais', '(11) 12345-6789');
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.predios
CREATE TABLE IF NOT EXISTS `predios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL DEFAULT '',
  `id_condominio` int(11) DEFAULT NULL,
  `condominio` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.predios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `predios` DISABLE KEYS */;
INSERT INTO `predios` (`id`, `nome`, `id_condominio`, `condominio`) VALUES
	(23, 'Predio A', 18, 'Condominio 1'),
	(24, 'Predio B', 18, 'Condominio 1'),
	(25, 'Predio C', 19, 'Condominio 2'),
	(26, 'Predio D', 19, 'Condominio 2');
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
INSERT INTO `receber_contas` (`id`, `nome`, `id_categoria`, `categoria`, `data_vencimento`, `valor`, `id_condominio`, `condominio`, `pago_status`) VALUES
	(2, 'Vivo', 10, 'Internet', '2020-08-12', 99.99, 18, 'Condominio 1', 'Não');
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.reservas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` (`id`, `id_condominio`, `condominio`, `id_morador`, `morador`, `id_area`, `area_comum`, `evento`, `data`, `inicio`, `termino`, `status`) VALUES
	(24, 18, 'Condominio 1', 13, 'Chamir dos Santos Melo', 9, 'Salão de Festas', 'Evento teste', '2020-08-22', '12:00:00', '00:00:00', 'Rejeitado'),
	(25, 18, 'Condominio 1', 13, 'Chamir dos Santos Melo', 10, 'Churrasqueira', 'Evento teste', '2020-08-29', '12:00:00', '17:00:00', 'Pendente');
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;

-- Copiando estrutura para tabela condosystem.statements
CREATE TABLE IF NOT EXISTS `statements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `text` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.statements: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `statements` DISABLE KEYS */;
INSERT INTO `statements` (`id`, `name`, `text`, `date`) VALUES
	(11, 'Administração', 'Esse é o primeiro teste de comunicado do sistema de condomínio!', '2020-07-15 19:24:57'),
	(12, 'Administração', 'Esse é o segundo teste de comunicado do sistema de condomínio!', '2020-07-15 19:26:03'),
	(13, 'Administração', 'Esse é o terceiro teste de comunicado do sistema de condomínio!', '2020-07-15 19:27:41'),
	(14, 'Administração', 'Esse é o quarto teste de comunicado do sistema de condomínio!', '2020-07-15 19:27:49'),
	(15, 'Administração', 'Esse é o quinto teste de comunicado do sistema de condomínio!', '2020-07-15 19:28:44'),
	(16, 'Administração', 'Esse é o sexto teste de comunicado do sistema de condomínio!', '2020-07-15 19:28:52'),
	(17, 'Administração', 'Esse é o setimo teste de comunicado do sistema de condomínio!', '2020-07-16 17:15:56'),
	(18, 'Administração', 'Esse é o oitavo teste de comunicado do sistema de condomínio!', '2020-07-18 15:59:01'),
	(19, 'Administração', 'Esse é o nono teste de comunicado do sistema de condomínio!', '2020-07-31 18:36:42'),
	(20, 'Administração', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae rutrum sapien. Pellentesque sed ipsum sit amet sem bibendum pretium. Sed elementum ultricies justo vitae luctus. Integer faucibus eros eget justo lacinia, et imperdiet velit ullamcorper. Suspendisse commodo leo a sapien sagittis bibendum non sed sem. Donec vel porta metus. Mauris accumsan commodo augue. Nunc at turpis sagittis, finibus diam nec, tristique justo. ', '2020-08-01 02:13:10'),
	(25, 'Administração', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae rutrum sapien. Pellentesque sed ipsum sit amet sem bibendum pretium. Sed elementum ultricies justo vitae luctus. Integer faucibus eros eget justo lacinia, et imperdiet velit ullamcorper. Suspendisse commodo leo a sapien sagittis bibendum non sed sem. Donec vel porta metus. Mauris accumsan commodo augue. Nunc at turpis sagittis, finibus diam nec, tristique justo.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae rutrum sapien. Pellentesque sed ipsum sit amet sem bibendum pretium. Sed elementum ultricies justo vitae luctus. Integer faucibus eros eget justo lacinia, et imperdiet velit ullamcorper. Suspendisse commodo leo a sapien sagittis bibendum non sed sem. Donec vel porta metus. Mauris accumsan commodo augue. Nunc at turpis sagittis, finibus diam nec, tristique justo.', '2020-08-01 02:29:53'),
	(31, 'Administração', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae rutrum sapien. Pellentesque sed ipsum sit amet sem bibendum pretium. Sed elementum ultricies justo vitae luctus. Integer faucibus eros eget justo lacinia, et imperdiet velit ullamcorper. Suspendisse commodo leo a sapien sagittis bibendum non sed sem. Donec vel porta metus. Mauris accumsan commodo augue. Nunc at turpis sagittis, finibus diam nec, tristique justo.', '2020-08-25 13:29:17');
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.users: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `rg`, `cpf`, `phone`, `tipo`, `id_condominio`, `condominio`, `id_predio`, `predio`, `apto`, `id_access`, `nome_access`, `token`, `avatar`) VALUES
	(1, 'Rennan Morais', 'rennan.morais@outlook.com', '$2y$10$FwAFKY3D7BFq2FDQoEVKa.ATeC6vRNx4JqaovzE6nlkvvcoB86sOy', '', '', '(11) 97183-3250', '', 18, 'Condominio 1', 23, 'Predio A', '', 1, 'Administrador', '4ef99524599f02b74c57d887639b7a5a', '58a96b77abb34c90ac7db9984b49baa6.jpg'),
	(13, 'Chamir dos Santos Melo', 'chamirrmelo@gmail.com', '$2y$10$WxYtXpIfI/DDPWmZN1ljyebMP0hEDkuzQ7tAhhNbJXwEs83ZYzU3m', '49.318.169-6', '409.124.518-82', '(11) 97488-8011', 'Proprietário', 18, 'Condominio 1', 23, 'Predio A', '50', 3, 'Morador', '48111382c74f57874a99d0d7e3481437', 'default.jpg'),
	(14, 'Rafaela Silva de Morais Pacheco', 'rafaela@gmail.com', '$2y$10$/TBeFgTKs2JZ/MnJ6YdnW.08Av4.lg7INT.wnYuVrg8n7oAXhd0EK', '48.789.456-2', '321.789.456-22', '(11) 97418-5296', 'Morador', 18, 'Condominio 1', 24, 'Predio B', '45', 3, 'Morador', NULL, 'default.jpg'),
	(15, 'Sara Carvalho', 'saracarvalho@gmail.com', '$2y$10$QAgRypEUdG73IuUhGmvaZupswH.LAqn1l84E4qhoU5kl7LUuxZGHi', '49.318.169-6', '409.124.518-82', '(11) 97488-8011', 'Morador', 19, 'Condominio 2', 25, 'Predio C', '35', 3, 'Morador', NULL, 'default.jpg'),
	(16, 'Nilde Silva de Morais', 'nilde@gmail.com', '$2y$10$0xscMIGWXBiuovM3Rpmc9en6PES7urbPiYXAbQv9k7EQnEhFzY74q', '12.345.678-9', '987.654.321-00', '(11) 12345-6789', 'Morador', 19, 'Condominio 2', 26, 'Predio D', '102', 3, 'Morador', NULL, 'default.jpg'),
	(17, 'Fulano', 'fulano@gmail.com', '$2y$10$Z7N6VmWhI9ISO2gqjbOxruNpwnCgsFlVzKkFepJNkhM9T8Y0Sgn82', '12.345.678-9', '123.456.789-99', '(11) 97183-3250', 'Morador', 18, 'Condominio 1', 23, 'Predio A', '45', 4, 'Desativado', NULL, 'default.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.veiculos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `veiculos` DISABLE KEYS */;
INSERT INTO `veiculos` (`id`, `id_condominio`, `condominio`, `id_predio`, `predio`, `id_morador`, `morador`, `tipo`, `marca`, `modelo`, `placa`) VALUES
	(4, 18, 'Condominio 1', 23, 'Predio A', 13, 'Chamir dos Santos Melo', 'Carro', 'Volkswagen', 'Fox', 'GUF-4321');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela condosystem.visitantes: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `visitantes` DISABLE KEYS */;
INSERT INTO `visitantes` (`id`, `nome`, `tipo_documento`, `numero_documento`, `id_condominio`, `condominio`, `id_predio`, `predio`, `id_morador`, `morador`, `data_entrada`, `hora_entrada`, `data_saida`, `hora_saida`) VALUES
	(3, 'Fulano', 'RG', '12.345.678-9', 18, 'Condominio 1', 23, 'Predio A', 13, 'Chamir dos Santos Melo', '2020-08-20', '10:21:00', '2020-08-20', '18:00:00'),
	(4, 'Ciclano', 'CPF', '123.456.789-12', 19, 'Condominio 2', 25, 'Predio C', 15, 'Sara Carvalho', '2020-08-20', '10:22:00', '2020-08-20', '17:00:00'),
	(6, 'Fulano teste', 'RG', '12.312.312-3', 18, 'Condominio 1', 24, 'Predio B', 14, 'Rafaela Silva de Morais Pacheco', '2020-08-21', '12:00:00', '2020-08-21', '18:00:00'),
	(7, 'Fulano 2', 'RG', '12.312.312-3', 18, 'Condominio 1', 23, 'Predio A', 13, 'Chamir dos Santos Melo', '2020-08-22', '17:00:00', '2020-08-22', '22:00:00'),
	(8, 'Fulano teste', 'RG', '12.312.312-3', 18, 'Condominio 1', 23, 'Predio A', 13, 'Chamir dos Santos Melo', '2020-08-25', '13:00:00', '2020-08-25', '18:00:00'),
	(9, 'Allyson Luiz de Cayres Lino', 'RG', '11.231.231-2', 18, 'Condominio 1', 24, 'Predio B', 14, 'Rafaela Silva de Morais Pacheco', '2020-08-25', '17:10:00', '2020-08-25', '18:00:00'),
	(10, 'Fulano 2', 'RG', '12.313.123-1', 18, 'Condominio 1', 24, 'Predio B', 14, 'Rafaela Silva de Morais Pacheco', '2020-08-25', '09:55:00', '2020-08-25', '14:00:00');
/*!40000 ALTER TABLE `visitantes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;