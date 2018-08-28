-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 28-Ago-2018 às 19:26
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_id` int(11) NOT NULL,
  `nome` varchar(520) NOT NULL,
  `dt_adicao` datetime NOT NULL,
  `criador_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`produto_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permisao`
--

DROP TABLE IF EXISTS `permisao`;
CREATE TABLE IF NOT EXISTS `permisao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(520) NOT NULL,
  `criada` datetime DEFAULT NULL,
  `modificada` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `permisao`
--

INSERT INTO `permisao` (`id`, `nome`, `criada`, `modificada`) VALUES
(1, 'dashboard', '2018-08-10 00:00:00', NULL),
(2, 'nova venda', '2018-08-10 00:00:00', NULL),
(3, 'vendas', '2018-08-10 00:00:00', NULL),
(4, 'produtos', '2018-08-10 00:00:00', NULL),
(5, 'clientes', '2018-08-10 00:00:00', NULL),
(6, 'usuarios', '2018-08-10 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(520) CHARACTER SET utf8mb4 NOT NULL,
  `descricao_curta` varchar(520) CHARACTER SET utf8mb4 NOT NULL,
  `descricao_longa` varchar(1024) CHARACTER SET utf8mb4 DEFAULT NULL,
  `preco` double(7,2) NOT NULL,
  `fotos_id` int(11) DEFAULT NULL,
  `situacao_id` int(11) NOT NULL,
  `dt_criado` datetime NOT NULL,
  `dt_alterado` datetime DEFAULT NULL,
  `criador_id` int(11) NOT NULL,
  `modificador_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao_curta`, `descricao_longa`, `preco`, `fotos_id`, `situacao_id`, `dt_criado`, `dt_alterado`, `criador_id`, `modificador_id`) VALUES
(1, 'Mouse', 'equipamento necessário para micro computador. ', '...', 55.99, NULL, 3, '2018-08-12 00:00:00', NULL, 1, NULL),
(4, 'Teclado', '<p>Equipamento para computador.</p>\r\n', '<p>Equipamento para computador.</p>\r\n', 45.89, NULL, 1, '2018-08-25 11:44:04', NULL, 1, NULL),
(5, 'Monitor', '<p>Equipamento para computador.</p>\r\n', '<p>Equipamento para computador.</p>\r\n', 700.00, NULL, 1, '2018-08-26 13:07:36', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

DROP TABLE IF EXISTS `situacao`;
CREATE TABLE IF NOT EXISTS `situacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(520) NOT NULL,
  `descricao` varchar(520) NOT NULL,
  `dt_criacao` datetime NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `criador_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`id`, `nome`, `descricao`, `dt_criacao`, `dt_modificacao`, `criador_id`) VALUES
(1, 'Em estoque', 'Possui esse produto no estoque.', '2018-08-12 00:00:00', NULL, 1),
(2, 'Falta em estoque', 'Não possui esse produto no estoque', '2018-08-12 00:00:00', NULL, 1),
(3, 'Em transito', 'Produto está sem enviado para centro de distribuição.', '2018-08-12 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(520) NOT NULL,
  `user` varchar(520) NOT NULL,
  `pass` varchar(520) NOT NULL,
  `status_id` int(11) NOT NULL COMMENT '1 - usuário ativo; 0 - usuário inativo.',
  `dt_criado` datetime NOT NULL,
  `dt_alterado` datetime DEFAULT NULL,
  `criador_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `user`, `pass`, `status_id`, `dt_criado`, `dt_alterado`, `criador_id`) VALUES
(1, 'Administrador', 'admin', 'admin', 1, '2018-08-09 00:00:00', NULL, 0),
(2, 'Usuário', 'user', 'user', 1, '2018-08-10 00:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_permissoes`
--

DROP TABLE IF EXISTS `usuario_permissoes`;
CREATE TABLE IF NOT EXISTS `usuario_permissoes` (
  `usuario_id` int(11) NOT NULL,
  `permisao_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`permisao_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_permissoes`
--

INSERT INTO `usuario_permissoes` (`usuario_id`, `permisao_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
