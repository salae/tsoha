<?php
/*
 * Vastaus-luokka kurssikyselyiden vastausten mallintamiseen.
 */
require_once "libs/tietokantayhteys.php"; 

class Vastaus {
  private $id;
  private $teksti;
  private $arvo;
  private $k_kysymys;
  
  function __construct($id, $teksti, $arvo, $k_kysymys) {
    $this->id = $id;
    $this->teksti = $teksti;
    $this->arvo = $arvo;
    $this->k_kysymys = $k_kysymys;
  }

    public function getId() {
    return $this->id;
  }

  public function getTeksti() {
    return $this->teksti;
  }

  public function getArvo() {
    return $this->arvo;
  }

  public function getK_kysymys() {
    return $this->k_kysymys;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setTeksti($teksti) {
    $this->teksti = $teksti;
  }

  public function setArvo($arvo) {
    $this->arvo = $arvo;
  }

  public function setK_kysymys($k_kysymys) {
    $this->k_kysymys = $k_kysymys;
  }

     /* Lisätään uusi vastaus tietokantaan.*/
  
  public function lisaaKantaan() {    
    if(!empty($this->teksti)){
      $sql = "INSERT INTO Vastaus(teksti,k_kysymys) VALUES(?,?) RETURNING id"; 
      $taulukko = array($this->teksti,  $this->k_kysymys);
    }elseif (!($this->arvo)) {
      $sql = "INSERT INTO Vastaus(arvo, k_kysymys) VALUES(?,?) RETURNING id"; 
      $taulukko = array($this->arvo,  $this->k_kysymys);
    }

    $kysely = getTietokantayhteys()->prepare($sql);
    $ok = $kysely->execute($taulukko);

    if ($ok) {
        $this->id = $kysely->fetchColumn();
    }
    return $ok;    
  }
 
      /* Etsitään tietyn kyselyn vastaukset kannasta */
   
    public static function etsiKyselynVastaukset($kurssi) {      

        $sql = "SELECT Kysymys.kysymys AS kysymys,Vastaus.id AS id, teksti, arvo, k_kysymys "
                . "FROM Vastaus, Kysymys, Kurssi, Kyselykysymys AS K "
                . "WHERE Kysymys.id = K.kysymys AND Kurssi.id = K.kurssi AND Vastaus.k_kysymys = K.id AND Kurssi.id = ? "
                . "ORDER BY k_kysymys, arvo DESC" ;
        $kysely = getTietokantayhteys()->prepare($sql);      
        $kysely->execute(Array($kurssi->getId()));

        $tulokset = array();
        foreach($kysely->fetchAll() as $tulos) {
          $rivi = array($tulos['kysymys'],$tulos['id'],$tulos['teksti'], $tulos['arvo'], $tulos['k_kysymys']);       

          $tulokset[] = $rivi;
      }
      return $tulokset;
    }
    
        /* Etsitään tietyn kyselyn vastausten yhteenvetotietoja kannasta */
   
    public static function etsiVastaustenYhteenvedot($kurssi) {
      
        $sql = "SELECT Kysymys.id AS id, Kysymys.kysymys AS kysymys, count(arvo) AS lkm, avg(arvo) AS keski "
          . "FROM Vastaus, Kysymys, Kurssi, Kyselykysymys AS K "
          . "WHERE Kysymys.id = K.kysymys AND Kurssi.id = K.kurssi AND Vastaus.k_kysymys = K.id AND Kysymys.vastlaji > 1 AND Kurssi.id = ? "
          . "GROUP BY Kysymys.id, Kysymys.kysymys "
          . "ORDER BY Kysymys.kysymys" ;

        $kysely = getTietokantayhteys()->prepare($sql);      
        $kysely->execute(Array($kurssi->getId()));

        $tulokset = array();
        foreach($kysely->fetchAll() as $tulos) {
          $rivi = array($tulos['id'],$tulos['kysymys'],$tulos['lkm'], $tulos['keski']);       

          $tulokset[] = $rivi;
        }
      return $tulokset;
    }  
}

