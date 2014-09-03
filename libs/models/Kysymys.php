<?php
require_once "libs/tietokantayhteys.php"; 
require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';

class Kysymys {
    
    private $id;
    private $kysymys;
    private $vastausLaji;
    private $kaikille;
    private $laitos;
    private $vaihtoehdot = array();
    private $virheet = array();
    
    function __construct($id, $kysymys, $vastausLaji, $kaikille, $laitos, $vaihtoehdot) {
      $this->id = $id;
      $this->kysymys = $kysymys;
      $this->vastausLaji = intval($vastausLaji);
      $this->kaikille = $kaikille;
      $this->laitos = $laitos;
      $this->vaihtoehdot = $vaihtoehdot;
    }

        // getterit ja setterit   
    
    public function getId() {
        return $this->id;
    }

    public function getKysymys() {
        return $this->kysymys;
    }

    public function getVastausLaji() { 
      return (int)$this->vastausLaji;
    }
    
    public function getVastausLajiMerkkijonona() {       
      if($this->getVastauslaji()==1): 
        return 'teksti';
      elseif ($this->getVAstauslaji()== 2): 
        return '0-5';
      else : 
        return 'muut vaihtoehdot';  
      endif;
    }
    
    public function getKaikille() {
        return $this->kaikille;
    }

    public function getLaitos() {
      return $this->laitos;
    }
    
    public function getVaihtoehdot() {
      trim((String)$this->vaihtoehdot,"{}");
//      rtrim($this->vaihtoehdot,'}');
      $valinnat = array();
      $valinnat = explode(',', $this->vaihtoehdot);
      return $valinnat;
    }

    public function getVirheet() {
      return $this->virheet;
    }
        
    public function setId($id) {
        $this->id = $id;
    }

    public function setKysymys($kysymys) {
        $this->kysymys = $kysymys;
    }

    public function setVastausLaji($vastausLaji) {
      intval($this->vastausLaji = $vastausLaji);
    }
    
    public function setKaikille($laajuus) {
        $this->kaikille = $laajuus;
    }

    public function setLaitos($laitos) {
      $this->laitos = $laitos;
    }
    
    public function setVaihtoehdot($vaihtoehdot) {
      $this->vaihtoehdot = $vaihtoehdot;
    }

    public function setVirheet($virheet) {
      $this->virheet = $virheet;
    }

     /* Etsitään kaikki kysymykset kannasta */
    
    public static function etsiKaikkiKysymykset() {
      $sql = "SELECT Kysymys.id AS id, kysymys, vastlaji, kaikille, Laitos.nimi AS laitos,vaihtoehdot "
              . "FROM Kysymys LEFT OUTER JOIN Laitos ON Kysymys.laitos=Laitos.id "
              . "ORDER BY kysymys" ;
      $kysely = getTietokantayhteys()->prepare($sql);      
      $kysely->execute();

      $tulokset = array();
      foreach($kysely->fetchAll() as $tulos) {
        $kysymys = new Kysymys($tulos['id'],$tulos['kysymys'], $tulos['vastlaji'],
                $tulos['kaikille'], $tulos['laitos'], $tulos['vaihtoehdot']);       

        $tulokset[] = $kysymys;
    }
    return $tulokset;
  }   
  
    /* Etsitään kyselyyn kuuluvat valitut kysymykset kannasta */
   
    public static function etsiKyselynKysymykset($kurssi) {
        $sql = "SELECT DISTINCT Kysymys.id AS id, Kysymys.kysymys AS kysymys, vastlaji, kaikille, Kysymys.laitos AS laitos,vaihtoehdot "
                . "FROM Kysymys, Kurssi, Kyselykysymys AS K "
                . "WHERE Kysymys.id = K.kysymys AND Kurssi.id = K.kurssi AND Kurssi.id = ? "
                . "ORDER BY Kysymys.kysymys" ;
        $kysely = getTietokantayhteys()->prepare($sql);      
        $kysely->execute(Array($kurssi->getId()));

        $tulokset = array();
        foreach($kysely->fetchAll() as $tulos) {
          $kysymys = new Kysymys($tulos['id'],$tulos['kysymys'], $tulos['vastlaji'],
                  $tulos['kaikille'], $tulos['laitos'], $tulos['vaihtoehdot']);       

          $tulokset[] = $kysymys;
      }
      return $tulokset;
    }    
    
