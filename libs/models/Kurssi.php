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
    }

    public function setOpettaja($opettaja) {
        $this->opettaja = $opettaja;
    }

    public function setAlkuPvm($alkuPvm) {
        $this->alkuPvm = $alkuPvm;
    }

    public function setLoppuPvm($loppuPvm) {
        $this->loppuPvm = $loppuPvm;
    }

    public function setLaitos($laitos) {
        $this->laitos = $laitos;
    }

    public function setKysely_aktiivinen($kysely_aktiivinen) {
        $this->kysely_aktiivinen = $kysely_aktiivinen;
    }

    public static function etsiKaikkiKurssit() {
      $sql = "SELECT Kurssi.id AS id, Kurssi.nimi AS nimi, opettaja, alkuPvm, to_char(loppuPVM,'YYYY-DD-MM') AS loppuPvm, Laitos.nimi AS laitos, kysely_aktiivinen "
              . "FROM Kurssi Join Laitos ON Kurssi.laitos=Laitos.id JOIN Henkilo ON Kurssi.opettaja=Henkilo.id "
              . "ORDER BY alkuPvm DESC, nimi ASC" ;
      $kysely = getTietokantayhteys()->prepare($sql);
      $kysely->execute();

      $tulokset = array();
      foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
        $kurssi = new Kurssi($tulos->id,$tulos->nimi,$tulos->opettaja, new DateTime($tulos->alkuPvm),
        $tulos-> loppuPvm,$tulos->laitos,$tulos->kysely_aktiivinen);       

        $tulokset[] = $kurssi;
    }
    return $tulokset;
  }
  
    /* Etsitään kannasta kurssi pääavaimen perusteella */
  
  public static function etsiKurssi($id) {
    $sql = "SELECT Kurssi.id AS id, Kurssi.nimi AS nimi, etunimi,sukunimi, alkuPvm, "
            . "to_char(loppuPvm,'YYYY-DD-MM') AS loppuPvm,Laitos.nimi AS laitos, kysely_aktiivinen "
            . "FROM Kurssi JOIN Laitos ON Kurssi.laitos=Laitos.id "
            . "JOIN Henkilo ON Kurssi.opettaja=Henkilo.id WHERE Kurssi.id = ? LIMIT 1";
    $kysely = getTietokantayhteys()->prepare($sql);
    $kysely->execute(array($id));
    
    $tulos = $kysely->fetchObject();
    if ($tulos == null) {
      return null;
    } else {
        $kurssi = new Kurssi($tulos->id,$tulos->nimi,$tulos->etunimi.' '.$tulos->sukunimi,
           $tulos->alkuPvm, $tulos->loppuPvm,$tulos->laitos,$tulos->kysely_aktiivinen); 
        return $kurssi;
    }    
  }
}
