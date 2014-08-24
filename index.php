<?php  
  require_once 'libs/common.php';
 session_start();  //tällä sivulla tässä luuppi-ongelmien takia
  naytaNakyma("aloitus", array('kayttaja'=>$_SESSION['kirjautunut']));
  