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

-- Copiando dados para a tabela condosystem.areascomums: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `areascomums` DISABLE KEYS */;
INSERT INTO `areascomums` (`id`, `nome`, `id_condominio`, `condominio`) VALUES
	(9, 'Salão de Festas', 18, 'Condominio 1'),
	(10, 'Churrasqueira', 18, 'Condominio 1'),
	(12, 'Churrasqueira Piscina', 19, 'Condominio 2');
/*!40000 ALTER TABLE `areascomums` ENABLE KEYS */;

-- Copiando dados para a tabela condosystem.assembleias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `assembleias` DISABLE KEYS */;
INSERT INTO `assembleias` (`id`, `titulo`, `descricao`, `data`, `hora`, `local`, `local_condominio`, `descricao_local`) VALUES
	(3, 'Teste', 'Esse é meu teste de assembleia', '2020-07-30', '17:00:00', '18', 'Condominio 1', 'Esse é meu teste de assembleia');
/*!40000 ALTER TABLE `assembleias` ENABLE KEYS */;

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

-- Copiando dados para a tabela condosystem.condominios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `condominios` DISABLE KEYS */;
INSERT INTO `condominios` (`id`, `nome`, `cnpj`, `email`, `endereco`, `numero`, `complemento`, `bairro`) VALUES
	(18, 'Condominio 1', '12.345.678/9101-11', 'condominioteste1@gmail.com', 'Rua Alguma Coisa', '123', 'Muro azul', 'Vila Alguma'),
	(19, 'Condominio 2', '12.345.678/9101-22', 'condominioteste2@gmail.com', 'Rua Outra Coisa', '321', 'Muro Verde Amarelo', 'Vila Mais Alguma');
/*!40000 ALTER TABLE `condominios` ENABLE KEYS */;

-- Copiando dados para a tabela condosystem.fornecedores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` (`id`, `nome`, `cnpj`, `email`, `site`, `endereco`, `numero`, `complemento`, `bairro`) VALUES
	(2, 'Nestle', '43.216.549/8732-16', 'atendimento@nestle.com', 'www.nestle.com.br', 'Avenida teste de alguma coisa', 4321, '', 'Bairro de teste');
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;

-- Copiando dados para a tabela condosystem.ocorrencias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ocorrencias` DISABLE KEYS */;
INSERT INTO `ocorrencias` (`id`, `data`, `descricao`, `id_condominio`, `condominio`, `id_morador`, `morador`, `contato`, `status`, `feedback`) VALUES
	(25, '2020-08-19', 'asdasdasdasdasdadasd', 18, 'Condominio 1', 13, 'Chamir dos Santos Melo', '(11) 97488-8011', 'Pendente', NULL);
/*!40000 ALTER TABLE `ocorrencias` ENABLE KEYS */;

-- Copiando dados para a tabela condosystem.pagar_contas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pagar_contas` DISABLE KEYS */;
INSERT INTO `pagar_contas` (`id`, `nome`, `id_categoria`, `categoria`, `valor`, `data_vencimento`, `pago_status`) VALUES
	(13, 'Cadeiras de Piscina', 12, 'Despesa', 2599.99, '2020-09-01', 'Não'),
	(14, 'Mesas', 12, 'Despesa', 1500, '2020-09-01', 'Não');
/*!40000 ALTER TABLE `pagar_contas` ENABLE KEYS */;

-- Copiando dados para a tabela condosystem.pets: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` (`id`, `nome`, `tipo`, `sexo`, `id_morador`, `morador`, `phone`) VALUES
	(2, 'Sofia', 'Cachorro', 'Feminino', 14, 'Rafaela Silva de Morais Pacheco', '(11) 97418-5296'),
	(3, 'Joca', 'Cachorro', 'Masculino', 16, 'Nilde Silva de Morais', '(11) 12345-6789');
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;

-- Copiando dados para a tabela condosystem.predios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `predios` DISABLE KEYS */;
INSERT INTO `predios` (`id`, `nome`, `id_condominio`, `condominio`) VALUES
	(23, 'Predio A', 18, 'Condominio 1'),
	(24, 'Predio B', 18, 'Condominio 1'),
	(25, 'Predio C', 19, 'Condominio 2'),
	(26, 'Predio D', 19, 'Condominio 2');
/*!40000 ALTER TABLE `predios` ENABLE KEYS */;

-- Copiando dados para a tabela condosystem.receber_contas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `receber_contas` DISABLE KEYS */;
INSERT INTO `receber_contas` (`id`, `nome`, `id_categoria`, `categoria`, `data_vencimento`, `valor`, `id_condominio`, `condominio`, `pago_status`) VALUES
	(2, 'Vivo', 10, 'Internet', '2020-08-12', 99.99, 18, 'Condominio 1', 'Não');
/*!40000 ALTER TABLE `receber_contas` ENABLE KEYS */;

