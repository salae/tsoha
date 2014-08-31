    <h2>Käyttäjät</h2>           
      
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Henkilön nimi</th>
            <th>Tunnus</th>
            <th>Laitos</th>
            <th>Admin</th>
            <th></th>
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
            <td><?php if($kayttaja->onkoYllapitaja()): echo '+'; 
                      else : echo '-';  
                      endif;?> </td>
            <td><form class="" action="henkiloMuokkaus.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $kayttaja->getId(); ?>">
                <button type="submit">Muokkaa</button></form></td>
            <td><form class="" action="poistaHenkilo.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $kayttaja->getId(); ?>">
                <button type="submit">Poista</button></form></td>
          </tr>
        <?php endforeach; ?>                 
        </tbody>
      </table> 

      <p>
        Lisää uusi käyttäjä <a href="rekisterointi.php">reskisteröintisivulla</a>.
      </p>
