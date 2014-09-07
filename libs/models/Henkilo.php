<?php
require_once "libs/tietokantayhteys.php"; 

class Henkilo {
  
  private $id;
  private $etunimi;
  private $sukunimi;
  private $tunnus;
  private $salasana;
  private $laitos; 
  private $yllapitaja;  //totta tai ei, oikeuksista kyse
  private $virheet = array();
  
  function __construct($id, $etunimi, $sukunimi, $tunnus, $salasana, $laitos, $yllapitaja) {
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

  public function onkoYllapitaja() { //nimi järkevämpi mielestäni näin
    return $this->yllapitaja;    
  }
  
  public function getVirheet() {
    return $this->virheet;
  }
  
  public function setId($id) {
      $this->id = $id;
  }

  public function setEtunimi($etunimi) {    
    $this->etunimi = $etunimi;
    if(trim($this->etunimi) == '') {
      $this->virheet['etunimi'] = "Etunimi ei saa olla tyhjä.";
    } else if(is_numeric($this->etunimi)){
      $this->virheet['etunimi'] = "Etunimi ei voi olla numero.";
    } else { 
      unset($this->virheet['etunimi']);
    }     
  }

  public function setSukunimi($sukunimi) {    
    $this->sukunimi = $sukunimi;
    if(trim($this->sukunimi) == '') {
      $this->virheet['sukunimi'] = "Sukunimi ei saa olla tyhjä.";
     } else if(is_numeric($this->sukunimi)){
      $this->virheet['etunimi'] = "Sukunimi ei voi olla numero.";     
    } else { 
      unset($this->virheet['sukunimi']);
    }     
  }

  public function setTunnus($tunnus) {
    $this->tunnus = $tunnus;
    if(trim($this->tunnus) == '') {
      $this->virheet['tunnus'] = "Käyttäjätunnus ei saa olla tyhjä.";
    }else { 
      unset($this->virheet['tunnus']);
    }      
  }

  public function setSalasana($salasana) {
    $this->salasana = $salasana;
    if(trim($this->salasana) == '') {
      $this->virheet['salasana'] = "Salasana ei saa olla tyhjä.";
    } else { 
      unset($this->virheet['salasana']);
    }      
  }

  public function setLaitos($laitos) {
    $this->laitos = $laitos;    
  }
  
  /* Etsitään kannasta käyttäjä pääavaimen perusteella */
  
  public static function etsiKayttaja($id) {
    $sql = "SELECT Henkilo.id AS id, etunimi, sukunimi, tunnus, salasana, Laitos.nimi AS laitos, yllapitaja "
            . "FROM Henkilo LEFT OUTER JOIN Laitos ON Henkilo.laitos=Laitos.id WHERE Henkilo.id = ? LIMIT 1";
    $kysely = getTietokantayhteys()->prepare($sql);
    $kysely->execute(array($id));
    
    $tulos = $kysely->fetchObject();
    if ($tulos->id == null) {
      return null;
    } else {
        $kayttaja = new Henkilo($tulos->id,$tulos->etunimi,$tulos->sukunimi,
           $tulos->tunnus, $tulos->salasana,$tulos->laitos,$tulos->yllapitaja);
        return $kayttaja;
    }    
  }

  /* Etsitään kannasta käyttäjä käyttäjätunnuksen ja salasanan perusteella */
  
  public static function etsiKayttajaTunnuksilla($kayttaja, $salasana) {    
 
    $sql = "SELECT Henkilo.id AS id, etunimi, sukunimi, tunnus, salasana, Laitos.nimi AS laitos, yllapitaja "
            . "from Henkilo LEFT OUTER JOIN Laitos ON Henkilo.laitos=Laitos.id where tunnus = ? AND salasana = ? LIMIT 1";
    $kysely = getTietokantayhteys()->prepare($sql);
    $kysely->execute(array($kayttaja, $salasana));

    $tulos = $kysely->fetchObject();
    if ($tulos == null) {
      return null;
    } else {
        $kayttaja = new Henkilo($tulos->id,$tulos->etunimi,$tulos->sukunimi,
           $tulos->tunnus, $tulos->salasana,$tulos->laitos,$tulos->yllapitaja);
        return $kayttaja;
    }
  }  
 
   /* Lisätään kantaan uusi käyttäjä.
    * Oletuksena admin-oikeuksia ei ole */
  
  public function lisaaKantaan() {
    
    $sql = "INSERT INTO Henkilo(etunimi, sukunimi, tunnus, salasana, laitos) VALUES(?,?,?,?,?) RETURNING id";

    try{
      $kysely = getTietokantayhteys()->prepare($sql);

      $ok = $kysely->execute(array($this->getEtunimi(), $this->getSukunimi(),
          $this->getTunnus(), $this->getSalasana(),$this->getLaitos()));
    }catch (PDOException $pe){ 
       $this->virheet['lisaaminen'] = 'Henkilön lisäys ei onnistunut. Virhe: '.$pe->getMessage();
    }
    if ($ok) {
        $this->id = $kysely->fetchColumn();
    }
    return $ok;    
  }  
 
  /* Poista henkilö tietokannasta  */
  
  public function poistaKannasta() {
    $sql = "DELETE FROM Henkilo WHERE id = ?";
    
    try{
      $kysely = getTietokantayhteys()->prepare($sql);
      $ok = $kysely->execute(array($this->getId()));
    }catch (PDOException $pe){      
      $_SESSION['ilmoitus'] = 'Henkilöa ei voi poistaa. Virhe: '.$pe->getMessage();
    }
    return $ok;
  }
  
  /* Muokataan henkilön tietoja */ 
  
  public function muokkaaTietoja() {
    $sql = "UPDATE Henkilo SET etunimi = ?, sukunimi = ?, tunnus =? , salasana = ?, "
            . "laitos = ? WHERE id = ?";
    
    $kysely = getTietokantayhteys()->prepare($sql);

    $ok = $kysely->execute(array($this->getEtunimi(), $this->getSukunimi(),
        $this->getTunnus(), $this->getSalasana(),$this->getLaitos(), $this->getId()));

    if ($ok) {
        $this->id = $kysely->fetchColumn();
    }
    return $ok;    
  }
  
   /* Etsitään kannasta kaikki käyttäjät  */
  
  public static function etsiKaikkiKayttajat() {
    $sql = "SELECT Henkilo.id AS id, etunimi, sukunimi, tunnus, salasana, Laitos.nimi AS laitos, yllapitaja "
            . "FROM Henkilo LEFT OUTER JOIN Laitos ON Henkilo.laitos = Laitos.id ORDER BY sukunimi, etunimi, tunnus" ;
    $kysely = getTietokantayhteys()->prepare($sql);
    $kysely->execute();

    $tulokset = array();
    foreach($kysely->fetchAll(PDO::FETCH_OBJ) as $tulos) {
      $kayttaja = new Henkilo($tulos->id,$tulos->etunimi,$tulos->sukunimi,
         $tulos->tunnus, $tulos->salasana,$tulos->laitos,$tulos->yllapitaja);       

      $tulokset[] = $kayttaja;
    }
    return $tulokset;
  }
  
  /* Tarkistaa onko olioon asetetut tiedot kelvollisia  */ 
  
  public function onkoKelvollinen() {
    return empty($this->virheet);
  }

}