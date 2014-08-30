<h2>Kurssin tiedot</h2>

  <ul>
    <li>Nimi: <?php echo $data->kurssi->getNimi(); ?>
    <li>Opettaja: <?php echo $data->kurssi->getOpettaja(); ?>  
    <li>Alkupäivä: <?php echo $data->kurssi->getAlkuPvm(); ?> ja 
      Loppupäivä: <?php echo $data->kurssi->getLoppuPvm(); ?>
    <li>Laitos: <?php echo $data->kurssi->getLaitos(); ?>
    <li>Kyselyn tila: <?php echo $data->kurssi->getKysely_aktiivinen(); ?>
  </ul> 

<form class="form-horizonal" role="form" action="kurssinMuokkaus.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $data->kurssi->getId(); ?>">
    <button type="submit" class="btn btn-default">Muuta tietoja</button>
</form>

