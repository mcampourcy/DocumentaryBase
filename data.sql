-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.0.17-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la base pour modulodoc
CREATE DATABASE IF NOT EXISTS `modulodoc` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `modulodoc`;


-- Export de la structure de table modulodoc. docs_documents
CREATE TABLE IF NOT EXISTS `docs_documents` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `sous_titre` varchar(255) DEFAULT NULL,
  `description` text,
  `ameliorations` text,
  `is_public` tinyint(4) DEFAULT '0',
  `id_univers` tinyint(3) unsigned DEFAULT NULL,
  `id_rubrique` tinyint(3) unsigned DEFAULT NULL,
  `cree_le` datetime DEFAULT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `flag_une` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_document_univers_idx` (`id_univers`),
  KEY `fk_document_rubrique_idx` (`id_rubrique`),
  CONSTRAINT `fk_document_rubrique` FOREIGN KEY (`id_rubrique`) REFERENCES `docs_rubriques` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_document_univers` FOREIGN KEY (`id_univers`) REFERENCES `docs_univers` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Export de données de la table modulodoc.docs_documents : ~5 rows (environ)
DELETE FROM `docs_documents`;
/*!40000 ALTER TABLE `docs_documents` DISABLE KEYS */;
INSERT INTO `docs_documents` (`id`, `titre`, `sous_titre`, `description`, `ameliorations`, `is_public`, `id_univers`, `id_rubrique`, `cree_le`, `modifie_le`, `flag_une`) VALUES
	(5, 'Test1', 'super test test', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec \r\ncondimentum ante, accumsan malesuada ipsum. Sed et enim vel risus cursus\r\n consequat a nec tellus. Cras a imperdiet nisl, eu finibus ligula. \r\nSuspendisse eget posuere neque. Suspendisse potenti. Aliquam facilisis \r\nelit non faucibus ultricies. Donec tempor ac arcu eget molestie. \r\nPraesent a nisl augue. Fusce mattis porttitor erat, vel hendrerit lectus\r\n ultrices et. Integer urna augue, mollis a sagittis et, bibendum ac \r\neros. Duis pellentesque tellus ullamcorper tortor hendrerit, sit amet \r\ngravida ligula blandit. Pellentesque tempus nec nisl vitae vulputate. \r\nNullam ornare lacinia ligula sed condimentum. Morbi in nibh ac lacus \r\nluctus imperdiet. Aliquam non condimentum neque.\r\n</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec \r\ncondimentum ante, accumsan malesuada ipsum. Sed et enim vel risus cursus\r\n consequat a nec tellus. Cras a imperdiet nisl, eu finibus ligula. \r\nSuspendisse eget posuere neque. Suspendisse potenti. Aliquam facilisis \r\nelit non faucibus ultricies. Donec tempor ac arcu eget molestie. \r\nPraesent a nisl augue. Fusce mattis porttitor erat, vel hendrerit lectus\r\n ultrices et. Integer urna augue, mollis a sagittis et, bibendum ac \r\neros. Duis pellentesque tellus ullamcorper tortor hendrerit, sit amet \r\ngravida ligula blandit. Pellentesque tempus nec nisl vitae vulputate. \r\nNullam ornare lacinia ligula sed condimentum. Morbi in nibh ac lacus \r\nluctus imperdiet. Aliquam non condimentum neque.\r\n</p>', 0, 1, 1, '2016-04-18 12:26:26', '2016-04-18 12:26:26', 1),
	(7, 'Test', 'sam sous titre', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec \r\ncondimentum ante, accumsan malesuada ipsum. Sed et enim vel risus cursus\r\n consequat a nec tellus. Cras a imperdiet nisl, eu finibus ligula. \r\nSuspendisse eget posuere neque. Suspendisse potenti. Aliquam facilisis \r\nelit non faucibus ultricies. Donec tempor ac arcu eget molestie. \r\nPraesent a nisl augue. Fusce mattis porttitor erat, vel hendrerit lectus\r\n ultrices et. Integer urna augue, mollis a sagittis et, bibendum ac \r\neros. Duis pellentesque tellus ullamcorper tortor hendrerit, sit amet \r\ngravida ligula blandit. Pellentesque tempus nec nisl vitae vulputate. \r\nNullam ornare lacinia ligula sed condimentum. Morbi in nibh ac lacus \r\nluctus imperdiet. Aliquam non condimentum neque.\r\n</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec \r\ncondimentum ante, accumsan malesuada ipsum. Sed et enim vel risus cursus\r\n consequat a nec tellus. Cras a imperdiet nisl, eu finibus ligula. \r\nSuspendisse eget posuere neque. Suspendisse potenti. Aliquam facilisis \r\nelit non faucibus ultricies. Donec tempor ac arcu eget molestie. \r\nPraesent a nisl augue. Fusce mattis porttitor erat, vel hendrerit lectus\r\n ultrices et. Integer urna augue, mollis a sagittis et, bibendum ac \r\neros. Duis pellentesque tellus ullamcorper tortor hendrerit, sit amet \r\ngravida ligula blandit. Pellentesque tempus nec nisl vitae vulputate. \r\nNullam ornare lacinia ligula sed condimentum. Morbi in nibh ac lacus \r\nluctus imperdiet. Aliquam non condimentum neque.\r\n</p>', 0, 1, 2, '2016-04-18 12:27:41', '2016-04-18 12:27:41', 0),
	(8, 'Test3', 'sam sous titre', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec \r\ncondimentum ante, accumsan malesuada ipsum. Sed et enim vel risus cursus\r\n consequat a nec tellus. Cras a imperdiet nisl, eu finibus ligula. \r\nSuspendisse eget posuere neque. Suspendisse potenti. Aliquam facilisis \r\nelit non faucibus ultricies. Donec tempor ac arcu eget molestie. \r\nPraesent a nisl augue. Fusce mattis porttitor erat, vel hendrerit lectus\r\n ultrices et. Integer urna augue, mollis a sagittis et, bibendum ac \r\neros. Duis pellentesque tellus ullamcorper tortor hendrerit, sit amet \r\ngravida ligula blandit. Pellentesque tempus nec nisl vitae vulputate. \r\nNullam ornare lacinia ligula sed condimentum. Morbi in nibh ac lacus \r\nluctus imperdiet. Aliquam non condimentum neque.\r\n</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec \r\ncondimentum ante, accumsan malesuada ipsum. Sed et enim vel risus cursus\r\n consequat a nec tellus. Cras a imperdiet nisl, eu finibus ligula. \r\nSuspendisse eget posuere neque. Suspendisse potenti. Aliquam facilisis \r\nelit non faucibus ultricies. Donec tempor ac arcu eget molestie. \r\nPraesent a nisl augue. Fusce mattis porttitor erat, vel hendrerit lectus\r\n ultrices et. Integer urna augue, mollis a sagittis et, bibendum ac \r\neros. Duis pellentesque tellus ullamcorper tortor hendrerit, sit amet \r\ngravida ligula blandit. Pellentesque tempus nec nisl vitae vulputate. \r\nNullam ornare lacinia ligula sed condimentum. Morbi in nibh ac lacus \r\nluctus imperdiet. Aliquam non condimentum neque.\r\n</p>', 0, 2, 3, '2016-04-18 12:27:57', '2016-04-18 12:28:13', 0),
	(9, 'Test4', 'sam sous titre', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec \r\ncondimentum ante, accumsan malesuada ipsum. Sed et enim vel risus cursus\r\n consequat a nec tellus. Cras a imperdiet nisl, eu finibus ligula. \r\nSuspendisse eget posuere neque. Suspendisse potenti. Aliquam facilisis \r\nelit non faucibus ultricies. Donec tempor ac arcu eget molestie. \r\nPraesent a nisl augue. Fusce mattis porttitor erat, vel hendrerit lectus\r\n ultrices et. Integer urna augue, mollis a sagittis et, bibendum ac \r\neros. Duis pellentesque tellus ullamcorper tortor hendrerit, sit amet \r\ngravida ligula blandit. Pellentesque tempus nec nisl vitae vulputate. \r\nNullam ornare lacinia ligula sed condimentum. Morbi in nibh ac lacus \r\nluctus imperdiet. Aliquam non condimentum neque.\r\n</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec \r\ncondimentum ante, accumsan malesuada ipsum. Sed et enim vel risus cursus\r\n consequat a nec tellus. Cras a imperdiet nisl, eu finibus ligula. \r\nSuspendisse eget posuere neque. Suspendisse potenti. Aliquam facilisis \r\nelit non faucibus ultricies. Donec tempor ac arcu eget molestie. \r\nPraesent a nisl augue. Fusce mattis porttitor erat, vel hendrerit lectus\r\n ultrices et. Integer urna augue, mollis a sagittis et, bibendum ac \r\neros. Duis pellentesque tellus ullamcorper tortor hendrerit, sit amet \r\ngravida ligula blandit. Pellentesque tempus nec nisl vitae vulputate. \r\nNullam ornare lacinia ligula sed condimentum. Morbi in nibh ac lacus \r\nluctus imperdiet. Aliquam non condimentum neque.\r\n</p>', 0, 2, 4, '2016-04-18 12:28:26', '2016-04-18 12:28:35', 0),
	(11, 'Praesent arcu ipsum', 'Aliquam blandit sed sapien eu fringilla', '<div id="lipsum">\r\n<h1>\r\nLorem ipsum dolor sit amet</h1><p>Consectetur adipiscing elit. Nulla nec massa\r\n ac lorem vulputate fringilla non at lectus. Proin iaculis feugiat \r\nligula sit amet mattis. Nulla facilisi. Suspendisse dignissim dui non \r\nlectus euismod lacinia. Etiam vel ipsum posuere, ultrices justo in, \r\ncondimentum sapien. Quisque id mattis ipsum, quis tincidunt ipsum. Nam \r\npharetra, eros in sagittis mattis, lacus orci eleifend odio, sed \r\ntincidunt risus est et orci. Lorem ipsum dolor sit amet, consectetur \r\nadipiscing elit. </p><h2>Donec bibendum</h2><p>Elit scelerisque consectetur \r\npellentesque, libero enim placerat dolor, eu dictum ex eros quis augue. \r\nSed augue dui, pulvinar pharetra nunc vitae, scelerisque mattis lectus. \r\nUt non quam diam. In eu blandit arcu. Aenean imperdiet ut enim sed \r\nconvallis. Fusce feugiat ornare ipsum ac feugiat. Fusce purus arcu, \r\ncommodo et aliquet at, sodales in est.\r\n</p>\r\n<p>\r\nPraesent arcu ipsum, faucibus in libero non, ultricies tincidunt mauris.\r\n </p><h3>Aliquam blandit sed sapien eu fringilla. </h3><p>Praesent sed sollicitudin \r\neros. Donec ac efficitur orci. Vestibulum lobortis vitae augue sit amet \r\nauctor. Sed non dui mattis mi gravida aliquam ut in nunc. Nunc imperdiet\r\n interdum rutrum.\r\n</p>\r\n<p>\r\nAliquam ac dapibus erat. Nullam orci turpis, pellentesque vel pharetra \r\nnec, tincidunt ac mi. In convallis sed purus eu dapibus. Praesent congue\r\n auctor hendrerit. Ut finibus, tortor eu hendrerit mollis, turpis arcu \r\nauctor ligula, vitae dictum massa metus non nisi. Nulla facilisi. Nam at\r\n gravida neque. Sed eu diam in dolor dictum vestibulum vulputate vel ex.\r\n Nunc ullamcorper massa nec justo sodales elementum. Curabitur sit amet \r\nblandit ex. Aenean in lectus posuere, tempor neque a, volutpat ligula. \r\nPellentesque id magna nunc. Curabitur posuere aliquet magna non \r\ncondimentum.\r\n</p>\r\n<p>\r\nPellentesque ut tellus eget urna condimentum ultrices sed a erat. \r\nInteger ac odio orci. Ut aliquam placerat purus pretium tristique. \r\nInterdum et malesuada fames ac ante ipsum primis in faucibus. Sed quis \r\nvelit turpis. Vestibulum ligula orci, euismod eget accumsan nec, \r\npharetra in lorem. Aliquam erat volutpat. Morbi felis mi, lobortis a \r\nimperdiet sed, iaculis mollis tellus. Quisque sapien purus, malesuada \r\nquis risus in, vulputate suscipit purus.\r\n</p>\r\n<p>\r\nDuis id hendrerit elit, molestie pharetra ligula. Nam quis ex nisl. \r\nPraesent sed blandit neque, eget feugiat eros. Fusce aliquam orci nulla,\r\n eu euismod mauris maximus sed. Nulla arcu neque, hendrerit ac eleifend \r\neu, fringilla vehicula ex. Aliquam quis lectus elementum, molestie mi \r\neu, euismod enim. Donec auctor pretium est. Aenean aliquam, odio eget \r\nmalesuada vestibulum, urna ex consequat nunc, eu pharetra sem nibh eget \r\nleo. Vivamus porta, libero quis condimentum pharetra, urna dolor \r\nscelerisque mi, vehicula tristique nisi quam ac odio. Pellentesque \r\nvestibulum efficitur porta. Proin sed nunc sodales sapien dictum \r\nvenenatis.\r\n</p></div>', '<div id="lipsum">\r\n<p>\r\nDonec sollicitudin nec nibh ut iaculis. Vivamus fringilla vitae massa \r\nsed porta. Maecenas tincidunt est non ante lobortis luctus. Nunc \r\nultrices turpis dolor, ac vestibulum sapien ultricies fermentum. Sed \r\ndictum dictum nunc, et auctor lorem pretium rhoncus. Maecenas vitae \r\naliquam metus. Donec dapibus risus scelerisque orci auctor gravida. Nunc\r\n ornare efficitur ligula ut varius. Donec lobortis blandit ex, at \r\nelementum urna consectetur quis. Nullam vehicula rutrum massa, a \r\nsuscipit nulla mollis eget. Mauris porttitor, tellus sed malesuada \r\ntristique, quam libero scelerisque eros, non malesuada erat nisl \r\nmolestie libero. Duis volutpat est eget eros lacinia laoreet. Duis \r\nsollicitudin rhoncus massa, finibus bibendum nunc venenatis molestie. \r\nDuis leo eros, molestie non laoreet bibendum, pellentesque at ligula. \r\nVestibulum vehicula cursus lacinia.\r\n</p>\r\n<p>\r\nQuisque sed tempor diam. Sed volutpat elit dui, ut aliquet odio suscipit\r\n in. Duis gravida lobortis nulla, vitae sodales libero fermentum \r\nplacerat. Pellentesque interdum ex quis purus euismod semper. Ut id \r\nlobortis diam, nec suscipit lectus. Nulla facilisi. Quisque sed feugiat \r\nnisl. Vivamus mollis, magna bibendum vulputate sodales, sapien mi dictum\r\n mi, et sagittis nisl metus non justo. Nam libero orci, finibus sed \r\nfaucibus sagittis, efficitur ut lacus. Morbi pharetra diam non sem \r\nvehicula sodales. Curabitur non feugiat purus, in facilisis orci. Fusce \r\nat ante ligula.\r\n</p>\r\n<p>\r\nFusce mattis metus turpis, sed efficitur neque euismod facilisis. Aenean\r\n luctus luctus elementum. Proin vel pretium magna. Nulla facilisi. In a \r\nlaoreet neque. Curabitur ac arcu pharetra, cursus tellus eu, \r\npellentesque odio. Nullam pellentesque ultrices posuere.\r\n</p>\r\n<p>\r\nSed laoreet augue in elit commodo, ac semper est dapibus. Proin maximus \r\nvarius enim, non sodales nisl iaculis ac. Donec imperdiet eros tristique\r\n commodo molestie. Curabitur id efficitur enim, nec viverra metus. \r\nVivamus placerat mauris in orci tincidunt, ac congue justo venenatis. In\r\n finibus nunc vitae enim interdum, sed tempor nulla tempus. Morbi et dui\r\n ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n</p>\r\n<p>\r\nDonec ultricies nunc nec velit pretium elementum. Etiam hendrerit \r\naliquam sollicitudin. Morbi luctus nisi imperdiet mollis aliquam. Ut \r\naliquam ultrices justo, ac molestie lectus facilisis vel. Fusce at \r\nhendrerit elit. Suspendisse arcu erat, ornare vitae vestibulum eu, \r\nfeugiat id ligula. Etiam eu urna ligula. Morbi dictum metus tortor, quis\r\n dignissim nisi tempor eu. Vivamus augue massa, consequat ac elementum \r\net, sodales in dui. Nulla pharetra metus at aliquam commodo. Curabitur \r\nimperdiet ex nec molestie imperdiet.\r\n</p></div>', 0, 1, 1, '2016-04-25 10:09:41', '2016-04-25 14:51:08', 0);
/*!40000 ALTER TABLE `docs_documents` ENABLE KEYS */;


-- Export de la structure de table modulodoc. docs_medias
CREATE TABLE IF NOT EXISTS `docs_medias` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `cree_le` datetime DEFAULT NULL,
  `modifie_le` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Export de données de la table modulodoc.docs_medias : ~16 rows (environ)
DELETE FROM `docs_medias`;
/*!40000 ALTER TABLE `docs_medias` DISABLE KEYS */;
INSERT INTO `docs_medias` (`id`, `nom`, `type`, `url`, `cree_le`, `modifie_le`) VALUES
	(1, 'Titre du fichier', '', NULL, '2016-05-27 12:10:08', '2016-05-27 12:10:08'),
	(2, 'Titre du fichier', '', NULL, '2016-05-27 12:11:50', '2016-05-27 12:11:50'),
	(3, 'Titre du fichier', 'jpg', NULL, '2016-05-27 12:12:17', '2016-05-27 12:12:17'),
	(4, 'Titre du fichier', 'jpg', NULL, '2016-05-27 12:21:23', '2016-05-27 12:21:23'),
	(5, 'Titre du fichier', 'jpg', NULL, '2016-05-27 12:23:53', '2016-05-27 12:23:53'),
	(6, 'Titre du fichier', 'jpg', NULL, '2016-05-27 12:23:58', '2016-05-27 12:23:58'),
	(7, 'Titre du fichier', 'jpg', NULL, '2016-05-27 12:25:09', '2016-05-27 12:25:09'),
	(8, 'Titre du fichier', 'png', NULL, '2016-05-27 12:27:46', '2016-05-27 12:27:46'),
	(9, 'Titre du fichier', 'png', NULL, '2016-05-27 12:28:56', '2016-05-27 12:28:56'),
	(10, 'Titre du fichier', 'jpg', NULL, '2016-05-27 12:31:35', '2016-05-27 12:31:35'),
	(11, 'Titre du fichier', 'jpg', NULL, '2016-05-27 12:32:01', '2016-05-27 12:32:01'),
	(12, 'Titre du fichier', 'jpg', NULL, '2016-05-27 12:48:12', '2016-05-27 12:48:12'),
	(13, 'Titre du fichier', 'jpg', NULL, '2016-05-27 12:48:19', '2016-05-27 12:48:19'),
	(14, 'Titre du fichier', 'png', NULL, '2016-05-27 12:49:14', '2016-05-27 12:49:14'),
	(15, 'Titre du fichier', 'jpg', NULL, '2016-05-27 12:49:50', '2016-05-27 12:49:50'),
	(16, 'Titre du fichier', 'png', NULL, '2016-05-27 12:50:14', '2016-05-27 12:50:14'),
	(17, 'Titre du fichier', 'jpg', NULL, '2016-05-27 14:45:28', '2016-05-27 14:45:28'),
	(18, 'Titre du fichier', 'jpg', NULL, '2016-05-27 14:48:02', '2016-05-27 14:48:02'),
	(19, 'Titre du fichier', 'png', NULL, '2016-05-27 14:48:06', '2016-05-27 14:48:06'),
	(20, 'Titre du fichier', 'jpg', NULL, '2016-05-27 14:48:40', '2016-05-27 14:48:40');
/*!40000 ALTER TABLE `docs_medias` ENABLE KEYS */;


-- Export de la structure de table modulodoc. docs_rubriques
CREATE TABLE IF NOT EXISTS `docs_rubriques` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `id_univers` tinyint(3) unsigned DEFAULT NULL,
  `cree_le` datetime DEFAULT NULL,
  `modifie_le` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_univers_rubrique_idx` (`id_univers`),
  CONSTRAINT `fk_univers_rubrique` FOREIGN KEY (`id_univers`) REFERENCES `docs_univers` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Export de données de la table modulodoc.docs_rubriques : ~18 rows (environ)
DELETE FROM `docs_rubriques`;
/*!40000 ALTER TABLE `docs_rubriques` DISABLE KEYS */;
INSERT INTO `docs_rubriques` (`id`, `nom`, `id_univers`, `cree_le`, `modifie_le`) VALUES
	(1, 'Projets', 1, '2016-02-29 15:36:28', '2016-03-29 16:42:48'),
	(2, 'Interlib', 1, '2016-02-29 15:36:30', '2016-02-29 15:40:17'),
	(3, 'HTML / CSS', 2, '2016-02-29 15:36:31', '2016-02-29 15:40:26'),
	(4, 'Javascript', 2, '2016-02-29 15:36:32', '2016-02-29 15:40:39'),
	(7, 'Bootstrap', 2, '2016-02-29 15:36:32', '2016-02-29 15:40:54'),
	(9, 'GIT', 3, '2016-02-29 15:41:07', NULL),
	(10, 'SASS', 3, '2016-02-29 15:41:16', NULL),
	(11, 'Sublime Text', 3, '2016-02-29 15:41:27', NULL),
	(12, 'HeidiSQL', 3, '2016-02-29 15:41:39', NULL),
	(13, 'Liens utiles', 3, '2016-02-29 15:41:48', NULL),
	(14, 'Webmin', 5, '2016-02-29 15:41:59', NULL),
	(15, 'DNS, domaines...', 5, '2016-02-29 15:42:13', NULL),
	(16, 'Autres', 5, '2016-02-29 15:42:22', NULL),
	(17, 'Templates', 6, '2016-02-29 15:42:31', NULL),
	(18, 'Images', 6, '2016-02-29 15:42:40', NULL),
	(19, 'Polices', 6, '2016-02-29 15:42:50', NULL),
	(20, 'Documents-type', 7, '2016-02-29 15:43:05', NULL),
	(21, 'Suivi de projets', 7, '2016-02-29 15:43:16', NULL);
/*!40000 ALTER TABLE `docs_rubriques` ENABLE KEYS */;


-- Export de la structure de table modulodoc. docs_univers
CREATE TABLE IF NOT EXISTS `docs_univers` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `position` tinyint(4) DEFAULT '1',
  `cree_le` datetime DEFAULT NULL,
  `modifie_le` datetime DEFAULT NULL,
  `icon` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Export de données de la table modulodoc.docs_univers : ~6 rows (environ)
DELETE FROM `docs_univers`;
/*!40000 ALTER TABLE `docs_univers` DISABLE KEYS */;
INSERT INTO `docs_univers` (`id`, `nom`, `position`, `cree_le`, `modifie_le`, `icon`) VALUES
	(1, 'Documentation technique', 1, '2016-02-29 14:36:34', '2016-03-29 16:56:25', 'fa-book'),
	(2, 'Snippets', 2, '2016-02-29 14:36:36', '2016-02-29 15:27:58', 'fa-code'),
	(3, 'Outils', 3, '2016-02-29 14:36:37', '2016-02-29 15:28:06', 'fa-wrench'),
	(5, 'Serveurs, hébergements...', 4, '2016-02-29 14:40:01', '2016-02-29 15:28:15', 'fa-database'),
	(6, 'Ressources', 5, '2016-02-29 15:28:54', '2016-03-14 16:18:18', 'fa-image'),
	(7, 'Documents internes', 6, '2016-02-29 15:29:03', '2016-03-14 16:18:25', 'fa-folder-o');
/*!40000 ALTER TABLE `docs_univers` ENABLE KEYS */;


-- Export de la structure de table modulodoc. documents_medias
CREATE TABLE IF NOT EXISTS `documents_medias` (
  `id_document` tinyint(3) unsigned NOT NULL,
  `id_media` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_document`),
  KEY `id_media` (`id_media`),
  CONSTRAINT `fk_id_document` FOREIGN KEY (`id_document`) REFERENCES `docs_documents` (`id`),
  CONSTRAINT `fk_id_media` FOREIGN KEY (`id_media`) REFERENCES `docs_medias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table modulodoc.documents_medias : ~0 rows (environ)
DELETE FROM `documents_medias`;
/*!40000 ALTER TABLE `documents_medias` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents_medias` ENABLE KEYS */;


-- Export de la structure de table modulodoc. home
CREATE TABLE IF NOT EXISTS `home` (
  `id` tinyint(3) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `sous-titre` varchar(50) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table modulodoc.home : ~0 rows (environ)
DELETE FROM `home`;
/*!40000 ALTER TABLE `home` DISABLE KEYS */;
INSERT INTO `home` (`id`, `titre`, `sous-titre`, `description`) VALUES
	(0, 'Espace documentaire', 'Bienvenue chez ModuloPlus', 'Morbi aliquam nunc at lorem viverra tempor. Aenean condimentum porttitor tincidunt. Aliquam tempor diam ut augue cursus, ac euismod risus viverra. Donec porta euismod tristique. Donec elementum massa non diam ultricies rhoncus. Sed a quam in libero convallis maximus et id velit. Sed quam mauris, fringilla a tincidunt ut, consectetur iaculis libero. Suspendisse potenti. Donec maximus euismod felis a sagittis. Nunc euismod sem eu leo egestas condimentum. Mauris vel sodales sem, sed vestibulum magna. Quisque tempus imperdiet augue, at volutpat erat semper quis. Ut quis leo mi.');
/*!40000 ALTER TABLE `home` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
