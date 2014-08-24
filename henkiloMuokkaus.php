<?php
  require_once 'libs/common.php';  
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';

  $id = (int)$_POST['id'];

  $haluttuHenkilo = Henkilo::etsiKayttaja($id);

  if(onkoKirjautunut() && $haluttuHenkilo != nulll ){
    naytaNakyma("muokkaaHenkilo",array('henkilo'=> $haluttuHenkilo));
  } else {
    naytaNakyma("muokkaaHenkilo",array('henkilo'=> null, 'virhe'=> "Henkilöä ei löytynyt." ));
  }


