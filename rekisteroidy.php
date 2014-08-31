<?php
  require_once 'libs/common.php';
  include_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Laitos.php';
  
    /*  Lomakkeen vastaanottaminen  */
  
  $muokattuKayttaja = new Henkilo();
  $muokattuKayttaja->setId($_POST["id"]);
  $muokattuKayttaja->setEtunimi($_POST["etunimi"]);
  $muokattuKayttaja->setSukunimi($_POST["sukunimi"]);
  $muokattuKayttaja->setTunnus($_POST["tunnus"]);
  $muokattuKayttaja->setSalasana($_POST["salasana"]);
  $muokattuKayttaja->setLaitos($_POST["laitos"]);
          

  if($muokattuKayttaja->onkoKelvollinen()) {
      $muokattuKayttaja->lisaaKantaan();
      session_start(); 
      $_SESSION['ilmoitus'] = "Uusi käyttäjä lisätty onnistuneesti.";
      header('Location: henkilot.php');
  } else {
      naytaNakyma("rekisterointi", array('henkilo'=>$muokattuKayttaja, 
        'virheet'=>$muokattuKayttaja->getVirheet()));
}
  
  


