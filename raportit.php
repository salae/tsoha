<?php
  require_once 'libs/common.php';

  $sivu ="raportit";  

  if(onkoKirjautunut()){
    naytaNakyma($sivu);
  }
