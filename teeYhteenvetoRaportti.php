<?php
/*
 * Haetaan yhteenvetotiedot halutun kurssin kyselystä ja ohjataan ne raporttiin.
 */
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Vastaus.php';
  
  $id = (int)$_POST["kurssi"];  

  
  $raportoitavaKurssi = Kurssi::etsiKurssi($id);  
  $vastausTaulukko = Vastaus::etsiVastaustenYhteenvedot($raportoitavaKurssi);
  
  if(onkoKirjautunut()){
    naytaNakyma("yhteenvetoRaportti", array('kurssi'=>$raportoitavaKurssi, 
                 'vastaukset'=>$vastausTaulukko));
  }

