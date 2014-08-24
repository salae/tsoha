<?php
  require_once 'libs/common.php';
  include_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';

  session_start(); 
    /*  Lomakkeen vastaanottaminen  */
  
  $muokattuKayttaja = new Henkilo($_POST["id"],$_POST["etunimi"], $_POST["sukunimi"], 
          $_POST["tunnus"], $_POST["salasana"], $_POST["laitos"], FALSE);  

  if($muokattuKayttaja->onkoKelvollinen()) {
      $ok = $muokattuKayttaja->muokkaaTietoja();
      if($ok) {
        $_SESSION['ilmoitus'] = "Käyttäjän tietoja muokattu onnistuneesti.";
        header('Location: henkilot.php');
      } else {
        naytaNakyma("muokkaaHenkilo", array('henkilo'=>$muokattuKayttaja, 
            'virhe'=> "Jokin meni pieleen",
            'virheet'=>$muokattuKayttaja->getVirheet()));
      }
//      session_start(); 

  } else {
      naytaNakyma("muokkaaHenkilo", array('henkilo'=>$muokattuKayttaja, 
        'virheet'=>$muokattuKayttaja->getVirheet()));
}
