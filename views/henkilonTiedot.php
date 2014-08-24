<h2>Henkilötiedot</h2>

<form class="form-horizonal" role="form" action="kirjaudu.php" method="POST">
  <ul>
    <li>Nimi: <?php echo $data->kayttaja->getEtunimi()." ".$data->kayttaja->getSukunimi(); ?>
    <li>Tunnus: <?php echo $data->kayttaja->getTunnus(); ?>  
    <li>Salasana: <?php echo $data->kayttaja->getSalasana(); ?>
    <li>Laitos: <?php echo $data->kayttaja->getLaitos(); ?>
    <li>Ylläpito-oikeudet: <?php echo $data->kayttaja->onkoYllapitaja(); ?>
  </ul>          
  
    <button type="submit" class="btn btn-default">Muuta tietoja</button>
</form>
