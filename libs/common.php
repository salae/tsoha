<?php
  
   /* Näyttää näkymätiedoston ja lähettää sille muuttujat */
  function naytaNakyma($sivu, $data = array()) {
    $sivu = $sivu;
    $data = (object)$data;

    require 'views/pohja.php';
    exit();    
  } 