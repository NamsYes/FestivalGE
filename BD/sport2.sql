
DELETE FROM Etablissement;
DELETE FROM Groupe;
DELETE FROM Attribution;

-- Certains établissements sont fictifs
insert into Etablissement values ('0350785N', 'College de Moka', '2 avenue Aristide Briand BP 6', '35401', 'Saint-Malo', '0299206990', null,1,'M.','Dupont','Alain',20);
insert into Etablissement values ('0350123A', 'College Lamartine', '3, avenue des corsaires', '35404', 'Parame', '0299561459', null, 1,'Mme','Lefort','Anne',58);  
insert into Etablissement values ('0351234W', 'College Leonard de Vinci', '2 rue Rabelais', '35418', 'Saint-Malo', '0299117474', null, 1,'M.','Durand','Pierre',60);   
insert into Etablissement values ('05DF7D8Z', 'Centre de rencontres internationales', '37 avenue du R.P. Umbricht BP 108', '35407', 'Saint-Malo', '0299000000', null, 0, 'M.','Guenroc','Guy',200);

-- Certains groupes sont incomplètement renseignés
insert into Groupe (id, nom, nombrepersonnes, nompays, hebergement) values ('g001','Equipe de Football Limoges',40,'France','O');
insert into Groupe (id, nom, nombrepersonnes, nompays, hebergement) values ('g002','Equipe de Rugby Rouen',25,'France','O');
insert into Groupe (id, nom, nombrepersonnes, nompays, hebergement) values ('g003','Equipe de Badmington dAulnay sous bois',34,'France','O');
insert into Groupe (id, nom, nombrepersonnes, nompays, hebergement) values ('g004','Equipe de Pole Dance de Paris',38,'France','O');
insert into Groupe (id, nom, nombrepersonnes, nompays, hebergement) values ('g005','Equipe feminine de Football Marseillaise',22,'France','O');
insert into Groupe (id, nom, nombrepersonnes, nompays, hebergement) values ('g006','Equipe feminine de badmington de Meaux',29,'France','O');
insert into Groupe (id, nom, nombrepersonnes, nompays, hebergement) values ('g007','Equipe de Handball de Grenoble',19,'France','O');
insert into Groupe (id, nom, nombrepersonnes, nompays, hebergement) values ('g008','Equipe de Badmington de Lille',5,'France','O');
insert into Groupe (id, nom, nombrepersonnes, nompays, hebergement) values ('g009','Equipe de basketball de Perpignan',21,'France','O');
insert into Groupe (id, nom, nombrepersonnes, nompays, hebergement) values ('g010','Equipe de basketball de Toulouse',30,'France','O');
insert into Groupe (id, nom, nombrepersonnes, nompays, hebergement) values ('g011','Equipe de Ping pong de Lognes',38,'France','O');

-- Les attributions sont fictives
insert into Attribution values ('0350785N', 'g001', 11);
insert into Attribution values ('0350785N', 'g002', 9);

insert into Attribution values ('0350123A', 'g004', 13);
insert into Attribution values ('0350123A', 'g005', 8);

insert into Attribution values ('0351234W', 'g001', 3);
insert into Attribution values ('0351234W', 'g006', 10);
insert into Attribution values ('0351234W', 'g007', 7);



 

