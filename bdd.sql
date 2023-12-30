DROP TABLE IF EXISTS COLLECTION;
DROP TABLE IF EXISTS JOUEUR;
DROP TABLE IF EXISTS JEU;

CREATE TABLE JOUEUR(
   Email_Joueur VARCHAR(500),
   Prenom_Joueur VARCHAR(100) NOT NULL,
   Nom_Joueur VARCHAR(100) NOT NULL,
   Mdp_Joueur VARCHAR(100) NOT NULL,
   PRIMARY KEY(Email_Joueur)
);

CREATE TABLE JEU(
   Id_Jeu INT  AUTO_INCREMENT,
   Nom_Jeu VARCHAR(200) NOT NULL,
   Editeur_Jeu VARCHAR(200),
   Plateforme_Jeu VARCHAR(100),
   Sortie_Jeu DATE,
   Desc_Jeu TEXT,
   Url_Cover_Jeu VARCHAR(500),
   Url_Site_Jeu VARCHAR(500),
   PRIMARY KEY(Id_Jeu),
   UNIQUE(Nom_Jeu)
);

CREATE TABLE COLLECTION(
   Email_Joueur VARCHAR(500),
   Id_Jeu INT,
   Numero_Jeu_Joueur INT,
   Nb_Heure INT,
   PRIMARY KEY(Email_Joueur, Id_Jeu),
   FOREIGN KEY(Email_Joueur) REFERENCES JOUEUR(Email_Joueur),
   FOREIGN KEY(Id_Jeu) REFERENCES JEU(Id_Jeu)
);


DELETE FROM COLLECTION;
DELETE FROM JOUEUR;
DELETE FROM JEU;


INSERT INTO JOUEUR VALUES("liliane.daura@tg.com", "Lilian", "DAURAT", "root");
INSERT INTO JOUEUR VALUES("killian.lehenaff@gmail.com", "Killian", "LE HÉNAFF", "klh");


INSERT INTO JEU (Nom_Jeu, Editeur_Jeu, Plateforme_Jeu, Sortie_Jeu, Desc_Jeu, Url_Cover_Jeu, Url_Site_Jeu) VALUES 
("Minecraft", "Mojang", "PC, Plastation, Xbox, Switch, Mobile", "2011-11-18", "Jeu cubique très connu.", "https://image.api.playstation.com/vulcan/img/cfn/11307x4B5WLoVoIUtdewG4uJ_YuDRTwBxQy0qP8ylgazLLc01PBxbsFG1pGOWmqhZsxnNkrU3GXbdXIowBAstzlrhtQ4LCI4.png", "https://minecraft.net"),
("Sea of Thieves", "Microsoft", "PC, Xbox", "2018-03-20", "Jeu de pirates très connu.", "https://image.jeuxvideo.com/medias/152240/1522396063-3523-jaquette-avant.jpg", "https://www.seaofthieves.com/fr"),
("Remnant", "Microsoft", "PC, Plastation, Xbox, Switch", "2019-08-16", "Go casser de la branche.", "https://static.actugaming.net/media/2019/07/remnant-preview-889x500.jpg", "https://www.remnantgame.com/fr"),
("Halo CE", "Bungie", "PC, Xbox", "2001-11-15", "Wot wot wot.", "https://upload.wikimedia.org/wikipedia/en/8/80/Halo_-_Combat_Evolved_%28XBox_version_-_box_art%29.jpg", "https://www.halowaypoint.com/fr-fr"),
("Destiny 2", "Bungie", "PC, Playstation, Xbox", "2017-09-6", "Wot wot wot.", "https://cdn1.epicgames.com/offer/428115def4ca4deea9d69c99c5a5a99e/EGS_Destiny2_Bungie_S2_1200x1600-77d43f6dbe8e5f35d4cde8fca7deba8c", "https://www.bungie.net/7/fr/Destiny/NewLight");

INSERT INTO COLLECTION VALUES
("liliane.daura@tg.com", 1, 1, 1000), 
("liliane.daura@tg.com", 3, 3, 5), 
("liliane.daura@tg.com", 4, 4, 100),
("liliane.daura@tg.com", 5, 5, 50);

INSERT INTO COLLECTION VALUES
("killian.lehenaff@gmail.com", 1, 1, 20), 
("killian.lehenaff@gmail.com", 2, 2, 800);
  
