<?php
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kysymys.php';
  
  //Vastaanotetaan lomakkeen tiedot kyselyyn halutuista kysymyksistä
  
  $id = (int)$_POST['id'];
  $etsittyKurssi = Kurssi::etsiKurssi($id);
  $halututKysymykset = array();
  $valitutKysymykset = array();
  
  $halututKysymykset = $_POST['yhteiset'];
  $valitutKysymykset = $_POST['valitut'];
  
  //yhdistetään yhdeksi kysymystaulukoksi
  
  foreach ($valitutKysymykset as $valittu) {
    $halututKysymykset[] = $valittu;
  } 

 if(onkoKirjautunut() && ($_SESSION['kirjautunut']->onkoYllapitaja() || 
        $_SESSION['kirjautunut']->getId() == $etsittyKurssi->etsiOpettaja()->getId() )) {

    foreach($halututKysymykset as $kysymys){ 
      $ok = Kysymys::lisaaKantaanKyselykysymys($id, (int)$kysymys);
    }   
   
    if($ok) {
      $_SESSION['ilmoitus'] = "Kysely lisättiin onnistuneesti.";
      $etsittyKurssi->merkitseKyselyAktiiviseksi();
      naytaNakyma("index", array('kurssi'=>$etsittyKurssi));
    }else {
      naytaNakyma("kyselynHallinta", array('kurssi'=>$etsittyKurssi, 'virhe' => "Jotain meni pieleen."));
    }

  }else {

    if (!($_SESSION['kirjautunut']->onkoYllapitaja() || $_SESSION['kirjautunut']->getId() == 
            $etsittyKurssi->etsiOpettaja()->getId() )) {
      $_SESSION['ilmoitus'] = "Sinulla ei ole oikeuksia lisätä tätä kyselyä.";
    }
    naytaNakyma("kyselynHallinta", array('kurssi'=>$etsittyKurssi));
  }
//}