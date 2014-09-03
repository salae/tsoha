<?php
  require_once 'libs/common.php';  
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Laitos.php'; 


 
  if(onkoKirjautunut() ){
    if (!empty($data->kurssi)) {
      naytaNakyma("kurssinLisays");
    }  else {
      naytaNakyma("kurssinLisays", array('kurssi'=> new Kurssi()));
    }
         
     
  }