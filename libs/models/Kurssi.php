<?php
require_once "libs/tietokantayhteys.php"; 

class Kurssi {

    private $id;
    private $nimi;
    private $opettaja;
    private $alkuPvm;
    private $loppuPvm;
    private $laitos;
    private $kysely_aktiivinen; 
    private $virheet = array();
    
    public function __construct($id, $nimi, $opettaja, $alkuPvm, $loppuPvm, $laitos, $kysely_aktiivinen) {
      $this->id = $id;
      $this->nimi = $nimi;
      $this->opettaja = $opettaja;
      $this->alkuPvm = $alkuPvm;
      $this->loppuPvm = $loppuPvm;
      $this->laitos = $laitos;
      $this->kysely_aktiivinen = $kysely_aktiivinen;
    }

    // getterit ja setterit
    
    public function getId() {
        return $this->id;
    }

    public function getNimi() {
        return $this->nimi;
    }

    public function getOpettaja() {
        return $this->opettaja;
    }

    public function getAlkuPvm() {
       return $this->alkuPvm;
    }

    public function getLoppuPvm() {
        return $this->loppuPvm;
    }

    public function getLaitos() {
        return $this->laitos;
    }

    public function getKysely_aktiivinen() {
      if($this->kysely_aktiivinen) {
        return "aktiivinen";
      } elseif (5<1) {  //odottaa järkevämää koodia
        return "mennyt";
      } else
        return "ei ole tehty";
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
        if(trim($this->nimi) == '') {
          $this->virheet['nimi'] = "Nimi ei saa olla tyhjä.";
        } else { 
          unset($this->virheet['nimi']);
        }     
    }

    public function setOpettaja($opettaja) {
       $this->opettaja = $opettaja;
       if(trim($this->opettaja) == '') {
          $this->virheet['opettaja'] = "Opettaja ei saa olla tyhjä.";
        } else { 
          unset($this->virheet['opettaja']);
        }   
    }

    public function setAlkuPvm($alkuPvm) {
        $this->alkuPvm = $alkuPvm;
    }

    public function setLoppuPvm($loppuPvm) {
        $this->loppuPvm = $loppuPvm;
    }

    public function setLaitos($laitos) {
        $this->laitos = $laitos;
        if(trim($this->laitos) == '') {
          $this->virheet['laitos'] = "Laitos ei saa olla tyhjä.";
        } else { 
          unset($this->virheet['laitos']);
        }  
    }

    public function setKysely_aktiivinen($kysely_aktiivinen) {
        $this->kysely_aktiivinen = $kysely_aktiivinen;
    }
    
    /* Etsitään kaikki kurssit kannasta */

    public static function etsiKaikkiKurssit() {
      $sql = "SELECT Kurssi.id AS id, Kurssi.nimi AS nimi, etunimi,sukunimi,alkupvm, loppupvm, Laitos.nimi AS laitos, kysely_aktiivinen "
              . "FROM Kurssi Join Laitos ON Kurssi.laitos=Laitos.id JOIN Henkilo ON Kurssi.opettaja=Henkilo.id "
              . "ORDER BY alkuPvm DESC, nimi ASC" ;
      $kysely = getTietokantayhteys()->prepare($sql);
      $kysely->execute();

      $tulokset = array();
      foreach($kysely->fetchAll(PDO::FETCH_NAMED) as $tulos) {
      $kurssi = new Kurssi($tulos['id'],$tulos['nimi'],$tulos['etunimi'].' '.$tulos['sukunimi'],new DateTime($tulos['alkupvm']),
       new DateTime($tulos['loppupvm']),$tulos['laitos'],$tulos['kysely_aktiivinen']);       

        $tulokset[] = $kurssi;
    }
    return $tulokset;
  }
  
    /* Etsitään kannasta kurssi pääavaimen perusteella */
  
  public static function etsiKurssi($id) {
    $sql = "SELECT Kurssi.id AS id, Kurssi.nimi AS nimi, etunimi,sukunimi, alkupvm, "
            . "loppupvm,Laitos.nimi AS laitos, kysely_aktiivinen "
            . "FROM Kurssi JOIN Laitos ON Kurssi.laitos=Laitos.id "
            . "JOIN Henkilo ON Kurssi.opettaja=Henkilo.id WHERE Kurssi.id = ? LIMIT 1";
    $kysely = getTietokantayhteys()->prepare($sql);
    $kysely->execute(array($id));
    
    $tulos = $kysely->fetch(PDO::FETCH_NAMED);
    if ($tulos == null) {
      return null;
    } else {
        $kurssi = new Kurssi($tulos['id'],$tulos['nimi'],$tulos['etunimi'].' '.$tulos['sukunimi'],new DateTime($tulos['alkupvm']),
       new DateTime($tulos['loppupvm']),$tulos['laitos'],$tulos['kysely_aktiivinen']);
        return $kurssi;
    }    
  }
  
    /* Muokataan kurssin tietoja */ 
  
    public function muokkaaTietoja() {
    $sql = "UPDATE Kurssi SET nimi = ?, opettaja = ?, alkupvm =? , loppupvm = ?, "
            . "laitos = ? WHERE id = ?";
    $kysely = getTietokantayhteys()->prepare($sql);

    $ok = $kysely->execute(array($this->getNimi(), $this->getOpettaja(),
        $this->getAlkuPvm(), $this->getLoppuPvm(),$this->getLaitos(), $this->getId()));

    if ($ok) {
        $this->id = $kysely->fetchColumn();
    }
    return $ok;    
  }
  
     /* Lisätään kantaan uusi kurssi.
      * Oletuksena kysely ei ole aktiivinen*/
  
  public function lisaaKantaan() {
    $sql = "INSERT INTO Kurssi(nimi, opettaja, alkupvm, loppupvm, laitos) VALUES(?,?,?,?,?) RETURNING id";
    $kysely = getTietokantayhteys()->prepare($sql);

    $ok = $kysely->execute(array($this->getNimi(), $this->getOpettaja(),
        $this->getAlkuPvm(), $this->getLoppuPvm(),$this->getLaitos()));

    if ($ok) {
        $this->id = $kysely->fetchColumn();
    }
    return $ok;    
  }
  
    /* Tarkistaa onko olioon asetetut tiedot kelvollisia  */ 
  
  public function onkoKelvollinen() {
    return empty($this->virheet);
  }

}
