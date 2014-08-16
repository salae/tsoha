<?php 
  require 'views/kirjautuminen.php';
  
    if (empty($_POST["tunnus"]) || empty($_POST["salasana"])) {
     /* Käytetään omassa kirjastotiedostossa määriteltyä näkymännäyttöfunktioita */
    common::naytaNakyma("kirjautuminen");
    exit(); // Lopetetaan suoritus tähän. Kutsun voi sijoittaa myös naytaNakyma-funktioon, niin sitä ei tarvitse toistaa joka paikassa
  }

  $kayttaja = $_POST["tunnus"];
  $salasana = $_POST["salasana"];
  
  /* Tarkistetaan onko parametrina saatu oikeat tunnukset */
  if ("outolio" == $kayttaja && "12345" == $salasana) {
    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella kissalistaan. */
    header('Location: index.php');
  } else {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    naytaNakyma("kirjautuminen");
  }