USE voyage;

DROP TABLE IF EXISTS `admin`;
DROP TABLE IF EXISTS `reservation`;
DROP TABLE IF EXISTS `date_sortie`;
DROP TABLE IF EXISTS `voyage`;
DROP TABLE IF EXISTS `guide`;
DROP TABLE IF EXISTS `agence`;

CREATE TABLE `admin` (
	id INTEGER auto_increment NOT NULL,
	nom VARCHAR(20) NOT NULL,
	prenom VARCHAR(20) NOT NULL,
	username VARCHAR(20) NOT NULL,
	password VARCHAR(40) NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO admin(nom, prenom, username, password) values("yassine", "jomaa", "admin", "admin");

CREATE TABLE `agence` (
	id INTEGER auto_increment NOT NULL,
	pays VARCHAR(20) NOT NULL,
	ville VARCHAR(20) NOT NULL,
	adresse VARCHAR(100) NOT NULL,
	phone VARCHAR(14) NOT NULL,
	email VARCHAR(254) NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO agence(pays, ville, adresse, phone, email) values('Tunisie', 'Sfax', 'Rt Matar, km 4', '74212354', 'agencevoyage.sf@gmail.com');
INSERT INTO agence(pays, ville, adresse, phone, email) values('Tunisie', 'Tunis', 'Rt Sokra, km 3', '71212354', 'agencevoyage.tn@gmail.com');
INSERT INTO agence(pays, ville, adresse, phone, email) values('Tunisie', 'Sousse', 'Rt Sousse, km 3', '72212354', 'agencevoyage.so@gmail.com');

CREATE TABLE `guide` (
	id INTEGER auto_increment NOT NULL,
	nom VARCHAR(20) NOT NULL,
	prenom VARCHAR(20) NOT NULL,
	email VARCHAR(254) NOT NULL,
	phone VARCHAR(14) NOT NULL,
	agence_id INTEGER NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (agence_id) REFERENCES agence(id) ON DELETE CASCADE
);

INSERT INTO guide(id, nom, prenom, email, phone, agence_id) values('11204455', 'yassine', 'jomaa', 'yassine.jomaa@gmail.com', '23241256', '1');
INSERT INTO guide(id, nom, prenom, email, phone, agence_id) values('11111111', 'ali', 'salah', 'salah@gmail.com', '55111222', '1');

CREATE TABLE `voyage` (
	id INTEGER auto_increment NOT NULL,
	nom VARCHAR(100) NOT NULL,
	description TEXT,
	prix integer unsigned NOT NULL,
	nombre_places integer unsigned NOT NULL,
	ville VARCHAR(20) NOT NULL,
	pays VARCHAR(20) NOT NULL,
	dure integer unsigned NOT NULL,
	image VARCHAR(200) NOT NULL,
	guide_id INTEGER NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (guide_id) REFERENCES guide(id) ON DELETE CASCADE
);

insert into voyage (nom, description, prix, nombre_places, ville, pays, dure, image, guide_id) values('Monastir', 'Une trés jolie ville en Tunisie', '200', '20', 'Monastir', 'Tunisie', '3', 'images/time-bomb-header.jpg', '11204455');
insert into voyage (nom, description, prix, nombre_places, ville, pays, dure, image, guide_id) values('Voyage d\'été 2017', 'Faire votre voyage d\'été dans une des plus meilleire ville du monde pendant une semaine incroiable', '1500', '50', 'Parie', 'France', '7', 'images/image3.jpg', '11111111');

CREATE TABLE `date_sortie` (
	id INTEGER auto_increment NOT NULL,
	voyage_id INTEGER NOT NULL,
	date_sortie DATE NOT NULL,
	places_reserves INTEGER UNSIGNED NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (voyage_id) REFERENCES voyage(id) ON DELETE CASCADE
);

insert into date_sortie (voyage_id, date_sortie, places_reserves) values (1, '2017-09-15', 0);
insert into date_sortie (voyage_id, date_sortie, places_reserves) values (1, '2017-09-20', 0);
insert into date_sortie (voyage_id, date_sortie, places_reserves) values (1, '2017-09-25', 0);
insert into date_sortie (voyage_id, date_sortie, places_reserves) values (2, '2017-07-12', 0);
insert into date_sortie (voyage_id, date_sortie, places_reserves) values (2, '2017-08-12', 0);

CREATE TABLE `reservation` (
	id INTEGER AUTO_INCREMENT NOT NULL,
	date_sortie_id INTEGER NOT NULL,
	nombre INTEGER UNSIGNED NOT NULL,
	phone VARCHAR(14) NOT NULL,
	nom VARCHAR(40) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (date_sortie_id) REFERENCES date_sortie(id) ON DELETE CASCADE
);
