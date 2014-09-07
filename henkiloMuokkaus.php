<?php
  require_once 'libs/common.php';  
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Laitos.php';

  $id = (int)$_POST['id'];

  $haluttuHenkilo = Henkilo::etsiKayttaja($id);
  
  $laitokset = Laitos::haeKaikki();

  if(onkoKirjautunut() && $haluttuHenkilo != null ){
    naytaNakyma("muokkaaHenkilo",array('henkilo'=> $haluttuHenkilo,'laitoslista'=>$laitokset));
  } else {
    naytaNakyma("muokkaaHenkilo",array('henkilo'=> new Henkilo(), 'virhe'=> "Henkilöä ei löytynyt." ));
  }


