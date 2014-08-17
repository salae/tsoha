<?php
  require_once 'libs/common.php';

  $sivu ="henkilot";

  if(onkoKirjautunut()){
    naytaNakyma($sivu);
  }

