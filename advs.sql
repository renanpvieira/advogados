-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.11-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para advs
CREATE DATABASE IF NOT EXISTS `advs` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `advs`;

-- Copiando estrutura para tabela advs.advogado
CREATE TABLE IF NOT EXISTS `advogado` (
  `AdvogadoId` int(4) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(4) NOT NULL DEFAULT '0',
  `Nome` varchar(60) NOT NULL,
  `Descricao` varchar(4000) NOT NULL,
  `OAB` varchar(12) NOT NULL,
  `Telefone1` varchar(15) NOT NULL,
  `Telefone2` varchar(15) NOT NULL,
  `Whatszap` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Latitude` varchar(255) NOT NULL,
  `Longitude` varchar(255) NOT NULL,
  `Logradouro` varchar(255) NOT NULL,
  `Numero` varchar(12) NOT NULL,
  `Bairro` varchar(70) NOT NULL,
  `CidadeId` int(4) NOT NULL,
  `Referencia` varchar(50) NOT NULL,
  PRIMARY KEY (`AdvogadoId`),
  KEY `AdvogadoId` (`AdvogadoId`),
  KEY `FK_advogado_usuario` (`UsuarioId`),
  CONSTRAINT `FK_advogado_usuario` FOREIGN KEY (`UsuarioId`) REFERENCES `usuario` (`UsuarioId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela advs.advogado: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `advogado` DISABLE KEYS */;
INSERT INTO `advogado` (`AdvogadoId`, `UsuarioId`, `Nome`, `Descricao`, `OAB`, `Telefone1`, `Telefone2`, `Whatszap`, `Email`, `Latitude`, `Longitude`, `Logradouro`, `Numero`, `Bairro`, `CidadeId`, `Referencia`) VALUES
	(1, 1, 'Souza Advogados Assossiados', 'Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. ', '122456-RJ', '(21) 2628-4400', '(21) 9999-0202', '(21) 9896-2356', 'renanvieira@id.uff.br', '-22.891067', '-43.119355', '', '', '', 0, ''),
	(2, 2, 'Dr. Luiz André', '', '', '', '', '', '', '-22.895258', '-43.119022', '', '', '', 0, ''),
	(3, 3, 'Dra. Fabiola Marinho', 'Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado', '', '', '', '', '', '-22.900101', '-43.115567', '', '', '', 0, ''),
	(4, 4, 'Luiz Paulo de Castro', '', '', '', '', '', '', '-22.905191', '-43.112488', '', '', '', 0, ''),
	(5, 5, 'Doutor William Douglas', '', '', '', '', '', '', '-22.900913', '-43.105433', '', '', '', 0, ''),
	(6, 6, 'Doutora Marilia Mendonça', '', '', '', '', '', '', '-22.902158', '-43.100208', '', '', '', 0, '');
/*!40000 ALTER TABLE `advogado` ENABLE KEYS */;

-- Copiando estrutura para tabela advs.advogado-area
CREATE TABLE IF NOT EXISTS `advogado-area` (
  `AdvogadoAreaId` int(4) NOT NULL AUTO_INCREMENT,
  `AdvogadoId` int(4) NOT NULL DEFAULT '0',
  `AreaId` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`AdvogadoAreaId`),
  KEY `FK_advogado-area_advogado` (`AdvogadoId`),
  KEY `FK_advogado-area_areas` (`AreaId`),
  CONSTRAINT `FK_advogado?area_areas` FOREIGN KEY (`AreaId`) REFERENCES `area` (`AreaId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_advogado?area_advogado` FOREIGN KEY (`AdvogadoId`) REFERENCES `advogado` (`AdvogadoId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela advs.advogado-area: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `advogado-area` DISABLE KEYS */;
/*!40000 ALTER TABLE `advogado-area` ENABLE KEYS */;

-- Copiando estrutura para tabela advs.area
CREATE TABLE IF NOT EXISTS `area` (
  `AreaId` smallint(4) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(70) NOT NULL DEFAULT '0',
  PRIMARY KEY (`AreaId`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela advs.area: ~28 rows (aproximadamente)
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` (`AreaId`, `Descricao`) VALUES
	(1, 'Contratos'),
	(2, 'Direito Administrativo'),
	(3, 'Direito Bancário e Financeiro'),
	(4, 'Direito Constitucional'),
	(5, 'Direito da Comunicação'),
	(6, 'Direito da Concorrência'),
	(7, 'Direito da Energia'),
	(8, 'Direito da Família e das Sucessões'),
	(9, 'Direito da Medicina e Farmácia'),
	(10, 'Direito das Tecnologias da Informação'),
	(11, 'Direito do Ambiente'),
	(12, 'Direito do Consumidor'),
	(13, 'Direito do Desporto'),
	(14, 'Direito do Imobiliário'),
	(15, 'Direito do Trabalho e Segurança Social'),
	(16, 'Direito do Turismo'),
	(17, 'Direito do Urbanismo'),
	(18, 'Direito dos Estrangeiros'),
	(19, 'Direito dos Seguros'),
	(20, 'Direito dos Transportes'),
	(21, 'Direito Fiscal'),
	(22, 'Direito Internacional'),
	(23, 'Direito Penal'),
	(24, 'Direito da Propriedade Industrial e Intelectual'),
	(25, 'Direito Societário e Comercial'),
	(26, 'Registos e Notariado'),
	(27, 'Valores Mobiliários'),
	(32, 'Contencioso e Arbitragem');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;

-- Copiando estrutura para tabela advs.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela advs.ci_sessions: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('0r30o80mc8s4tnj6015c75jd5ocr6loc', '127.0.0.1', 1502900289, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930303030313B),
	('hkse2akdl9ipev6to7n9q1i4e43nrpb4', '127.0.0.1', 1502900773, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930303437333B),
	('85us6fpevuvmvqodech0lf4b8iv28nl0', '127.0.0.1', 1502900794, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930303739303B),
	('8p2l1d8a8f4dfn75gits20uo3ldmoi66', '127.0.0.1', 1502901446, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930313133383B),
	('g5rcsshq10cot1le38qlsstekddvqiv7', '127.0.0.1', 1502901654, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930313434393B),
	('nmet3ldv89hgsocedb1dmppr3cn4up8q', '127.0.0.1', 1502902490, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930323434313B),
	('fmmd6mf1pcns5j9i9peavb3bguu86in4', '127.0.0.1', 1502903091, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930323939373B),
	('9ruha04sklr42f3spur2hm9fjr6oaqjq', '127.0.0.1', 1502903702, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930333431353B),
	('j1i9mtdegh32hkp7pifbelmcdl7rf7l9', '127.0.0.1', 1502903872, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930333832323B),
	('8l2ivh5joq9mu2n8iabpq2lkqsoh9aeg', '127.0.0.1', 1502905755, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930353430303B),
	('46jej3jt68a8rq38d43o7og2ib6ch3vp', '127.0.0.1', 1502906754, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930363436333B),
	('1mv3nje7f9npab5nsnsdp0g0cnpkkbut', '127.0.0.1', 1502907068, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930363835323B),
	('bhkvpanu1avo1e2jmpurt6p8mheak8pq', '127.0.0.1', 1502907614, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930373439353B),
	('kpgg7vj10nc1at7vuj02fjmdmksgaqsv', '127.0.0.1', 1502908195, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930373933373B),
	('7fa3fmpmh67u6d02j4ha6ovhce06egu9', '127.0.0.1', 1502908269, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930383236383B),
	('cmiogqri1c4050b8p9jdvhof6kgd80q9', '127.0.0.1', 1502909358, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930393131333B),
	('5e28brsr6hb8a102estu90qljum6li3e', '127.0.0.1', 1502909713, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930393432313B),
	('9ts5c0bb2vo0rs92e5spe0hck0ecsvn4', '127.0.0.1', 1502909987, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323930393733303B),
	('6lod9r4ta6f8q5vltml66tl9h0iqnt4t', '127.0.0.1', 1502910228, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323931303036333B),
	('5g1qboupkljjd5s5at7ktkh22sscap6c', '127.0.0.1', 1502910731, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323931303433303B),
	('7mhgndj6vk3vbspbg59onq18qhr5ttla', '127.0.0.1', 1502911283, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323931313135343B),
	('4fmolmmqhj35o5fnisifdmqtcndlq4kf', '127.0.0.1', 1502911718, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323931313532353B),
	('rrfp412bc22jkrl3m0ql5b758k1j9gni', '127.0.0.1', 1502912044, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323931323034343B);
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

-- Copiando estrutura para tabela advs.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `UsuarioId` int(4) NOT NULL AUTO_INCREMENT,
  `Login` varchar(255) NOT NULL DEFAULT '0',
  `Senha` varchar(400) NOT NULL DEFAULT 'nenhuma',
  `Estatus` tinyint(4) NOT NULL DEFAULT '0' COMMENT '/* 0 inativo 1 ativo */',
  PRIMARY KEY (`UsuarioId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela advs.usuario: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`UsuarioId`, `Login`, `Senha`, `Estatus`) VALUES
	(1, 'renanvieira1@id.uff.br', '', 1),
	(2, 'renanvieira2@id.uff.br', '', 1),
	(3, 'renanvieira3@id.uff.br', '', 1),
	(4, 'renanvieira4@id.uff.br', '', 1),
	(5, 'renanvieira5@id.uff.br', '', 1),
	(6, 'renanvieira6@id.uff.br', '', 1),
	(7, 'renanpvieira25@hotmail.com', '1e260427039bff', 0),
	(8, 'renanpvieira26@hotmail.com', '5d1d7ece249950853bbfeabcdf30abb14ca536bd1006c00b6e77b4b415c6290c3abe1c8b6cd56585b9668a541eeec2492bc26794dfe3451c2283f987739aad62hofgE3OCtdwjdMK3SEpkWrVwcqJu1M7uAPXcYIpM1Qg=', 0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
