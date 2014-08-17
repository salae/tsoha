<?php

  //require_once sisällyttää annetun tiedoston vain kerran
  require_once "libs/tietokantayhteys.php"; 
  
  $sql = "SELECT etunimi, sukunimi FROM Henkilo";
  $kysely = getTietokantayhteys()->prepare($sql);
  $kysely->execute(); 

?><!DOCTYPE HTML>
<html>
  <head><title>Otsikko</title></head>
  <body>
    <h1>Listaelementtitesti eli käyttäjien nimiä listana</h1>
    <ul>
    <?php foreach($kysely->fetchAll()as $asia) { ?>
      <li><?php echo $asia[0].' '.$asia[1]; ?></li>
    <?php } ?>
    </ul>
  </body>
</html>

