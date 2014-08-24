<?php  
  require_once 'libs/common.php';
  session_start();  
  
  naytaNakyma("aloitus", array('kayttaja'=>$_SESSION['kirjautunut']));
  