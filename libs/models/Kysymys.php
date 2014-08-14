<?php

class Kysymys {
    
    private $id;
    private $kysymys;
    private $tyyppi;
    private $laajuus;

    function __construct($id, $kysymys, $tyyppi, $laajuus) {
        $this->id = $id;
        $this->kysymys = $kysymys;
        $this->tyyppi = $tyyppi;
        $this->laajuus = $laajuus;
    }

    // getterit ja setterit   
    
    public function getId() {
        return $this->id;
    }

    public function getKysymys() {
        return $this->kysymys;
    }

    public function getTyyppi() {
        return $this->tyyppi;
    }

    public function getLaajuus() {
        return $this->laajuus;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setKysymys($kysymys) {
        $this->kysymys = $kysymys;
    }

    public function setTyyppi($tyyppi) {
        $this->tyyppi = $tyyppi;
    }

    public function setLaajuus($laajuus) {
        $this->laajuus = $laajuus;
    }

            
            
}

