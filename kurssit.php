<?php
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
//  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Laitos.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';

  $kurssit = Kurssi::etsiKaikkiKurssit();

  if(onkoKirjautunut()){
    naytaNakyma("kurssit",array('kurssit'=> $kurssit, 'kayttaja'=>$_SESSION['kirjautunut']));
  }

