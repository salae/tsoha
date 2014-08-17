<?php

  require_once 'libs/common.php';
//  include_once 'libs/models/Henkilo.php'; 
  include_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';

  /*  Lomakkeen vastaanottaminen  */
 
  //Tarkistetaan että vaaditut kentät on täytetty:
  if (empty($_POST["tunnus"])) {
    naytaNakyma("kirjautuminen", array(
      'virhe' => "Kirjautuminen epäonnistui! Et antanut käyttäjätunnusta.",
    ));
  }
  $kayttaja = $_POST["tunnus"];

  if (empty($_POST["salasana"])) {
    naytaNakyma("kirjautuminen", array(
      'kayttaja' => $kayttaja,
      'virhe' => "Kirjautuminen epäonnistui! Et antanut salasanaa.",
    ));
  }
  $salasana = $_POST["salasana"];  
  
  /*  Otetaan istunto käyttöön  */
  session_start();
  
  $koekayttaja = Henkilo::etsiKayttajaTunnuksilla($kayttaja, $salasana);
  
  /* Tarkistetaan onko parametrina saatu oikeat tunnukset */
 
  if ( $koekayttaja != null) {
    /* Jos tunnus on oikea, tallennetaan istuntoon käyttäjäoloio ja 
     * ohjataan käyttäjä sopivalla HTTP-otsakkeella kurssilistaan. */
    $_SESSION['kirjautunut'] = $koekayttaja;

    header('Location: index.php');
  } else {
    /* Väärän tunnuksen syöttänyt saa eteensä kirjautumislomakkeen. */
    naytaNakyma("kirjautuminen",  array(
    /* Välitetään näkymälle tieto siitä, kuka yritti kirjautumista */
    'kayttaja' => $kayttaja,
    'virhe' => "Kirjautuminen epäonnistui! Antamasi tunnus tai salasana on väärä.", request
  ));
  }