     /* Etsitään kaikkien kurssien yhteiset kysymykset kannasta */
  
    public static function etsiKaikkienYhteisetKysymykset() {
        $sql = "SELECT Kysymys.id AS id, Kysymys.kysymys AS kysymys, vastlaji, kaikille, Kysymys.laitos AS laitos,vaihtoehdot "
                . "FROM Kysymys "
                . "WHERE kaikille = ? "
                . "ORDER BY Kysymys.kysymys" ;
        $kysely = getTietokantayhteys()->prepare($sql);      
        $kysely->execute(Array(TRUE));

        $tulokset = array();
        foreach($kysely->fetchAll() as $tulos) {
          $kysymys = new Kysymys($tulos['id'],$tulos['kysymys'], $tulos['vastlaji'],
                  $tulos['kaikille'], $tulos['laitos'], $tulos['vaihtoehdot']);       

          $tulokset[] = $kysymys;
      }
      return $tulokset;
    }    
 
    /* Etsitään oman laitoksen kursseille yhteiset kysymykset kannasta */
    
     public static function etsiOmanLaitoksenKysymykset($omaKurssi) {
        $sql = "SELECT DISTINCT Kysymys.id AS id, Kysymys.kysymys AS kysymys, vastlaji, kaikille, Kysymys.laitos AS laitos,vaihtoehdot "
                . "FROM Kysymys, Laitos, Kurssi "
                . "WHERE Laitos.id = Kysymys.laitos AND Laitos.id = Kurssi.laitos AND Kurssi.id = ? "
                . "ORDER BY Kysymys.kysymys" ;
        $kysely = getTietokantayhteys()->prepare($sql);      
        $kysely->execute(Array($omaKurssi->getId()));

        $tulokset = array();
        foreach($kysely->fetchAll() as $tulos) {
          $kysymys = new Kysymys($tulos['id'],$tulos['kysymys'], $tulos['vastlaji'],
                  $tulos['kaikille'], $tulos['laitos'], $tulos['vaihtoehdot']);       

          $tulokset[] = $kysymys;
      }
      return $tulokset;
    }  
    
    /* Etsitään vapaavalinteiset kysymykset kannasta */
    
     public static function etsiValinnaisetKysymykset() {
        $sql = "SELECT id, kysymys, vastlaji, kaikille, laitos,vaihtoehdot "
                . "FROM Kysymys "
                . "WHERE laitos = ? OR NOT kaikille = ? "
                . "ORDER BY kysymys" ;
        $kysely = getTietokantayhteys()->prepare($sql);      
        $kysely->execute(Array(NULL,TRUE));

        $tulokset = array();
        foreach($kysely->fetchAll() as $tulos) {
          $kysymys = new Kysymys($tulos['id'],$tulos['kysymys'], $tulos['vastlaji'],
                  $tulos['kaikille'], $tulos['laitos'], $tulos['vaihtoehdot']);       

          $tulokset[] = $kysymys;
      }
      return $tulokset;
    } 
    
    /* Lisätään kantaan kurssi-kysymys -pareja kurssikyselyitä varten */
    
    public static function lisaaKantaanKyselykysymys($kurssiID, $kysymysID) {
      $sql = "INSERT INTO Kyselykysymys(kurssi, kysymys) "
              . "VALUES(?,?) RETURNING id";
      $kysely = getTietokantayhteys()->prepare($sql);

      $ok = $kysely->execute(array($kurssiID, $kysymysID));

      return $ok;    
    } 
    
    
}

