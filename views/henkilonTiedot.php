<h2>Henkilötiedot</h2>

  <ul>
    <li>Nimi: <?php echo $data->kayttaja->getEtunimi()." ".$data->kayttaja->getSukunimi(); ?>
    <li>Tunnus: <?php echo $data->kayttaja->getTunnus(); ?>  
    <li>Salasana: <?php echo $data->kayttaja->getSalasana(); ?>
    <li>Laitos: <?php echo $data->kayttaja->getLaitos(); ?>
    <li>Ylläpito-oikeudet: <?php echo $data->kayttaja->onkoYllapitaja(); ?>
  </ul> 

<form class="form-horizonal" role="form" action="henkiloMuokkaus.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $data->kayttaja->getId(); ?>"/>
    <button type="submit" class="btn btn-default">Muuta tietoja</button>
</form>
