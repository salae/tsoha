<?php

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
  
  
  /* Kirjoita tähän gettereitä ja settereitä */
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

    
  public static function etsiKaikkiKayttajat() {
      $sql = "SELECT id, etunimi, sukunimi, tunnus, salasana, laitos, yllapitaja FROM Henkilo";
      $kysely = getTietokantayhteys()->prepare($sql);
      $kysely->execute();

      $tulokset = array();
      foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
        $kayttaja = new Henkilo();
        $kayttaja->setId($tulos->id);
        $kayttaja->setEtunimi($tulos->etunimi);
        $kayttaja->setSukunimi($tulos->sukunimi);
        $kayttaja->setTunnus($tulos->tunnus);
        $kayttaja->setSalanana($tulos->salasana);
        $kayttaja->setLaitos($tulos->laitos);
        $kayttaja->setYllapitaja($tulos->yllapitaja);

        //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
        //Se vastaa melko suoraan ArrayList:in add-metodia.
        $tulokset[] = $kayttaja;
    }
    return $tulokset;
  }
  
}