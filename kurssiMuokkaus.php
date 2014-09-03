<?php
  require_once 'libs/common.php';  
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Laitos.php'; 

  $id = (int)$_POST['id'];

  $haluttuKurssi = Kurssi::etsiKurssi($id);

  if(onkoKirjautunut() && $haluttuKurssi != null ){
    naytaNakyma("muokkaaKurssi",array('kurssi'=> $haluttuKurssi));
  } else {
    naytaNakyma("muokkaaKurssi",array('kurssi'=> new Kurssi(), 'virhe'=> "Kurssia ei löytynyt." ));
  }

