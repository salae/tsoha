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


}

