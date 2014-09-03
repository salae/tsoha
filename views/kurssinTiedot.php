<h2>Kurssin tiedot</h2>
<div>
  <ul>
    <li>Nimi: <?php echo htmlspecialchars($data->kurssi->getNimi()); ?>
    <li>Opettaja: <?php echo htmlspecialchars($data->kurssi->getOpettaja()); ?>  
    <li>Alkupäivä: <?php echo htmlspecialchars($data->kurssi->getAlkuPvm()->format('d.m.Y')); ?> ja 
        Loppupäivä: <?php echo htmlspecialchars($data->kurssi->getLoppuPvm()->format('d.m.Y')); ?>      
    <li>Laitos: <?php echo htmlspecialchars($data->kurssi->getLaitos()); ?>
    <li>Kyselyn tila: <?php echo htmlspecialchars($data->kurssi->getKysely_aktiivinen()); ?>
  </ul> 
</div>

<form class="form-horizonal" role="form" action="kurssiMuokkaus.php" method="POST">
  <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $data->kurssi->getId(); ?>">
    <button type="submit" class="btn btn-default">Muuta tietoja</button>
  </div> 
</form>



<form class="form-horizonal" role="form" action="kyselynHallinta.php" method="POST">
  <div class="form-group">
    <label for='#'>Kurssikysely: </label><br>  
    <span>Voit hallinnoida kurssin kyselyä. Jos kurssilla ei ole vielä kyselyä, 
      tehdään uusi kysely.</span><br>
    <input type="hidden" name="id" value="<?php echo $data->kurssi->getId(); ?>">
    <button type="submit" class="btn btn-default">Kyselyyn</button>
  </div> 
</form>
 