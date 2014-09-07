<!--Yhteenvetotietoja kurssikyselyyn saaduista vastauksista.-->

<h2>Raportti kurssista <?php echo htmlspecialchars($data->kurssi->getNimi()) ?></h2>

<div>
  <ul>
    <li>Opettaja: <?php echo htmlspecialchars($data->kurssi->getOpettaja()); ?>  
    <li>Alkupäivä: <?php echo htmlspecialchars($data->kurssi->getAlkuPvm()->format('d.m.Y')); ?> ja 
        Loppupäivä: <?php echo htmlspecialchars($data->kurssi->getLoppuPvm()->format('d.m.Y')); ?>      
    <li>Laitos: <?php echo htmlspecialchars($data->kurssi->getLaitos()); ?>
  </ul> 
</div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Kysymys</th>
            <th>Vastausten lukumäärä</th>
            <th>Keskiarvo</th>
          </tr>
        </thead>
        <tbody>
        <?php 
            foreach($data->vastaukset as $rivi): ?>
              <tr>
                <td><?php echo htmlspecialchars($rivi[1]); ?></a></td>
                <td><?php echo htmlspecialchars($rivi[2]); ?></td>
                <td><?php echo htmlspecialchars($rivi[3]); ?></td>
              </tr>
            <?php endforeach; ?>                 
        </tbody>
      </table> 