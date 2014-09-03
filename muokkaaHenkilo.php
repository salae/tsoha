<?php
  require_once 'libs/common.php';
  include_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Henkilo.php';
  require_once '/home/aesalmin/htdocs/Kurssikysely/libs/models/Laitos.php'; 

  session_start(); 
  
    /*  Lomakkeen vastaanottaminen  */
    
  $muokattuKayttaja = new Henkilo();
  $muokattuKayttaja->setId($_POST["id"]);
  $muokattuKayttaja->setEtunimi($_POST["etunimi"]);
  $muokattuKayttaja->setSukunimi($_POST["sukunimi"]);
  $muokattuKayttaja->setTunnus($_POST["tunnus"]);
  $muokattuKayttaja->setSalasana($_POST["salasana"]);
  $muokattuKayttaja->setLaitos($_POST["laitos"]);
  
 if($muokattuKayttaja->onkoKelvollinen() && $_SESSION['kirjautunut']->onkoYllapitaja() ) {
$ok = $muokattuKayttaja->muokkaaTietoja();
if($ok) {
$_SESSION['ilmoitus'] = "Käyttäjän tietoja muokattu onnistuneesti.";
header('Location: henkilot.php');
}else {
naytaNakyma("muokkaaHenkilo", array('henkilo'=>$muokattuKayttaja,
'virhe'=> "Jokin meni muokkaamisessa pieleen",
'virheet'=>$muokattuKayttaja->getVirheet()));
}
}else {
if (!$_SESSION['kirjautunut']->onkoYllapitaja()) {
$_SESSION['ilmoitus'] = "Sinulla ei ole oikeuksia muuttaa käyttäjän tietoja.";
}
naytaNakyma("muokkaaHenkilo", array('henkilo'=>$muokattuKayttaja,
'virheet'=>$muokattuKayttaja->getVirheet()));
}