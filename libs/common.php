<?php
  
   /* Näyttää näkymätiedoston ja lähettää sille muuttujat.
    * Ei hae sivun yleispohjaa. Käytetään kirjautumisessa */
  function naytaNakymaIlmanPohjaa($sivu, $data = array()) {
    $sivu = $sivu;
    $data = (object)$data;
    exit();
  }
  
   /* Näyttää näkymätiedoston ja lähettää sille muuttujat */
  function naytaNakyma($sivu, $data = array()) {
    $sivu = $sivu;
    $data = (object)$data;
    require 'views/pohja.php';
    exit();
  } 