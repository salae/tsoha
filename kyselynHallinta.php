<?php
  require_once 'libs/common.php';  
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kysymys.php'; 

  $id = (int)$_POST['id'];
  if($id == null){
    $id = $data->kurssi->getId();
  } 
  $etsittyKurssi = Kurssi::etsiKurssi($id);
 
  $kaikkienKysymykset = Kysymys::etsiKaikkienYhteisetKysymykset();
  $laitosKysymykset = Kysymys::etsiOmanLaitoksenKysymykset($etsittyKurssi);
  $vapaatKysymykset = Kysymys::etsiValinnaisetKysymykset();

  if(onkoKirjautunut() && $etsittyKurssi != null ){
    naytaNakyma("kyselynHallinta",array('kurssi'=> $etsittyKurssi,
            'kaikki'=> $kaikkienKysymykset,'laitos'=> $laitosKysymykset,
            'valinnaiset'=> $vapaatKysymykset));
  } else {
    naytaNakyma("kyselynHallinta",array('kurssi'=> $etsittyKurssi, 'virhe'=> "Kurssia ei löytynyt." ));
  }