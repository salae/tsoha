<?php
  require_once 'libs/common.php';
  include_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';

    /*  Lomakkeen vastaanottaminen  */
 

  
   /*  Lisätään uusi käyttäjä tietokantaan kun tiedot on saatu  */
  
  $uusiKayttaja = new Henkilo(null,$_POST["etunimi"], $_POST["sukunimi"], 
          $_POST["tunnus"], $_POST["salasana"], $_POST["laitos"], FALSE);  

  if($uusiKayttaja->onkoKelvollinen()) {

    $uusiKayttaja->lisaaKantaan();

    $_SESSION['ilmoitus'] = "Uusi käyttäjä lisätty onnistuneesti.";

    header('Location: henkilot.php');
  } else {
    naytaNakyma("rekisterointi", array('henkilo'=>$uusiKayttaja, 
        'virhe'=>$uusiKayttaja->getVirheet()));
}
  
  


