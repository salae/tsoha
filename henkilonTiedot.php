<?php
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';

$id = (int)$_GET['id'];

$haluttuHenkilo = Henkilo::etsiKayttaja($id);

  if(onkoKirjautunut() && $haluttuHenkilo != nulll ){
    naytaNakyma("henkilonTiedot",array('kayttaja'=> $haluttuHenkilo));
  } else {
    naytaNakyma("henkilonTiedot",array('kayttaja'=> null, 'virhe'=> "Henkilöä ei löytynyt." ));
  }

