<?php
require_once "libs/tietokantayhteys.php";
require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';

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
      } elseif (new DateTime() > $this->getLoppuPvm() ) {  
        return "mennyt";
      } else {
        return "ei ole";
      }
    }
    
    public function getVirheet() {
      return $this->virheet;
    }
    
    public function setId($id) {
        $this->id = (int)$id;
    }

    public function setNimi($nimi) {
        $this->nimi = $nimi;
        if(trim($this->nimi) == '') {
          $this->virheet['nimi'] = "Kurssin nimi ei saa olla tyhjä.";
        } else if (is_numeric($this->nimi)) {
          $this->virheet['nimi'] = "Kurssin nimi ei voi olla pelkkiä numeroita.";          
        } else { 
          unset($this->virheet['nimi']);
        }     
    }

    public function setOpettaja($opettaja) {
       $this->opettaja = (int)$opettaja;
       if(trim($this->opettaja) == '') {
          $this->virheet['opettaja'] = "Opettaja ei saa olla tyhjä.";
        } else { 
          unset($this->virheet['opettaja']);
        }   
    }

    public function setAlkuPvm($alkuPvm) {
        $this->alkuPvm = new DateTime($alkuPvm);        
    }

    public function setLoppuPvm($loppuPvm) {
        $this->loppuPvm = new DateTime($loppuPvm);
        if($this->getAlkuPvm() > $this->loppuPvm ){   //alun pitää olla ennen loppua tai sama päivä
          $this->virheet['loppupvm'] = "Loppupäivä ei voi olla ennen alkupäivää.";
        } else { 
          unset($this->virheet['loppupvm']);
        }
    }

    public function setLaitos($laitos) {
        $this->laitos = (int)$laitos;
        if(trim($this->laitos) == '') {
          $this->virheet['laitos'] = "Laitos ei saa olla tyhjä.";
        } else { 
          unset($this->virheet['laitos']);
        }  
    }

    public function setKysely_aktiivinen($kysely_aktiivinen) {
        $this->kysely_aktiivinen = $kysely_aktiivinen;
    }
    
    public function setVirheet($virheet) {
      $this->virheet = $virheet;
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
  
      /* Etsitään kaikki tietyn opettajan kurssit */

    public static function etsiOpenKurssit($opettaja) {

      $kaikki = Kurssi::etsiKaikkiKurssit();
      $tulokset = array();
      foreach($kaikki as $yksi) {
        if($yksi->getOpettaja() == $opettaja->getEtunimi().' '.$opettaja->getSukunimi()){
          $tulokset[] = $yksi;
        }      
      }
      return $tulokset;
    }
  
      /* Etsitään kaikki tietyn Laitoksen kurssit */

    public static function etsiLaitoksenKurssit($laitos) {

      $kaikki = Kurssi::etsiKaikkiKurssit();
      $tulokset = array();
      foreach($kaikki as $yksi) {
        if($yksi->getLaitos() == $laitos){
          $tulokset[] = $yksi;
        }      
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
  
      /* Etsitään kannasta kurssit, joiden kysely on aktiivisena  */

    public static function etsiAktiivisetKyselyt() {
      $sql = "SELECT Kurssi.id AS id, Kurssi.nimi AS nimi, etunimi,sukunimi,alkupvm, loppupvm, Laitos.nimi AS laitos, kysely_aktiivinen "
              . "FROM Kurssi Join Laitos ON Kurssi.laitos=Laitos.id JOIN Henkilo ON Kurssi.opettaja=Henkilo.id "
              . "WHERE Kurssi.kysely_aktiivinen = ?"
              . "ORDER BY alkuPvm DESC, nimi ASC" ;
      $kysely = getTietokantayhteys()->prepare($sql);
      $kysely->execute(array(TRUE));

      $tulokset = array();
      foreach($kysely->fetchAll(PDO::FETCH_NAMED) as $tulos) {
      $kurssi = new Kurssi($tulos['id'],$tulos['nimi'],$tulos['etunimi'].' '.$tulos['sukunimi'],new DateTime($tulos['alkupvm']),
       new DateTime($tulos['loppupvm']),$tulos['laitos'],$tulos['kysely_aktiivinen']);       

        $tulokset[] = $kurssi;
    }
    return $tulokset;
  }  
  
    /* Muokataan kurssin tietoja */ 
  
    public function muokkaaTietoja() {
      $sql = "UPDATE Kurssi SET nimi = ?, opettaja = ?, alkupvm =? , loppupvm = ?, "
              . "laitos = ? WHERE id = ? AND id NOT EXISTS "
              . "(SELECT K.kurssi FROM Kyselykysymys AS K, Kurssi WHERE K.kurssi = K.id)";
     
    try{ 
      $kysely = getTietokantayhteys()->prepare($sql);

      $ok = $kysely->execute(array($this->getNimi(), $this->getOpettaja(),
          $this->getAlkuPvm()->format("Y-m-d H:i:s"), $this->getLoppuPvm()->format("Y-m-d H:i:s"),$this->getLaitos(), (int)$this->getId()));
    }catch (PDOException $pe){      
      $_SESSION['ilmoitus'] = 'Kurssia ei voi muokata. Virhe: '.$pe->getMessage();
    }
    if ($ok) {
        $this->id = $kysely->fetchColumn();
    }
    return $ok;    
  }
  
     /* Lisätään kantaan uusi kurssi.
      * Oletuksena kysely ei ole aktiivinen*/
  
  public function lisaaKantaan() {
    $sql = "INSERT INTO Kurssi(nimi, opettaja, alkupvm, loppupvm, laitos) "
            . "VALUES(?,?,?,?,?) RETURNING id";
    $kysely = getTietokantayhteys()->prepare($sql);

    $ok = $kysely->execute(array($this->getNimi(), $this->getOpettaja(),
        $this->getAlkuPvm()->format("Y-m-d H:i:s"), $this->getLoppuPvm()->format("Y-m-d H:i:s"),$this->getLaitos()));

    if ($ok) {
        $this->id = $kysely->fetchColumn();
    }
    return $ok;    
  }
  
    /* Poista kurssi tietokannasta  */
  
  public function poistaKannasta() {
    $sql = "DELETE FROM Kurssi WHERE id = ?";
    try{
      $kysely = getTietokantayhteys()->prepare($sql);
      $ok = $kysely->execute(array($this->getId()));
    }catch (PDOException $pe){      
      $_SESSION['ilmoitus'] = 'Kurssia ei voi poistaa. Virhe: '.$pe->getMessage();
    } 
    return $ok;
  }
  
   /* Etsii kurssin opettajan  */
  
  public function etsiOpettaja() {
    $sql = "SELECT Henkilo.id AS id, etunimi, sukunimi, tunnus, salasana, Henkilo.laitos, yllapitaja "
            . "FROM Kurssi JOIN Henkilo ON Kurssi.opettaja=Henkilo.id "
            . "WHERE Kurssi.id = ? LIMIT 1";
    $kysely = getTietokantayhteys()->prepare($sql);
    $kysely->execute(array($this->getId()));
    
    $tulos = $kysely->fetchObject();
    if ($tulos->id == null) {
      return null;
    } else {
        $kayttaja = new Henkilo($tulos->id,$tulos->etunimi,$tulos->sukunimi,
           $tulos->tunnus, $tulos->salasana,$tulos->laitos,$tulos->yllapitaja);
        return $kayttaja;
    }    
  }
  
      /* Merkitään kurssin kysely aktiiviseksi */ 
  
    public function merkitseKyselyAktiiviseksi() {
    $sql = "UPDATE Kurssi SET kysely_aktiivinen = ? WHERE id = ?";
    $kysely = getTietokantayhteys()->prepare($sql);

    $ok = $kysely->execute(array(TRUE, $this->getId()));

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
