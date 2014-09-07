<?php
/*
 * Haetaan halutun henkilön tiedot ja viedään ne näkymään 'henkilonTiedot'.
 */
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';

$id = (int)$_GET['id'];

$haluttuHenkilo = Henkilo::etsiKayttaja($id);

  if(onkoKirjautunut() && $haluttuHenkilo != null ){
    naytaNakyma("henkilonTiedot",array('kayttaja'=> $haluttuHenkilo));
  } else {
    naytaNakyma("henkilonTiedot",array('kayttaja'=> new Henkilo(), 'virhe'=> "Henkilöä ei löytynyt." ));
  }

