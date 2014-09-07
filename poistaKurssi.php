<?php
  require_once 'libs/common.php';
  include_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  include_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  
  $id = (int)$_POST["id"];  

  $poistettavaKurssi = Kurssi::etsiKurssi($id);
  
  if (onkoKirjautunut() && $_SESSION['kirjautunut']->onkoYllapitaja() && $poistettavaKurssi != null ){
    
    $ok = $poistettavaKurssi->poistaKannasta();
      if($ok) {
        $_SESSION['ilmoitus'] = "Kurssi poistettu onnistuneesti.";
        header('Location: kurssit.php');
      } else {            
        header('Location: kurssit.php');
      }
  } else {
    if(!$_SESSION['kirjautunut']->onkoYllapitaja() ){
      $_SESSION['ilmoitus'] = "Sinulla ei ole oikeuksia poistaa kurssia.";
      header('Location: kurssit.php');
    }
     naytaNakyma("henkilot",array('virhe'=> "Kurssia ei löytynyt.", 
         'virheet'=>$poistettavaKurssi->getVirheet()));
  }