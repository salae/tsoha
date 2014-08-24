<?php
  require_once 'libs/common.php';
  include_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';

    /*  Lomakkeen vastaanottaminen  */
  
  $uusiKayttaja = new Henkilo(null,$_POST["etunimi"], $_POST["sukunimi"], 
          $_POST["tunnus"], $_POST["salasana"], $_POST["laitos"], FALSE);  

  if($uusiKayttaja->onkoKelvollinen()) {
      $uusiKayttaja->lisaaKantaan();
      session_start(); 
      $_SESSION['ilmoitus'] = "Uusi käyttäjä lisätty onnistuneesti.";
      header('Location: henkilot.php');
  } else {
      naytaNakyma("rekisterointi", array('henkilo'=>$uusiKayttaja, 
        'virheet'=>$uusiKayttaja->getVirheet()));
}
  
  


