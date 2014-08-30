<?php
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';

  $sivu ="raportit";  

  if(onkoKirjautunut()){
    naytaNakyma($sivu,array('kayttaja'=>$_SESSION['kirjautunut']) );
  }
