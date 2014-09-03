<?php
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
//  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Laitos.php'; 
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kysymys.php';
  
  $id = (int)$_POST['id'];
  $etsittyKurssi = Kurssi::etsiKurssi($id);
    
  $kaikkiKysymykset = array();
    
  $kaikkiKysymykset = Kysymys::etsiKaikkienYhteisetKysymykset();
  $laitosKysymykset = Kysymys::etsiOmanLaitoksenKysymykset($etsittyKurssi);
  $kaikkiKysymykset = array_merge($kaikkiKysymykset,$laitosKysymykset);
  $vapaatKysymykset = Kysymys::etsiKyselynKysymykset($etsittyKurssi);
  $kaikkiKysymykset = array_merge($kaikkiKysymykset, $vapaatKysymykset); 
  
  if(new DateTime() > $etsittyKurssi->getLoppuPvm()) {    
     naytaNakyma("kurssinTiedot", array('kurssi'=>$etsittyKurssi, 'virhe'=>"Menneeseen kurssiin ei voi lisätä kyselyä."));
  }
  
 if(onkoKirjautunut() && ($_SESSION['kirjautunut']->onkoYllapitaja() || 
        $_SESSION['kirjautunut']->getId() == $etsittyKurssi->etsiOpettaja()->getId() )) {

    foreach($kaikkiKysymykset as $kysymys): 
      $ok = Kysymys::lisaaKantaanKyselykysymys($id, $kysymys->getId());
    endforeach;   
   
    if($ok) {
      $_SESSION['ilmoitus'] = "Kysely lisättiin onnistuneesti.";
      $etsittyKurssi->merkitseKyselyAktiiviseksi();
      naytaNakyma("kurssinTiedot", array('kurssi'=>$etsittyKurssi));
    }else {
      naytaNakyma("kyselynHallinta", array('kurssi'=>$etsittyKurssi, 'virhe' => "Jotain meni pieleen."));
    }

  }else {

    if (!($_SESSION['kirjautunut']->onkoYllapitaja() || $_SESSION['kirjautunut']->getId() == 
            $etsittyKurssi->etsiOpettaja()->getId() )) {
      $_SESSION['ilmoitus'] = "Sinulla ei ole oikeuksia lisätä kyselyjä.";
//      header('Location: kurssinLisays.php');
//      naytaNakyma("kurssinLisays", array('kurssi'=>$lisattavaKurssi,
//      'virhe'=> "Sinulla ei ole oikeuksia lisätä kursseja.",
//      'virheet'=>$lisattavaKurssi->getVirheet()));
    }
    naytaNakyma("kurssit", array('kurssi'=>$etsittyKurssi));
}