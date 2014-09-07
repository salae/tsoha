<?php
  require_once 'libs/common.php';  
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kysymys.php'; 

  $id = (int)$_POST['id'];  

  $etsittyKurssi = Kurssi::etsiKurssi($id);
  
  $kaikkiKysymykset = Kysymys::etsiKaikkiKysymykset();
  
  //  Lajitellaan kysymykset
    
  $yhteisetKysymykset = array();  
  $laitosKysymykset = array();
  $vapaatKysymykset = array();
  
  foreach ($kaikkiKysymykset as $kysymys) {
    if($kysymys->getKaikille()== TRUE){
      $yhteisetKysymykset[] = $kysymys;
    } else if($kysymys->getLaitos() == $etsittyKurssi->getLaitos()){
      $laitosKysymykset[] = $kysymys;
    } else if($kysymys->getLaitos() == NULL){
      $vapaatKysymykset[] = $kysymys;
    }
}

  if(onkoKirjautunut() && $etsittyKurssi != null ){
    naytaNakyma("kyselynHallinta",array('kurssi'=> $etsittyKurssi,
            'kaikki'=> $yhteisetKysymykset,'laitos'=> $laitosKysymykset,
            'valinnaiset'=> $vapaatKysymykset));
  } else {
    naytaNakyma("kurssit",array('kurssi'=> $etsittyKurssi, 'virhe'=> "Kurssia ei löytynyt." ));
  }