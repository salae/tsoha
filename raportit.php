<?php
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  session_start();
  
  $sivu ="raportit"; 
  $laitos = $_SESSION['kirjautunut']->getLaitos();
  $openKurssit = Kurssi::etsiOpenKurssit($_SESSION['kirjautunut']);
  $laitoksenKurssit = Kurssi::etsiLaitoksenKurssit($laitos);
  

//  var_dump($openKurssit);
  if(onkoKirjautunut()){
    naytaNakyma($sivu,array('kayttaja'=>$_SESSION['kirjautunut'],
        'opeKurssit'=>$openKurssit, 'laitosKurssit'=>$laitoksenKurssit ));
  }
