<?php
/*
 * Haetaan kaikki tietokannassa olevat henkilöt ja viedään ne näkymään 'henkilöt'.
 */
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  
  $kayttajat = Henkilo::etsiKaikkiKayttajat();


  if(onkoKirjautunut()){
    naytaNakyma("henkilot",array('kayttajat'=> $kayttajat, 'kayttaja'=>$_SESSION['kirjautunut']));
  }

