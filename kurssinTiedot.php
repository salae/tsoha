<?php
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';

$id = (int)$_GET['id'];
if($id == null){
  $id = $data->kurssi->getId();
}

$haluttuKurssi = Kurssi::etsiKurssi($id);

  if(onkoKirjautunut() && $haluttuKurssi != null ){
    naytaNakyma("kurssinTiedot",array('kurssi'=> $haluttuKurssi));
  } else {
    naytaNakyma("kurssinTiedot",array('kurssi'=> null, 'virhe'=> "Kurssia ei löytynyt." ));
  }


