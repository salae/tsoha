<?php 
  require 'views/kirjautuminen.php';  
  
//  /*  Lomakkeen vastaanottaminen  */
//
//  if (empty($_POST["tunnus"]) || empty($_POST["salasana"])) {
//    /* Käytetään omassa kirjastotiedostossa määriteltyä näkymännäyttöfunktioita */
//     common::naytaNakyma("kirjautuminen");   
//  }
//
//  $kayttaja = $_POST["tunnus"];
//  $salasana = $_POST["salasana"];
//  
//  /* Tarkistetaan onko parametrina saatu oikeat tunnukset */
//  if ("outolio" == $kayttaja && "12345" == $salasana) {
//    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella kissalistaan. */
//    header('Location: index.php');
//  } else {
//    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
//    naytaNakyma("kirjautuminen");
//  }