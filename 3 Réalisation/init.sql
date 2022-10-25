
CREATE TABLE IF NOT EXISTS `applications` (
  `idApplications` int(11) NOT NULL AUTO_INCREMENT,
  `nomOfficiel` varchar(50) DEFAULT NULL,
  `nomDsi1` varchar(20) NOT NULL,
  `descriptionapplications` varchar(200) NOT NULL,
  `technologis` varchar(65) DEFAULT NULL,
  `annee` varchar(9) DEFAULT NULL,
  `sauvegardes` enum('Vrai','A prevoir') DEFAULT NULL,
  `rgpd` enum('Vrai','A prevoir') DEFAULT NULL,
  `enquete` datetime DEFAULT NULL,
  `utilisateur_idutilisateur` int(11) DEFAULT NULL,
  `accesBackendProd` varchar(50) DEFAULT NULL,
  `autoDeploiementBackendProd` enum('Vrai','A prevoir') DEFAULT NULL,
  `depotGitBackend` varchar(70) DEFAULT NULL,
  `serveur_idServeurBackendProd` int(11) DEFAULT NULL,
  `accesBackendTest` varchar(50) DEFAULT NULL,
  `autoDeploiementBackendTest` enum('Vrai','A prevoir') DEFAULT NULL,
  `serveur_idServeurBackendTest` int(11) DEFAULT NULL,
  `accesFrontendProd` varchar(50) DEFAULT NULL,
  `autoDeploiementFrontendProd` enum('Vrai','A prevoir') DEFAULT NULL,
  `depotGitFrontend` varchar(70) DEFAULT NULL,
  `serveur_idServeurFrontendProd` int(11) DEFAULT NULL,
  `accesFrontendTest` varchar(50) DEFAULT NULL,
  `autoDeploiementFrontendTest` enum('Vrai','A prevoir') DEFAULT NULL,
  `serveur_idServeurFrontendTest` int(11) DEFAULT NULL,
  `enqueteAPrevoir` datetime DEFAULT NULL,
  PRIMARY KEY (`idApplications`),
  KEY `utilisateur_idutilisateur` (`utilisateur_idutilisateur`),
  KEY `serveur_idServeurBackendProd` (`serveur_idServeurBackendProd`),
  KEY `serveur_idServeurBackendTest` (`serveur_idServeurBackendTest`),
  KEY `serveur_idServeurFrontendProd` (`serveur_idServeurFrontendProd`),
  KEY `serveur_idServeurFrontendTest` (`serveur_idServeurFrontendTest`),
  CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`utilisateur_idutilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`serveur_idServeurBackendProd`) REFERENCES `serveur` (`idServeur`),
  CONSTRAINT `applications_ibfk_3` FOREIGN KEY (`serveur_idServeurBackendTest`) REFERENCES `serveur` (`idServeur`),
  CONSTRAINT `applications_ibfk_4` FOREIGN KEY (`serveur_idServeurFrontendProd`) REFERENCES `serveur` (`idServeur`),
  CONSTRAINT `applications_ibfk_5` FOREIGN KEY (`serveur_idServeurFrontendTest`) REFERENCES `serveur` (`idServeur`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `log` (
  `idLog` int(11) NOT NULL AUTO_INCREMENT,
  `dateLog` datetime NOT NULL,
  `descriptionLog` varchar(50) NOT NULL,
  `utilisateur_idutilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLog`),
  KEY `log_ibfk_1` (`utilisateur_idutilisateur`),
  CONSTRAINT `log_ibfk_1` FOREIGN KEY (`utilisateur_idutilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `reseau` (
  `idReseau` int(11) NOT NULL AUTO_INCREMENT,
  `nomReseau` varchar(10) NOT NULL,
  PRIMARY KEY (`idReseau`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `roleutilisateur` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `nomRole` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `serveur` (
  `idServeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `ipServeur` varchar(15) NOT NULL,
  `reseau` int(11) NOT NULL,
  `os` varchar(30) NOT NULL,
  `typeServeur` int(11) NOT NULL,
  `commentaire` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`idServeur`),
  KEY `reseau` (`reseau`),
  KEY `typeServeur` (`typeServeur`),
  CONSTRAINT `reseau` FOREIGN KEY (`reseau`) REFERENCES `reseau` (`idReseau`),
  CONSTRAINT `typeServeur` FOREIGN KEY (`typeServeur`) REFERENCES `typeserveur` (`idType`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `typeserveur` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `nomType` varchar(50) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `loginUtilisateur` varchar(20) NOT NULL,
  `motDePasse` varchar(1500) NOT NULL,
  `roleUtilisateur` int(11) NOT NULL,
  `prenomUtilisateur` varchar(20) NOT NULL,
  `nomUtilisateur` varchar(30) NOT NULL,
  `emailUtilisateur` varchar(40) NOT NULL,
  `bureau` varchar(10) NOT NULL,
  `division` varchar(10) NOT NULL,
  `sel` varchar(40) DEFAULT NULL,
  `ldap` enum('true','false') NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `role` (`roleUtilisateur`),
  CONSTRAINT `role` FOREIGN KEY (`roleUtilisateur`) REFERENCES `roleutilisateur` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

