<?php
/*
 * Ylesihyödyllisiä apumetodeita.
 */

   /* Näyttää näkymätiedoston ja lähettää sille muuttujat */
  function naytaNakyma($sivu, $data = array()) {
    $sivu = $sivu;
    $data = (object)$data;

    require 'views/pohja.php';
    exit();    
  } 
  
  function onkoKirjautunut() {
    session_start();
    
    if (isset($_SESSION['kirjautunut'])){
      return true;
    }  else {
      header('Location: kirjautuminen.php');
      return false;
    }    
    
  }