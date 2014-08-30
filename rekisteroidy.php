<?php
  require_once 'libs/common.php';
  include_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Laitos.php';
    /*  Lomakkeen vastaanottaminen  */
  
  $muokattuKayttaja = new Henkilo(null,$_POST["etunimi"], $_POST["sukunimi"], 
          $_POST["tunnus"], $_POST["salasana"], $_POST["laitos"], FALSE);  

  if($muokattuKayttaja->onkoKelvollinen()) {
      $muokattuKayttaja->lisaaKantaan();
      session_start(); 
      $_SESSION['ilmoitus'] = "Uusi käyttäjä lisätty onnistuneesti.";
      header('Location: henkilot.php');
  } else {
      naytaNakyma("rekisterointi", array('henkilo'=>$muokattuKayttaja, 
        'virheet'=>$muokattuKayttaja->getVirheet()));
}
  
  


