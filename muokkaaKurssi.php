<?php
/*
 * Otetaan vastaan tiedot kurssin muokkaamisesta ja viedään uudet tiedot tietokantaan.
 */
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Laitos.php'; 
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  
  session_start(); 
  
    /*  Lomakkeen vastaanottaminen  */
    
  $muokattuKurssi = new Kurssi();
  $muokattuKurssi->setId($_POST["id"]);
  $muokattuKurssi->setNimi($_POST["nimi"]);
  $muokattuKurssi->setOpettaja($_POST["opettaja"]);
  $alkupvm = $_POST["alkuVuosi"].'-'.$_POST["alkuKuukausi"].'-'.$_POST["alkuPaiva"];
  $muokattuKurssi->setAlkuPvm($alkupvm);
  $loppupvm = $_POST["loppuVuosi"].'-'.$_POST["loppuKuukausi"].'-'.$_POST["loppuPaiva"];
  $muokattuKurssi->setLoppuPvm($loppupvm);
  $muokattuKurssi->setLaitos($_POST["laitos"]);
  
  
 if($muokattuKurssi->onkoKelvollinen() && $_SESSION['kirjautunut']->onkoYllapitaja() ) {
    $ok = $muokattuKurssi->muokkaaTietoja();
    if($ok) {
      $_SESSION['ilmoitus'] = "Kurssin tietoja muokattu onnistuneesti.";
      header('Location: kurssit.php');
    }else {
      header('Location: kurssit.php');
    }
  }else {
    naytaNakyma("muokkaaKurssi", array('kurssi'=>$muokattuKurssi, 
        'virheet'=>$muokattuKurssi->getVirheet()));
}

