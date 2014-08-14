<?php
  
//  function naytaNakyma($sivu) {
//    require 'views/pohja.php';
//    exit();
//  }
  
   /* Näyttää näkymätiedoston ja lähettää sille muuttujat */
  function naytaNakyma($sivu, $data = array()) {
    $data = (object)$data;
    require 'views/pohja.php';
    exit();
  } 