-- Copiando dados para a tabela condosystem.reservas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` (`id`, `id_condominio`, `condominio`, `id_morador`, `morador`, `id_area`, `area_comum`, `evento`, `data`, `inicio`, `termino`, `status`) VALUES
	(24, 18, 'Condominio 1', 13, 'Chamir dos Santos Melo', 9, 'Salão de Festas', 'Evento teste', '2020-08-22', '12:00:00', '00:00:00', 'Rejeitado'),
	(25, 18, 'Condominio 1', 13, 'Chamir dos Santos Melo', 10, 'Churrasqueira', 'Evento teste', '2020-08-29', '12:00:00', '17:00:00', 'Pendente');
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;

-- Copiando dados para a tabela condosystem.statements: ~11 rows (aproximadamente)
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
	(25, 'Administração', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae rutrum sapien. Pellentesque sed ipsum sit amet sem bibendum pretium. Sed elementum ultricies justo vitae luctus. Integer faucibus eros eget justo lacinia, et imperdiet velit ullamcorper. Suspendisse commodo leo a sapien sagittis bibendum non sed sem. Donec vel porta metus. Mauris accumsan commodo augue. Nunc at turpis sagittis, finibus diam nec, tristique justo.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae rutrum sapien. Pellentesque sed ipsum sit amet sem bibendum pretium. Sed elementum ultricies justo vitae luctus. Integer faucibus eros eget justo lacinia, et imperdiet velit ullamcorper. Suspendisse commodo leo a sapien sagittis bibendum non sed sem. Donec vel porta metus. Mauris accumsan commodo augue. Nunc at turpis sagittis, finibus diam nec, tristique justo.', '2020-08-01 02:29:53');
/*!40000 ALTER TABLE `statements` ENABLE KEYS */;

-- Copiando dados para a tabela condosystem.users: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `rg`, `cpf`, `phone`, `tipo`, `id_condominio`, `condominio`, `id_predio`, `predio`, `apto`, `access`, `token`, `avatar`) VALUES
	(1, 'Rennan Morais', 'rennan.morais@outlook.com', '$2y$10$FwAFKY3D7BFq2FDQoEVKa.ATeC6vRNx4JqaovzE6nlkvvcoB86sOy', '', NULL, '11971833250', NULL, NULL, 'Admin', NULL, 'Admin', NULL, 1, '69eaaa04f7966a012309668b9fcb452b', '060f9deb6e58272d7f3a4ea1a44b1eb6.jpg'),
	(13, 'Chamir dos Santos Melo', 'chamirrmelo@gmail.com', '$2y$10$WxYtXpIfI/DDPWmZN1ljyebMP0hEDkuzQ7tAhhNbJXwEs83ZYzU3m', '49.318.169-6', '409.124.518-82', '(11) 97488-8011', 'Proprietário', 18, 'Condominio 1', 23, 'Predio A', '50', 3, '9b255924e412236b9d377de2bf8e4260', 'default.jpg'),
	(14, 'Rafaela Silva de Morais Pacheco', 'rafaela@gmail.com', '$2y$10$/TBeFgTKs2JZ/MnJ6YdnW.08Av4.lg7INT.wnYuVrg8n7oAXhd0EK', '48.789.456-2', '321.789.456-22', '(11) 97418-5296', 'Morador', 18, 'Condominio 1', 24, 'Predio B', '45', 3, NULL, 'default.jpg'),
	(15, 'Sara Carvalho', 'saracarvalho@gmail.com', '$2y$10$QAgRypEUdG73IuUhGmvaZupswH.LAqn1l84E4qhoU5kl7LUuxZGHi', '49.318.169-6', '40912451882', '(11) 97488-8011', 'Morador', 19, 'Condominio 2', 25, 'Predio C', '35', 3, NULL, 'default.jpg'),
	(16, 'Nilde Silva de Morais', 'nilde@gmail.com', '$2y$10$0xscMIGWXBiuovM3Rpmc9en6PES7urbPiYXAbQv9k7EQnEhFzY74q', '12.345.678-9', '98765432100', '(11) 12345-6789', 'Morador', 19, 'Condominio 2', 26, 'Predio D', '102', 3, NULL, 'default.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Copiando dados para a tabela condosystem.veiculos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `veiculos` DISABLE KEYS */;
INSERT INTO `veiculos` (`id`, `id_condominio`, `condominio`, `id_predio`, `predio`, `id_morador`, `morador`, `tipo`, `marca`, `modelo`, `placa`) VALUES
	(4, 18, 'Condominio 1', 23, 'Predio A', 13, 'Chamir dos Santos Melo', 'Carro', 'Volkswagen', 'Fox', 'GUF-4321');
/*!40000 ALTER TABLE `veiculos` ENABLE KEYS */;

-- Copiando dados para a tabela condosystem.visitantes: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `visitantes` DISABLE KEYS */;
INSERT INTO `visitantes` (`id`, `nome`, `tipo_documento`, `numero_documento`, `id_condominio`, `condominio`, `id_predio`, `predio`, `id_morador`, `morador`, `data_entrada`, `hora_entrada`, `data_saida`, `hora_saida`) VALUES
	(3, 'Fulano', 'RG', '12.345.678-9', 18, 'Condominio 1', 23, 'Predio A', 13, 'Chamir dos Santos Melo', '2020-08-19', '10:21:00', '2020-08-19', '18:00:00'),
	(4, 'Ciclano', 'CPF', '123.456.789-12', 19, 'Condominio 2', 25, 'Predio C', 15, 'Sara Carvalho', '2020-08-19', '10:22:00', '2020-08-19', '17:00:00'),
	(6, 'Fulano teste', 'RG', '12.312.312-3', 18, 'Condominio 1', 24, 'Predio B', 14, 'Rafaela Silva de Morais Pacheco', '2020-08-18', '12:00:00', '2020-08-18', '18:00:00'),
	(7, 'Fulano 2', 'RG', '12.312.312-3', 18, 'Condominio 1', 23, 'Predio A', 13, 'Chamir dos Santos Melo', '2020-08-20', '17:00:00', '2020-08-20', '22:00:00');
/*!40000 ALTER TABLE `visitantes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
