<?php
  require_once 'libs/common.php';

  $sivu ="kurssit"; 

  if(onkoKirjautunut()){
    naytaNakyma($sivu);
  }

