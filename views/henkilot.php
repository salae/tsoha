    <h2>Käyttäjät</h2>           
      
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Henkilön nimi</th>
            <th>Tunnus</th>
            <th>Laitos</th>
            <th>Admin</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($data->kayttajat as $kayttaja): ?>
          <tr>
            <td><a href="henkilonTiedot.php?id=<?php echo $kayttaja->getId() ?>"> 
              <?php echo htmlspecialchars($kayttaja->getSukunimi().", "
                      .$kayttaja->getEtunimi()); ?></a></td>
            <td><?php echo htmlspecialchars($kayttaja->getTunnus()); ?></td>
            <td><?php echo htmlspecialchars($kayttaja->getLaitos()); ?></td>
            <td><?php echo htmlspecialchars($kayttaja->onkoYllapitaja()); ?></td>
            <td><form class="form-inline" action="poistaHenkilo.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $kayttaja->getId(); ?>">
                <button type="submit">Poista</button></form></td>
          </tr>
        <?php endforeach; ?>                 
        </tbody>
      </table> 

      <p>
        Luo uusi henkilö <a href="rekisterointi.php">reskisteröintisivulla</a>.
      </p>
