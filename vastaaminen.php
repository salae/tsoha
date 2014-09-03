<?php
  require_once 'libs/common.php';  
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kysymys.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php'; 
  
  session_start();

  $id = (int)$_POST['id'];
  $etsittyKurssi = Kurssi::etsiKurssi($id);
  
  $kaikkiKysymykset = Kysymys::etsiKyselynKysymykset($etsittyKurssi);
    
//  $kaikkiKysymykset = Kysymys::etsiKaikkienYhteisetKysymykset();
//  $laitosKysymykset = Kysymys::etsiOmanLaitoksenKysymykset($etsittyKurssi);
//  $kaikkiKysymykset = array_merge($kaikkiKysymykset,$laitosKysymykset);
//  $vapaatKysymykset = Kysymys::etsiKyselynKysymykset($etsittyKurssi);
//  $kaikkiKysymykset = array_merge($kaikkiKysymykset, $vapaatKysymykset);
  
  naytaNakyma("kysely",array('kurssi'=> $etsittyKurssi, 
        'kysely'=> $kaikkiKysymykset));
