<?php

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
        return $this->kysely_aktiivinen;
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


}
