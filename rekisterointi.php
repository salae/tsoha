<?php 
  require_once 'libs/common.php'; 
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Laitos.php';
  session_start(); 

  naytaNakyma("rekisterointi", array('henkilo'=> new Henkilo()));