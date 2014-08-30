<?php
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';

$id = (int)$_GET['id'];

$haluttuKurssi = Kurssi::etsiKurssi($id);

  if(onkoKirjautunut() && $haluttuKurssi != nulll ){
    naytaNakyma("kurssinTiedot",array('kurssi'=> $haluttuKurssi));
  } else {
    naytaNakyma("kurssinTiedot",array('kurssi'=> null, 'virhe'=> "Kurssia ei löytynyt." ));
  }


