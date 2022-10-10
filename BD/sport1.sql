
GRANT ALL ON festival . * TO 'festival'@'localhost' IDENTIFIED BY 'secret';

DROP TABLE IF EXISTS `Attribution`;
DROP TABLE IF EXISTS `Groupe`;
DROP TABLE IF EXISTS `Etablissement`;

create table Etablissement 
(id char(8) not null, 
nom varchar(45) not null,
adresseRue varchar(45) not null, 
codePostal char(5) not null, 
ville varchar(35) not null,
tel varchar(13) not null,
adresseElectronique varchar(70),
type tinyint not null,
civiliteResponsable varchar(12) not null,
nomResponsable varchar(25) not null,
prenomResponsable varchar(25),
nombreChambresOffertes integer,
constraint pk_Etablissement primary key(id))
ENGINE=INNODB;
DESC Etablissement;

create table Groupe
(id char(4) not null, 
nom varchar(40) not null, 
identiteResponsable varchar(40) default null,
adressePostale varchar(120) default null,
nombrePersonnes integer not null, 
nomPays varchar(40) not null, 
hebergement char(1) not null,
constraint pk_Groupe primary key(id))
ENGINE=INNODB;

create table Attribution
(idEtab char(8) not null, 
idGroupe char(4) not null, 
nombreChambres integer not null,
constraint pk_Attribution primary key(idEtab, idGroupe), 
constraint fk1_Attribution foreign key(idEtab) references Etablissement(id),
constraint fk2_Attribution foreign key(idGroupe) references Groupe(id)) 
ENGINE=INNODB;
