<?php
/*
 * Laitos-luokka tiedekunnan laitosten mallintamiseen.
 */

class Laitos {
  
  private $id;
  private $nimi;
  
  function __construct($id, $nimi) {
    $this->id = $id;
    $this->nimi = $nimi;
  }

  public function getId() {
    return $this->id;
  }

  public function getNimi() {
    return $this->nimi;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setNimi($nimi) {
    $this->nimi = $nimi;
  }

  public function haeKaikki() {
      $sql = "SELECT id, nimi FROM Laitos ORDER BY nimi" ;
      $kysely = getTietokantayhteys()->prepare($sql);
      $kysely->execute();

      $tulokset = array();
      foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
        $laitos = new Laitos($tulos->id,$tulos->nimi);       

        $tulokset[] = $laitos;
    }
    return $tulokset;
  }
}

