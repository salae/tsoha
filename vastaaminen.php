<?php
  require_once 'libs/common.php';  
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kysymys.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php'; 
  
  session_start();

  $id = (int)$_POST['id'];
  $etsittyKurssi = Kurssi::etsiKurssi($id);
  
  $kaikkiKysymykset = Kysymys::etsiKyselynKysymykset($etsittyKurssi);
  
  naytaNakyma("kysely",array('kurssi'=> $etsittyKurssi, 
        'kysely'=> $kaikkiKysymykset));
