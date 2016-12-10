-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2016 at 12:35 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trubby`
--

-- --------------------------------------------------------

--
-- Table structure for table `cardapio`
--

CREATE TABLE IF NOT EXISTS `cardapio` (
  `id_produto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `preco_venda` decimal(15,2) NOT NULL,
  `alerta_amarelo` decimal(15,5) NOT NULL,
  `alerta_vermelho` decimal(15,5) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_produto`),
  KEY `produto_cardapio` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cardapio`
--

INSERT INTO `cardapio` (`id_produto`, `id_usuario`, `preco_venda`, `alerta_amarelo`, `alerta_vermelho`) VALUES
(315, 10, 12.00, 10.00000, 30.00000),
(320, 10, 4.50, 20.00000, 5.00000),
(321, 10, 12.00, 10.00000, 5.00000);

-- --------------------------------------------------------

--
-- Table structure for table `estoque`
--

CREATE TABLE IF NOT EXISTS `estoque` (
  `id_produto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `quantidade` decimal(15,5) NOT NULL,
  `quantidade_tipo` set('Kg','Lt','Mç','Us','Co','Dz') NOT NULL,
  `custo` decimal(15,2) NOT NULL,
  `data_modificacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_produto`),
  UNIQUE KEY `id_estoque` (`id_produto`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estoque`
--

INSERT INTO `estoque` (`id_produto`, `id_usuario`, `quantidade`, `quantidade_tipo`, `custo`, `data_modificacao`) VALUES
(309, 10, 40.00000, 'Kg', 2.50, '2015-12-07 19:49:07'),
(310, 10, 26.20000, 'Kg', 18.00, '2015-12-07 19:49:07'),
(311, 10, 59.95000, 'Lt', 60.00, '2015-12-07 19:49:07'),
(312, 10, 38.50000, 'Kg', 10.00, '2015-12-07 19:49:07'),
(313, 10, 50.00000, 'Us', 3.50, '2015-12-07 19:49:07'),
(314, 10, 90.00000, 'Us', 6.00, '2015-12-07 19:49:08'),
(316, 10, 99.75000, 'Lt', 10.00, '2015-12-07 19:46:47'),
(317, 10, 89.75000, 'Lt', 13.00, '2015-12-07 19:46:48'),
(318, 10, 99.99000, 'Kg', 12.00, '2015-12-07 19:46:48'),
(319, 10, 96.00000, 'Us', 0.50, '2015-12-07 19:46:48'),
(320, 10, 13.00000, 'Us', 1.50, '2015-12-07 19:49:08'),
(322, 10, 1.00000, 'Kg', 15.00, '2016-04-06 02:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `estoque_gasto`
--

CREATE TABLE IF NOT EXISTS `estoque_gasto` (
  `id_produto` int(11) NOT NULL,
  `gasto` decimal(15,5) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `id_produto` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estoque_gasto`
--

INSERT INTO `estoque_gasto` (`id_produto`, `gasto`, `data`) VALUES
(313, 10.00000, '2016-06-14 22:07:19'),
(317, 5.00000, '2016-06-14 22:07:19'),
(312, 7.00000, '2016-06-14 22:07:57'),
(319, 50.00000, '2016-06-14 22:07:57'),
(317, 5.00000, '2016-06-14 22:08:29'),
(312, 5.00000, '2016-06-14 22:12:11'),
(317, 3.00000, '2016-06-14 22:12:43'),
(312, 10.00000, '2016-06-14 22:12:43'),
(317, 7.00000, '2016-06-14 22:13:22'),
(310, 9.00000, '2016-06-14 22:14:18'),
(322, 11.00000, '2016-06-14 22:15:15'),
(318, 15.00000, '2016-06-14 22:18:38'),
(316, 7.00000, '2016-06-14 22:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `fichas`
--

CREATE TABLE IF NOT EXISTS `fichas` (
  `id_produto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_tecnico` varchar(1000) NOT NULL,
  `modo_preparo` text,
  `seq_montagem` text,
  `equipamento` text,
  `n_porcoes` decimal(15,5) DEFAULT NULL,
  `peso_porcao` decimal(15,5) DEFAULT NULL COMMENT 'expresso em Kg',
  `obs` text,
  `foto` varchar(1000) DEFAULT NULL,
  `data_modificacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_produto`),
  UNIQUE KEY `id_produto` (`id_produto`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fichas`
--

INSERT INTO `fichas` (`id_produto`, `id_usuario`, `nome_tecnico`, `modo_preparo`, `seq_montagem`, `equipamento`, `n_porcoes`, `peso_porcao`, `obs`, `foto`, `data_modificacao`) VALUES
(315, 10, 'PavÃª sem glÃºten e sem lactose', '1. Derreta os chocolates no micro-ondas junto com o creme de leite, cuidando para nÃ£o queimar (a dica Ã© que olhe a cada 30 segundos, depois dos 3 primeiros minutos)  2. Em seguida, acrescente o conhaque e reserve  3. Molhe os biscoitos no guaranÃ¡ e faÃ§a camadas alternadas de biscoito e creme de chocolate no refratÃ¡rio  4. Comece com a primeira camada de biscoitos e a Ãºltima de chocolate  5. Se desejar, acrescente uma camada de frutas como morango ou pÃªssego em calda em cima do chocolate  6. Decore com raspas de chocolate e leve Ã  geladeira por pelo menos 2 horas antes de servir', 'Comece com a primeira camada de biscoitos e a Ãºltima de chocolate', 'EspÃ¡tula, 3 potes de inox, 2 colheres de metal', 10.00000, 20.00000, 'NÃ£o preparar em ambiente contaminado por glÃºten', 'foto.jpg', '2015-12-07 15:57:21'),
(321, 10, 'CrÃ¨me brÃ»lÃ©e', '1. Abra a fava de baunilha para extrair as sementinhas e misture-as com o leite e o creme de leite  2. Leve a mistura ao fogo baixo, atÃ© levantar fervura  3. Depois retire do fogo e deixe descansar por 10 minutos  4. Coloque as gemas sem a pelÃ­cula em um recipiente e acrescente o aÃ§Ãºcar  5. Misture bem, atÃ© ter um creme homogÃªneo e esbranquiÃ§ado  6. Passe a mistura do leite em uma peneira e coloque no recipiente aonde estÃ£o as gemas (assegure-se que nÃ£o estÃ¡ mais quente, para nÃ£o cozinhar as gemas), misture bem  7. Coloque em ramequins baixos e leve ao forno preaquecido a 180Â°C, em banho-maria (importante colocar a Ã¡gua jÃ¡ quente)  8. Asse por cerca de 1 hora  9. Retire do forno e, depois de esfriar, leve para a geladeira  10. O tempo de refrigeraÃ§Ã£o varia de acordo com sua preferÃªncia (pode servir sÃ³ frio ou gelado)', 'Polvilhe com aÃ§Ãºcar e queime com o maÃ§arico para formar uma casquinha crocante', '2 potes, termÃ´metro, balanÃ§a gastronÃ´mica', 6.00000, 100.00000, 'Se vocÃª nÃ£o tem um maÃ§arico, pode aquecer uma colher direto no fogo e encostar no aÃ§Ãºcar, com delicadeza. FaÃ§a isso por toda a extensÃ£o do ramequim, atÃ© que todo o creme tenha uma casquinha crocante.', 'foto.jpg', '2015-12-07 18:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `ingredientes_uso`
--

CREATE TABLE IF NOT EXISTS `ingredientes_uso` (
  `id_ficha` int(11) NOT NULL COMMENT 'id_produto',
  `id_estoque` int(11) NOT NULL COMMENT 'id_produto',
  `quantidade_liq` decimal(15,5) unsigned NOT NULL,
  `quantidade_brt` decimal(15,5) unsigned NOT NULL,
  `rendimento` decimal(15,5) unsigned NOT NULL DEFAULT '100.00000',
  `tipo` set('primario','secundario','extra') NOT NULL DEFAULT 'primario',
  `preco_extra` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id_ficha`,`id_estoque`),
  KEY `FK_ingredientes_uso_estoque` (`id_estoque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lista e especifica os ingredientes em uso em cada ficha técnica cadastrada';

--
-- Dumping data for table `ingredientes_uso`
--

INSERT INTO `ingredientes_uso` (`id_ficha`, `id_estoque`, `quantidade_liq`, `quantidade_brt`, `rendimento`, `tipo`, `preco_extra`) VALUES
(315, 309, 0.20000, 0.20000, 100.00000, 'primario', 0.00),
(315, 310, 0.30000, 0.20000, 100.00000, 'primario', 0.00),
(315, 311, 0.01000, 0.01000, 100.00000, 'primario', 0.00),
(315, 312, 0.30000, 0.30000, 100.00000, 'primario', 0.00),
(315, 313, 2.00000, 2.00000, 100.00000, 'primario', 0.00),
(315, 314, 2.00000, 2.00000, 100.00000, 'primario', 0.00),
(321, 309, 4.00000, 4.00000, 1.00000, 'primario', 0.00),
(321, 316, 0.25000, 0.25000, 1.00000, 'primario', 0.00),
(321, 317, 0.25000, 0.25000, 1.00000, 'primario', 0.00),
(321, 318, 0.01000, 0.01000, 1.00000, 'primario', 0.00),
(321, 319, 4.00000, 4.00000, 1.00000, 'primario', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_produto`),
  UNIQUE KEY `id_produto` (`id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Consolidação de produtos em fichas técnicas e estoque para o cardápio' AUTO_INCREMENT=324 ;

--
-- Dumping data for table `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`) VALUES
(301, 'Receita'),
(309, 'Chocolate Ã  base de soja'),
(310, 'Chocolate meio amargo'),
(311, 'Conhaque'),
(312, 'GuaranÃ¡ em pÃ³'),
(313, 'Pacotes de biscoito Champanhe Beladri'),
(314, 'Caixas de creme de leite de soja'),
(315, 'PavÃª sem glÃºten e sem lactose'),
(316, 'Leite'),
(317, 'Creme de leite fresco'),
(318, 'Extrato de baunilha'),
(319, 'Ovos'),
(320, 'Lata de GuaranÃ¡'),
(321, 'CrÃ¨me brÃ»lÃ©e'),
(322, 'pao'),
(323, 'pão com ovo');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `sobrenome`, `sexo`, `cpf`, `email`, `endereco`, `senha`, `dt_nasc`, `tel`) VALUES
(10, 'Fulano', 'Testador', 'Masculino', 1, '1@1.com', 'Endereco', '1', '0001-01-01', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_venda`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `vendas`
--

INSERT INTO `vendas` (`id_venda`, `id_usuario`, `data`) VALUES
(100, 10, '0000-00-00 00:00:00'),
(101, 10, '0000-00-00 00:00:00'),
(102, 10, '0000-00-00 00:00:00'),
(103, 0, '0000-00-00 00:00:00'),
(104, 0, '0000-00-00 00:00:00'),
(107, 10, '0000-00-00 00:00:00'),
(108, 10, '0000-00-00 00:00:00'),
(109, 10, '0000-00-00 00:00:00'),
(110, 10, '0000-00-00 00:00:00'),
(111, 10, '0000-00-00 00:00:00'),
(112, 10, '0000-00-00 00:00:00'),
(113, 10, '0000-00-00 00:00:00'),
(114, 10, '0000-00-00 00:00:00'),
(115, 10, '0000-00-00 00:00:00'),
(116, 10, '2016-03-18 20:06:30');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vendas_dia`
--
CREATE TABLE IF NOT EXISTS `vendas_dia` (
`id_usuario` int(11)
,`somas` decimal(37,2)
,`DATE` date
,`TIME` time
);
-- --------------------------------------------------------

--
-- Table structure for table `vendas_itens`
--

CREATE TABLE IF NOT EXISTS `vendas_itens` (
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco_venda` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id_venda`,`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendas_itens`
--

INSERT INTO `vendas_itens` (`id_venda`, `id_produto`, `quantidade`, `preco_venda`) VALUES
(104, 303, 3, 600.00),
(108, 315, 1, 12.00),
(109, 315, 1, 12.00),
(109, 320, 1, 4.50),
(110, 320, 1, 4.50),
(111, 320, 5, 22.50),
(112, 315, 12, 144.00),
(112, 321, 4, 12.00),
(113, 321, 25, 12.00),
(114, 321, 1, 12.00),
(115, 315, 5, 60.00),
(115, 320, 10, 45.00),
(116, 320, 1, 4.50);

-- --------------------------------------------------------

--
-- Structure for view `vendas_dia`
--
DROP TABLE IF EXISTS `vendas_dia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`trubby`@`localhost` SQL SECURITY DEFINER VIEW `vendas_dia` AS select `vendas`.`id_usuario` AS `id_usuario`,sum(`vendas_itens`.`preco_venda`) AS `somas`,cast(`vendas`.`data` as date) AS `DATE`,cast(`vendas`.`data` as time) AS `TIME` from (`vendas_itens` left join `vendas` on((`vendas_itens`.`id_venda` = `vendas`.`id_venda`))) group by `vendas`.`data`,`vendas`.`id_usuario`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cardapio`
--
ALTER TABLE `cardapio`
  ADD CONSTRAINT `produto_cardapio` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `produto_estoque` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `estoque_gasto`
--
ALTER TABLE `estoque_gasto`
  ADD CONSTRAINT `estoque_gasto_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`);

--
-- Constraints for table `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `produto_ficha` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredientes_uso`
--
ALTER TABLE `ingredientes_uso`
  ADD CONSTRAINT `FK_ingredientes_uso_estoque` FOREIGN KEY (`id_estoque`) REFERENCES `estoque` (`id_produto`),
  ADD CONSTRAINT `FK_ingredientes_uso_fichas` FOREIGN KEY (`id_ficha`) REFERENCES `fichas` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendas_itens`
--
ALTER TABLE `vendas_itens`
  ADD CONSTRAINT `FK_vendas_itens_vendas` FOREIGN KEY (`id_venda`) REFERENCES `vendas` (`id_venda`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
