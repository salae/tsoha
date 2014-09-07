CREATE TABLE Laitos (
  id        SERIAL NOT NULL PRIMARY KEY,
  nimi      VARCHAR(50) NOT NULL
);

CREATE TABLE Henkilo (
  id		SERIAL NOT NULL PRIMARY KEY,
  etunimi 	VARCHAR(30) NOT NULL,
  sukunimi 	VARCHAR(40) NOT NULL,
  tunnus 	VARCHAR(10) NOT NULL UNIQUE,
  salasana 	VARCHAR(12) NOT NULL,
  laitos 	INTEGER NOT NULL REFERENCES Laitos(id),
  yllapitaja	BOOLEAN DEFAULT FALSE
);

CREATE TABLE Kurssi (
  id                SERIAL NOT NULL PRIMARY KEY,
  nimi              VARCHAR(70) NOT NULL,
  opettaja          INTEGER NOT NULL REFERENCES Henkilo(id),
  alkuPVM           TIMESTAMP NOT NULL,
  loppuPVM          TIMESTAMP NOT NULL,
  laitos            INTEGER NOT NULL REFERENCES Laitos(id),
  kysely_aktiivinen BOOLEAN DEFAULT FALSE
);

CREATE TABLE Kysymys (
  id            SERIAL NOT NULL PRIMARY KEY,
  kysymys       VARCHAR(255) NOT NULL,
  vastLaji      INTEGER NOT NULL,
  kaikille      BOOLEAN DEFAULT FALSE, 
  laitos        INTEGER REFERENCES Laitos(id),
  vaihtoehdot   TEXT[]
);

CREATE TABLE Kyselykysymys(
  id        SERIAL NOT NULL PRIMARY KEY,
  kurssi    INTEGER NOT NULL REFERENCES Kurssi(id),
  kysymys   INTEGER NOT NULL REFERENCES Kysymys(id)
);

CREATE TABLE Vastaus (
  id    SERIAL NOT NULL PRIMARY KEY,
  teksti    VARCHAR(500),
  arvo      INTEGER,
  k_kysymys   INTEGER REFERENCES Kyselykysymys(id)
);