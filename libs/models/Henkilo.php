<?php

require_once "libs/tietokantayhteys.php"; 

class Henkilo {
  
  private $id;
  private $tunnus;
  private $salasana;
  
  function Henkilo($id, $tunnus, $salasana) {
    $this->id = $id;
    $this->tunnus = $tunnus;
    $this->salasana = $salasana;
  }

  
  public function getId() {
    return $this->id;
  }

  public function getTunnus() {
    return $this->tunnus;
  }

  public function getSalasana() {
    return $this->salasana;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setTunnus($tunnus) {
    $this->tunnus = $tunnus;
  }

  public function setSalasana($salasana) {
    $this->salasana = $salasana;
  }

  /* Etsitään kannasta käyttäjätunnuksella ja salasanalla käyttäjäriviä */
  public static function etsiKayttajaTunnuksilla($kayttaja, $salasana) {    
 
    $sql = "SELECT id,tunnus,salasana from Henkilo where tunnus = ? AND salasana = ? LIMIT 1";
    $kysely = getTietokantayhteys()->prepare($sql);
    $kysely->execute(array($kayttaja, $salasana));

    $tulos = $kysely->fetchObject();
    if ($tulos == null) {
      return null;
    } else {
      $kayttaja = new Henkilo(); 
      $kayttaja->setId($tulos->id);
      $kayttaja->setTunnus($tulos->tunnus);
      $kayttaja->setSalasana($tulos->salasana);

      return $kayttaja;
    }
  }  
 
}