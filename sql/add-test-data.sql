INSERT INTO Henkilo (etunimi, sukunimi, tunnus, salasana, laitos, yllapitaja) VALUES ('Mikko', 'Matikka', 'mikka', 'password', 'Matematiikka ja tilastotiede', FALSE);
INSERT INTO Henkilo (etunimi, sukunimi, tunnus, salasana, laitos, yllapitaja) VALUES ('Outi', 'Olio', 'outolio', '12345', 'Tietojenkäsittelytiede', TRUE);
INSERT INTO Henkilo (etunimi, sukunimi, tunnus, salasana, laitos, yllapitaja) VALUES ('Tiina', 'Tutkija', 'tiitu', 'salasana', 'Matematiikka ja tilastotiede', TRUE);
INSERT INTO Henkilo (etunimi, sukunimi, tunnus, salasana, laitos, yllapitaja) VALUES ('Antti', 'Alkemia', 'antal', '54321', 'Kemia', FALSE);
INSERT INTO Henkilo (etunimi, sukunimi, tunnus, salasana, laitos, yllapitaja) VALUES ('Anne', 'Algoritmi', 'alanne', 'qwerty', 'Tietojenkäsittelytiede', TRUE);

INSERT INTO Kurssi (opettaja, nimi, alkuPVM, loppuPVM, laitos) VALUES (1, 'Logiikka I','2015-01-14' , '2015-05-31', 'Matematiikka ja tilastotiede');
INSERT INTO Kurssi (opettaja, nimi, alkuPVM, loppuPVM, laitos, kysely_aktiivinen) VALUES (4, 'Biologinen kemia', '2014-08-04', '2014-09-15', 'Kemia', true);
INSERT INTO Kurssi (opettaja, nimi, alkuPVM, loppuPVM, laitos) VALUES (2,'Ohjelmoinnin perusteet', '2013-09-01', '2013-12-14', 'Tietojenkäsittelytiede');
INSERT INTO Kurssi (opettaja, nimi, alkuPVM, loppuPVM, laitos) VALUES (5, 'Tietokantojen perusteet', '2013-09-01', '2013-12-14', 'Tietojenkäsittelytiede');

INSERT INTO Kysymys (kysymys,tyyppi) VALUES ('Mikä oli tärkein asia minkä opit?', 'vapaamuotoinen teksti');
INSERT INTO Kysymys (kysymys,tyyppi,laajuus) VALUES ('Mikä oli kurssin vaikeustaso?', '0-5', 'kaikki');
INSERT INTO Kysymys (kysymys,tyyppi,laajuus) VALUES ('Oliko tarpeeksi tehtäviä?', '0-5', 'Matematiikka ja tilastotiede');

INSERT INTO Kyselykysymys (kurssi, kysymys) VALUES (1,1);
INSERT INTO Kyselykysymys (kurssi, kysymys) VALUES (3,2);
INSERT INTO Kyselykysymys (kurssi, kysymys) VALUES (1,3);

INSERT INTO Vastaus (teksti, k_kysymys) VALUES ('Kaikki on totta tai sitten ei', 1);
INSERT INTO Vastaus (arvo, k_kysymys) VALUES ('5', 2);
INSERT INTO Vastaus (arvo, k_kysymys) VALUES ('3', 2);
INSERT INTO Vastaus (arvo, k_kysymys) VALUES ('5', 2);
INSERT INTO Vastaus (arvo, k_kysymys) VALUES ('1', 2);
INSERT INTO Vastaus (arvo, k_kysymys) VALUES ('2', 2);
INSERT INTO Vastaus (arvo, k_kysymys) VALUES ('2', 2);
