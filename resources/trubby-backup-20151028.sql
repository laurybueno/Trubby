-- --------------------------------------------------------
-- Servidor:                     54.207.22.190
-- Versão do servidor:           5.5.44-0ubuntu0.14.04.1 - (Ubuntu)
-- OS do Servidor:               debian-linux-gnu
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela trubby.cardapio
DROP TABLE IF EXISTS `cardapio`;
CREATE TABLE IF NOT EXISTS `cardapio` (
  `id_usuario` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `preco_venda` decimal(15,2) NOT NULL,
  `alerta_amarelo` decimal(15,5) NOT NULL,
  `alerta_vermelho` decimal(15,5) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela trubby.cardapio: ~2 rows (aproximadamente)
DELETE FROM `cardapio`;
/*!40000 ALTER TABLE `cardapio` DISABLE KEYS */;
INSERT INTO `cardapio` (`id_usuario`, `id_produto`, `preco_venda`, `alerta_amarelo`, `alerta_vermelho`) VALUES
	(10, 1, 10.00, 50.00000, 10.00000),
	(10, 2, 4.00, 10.00000, 20.00000);
/*!40000 ALTER TABLE `cardapio` ENABLE KEYS */;


-- Copiando estrutura para tabela trubby.estoque
DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `id_estoque` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(1000) NOT NULL,
  `quantidade` decimal(15,5) NOT NULL,
  `quantidade_tipo` set('Kg','Lt','Mç','Us','Co','Dz') NOT NULL,
  `custo` decimal(15,2) NOT NULL,
  `data_modificacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_estoque`),
  UNIQUE KEY `id_estoque` (`id_estoque`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela trubby.estoque: ~150 rows (aproximadamente)
DELETE FROM `estoque`;
/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
INSERT INTO `estoque` (`id_estoque`, `id_usuario`, `nome`, `quantidade`, `quantidade_tipo`, `custo`, `data_modificacao`) VALUES
	(1, 10, 'dasdsa', 1.00000, 'Lt', 2.00, '2015-10-23 19:50:25'),
	(3, 0, 'trigo', 10.00000, 'Kg', 2.00, '2015-09-17 03:06:28'),
	(4, 0, 'ovo', 2.00000, 'Dz', 3.00, '2015-09-17 03:08:53'),
	(6, 0, 'morango', 1.00000, 'Dz', 7.00, '2015-09-17 16:05:30'),
	(8, 0, 'tempero', 10.00000, 'Kg', 0.00, '2015-09-18 03:32:38'),
	(10, 0, 'Espinafre', 60.00000, 'Kg', 50.00, '2015-09-18 13:47:33'),
	(13, 0, 'laranja', 10.00000, 'Kg', 5.00, '2015-09-23 20:37:48'),
	(14, 0, 'abacaxi', 1.00000, 'Kg', 7.00, '2015-09-23 20:38:43'),
	(24, 0, 'um_nome', 180.00000, 'Lt', 43.97, '2015-09-23 21:38:10'),
	(36, 0, 'selenium', 10.00000, 'Dz', 3.00, '2015-09-29 20:14:38'),
	(37, 0, 'selenium', 10.00000, 'Dz', 3.00, '2015-09-29 20:28:57'),
	(38, 0, 'selenium', 10.00000, 'Dz', 3.00, '2015-09-29 20:31:06'),
	(39, 0, 'selenium', 10.00000, 'Dz', 3.00, '2015-09-29 20:40:51'),
	(40, 16, 'teste', 1.00000, 'Lt', 2.00, '2015-09-29 21:16:44'),
	(41, 16, 'test 2', 60.00000, 'Lt', 2.00, '2015-09-29 21:17:28'),
	(42, 1, 'morango', 60.00000, 'Lt', 2.00, '2015-09-29 21:17:53'),
	(45, 16, 'AÃ§ucar', 5.00000, 'Kg', 10.00, '2015-09-29 22:30:52'),
	(46, 16, 'AÃ§ucar', 5.00000, 'Kg', 10.00, '2015-09-29 22:31:00'),
	(47, 16, 'Tempero', 10.00000, 'Dz', 40.00, '2015-09-29 22:31:52'),
	(48, 24, 'selenio', 10.00000, 'Kg', 100.00, '2015-09-30 03:50:38'),
	(49, 0, 'selenium', 10.00000, 'Dz', 3.00, '2015-09-30 04:15:30'),
	(50, 0, 'selenium', 10.00000, 'Dz', 3.00, '2015-09-30 04:17:32'),
	(51, 0, 'selenium', 10.00000, 'Dz', 3.00, '2015-09-30 04:21:57'),
	(52, 0, 'selenium', 10.00000, 'Dz', 3.00, '2015-09-30 04:30:19'),
	(53, 0, 'selenium', 10.00000, 'Dz', 3.00, '2015-09-30 04:40:27'),
	(54, 0, 'selenio', 10.00000, 'Kg', 100.00, '2015-09-30 04:55:28'),
	(55, 0, 'selenio', 10.00000, 'Kg', 100.00, '2015-09-30 05:17:37'),
	(56, 0, 'selenio', 10.00000, 'Kg', 100.00, '2015-09-30 15:39:55'),
	(57, 0, 'selenio', 10.00000, 'Kg', 100.00, '2015-09-30 16:36:46'),
	(58, 0, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-01 02:35:18'),
	(59, 0, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-01 02:36:37'),
	(60, 0, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-01 02:44:27'),
	(61, 0, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-02 14:50:48'),
	(62, 0, 'Inserir no Usuario Novo', 60.00000, 'Lt', 2.00, '2015-10-02 14:53:42'),
	(63, 0, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-02 14:54:56'),
	(64, 0, 'Inserir no Usuario Novo', 60.00000, 'Lt', 2.00, '2015-10-02 14:56:20'),
	(65, 0, 'testeloco', 1.00000, 'Lt', 1.00, '2015-10-02 14:56:37'),
	(66, 0, 'teste', 60.00000, 'Lt', 2.00, '2015-10-02 14:57:43'),
	(67, 36, 'teste', 60.00000, 'Lt', 2.00, '2015-10-02 14:58:28'),
	(68, 24, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-02 15:04:06'),
	(69, 24, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-02 15:06:47'),
	(71, 10, 'selenio7279', 10.00000, 'Kg', 100.00, '2015-10-02 15:17:28'),
	(72, 10, 'selenio14588', 10.00000, 'Kg', 100.00, '2015-10-02 15:17:54'),
	(73, 10, 'selenio1223', 10.00000, 'Kg', 100.00, '2015-10-02 15:23:16'),
	(74, 24, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-02 15:25:18'),
	(75, 24, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-02 15:35:36'),
	(76, 36, 'teste com ponto na virgula', 60.00000, 'Lt', 2.00, '2015-10-02 15:47:57'),
	(77, 36, 'teste com ponto na virgula', 60.00000, 'Lt', 2.00, '2015-10-02 15:51:49'),
	(78, 36, 'teste com ponto na virgula', 60.00000, 'Lt', 2.50, '2015-10-02 15:52:12'),
	(79, 36, 'teste com virgula pelo sitio', 5555.00000, 'Lt', 12.00, '2015-10-02 15:58:56'),
	(80, 36, 'testesadfasf', 111.00000, 'Lt', 12.00, '2015-10-02 16:02:38'),
	(81, 36, 'testesaasdasdfasdfdfasf', 11.00000, 'Lt', 12.00, '2015-10-02 16:06:04'),
	(82, 24, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-02 16:06:35'),
	(83, 36, 'teste agora vai', 11.00000, 'Lt', 12.11, '2015-10-02 16:07:52'),
	(84, 24, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-02 17:41:51'),
	(85, 10, 'z', 10.00000, 'Lt', 2.30, '2015-10-02 18:51:38'),
	(86, 16, 'Novo item', 10.00000, 'Lt', 2.30, '2015-10-02 19:05:30'),
	(87, 24, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-02 19:17:01'),
	(88, 10, 'selenio', 10.00000, 'Lt', 20.00, '2015-10-02 19:29:14'),
	(89, 10, 'selenio5616', 10.00000, 'Lt', 20.00, '2015-10-02 19:30:38'),
	(90, 10, 'selenio7707', 10.00000, 'Lt', 20.00, '2015-10-02 19:34:00'),
	(91, 10, 'selenio11160', 10.00000, 'Lt', 20.00, '2015-10-02 19:34:48'),
	(92, 10, 'selenio2074', 10.00000, 'Lt', 20.00, '2015-10-02 19:37:02'),
	(93, 10, 'selenio376', 10.00000, 'Lt', 20.00, '2015-10-02 19:42:14'),
	(94, 10, 'selenio2215', 10.00000, 'Lt', 20.00, '2015-10-02 19:42:58'),
	(95, 10, 'selenio5937', 10.00000, 'Lt', 20.00, '2015-10-02 19:44:10'),
	(96, 24, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-02 19:47:31'),
	(97, 10, 'selenio3773', 10.00000, 'Lt', 20.00, '2015-10-02 19:49:14'),
	(98, 10, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-02 19:49:53'),
	(99, 10, 'selenio', 10.00000, 'Kg', 100.00, '2015-10-02 19:52:07'),
	(100, 10, 'selenio8813', 10.00000, 'Kg', 100.00, '2015-10-02 19:53:34'),
	(101, 24, 'selenio14886', 10.00000, 'Kg', 100.00, '2015-10-02 19:56:57'),
	(102, 24, 'selenio4090', 10.00000, 'Kg', 100.00, '2015-10-02 21:25:18'),
	(103, 24, 'selenio7280', 10.00000, 'Kg', 100.00, '2015-10-02 21:33:39'),
	(104, 24, 'selenio4173', 10.00000, 'Kg', 100.00, '2015-10-03 00:39:05'),
	(105, 10, 'morango', 10.00000, 'Kg', 2.00, '2015-10-03 15:30:36'),
	(106, 24, 'selenio2447', 10.00000, 'Kg', 100.00, '2015-10-04 03:04:24'),
	(107, 0, 'hortela', 1.00000, 'Dz', 2.00, '2015-10-04 16:45:58'),
	(108, 0, 'hortela', 1.00000, 'Dz', 2.00, '2015-10-04 16:46:07'),
	(109, 0, 'hoterla', 1.00000, 'Dz', 1.00, '2015-10-04 16:46:34'),
	(110, 0, 'hortela', 1.00000, 'Kg', 10.00, '2015-10-04 16:47:17'),
	(111, 0, 'hortela', 1.00000, 'Kg', 10.00, '2015-10-04 16:47:53'),
	(112, 0, 'hortela', 1.00000, 'Lt', 2.00, '2015-10-04 16:48:18'),
	(113, 0, 'hortela', 1.00000, 'Kg', 10.00, '2015-10-04 16:49:56'),
	(114, 0, 'hortela', 1.00000, 'Lt', 2.00, '2015-10-04 16:54:42'),
	(115, 0, 'hortela1', 1.00000, 'Lt', 1.00, '2015-10-04 16:55:27'),
	(116, 0, 'hortela1', 1.00000, 'Lt', 1.00, '2015-10-04 17:00:37'),
	(117, 0, 'pastel', 2.00000, '', 2.00, '2015-10-04 17:02:01'),
	(119, 10, 'serto', 1.00000, 'Lt', 1.00, '2015-10-04 17:03:26'),
	(120, 10, 'logou', 1.00000, 'Lt', 100.00, '2015-10-04 17:04:59'),
	(121, 10, 'wwe2', 20.00000, 'Lt', 1.00, '2015-10-04 17:08:01'),
	(122, 10, 'teste', 1.00000, 'Lt', 1.00, '2015-10-04 17:08:11'),
	(123, 10, 'inport do valida no modal', 10.00000, 'Lt', 10.50, '2015-10-04 17:09:43'),
	(124, 10, 'validou', 1.00000, 'Lt', 1.00, '2015-10-04 17:12:32'),
	(125, 10, 'teste', 1.00000, 'Lt', 1.50, '2015-10-04 17:12:34'),
	(126, 10, 'teste 2 arq', 10.00000, 'Lt', 1.50, '2015-10-04 17:21:19'),
	(127, 10, 'agorafoi?', 5.00000, 'Lt', 1.00, '2015-10-04 17:30:25'),
	(128, 10, 'nome', 15.00000, 'Kg', 2.00, '2015-10-04 17:33:47'),
	(130, 24, 'selenio9123', 10.00000, 'Kg', 100.00, '2015-10-04 17:59:03'),
	(131, 24, 'selenio14936', 10.00000, 'Kg', 100.00, '2015-10-04 22:34:49'),
	(138, 24, 'selenio10788', 10.00000, 'Kg', 100.00, '2015-10-06 16:21:45'),
	(139, 24, 'selenio856', 10.00000, 'Kg', 100.00, '2015-10-06 18:47:19'),
	(140, 24, 'selenio5777', 10.00000, 'Kg', 100.00, '2015-10-08 20:25:19'),
	(141, 24, 'selenio183', 10.00000, 'Kg', 100.00, '2015-10-09 04:54:13'),
	(142, 24, 'selenio7251', 10.00000, 'Kg', 100.00, '2015-10-09 05:03:32'),
	(143, 24, 'selenio103', 10.00000, 'Kg', 100.00, '2015-10-09 05:23:57'),
	(144, 24, 'selenio14511', 10.00000, 'Kg', 100.00, '2015-10-09 20:27:50'),
	(145, 24, 'selenio11125', 10.00000, 'Kg', 100.00, '2015-10-10 17:26:08'),
	(146, 24, 'selenio7705', 10.00000, 'Kg', 100.00, '2015-10-12 01:13:12'),
	(147, 24, 'selenio8334', 10.00000, 'Kg', 100.00, '2015-10-12 01:20:58'),
	(148, 10, 'hortela', 1.00000, '', 1.60, '2015-10-12 19:33:36'),
	(149, 0, 'um_nome', 30.00000, 'Lt', 300.00, '2015-10-12 22:51:25'),
	(150, 24, 'selenio1793', 10.00000, 'Kg', 100.00, '2015-10-12 23:05:07'),
	(151, 10, 'NÃƒO TA INSERINDO MAÃ‡O', 1.00000, '', 1.00, '2015-10-13 01:07:36'),
	(152, 24, 'selenio13193', 10.00000, 'Kg', 100.00, '2015-10-14 00:12:50'),
	(153, 24, 'selenio4687', 10.00000, 'Kg', 100.00, '2015-10-14 00:20:44'),
	(154, 24, 'selenio217', 10.00000, 'Kg', 100.00, '2015-10-17 02:02:16'),
	(155, 24, 'selenio626', 10.00000, 'Kg', 100.00, '2015-10-17 02:04:14'),
	(156, 10, 'Refrigerante', 10.00000, 'Dz', 3.50, '2015-10-17 21:24:07'),
	(157, 24, 'selenio4225', 10.00000, 'Kg', 100.00, '2015-10-19 21:35:38'),
	(158, 24, 'selenio8453', 10.00000, 'Kg', 100.00, '2015-10-23 18:48:49'),
	(159, 24, 'selenio2495', 10.00000, 'Kg', 100.00, '2015-10-23 19:06:50'),
	(160, 24, 'selenio6154', 10.00000, 'Kg', 100.00, '2015-10-23 19:10:03'),
	(161, 24, 'selenio6478', 10.00000, 'Kg', 100.00, '2015-10-23 19:17:18'),
	(162, 24, 'selenio11620', 10.00000, 'Kg', 100.00, '2015-10-23 19:18:33'),
	(163, 24, 'selenio12496', 10.00000, 'Kg', 100.00, '2015-10-23 19:24:47'),
	(164, 24, 'selenio11285', 10.00000, 'Kg', 100.00, '2015-10-23 19:32:32'),
	(165, 24, 'selenio9322', 10.00000, 'Kg', 100.00, '2015-10-23 19:37:01'),
	(166, 24, 'selenio2099', 10.00000, 'Kg', 100.00, '2015-10-23 19:44:59'),
	(167, 24, 'selenio2114', 10.00000, 'Kg', 100.00, '2015-10-23 19:50:40'),
	(168, 24, 'selenio2622', 10.00000, 'Kg', 100.00, '2015-10-23 19:59:13'),
	(169, 24, 'selenio435', 10.00000, 'Kg', 100.00, '2015-10-23 20:06:54'),
	(170, 24, 'selenio14834', 10.00000, 'Kg', 100.00, '2015-10-23 20:08:46'),
	(171, 24, 'selenio7691', 10.00000, 'Kg', 100.00, '2015-10-23 20:16:21'),
	(172, 24, 'selenio11510', 10.00000, 'Kg', 100.00, '2015-10-23 20:28:16'),
	(173, 24, 'selenio3856', 10.00000, 'Kg', 100.00, '2015-10-23 20:30:07'),
	(174, 24, 'selenio14742', 10.00000, 'Kg', 100.00, '2015-10-23 21:11:46'),
	(175, 24, 'selenio8972', 10.00000, 'Kg', 100.00, '2015-10-23 21:23:46'),
	(176, 24, 'selenio12797', 10.00000, 'Kg', 100.00, '2015-10-23 21:31:51'),
	(177, 24, 'selenio9012', 10.00000, 'Kg', 100.00, '2015-10-23 21:34:34'),
	(178, 24, 'selenio13417', 10.00000, 'Kg', 100.00, '2015-10-23 21:37:08'),
	(179, 24, 'selenio2343', 10.00000, 'Kg', 100.00, '2015-10-23 21:49:16'),
	(180, 24, 'selenio14128', 10.00000, 'Kg', 100.00, '2015-10-24 03:24:33'),
	(181, 10, 'asdas', 40.00000, 'Kg', 2.50, '2015-10-24 20:23:52'),
	(182, 24, 'selenio1279', 10.00000, 'Kg', 100.00, '2015-10-24 23:26:54'),
	(183, 24, 'selenio2859', 10.00000, 'Kg', 100.00, '2015-10-26 16:45:24'),
	(184, 24, 'selenio5029', 10.00000, 'Kg', 100.00, '2015-10-26 17:25:20'),
	(185, 987, 'meu nome ieiiii', 878787878.00000, 'Dz', 9847.00, '2015-10-26 19:53:44'),
	(186, 1, 'isto Ã© um nome, campeÃ£o', 1.00000, 'Kg', 1.00, '2015-10-27 17:18:57'),
	(187, 1, 'isto Ã© um nome, campeÃ£o', 1.00000, 'Kg', 1.00, '2015-10-27 17:19:29');
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;


-- Copiando estrutura para tabela trubby.fichas
DROP TABLE IF EXISTS `fichas`;
CREATE TABLE IF NOT EXISTS `fichas` (
  `id_ficha` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(1000) NOT NULL,
  `modo_preparo` text,
  `seq_montagem` text,
  `equipamento` text,
  `n_porcoes` decimal(15,5) DEFAULT NULL,
  `peso_porcao` decimal(15,5) DEFAULT NULL COMMENT 'expresso em Kg',
  `obs` text,
  `foto` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_ficha`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela trubby.fichas: ~5 rows (aproximadamente)
DELETE FROM `fichas`;
/*!40000 ALTER TABLE `fichas` DISABLE KEYS */;
INSERT INTO `fichas` (`id_ficha`, `id_usuario`, `nome`, `modo_preparo`, `seq_montagem`, `equipamento`, `n_porcoes`, `peso_porcao`, `obs`, `foto`) VALUES
	(1, 10, 'crepe de morango\r\n', 'pega o crepe e coloca morango nele.', '1. pegar crepe; 2. colocar morango', 'colher', 1.00000, 1.00000, NULL, NULL),
	(2, 10, 'hot dog', 'Faz o hotdog', '1. Pao; Salsicha; Pure de batata.', 'Panela', 30.00000, 4.00000, 'Obs', NULL),
	(3, 10, 'sorvete', 'Fazer o sorvete gelado', '1. Casquinha; 2. Outras coisas.', 'Máquina de fazer sorvete', 10.00000, 2.00000, 'Obssssss', ''),
	(4, 10, 'Batata frita', 'Faz a batata frita', '1. Óleo; Fritar a batata; 3. Comer a batata', 'Fogão', 100.00000, 5.00000, 'Muito gostoso', ''),
	(6, 18, 'meu nome', '1. slfskfskjfjskf\n2. slkfjsfjsljfsjf\n3. aofhskfhskhfkfh', '1. wlkfjewoijflifjwlisof\n2. kfjelfjeli\n3. osijfoliwfjlwijfiljf', '1. wpfjwoilfjlhi\n2. sljfiksljflsihfsli\n3. slijfslijlij', 3.00000, 34.00000, 'clkjfÃ§pojfef\nefekfeopgvje\npovgeekinveipjvfelkisjflkeivfliksjfikÃ§ejfeÃ§pif\nsÃ§flmskfnsklfvn', NULL);
/*!40000 ALTER TABLE `fichas` ENABLE KEYS */;


-- Copiando estrutura para tabela trubby.ingredientes_uso
DROP TABLE IF EXISTS `ingredientes_uso`;
CREATE TABLE IF NOT EXISTS `ingredientes_uso` (
  `id_ficha` int(10) unsigned NOT NULL,
  `id_estoque` int(10) unsigned NOT NULL,
  `quantidade_liq` decimal(15,5) unsigned NOT NULL,
  `quantidade_liq_tipo` set('Kg','Lt','Mç','Us','Co','Dz') NOT NULL,
  `quantidade_brt` int(10) unsigned NOT NULL,
  `quantidade_brt_tipo` set('Kg','Lt','Mç','Us','Co','Dz') NOT NULL,
  `rendimento` decimal(15,5) unsigned NOT NULL DEFAULT '100.00000',
  `tipo` set('primario','secundario','extra') NOT NULL DEFAULT 'primario',
  `preco_extra` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id_ficha`,`id_estoque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lista e especifica os ingredientes em uso em cada ficha técnica cadastrada';

-- Copiando dados para a tabela trubby.ingredientes_uso: ~5 rows (aproximadamente)
DELETE FROM `ingredientes_uso`;
/*!40000 ALTER TABLE `ingredientes_uso` DISABLE KEYS */;
INSERT INTO `ingredientes_uso` (`id_ficha`, `id_estoque`, `quantidade_liq`, `quantidade_liq_tipo`, `quantidade_brt`, `quantidade_brt_tipo`, `rendimento`, `tipo`, `preco_extra`) VALUES
	(1, 0, 0.00000, '', 1, '', 101.00000, 'primario', NULL),
	(6, 1, 23.00000, 'Kg', 78, 'Kg', 45.00000, 'primario', 1.00),
	(6, 100, 23.00000, 'Kg', 78, 'Kg', 45.00000, 'primario', 1.00),
	(6, 101, 23.00000, 'Kg', 78, 'Kg', 45.00000, 'primario', 1.00),
	(6, 102, 23.00000, 'Kg', 78, 'Kg', 45.00000, 'primario', 1.00);
/*!40000 ALTER TABLE `ingredientes_uso` ENABLE KEYS */;


-- Copiando estrutura para tabela trubby.produto
DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_ficha` int(11) DEFAULT NULL,
  `id_estoque` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Consolidação de produtos em fichas técnicas e estoque para o cardápio';

-- Copiando dados para a tabela trubby.produto: ~2 rows (aproximadamente)
DELETE FROM `produto`;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`id_produto`, `id_usuario`, `id_ficha`, `id_estoque`) VALUES
	(1, 10, 1, NULL),
	(2, 10, NULL, 156);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


-- Copiando estrutura para tabela trubby.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(1000) NOT NULL,
  `sobrenome` varchar(1000) NOT NULL,
  `sexo` set('Masculino','Feminino') NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `endereco` varchar(1000) NOT NULL,
  `senha` char(40) NOT NULL COMMENT 'hash',
  `dt_nasc` date NOT NULL,
  `tel` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela trubby.usuarios: ~9 rows (aproximadamente)
DELETE FROM `usuarios`;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id_usuario`, `nome`, `sobrenome`, `sexo`, `cpf`, `email`, `endereco`, `senha`, `dt_nasc`, `tel`) VALUES
	(10, '1', '1', '', 1, '1@1.com', '', '1', '0001-01-01', '1'),
	(11, 'João', 'Silva Pinto', '', 12345678911, 'meu@email.com', '', '123456', '2003-02-01', '11912345678'),
	(12, 'Matheus', 'Inutil', '', 12365478912, 'matheus@inutil.com', '', '1', '2004-03-30', '123654'),
	(13, 'lucas', 'gostoso', '', 2, 'cuca@vaitepegar.com', '', 'senha', '0000-00-00', '32143432423'),
	(15, 'teste', 'testinho', '', 11111111111, '2@2.com', '', '2', '0000-00-00', '111111111'),
	(16, '3', '3', '', 33333333333, '3@3.com', '', '3', '0000-00-00', '3333'),
	(22, 'Teste', 'Teste', '', 11123456789, 'teste@teste.com', '', '123456', '0000-00-00', '12345678'),
	(24, 'Selenium', 'Testador', '', 94827562074, 'selenium@teste.com', '', 'selenium', '0000-00-00', '12345678'),
	(36, '1', '1', 'Masculino', 1254, 't1@1.com', 'endereco x', '1', '0001-01-01', '1');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;


-- Copiando estrutura para tabela trubby.vendas
DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_venda`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela trubby.vendas: ~0 rows (aproximadamente)
DELETE FROM `vendas`;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;


-- Copiando estrutura para tabela trubby.vendas_itens
DROP TABLE IF EXISTS `vendas_itens`;
CREATE TABLE IF NOT EXISTS `vendas_itens` (
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_venda` int(11) NOT NULL,
  PRIMARY KEY (`id_venda`,`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela trubby.vendas_itens: ~0 rows (aproximadamente)
DELETE FROM `vendas_itens`;
/*!40000 ALTER TABLE `vendas_itens` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendas_itens` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
