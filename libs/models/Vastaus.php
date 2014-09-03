<?php
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
  
}

