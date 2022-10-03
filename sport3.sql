ALTER TABLE Attribution
DROP FOREIGN KEY fk1_Attribution ;

ALTER TABLE Attribution
DROP FOREIGN KEY fk2_Attribution;

ALTER TABLE Attribution
ADD CONSTRAINT fk1_Attribution foreign key(idEtab) references Etablissement(id);

ALTER TABLE Attribution
ADD CONSTRAINT fk2_Attribution foreign key(idGroupe) references Groupe(id);