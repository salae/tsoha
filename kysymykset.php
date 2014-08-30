<?php
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kysymys.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';

  $sivu ="kysymykset"; 
  $kaikki_kysymykset = Kysymys::etsiKaikkiKysymykset();

  if(onkoKirjautunut()){
    naytaNakyma($sivu, array('kysymykset'=> $kaikki_kysymykset, 'kayttaja'=>$_SESSION['kirjautunut']));
  }
