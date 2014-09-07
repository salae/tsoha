<?php
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Vastaus.php';
  
  $id = (int)$_POST["kurssi"];  
  
  $raportoitavaKurssi = Kurssi::etsiKurssi($id); 
  
  $vastausTaulukko = Vastaus::etsiKyselynVastaukset($raportoitavaKurssi);
  
  if(onkoKirjautunut()){
    naytaNakyma("raportinTiedot", array('kurssi'=>$raportoitavaKurssi, 'kysymykset'=>$kyselynKysymykset,
        'virheet'=>$raportoitavaKurssi->getVirheet(),'vastaukset'=>$vastausTaulukko));
  }
