<h2>Kurssin tiedot</h2>

  <ul>
    <li>Nimi: <?php echo htmlspecialchars($data->kurssi->getNimi()); ?>
    <li>Opettaja: <?php echo htmlspecialchars($data->kurssi->getOpettaja()); ?>  
    <li>Alkupäivä: <?php echo htmlspecialchars($data->kurssi->getAlkuPvm()->format('d.m.Y')); ?> ja 
        Loppupäivä: <?php echo htmlspecialchars($data->kurssi->getLoppuPvm()->format('d.m.Y')); ?>      
    <li>Laitos: <?php echo htmlspecialchars($data->kurssi->getLaitos()); ?>
    <li>Kyselyn tila: <?php echo htmlspecialchars($data->kurssi->getKysely_aktiivinen()); ?>
  </ul> 

<form class="form-horizonal" role="form" action="kurssiMuokkaus.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $data->kurssi->getId(); ?>">
    <button type="submit" class="btn btn-default">Muuta tietoja</button>
</form>

