<?php
/*
 * Vastaanotetaan tiedot uudesta kurssista ja talletetaan uusi kurssi tietokantaan.
 */
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Laitos.php'; 
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  
  session_start(); 
  
    /*  Lomakkeen vastaanottaminen  */
    
  $lisattavaKurssi = new Kurssi();
//  $lisattavaKurssi->setId($_POST["id"]);
  $lisattavaKurssi->setNimi($_POST["nimi"]);
  $lisattavaKurssi->setOpettaja($_POST["opettaja"]);
  $alkupvm = $_POST["alkuVuosi"].'-'.$_POST["alkuKuukausi"].'-'.$_POST["alkuPaiva"];
  $lisattavaKurssi->setAlkuPvm($alkupvm);
  $loppupvm = $_POST["loppuVuosi"].'-'.$_POST["loppuKuukausi"].'-'.$_POST["loppuPaiva"];
  $lisattavaKurssi->setLoppuPvm($loppupvm);
  $lisattavaKurssi->setLaitos($_POST["laitos"]);

 if($lisattavaKurssi->onkoKelvollinen() && $_SESSION['kirjautunut']->onkoYllapitaja() ) {

   $ok = $lisattavaKurssi->lisaaKantaan();

    if($ok) {
      $_SESSION['ilmoitus'] = "Kurssi lisätty onnistuneesti.";
      header('Location: kurssit.php');
    }else {
      naytaNakyma("kurssinLisays", array('kurssi'=>$lisattavaKurssi,
      'virhe'=> "Jokin meni muokkaamisessa pieleen",
      'virheet'=>$lisattavaKurssi->getVirheet()));
    }

  }else {

    if (!$_SESSION['kirjautunut']->onkoYllapitaja()) {
      $_SESSION['ilmoitus'] = "Sinulla ei ole oikeuksia lisätä kursseja.";
    }
    naytaNakyma("kurssinLisays", array('kurssi'=>$lisattavaKurssi, 
        'virheet'=>$lisattavaKurssi->getVirheet()));
}