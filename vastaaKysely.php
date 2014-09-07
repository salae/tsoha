<?php
/*
 * Vastaanottaa kyselyn vastaukset ja tallentaa ne tietokantaan.
 * (ei ole valmis, ei toimi)
 */
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Kurssi.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Vastaus.php';
  
  $id = (int)$_POST['id'];
  $kyselynKurssi = Kurssi::etsiKurssi($id);
  
  $tekstiVastaukset = array();
  $tekstiVastaukset = $_POST['txtVastaus'];
  
