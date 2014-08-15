<?php
  
  function naytaNakyma($sivu) {
    require 'views/pohja.php';
    require 'views/testi1.php'; 
    require 'views/'.$sivu.'.php'; 
    exit();
  }
  
//   /* Näyttää näkymätiedoston ja lähettää sille muuttujat */
//  function naytaNakyma($sivu, $data = array()) {
//    $data = (object)$data;
//    require 'views/pohja.php';
//    exit();
//  } 