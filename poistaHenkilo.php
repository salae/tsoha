<?php
  require_once 'libs/common.php';
  include_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  
  $id = (int)$_POST["id"];  

  $poistettavaHenkilo = Henkilo::etsiKayttaja($id);
  
  if(onkoKirjautunut() && $_SESSION['kirjautunut']->onkoYllapitaja() && $poistettavaHenkilo != null ){
    $ok = $poistettavaHenkilo->poistaKannasta();
      if($ok) {
        $_SESSION['ilmoitus'] = "Käyttäjä poistettu onnistuneesti.";
        header('Location: henkilot.php');
      } else {
        header('Location: henkilot.php');
      }
  } else {
    if(!$_SESSION['kirjautunut']->onkoYllapitaja() ){
      $_SESSION['ilmoitus'] = "Sinulla ei ole oikeuksia poistaa käyttäjää.";
      header('Location: henkilot.php');
    }
     naytaNakyma("henkilot",array('virhe'=> "Henkilöä ei löytynyt." ));
  }
  
  

  
