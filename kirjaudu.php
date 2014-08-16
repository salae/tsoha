<?php

  require_once 'libs/common.php';

  /*  Lomakkeen vastaanottaminen  */

 
  //Tarkistetaan että vaaditut kentät on täytetty:
  if (empty($_POST["tunnus"])) {
    naytaNakymaIlmanPohjaa("kirjautuminen", array(
      'virhe' => "Kirjautuminen epäonnistui! Et antanut käyttäjätunnusta.",
    ));
  }
  $kayttaja = $_POST["tunnus"];

  if (empty($_POST["salasana"])) {
    naytaNakymaIlmanPohjaa("kirjautuminen", array(
      'kayttaja' => $kayttaja,
      'virhe' => "Kirjautuminen epäonnistui! Et antanut salasanaa.",
    ));
  }
  $salasana = $_POST["salasana"];
  
  
  /* Tarkistetaan onko parametrina saatu oikeat tunnukset */
  if ("outolio" == $kayttaja && "12345" == $salasana) {
    /* Jos tunnus on oikea, ohjataan käyttäjä sopivalla HTTP-otsakkeella kurssilistaan. */
    header('Location: kurssit.php');
  } else {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    naytaNakymaIlmanPohjaa("kirjautuminen",  array(
    /* Välitetään näkymälle tieto siitä, kuka yritti kirjautumista */
    'kayttaja' => $kayttaja,
    'virhe' => "Kirjautuminen epäonnistui! Antamasi tunnus tai salasana on väärä.", request
  ));
  }

