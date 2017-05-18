
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `documentary_base`
--
CREATE DATABASE IF NOT EXISTS `documentary_base` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `documentary_base`;

-- --------------------------------------------------------

--
-- Structure de la table `docs_categories`
--

DROP TABLE IF EXISTS `docs_categories`;
CREATE TABLE `docs_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `docs_documents`
--

DROP TABLE IF EXISTS `docs_documents`;
CREATE TABLE `docs_documents` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `text1` text,
  `text2` text,
  `link` varchar(250) DEFAULT NULL,
  `text_link` varchar(250) DEFAULT NULL,
  `flag_home` tinyint(3) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `docs_medias`
--

DROP TABLE IF EXISTS `docs_medias`;
CREATE TABLE `docs_medias` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `documents_medias`
--

DROP TABLE IF EXISTS `documents_medias`;
CREATE TABLE `documents_medias` (
  `id_document` tinyint(3) UNSIGNED NOT NULL,
  `id_media` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `docs_categories`
--
ALTER TABLE `docs_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idparent_fk` (`id_parent`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `docs_documents`
--
ALTER TABLE `docs_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `subcat_id` (`subcat_id`);

--
-- Index pour la table `docs_medias`
--
ALTER TABLE `docs_medias`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `documents_medias`
--
ALTER TABLE `documents_medias`
  ADD PRIMARY KEY (`id_document`,`id_media`),
  ADD KEY `id_media` (`id_media`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `docs_categories`
--
ALTER TABLE `docs_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `docs_documents`
--
ALTER TABLE `docs_documents`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT pour la table `docs_medias`
--
ALTER TABLE `docs_medias`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `docs_categories`
--
ALTER TABLE `docs_categories`
  ADD CONSTRAINT `fk_cat_parent` FOREIGN KEY (`id_parent`) REFERENCES `docs_categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `docs_documents`
--
ALTER TABLE `docs_documents`
  ADD CONSTRAINT `fk_doc_cat` FOREIGN KEY (`cat_id`) REFERENCES `docs_categories` (`id`),
  ADD CONSTRAINT `fk_doc_subcat` FOREIGN KEY (`subcat_id`) REFERENCES `docs_categories` (`id`);

--
-- Contraintes pour la table `documents_medias`
--
ALTER TABLE `documents_medias`
  ADD CONSTRAINT `fk_id_document` FOREIGN KEY (`id_document`) REFERENCES `docs_documents` (`id`),
  ADD CONSTRAINT `fk_id_media` FOREIGN KEY (`id_media`) REFERENCES `docs_medias` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
