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
  `AdvogadoId` int(11) NOT NULL AUTO_INCREMENT,
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
  `Estatus` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0 - inativo 1 - ativo',
  PRIMARY KEY (`AdvogadoId`),
  KEY `AdvogadoId` (`AdvogadoId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela advs.advogado: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `advogado` DISABLE KEYS */;
INSERT INTO `advogado` (`AdvogadoId`, `Nome`, `Descricao`, `OAB`, `Telefone1`, `Telefone2`, `Whatszap`, `Email`, `Latitude`, `Longitude`, `Logradouro`, `Numero`, `Bairro`, `CidadeId`, `Referencia`, `Estatus`) VALUES
	(1, 'Advogado áéç 1', '', '', '', '', '', '', '-22.891067', '-43.119355', '', '', '', 0, '', 1),
	(2, 'Advogado áéç 2', '', '', '', '', '', '', '-22.895258', '-43.119022', '', '', '', 0, '', 1),
	(3, 'Advogado áéç 3', '', '', '', '', '', '', '-22.900101', '-43.115567', '', '', '', 0, '', 1),
	(4, 'Advogado áéç 4', '', '', '', '', '', '', '-22.905191', '-43.112488', '', '', '', 0, '', 1),
	(5, 'Advogado áéç 5', '', '', '', '', '', '', '-22.900913', '-43.105433', '', '', '', 0, '', 1),
	(6, 'Advogado áéç 6', '', '', '', '', '', '', '-22.902158', '-43.100208', '', '', '', 0, '', 1);
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

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
