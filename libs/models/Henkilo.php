<?php

require_once "libs/tietokantayhteys.php"; 

class Henkilo {
  
  private $id;
  private $etunimi;
  private $sukunimi;
  private $tunnus;
  private $salasana;
  private $laitos;
  private $yllapitaja;
  
  public function __construct($id, $etunimi, $sukunimi, $tunnus, $salasana, $laitos, $yllapitaja) {
    $this->id = $id;
    $this->etunimi = $etunimi;
    $this->sukunimi = $sukunimi;
    $this->tunnus = $tunnus;
    $this->salasana = $salasana;
    $this->laitos = $laitos;
    $this->yllapitaja = $yllapitaja;
  }
  
  // getterit ja setterit
  
  public function getId() {
      return $this->id;
  }

  public function getEtunimi() {
      return $this->etunimi;
  }

  public function getSukunimi() {
      return $this->sukunimi;
  }

  public function getTunnus() {
      return $this->tunnus;
  }

  public function getSalasana() {
      return $this->salasana;
  }

  public function getLaitos() {
      return $this->laitos;
  }

  public function getYllapitaja() {
      return $this->yllapitaja;
  }

  public function setId($id) {
      $this->id = $id;
  }

  public function setEtunimi($etunimi) {
      $this->etunimi = $etunimi;
  }

  public function setSukunimi($sukunimi) {
      $this->sukunimi = $sukunimi;
  }

  public function setTunnus($tunnus) {
      $this->tunnus = $tunnus;
  }

  public function setSalasana($salasana) {
      $this->salasana = $salasana;
  }

  public function setLaitos($laitos) {
      $this->laitos = $laitos;
  }

  public function setYllapitaja($yllapitaja) {
      $this->yllapitaja = $yllapitaja;
  }

  /* Etsitään kannasta käyttäjätunnuksella ja salasanalla käyttäjäriviä */
  public static function etsiKayttajaTunnuksilla($kayttaja, $salasana) {    
 
    $sql = "SELECT id, etunimi, sukunimi, tunnus, salasana, laitos, yllapitaja from Henkilo where tunnus = ? AND salasana = ? LIMIT 1";
    $kysely = getTietokantayhteys()->prepare($sql);
    $kysely->execute(array($kayttaja, $salasana));

    $tulos = $kysely->fetchObject();
    if ($tulos == null) {
      return null;
    } else {
      $kayttaja = new Henkilo(); 
      $kayttaja->setId($tulos->id);
      $kayttaja->setEtunimi($tulos->etunimi);
      $kayttaja->setSukunimi($tulos->sukunimi);
      $kayttaja->setTunnus($tulos->tunnus);
      $kayttaja->setSalasana($tulos->salasana);
      $kayttaja->setLaitos($tulos->laitos);
      $kayttaja->setYllapitaja($tulos->yllapitaja);

      return $kayttaja;
    }
  }  
 
}