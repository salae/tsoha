<?php
  require_once 'libs/common.php';
  include_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  
  $id = (int)$_POST["id"];  

  $poistettavaHenkilo = Henkilo::etsiKayttaja($id);
  
  if(onkoKirjautunut() && $poistettavaHenkilo != null ){
    $ok = $poistettavaHenkilo->poistaKannasta();
      if($ok) {
        $_SESSION['ilmoitus'] = "Käyttäjä poistettu onnistuneesti.";
        header('Location: henkilot.php');
      } else {
          naytaNakyma("henkilot", array('virhe'=> "Poistaminen ei onnistunut."));
      }
  } else {
    naytaNakyma("henkilot",array('virhe'=> "Henkilöä ei löytynyt." ));
  }
  
  

  
