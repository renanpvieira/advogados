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

-- Copiando estrutura para tabela advs.chave
CREATE TABLE IF NOT EXISTS `chave` (
  `ChaveId` bigint(11) NOT NULL AUTO_INCREMENT,
  `UsuarioId` int(4) NOT NULL DEFAULT '0',
  `Chave` varchar(60) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ChaveId`),
  KEY `FK_chave_usuario` (`UsuarioId`),
  CONSTRAINT `FK_chave_usuario` FOREIGN KEY (`UsuarioId`) REFERENCES `usuario` (`UsuarioId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela advs.chave: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `chave` DISABLE KEYS */;
INSERT INTO `chave` (`ChaveId`, `UsuarioId`, `Chave`) VALUES
	(1, 9, '904ecce8303932ee8dc511e90d56c9a0120170817174736000000'),
	(2, 10, '1099bbfa90cdbce6c28a004d34c5d5c70920170817174929000000'),
	(3, 11, '11d726def663e4ef7498aba6a00dc8cbb420170817175107000000'),
	(4, 12, '1266539c09b3f6c87b54781d500388fc4e20170817175154000000'),
	(5, 13, '138608b034f0c5b8c38e3f70f3177610b820170817145359000000'),
	(6, 14, '1468e082f7905a34cc8e76551a662a6e6420170817145653000000'),
	(7, 15, '15a14b3e25e41c53a0bafda736f3cde90120170817145754000000'),
	(8, 16, '16e48041e008b9079a47ed6a65638c5ef320170817150142000000');
/*!40000 ALTER TABLE `chave` ENABLE KEYS */;

-- Copiando estrutura para tabela advs.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela advs.ci_sessions: ~29 rows (aproximadamente)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('o6r5nt6gu2eq1l38tel2tvjna4lorn06', '127.0.0.1', 1502988701, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323938383535393B),
	('53kp2ltiub3rlnp8ahc3qlshv3fea4c1', '127.0.0.1', 1502989170, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323938383932303B),
	('fqk3h0s81fg2iij1t549ice970rnnjfa', '127.0.0.1', 1502989843, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323938393834333B),
	('32r419lb0ak0u3gan1tc2vl2rpq0eh0i', '127.0.0.1', 1502989894, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323938393834343B),
	('b0p9a37hqbdetslim3v66s5avg4jc6rp', '127.0.0.1', 1502990470, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939303334333B),
	('csp54srlgdksn96emvpso09ccmr9bv1e', '127.0.0.1', 1502992314, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939323034313B),
	('tp0h8qbdkoi1vbhbm9ktbku32lussgnh', '127.0.0.1', 1502992675, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939323432333B),
	('s7stju1g93rrvals4f8a3658rju4dana', '127.0.0.1', 1502993066, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939323838353B),
	('p2rgvarjfpo14r5aan23jg6742oqa0nv', '127.0.0.1', 1502993369, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939333236353B),
	('vmd07iurrhspcokeq6e4tk0bsot9ts3h', '127.0.0.1', 1502994079, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939333739373B),
	('mfidk2pmt479tooeh856tik90vhk7jgc', '127.0.0.1', 1502995017, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939343835343B),
	('bvd8f433usqonhfsjmvv54u7jf8d4mjv', '127.0.0.1', 1502995062, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939353033363B),
	('pil7kalveehieaqik34k93bnbu8jhggo', '127.0.0.1', 1502996084, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939353739373B),
	('lkfuhdafs9p5uoe3e8r8n63uc665h1re', '127.0.0.1', 1502996533, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939363338383B),
	('k4amntlpcekqp146ntq4vv0ufpvalh77', '127.0.0.1', 1502998383, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939383139333B),
	('um7qbe0husdtfa1ge2m3floma4c0i11r', '127.0.0.1', 1502998564, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939383532333B),
	('9s2s8lc3qos7paoulji2hto5t276cfnj', '127.0.0.1', 1502999148, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939393037363B),
	('7tadg56beeopa1dfk3j6ca2gppkogahp', '127.0.0.1', 1502999700, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939393536313B),
	('gi2ql2t65frmmgar1pmkhhkcdmlp0vfs', '127.0.0.1', 1503000269, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530323939393938303B),
	('8vftl4eu9hgr1qjc1a63tj3n57ecibds', '127.0.0.1', 1503000397, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313530333030303339373B);
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

-- Copiando estrutura para tabela advs.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `UsuarioId` int(4) NOT NULL AUTO_INCREMENT,
  `Login` varchar(255) NOT NULL DEFAULT '0',
  `Senha` varchar(400) NOT NULL DEFAULT 'nenhuma',
  `Estatus` tinyint(4) NOT NULL DEFAULT '0' COMMENT '/* 0 inativo 1 ativo */',
  PRIMARY KEY (`UsuarioId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela advs.usuario: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`UsuarioId`, `Login`, `Senha`, `Estatus`) VALUES
	(1, 'renanvieira1@id.uff.br', '', 1),
	(2, 'renanvieira2@id.uff.br', '', 1),
	(3, 'renanvieira3@id.uff.br', '', 1),
	(4, 'renanvieira4@id.uff.br', '', 1),
	(5, 'renanvieira5@id.uff.br', '', 1),
	(6, 'renanvieira6@id.uff.br', '', 1),
	(7, 'renanpvieira25@hotmail.com', '1e260427039bff', 0),
	(8, 'renanpvieira26@hotmail.com', '5d1d7ece249950853bbfeabcdf30abb14ca536bd1006c00b6e77b4b415c6290c3abe1c8b6cd56585b9668a541eeec2492bc26794dfe3451c2283f987739aad62hofgE3OCtdwjdMK3SEpkWrVwcqJu1M7uAPXcYIpM1Qg=', 0),
	(9, 'renanpvieira27@hotmail.com', '63bd782a0f28b9a0382fffd53348c5426e12e087815bda6c232f99f6481a3037203a0b7cc4caae65fdcd0f6a9ad99ed9c9cb2f3bbc79dd07f628da8ad27a3b26kniHx9UcBjbR4Ujkyg87YRSfBrfKO1So137YfgOa5AE=', 0),
	(10, 'renanpvieira28@hotmail.com', '36868ce0d7108371bb04b77f5923bcdc11af7ec325265ffefe40a0083752c59605717cf0579f40f47566d6b210b1e282cfaa7cb4bd22f32a5d0990a7668f4299Hp753226TJj/EYPC7xISRcXQ3S1GeD1Ib0AAiV6SDZw=', 0),
	(11, 'renanpvieira29@hotmail.com', '9b6e725b439866b217c3af6ad5ebf33db392d7a673db1f2b9c08c169c4f16081cf356a47bc006fdd06170549f8bedfd92961f431f91f2828a6a2f3b3161a23dfG2Uuyvb8YCiMhkYRp5XJ9KQjzCRElNxWlMVUU47rBVI=', 0),
	(12, 'renanpvieira30@hotmail.com', '510a8fd712caa2b5aa1916bb66d7c83f8f0522b497a9b87fba5444950c3f919aafa5d235e5beb7fcd19f2956b811ff3a3b32aa908ba1681bf10864c2b4982448yqDwXCZvmVJks3WZJSpotJngJZwSU1UK8FFQRsoWNbo=', 0),
	(13, 'renanpvieira31@hotmail.com', 'c27d50142afaf41500825a8948817c4eabf2cdd3759cdf4f1af5522c185838b5dbd9488f3aa1e0aa35cc2bed646255721a6a11d2e79505089045c95f43ea085a4ndHDQJI7b3bU274VU1N5IQudW3d1U48UEqOxqdIlY0=', 0),
	(14, 'renanpvieira32@hotmail.com', '520e979d8eed6cc4da7237ef22b7c6e52cd38a2dad9ade56cd123a5116de96245cb6402a73afa52abdad21a4696b1868ba37ec9b90ab5aafcc332d43fe3b0589hnMJLrxcJpNtiN+2h5ikqklyBwZ6ES08hdziDNT71A4=', 0),
	(15, 'renanpvieira33@hotmail.com', '9de881db684894a3d9c37936fd2384929c13e4737d69fb28665020d72c38d0baf6ebfaa5a93a1c385ee55f031a4998b60f176340a30b57ddf483fa24ca283084grfmsGcmtzX3nBq5XIC8pp65S/xbI8aqoCN+7+GHbiU=', 0),
	(16, 'renanpvieira34@hotmail.com', '898c48ec3cf4858f660ceffa0e5429879c1d1169462dd855de22f9f634f775cfd8f43c8581c8e286218964b5fe711459801a7db1aca9653e03c727a62e56a9f0paHv/6wxjGSSPAivzApaEfBwoKRmiLnS6gSeO7XR4rU=', 0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
