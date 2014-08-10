CREATE TABLE Henkilo (
  id		SERIAL NOT NULL PRIMARY KEY,
  etunimi 	VARCHAR(30) NOT NULL,
  sukunimi 	VARCHAR(40) NOT NULL,
  tunnus 	VARCHAR(10) NOT NULL UNIQUE,
  salasana 	VARCHAR(12) NOT NULL,
  laitos 	VARCHAR(50),
  yllapitaja	BOOLEAN DEFAULT FALSE
);

CREATE TABLE Kurssi (
  id                SERIAL NOT NULL PRIMARY KEY,
  nimi              VARCHAR(70) NOT NULL,
  opettaja          INTEGER REFERENCES Henkilo(id),
  alkuPVM           DATE NOT NULL,
  loppuPVM          DATE NOT NULL,
  laitos            VARCHAR(50) NOT NULL,
  kysely_aktiivinen BOOLEAN DEFAULT FALSE
);

CREATE TABLE Kysymys (
  id        SERIAL NOT NULL PRIMARY KEY,
  kysymys   VARCHAR(255) NOT NULL,
  tyyppi    VARCHAR(30) NOT NULL,
  laajuus   VARCHAR(50) 
);

CREATE TABLE Kyselykysymys(
  id        SERIAL NOT NULL PRIMARY KEY,
  kurssi    INTEGER REFERENCES Kurssi(id),
  kysymys   INTEGER REFERENCES Kysymys(id)
);

CREATE TABLE Vastaus (
  id    SERIAL NOT NULL PRIMARY KEY,
  teksti    VARCHAR(500),
  arvo      CHAR(1),
  k_kysymys   INTEGER REFERENCES Kyselykysymys(id)
);