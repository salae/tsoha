<?php
  require_once 'libs/common.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Vastaus.php';
  
  
  
  $lisattvaVastaus = new Vastaus();
  
  
  $lisattvaVastaus->setK_kysymys($_POST["id"]);

