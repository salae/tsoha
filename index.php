<?php  
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  
  session_start();  
  
  $aktiivisetKyselyt = Kurssi::etsiAktiivisetKyselyt();
  
  naytaNakyma("aloitus", array('kyselyt' =>$aktiivisetKyselyt, 'kayttaja'=>$_SESSION['kirjautunut']));
  