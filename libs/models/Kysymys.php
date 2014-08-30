<?php
require_once "libs/tietokantayhteys.php"; 

class Kysymys {
    
    private $id;
    private $kysymys;
    private $vastausLaji;
    private $kaikille;
    private $laitos;
    private $vaihtoehdot = array();
    private $virheet = array();
    
    function __construct($id, $kysymys, $vastausLaji, $kaikille, $laitos, $vaihtoehdot) {
        $this->setId($id);
        $this->setKysymys($kysymys);
        $this->setVastausLaji($vastausLaji);
        $this->setKaikille($kaikille);
        $this->setLaitos($laitos);
        $this->setVaihtoehdot($vaihtoehdot);
    }

    // getterit ja setterit   
    
    public function getId() {
        return $this->id;
    }

    public function getKysymys() {
        return $this->kysymys;
    }

    public function getVastausLaji() { 
      if(intval($this->vastausLaji) == 1) {
        return "teksti";
      } elseif ($this->vastausLaji == 2) {
        return "0-5";
      } else {
        return "muut vaihtoehdot";
      }

    }
    
    public function getKaikille() {
        return $this->kaikille;
    }

    public function getLaitos() {
      return $this->laitos;
    }
    
    public function getVaihtoehdot() {
      return $this->vaihtoehdot;
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

    
    public static function etsiKaikkiKysymykset() {
      $sql = "SELECT Kysymys.id AS id, kysymys, vastlaji, kaikille, Laitos.nimi AS laitos,vaihtoehdot "
              . "FROM Kysymys LEFT OUTER JOIN Laitos ON Kysymys.laitos=Laitos.id "
              . "ORDER BY kysymys" ;
      $kysely = getTietokantayhteys()->prepare($sql);
      $kysely->execute();

      $tulokset = array();
      foreach($kysely->fetchAll() as $tulos) {
        $kysymys = new Kysymys($tulos[id],$tulos[kysymys],  var_dump($tulos[vastLaji]),
                $tulos[kaikille], $tulos[laitos], $tulos[vaihtoehdot]);       

        $tulokset[] = $kysymys;
    }
    return $tulokset;
  }     
            
}

