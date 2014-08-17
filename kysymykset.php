<?php
  require_once 'libs/common.php';

  $sivu ="kysymykset";  

  if(onkoKirjautunut()){
    naytaNakyma($sivu);
  }
