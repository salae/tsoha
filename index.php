<?php  
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  
  session_start();  
  
  naytaNakyma("aloitus", array('kayttaja'=>$_SESSION['kirjautunut']));
  