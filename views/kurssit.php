  <h2>Kurssit</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Kurssin nimi</th>
        <th>Aloituspäivä</th>
        <th>Loppumispäivä</th>
        <th>Järjestävä laitos</th>
        <th>Kysely</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data->kurssit as $kurssi): ?>
       <tr>
        <td><a href="kurssinTiedot.php?id=<?php echo $kurssi->getId() ?>"> 
              <?php echo htmlspecialchars($kurssi->getNimi()); ?></a></td>
        <td><?php echo var_dump(htmlspecialchars($kurssi->getAlkuPvm())); ?></td>
        <td><?php echo var_dump(htmlspecialchars($kurssi->getLoppuPvm())); ?></td> 
        <td><?php echo htmlspecialchars($kurssi->getLaitos()); ?></td>
        <td><?php echo htmlspecialchars($kurssi->getKysely_aktiivinen()); ?></td>
        <td><form class="" action="kurssiMuokkaus.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $kurssi->getId(); ?>">
                <button type="submit">Muokkaa</button></form></td>
            <td><form class="" action="poistaKurssi.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $kurssi->getId(); ?>">
                <button type="submit">Poista</button></form></td>
      </tr> 
      <?php endforeach; ?> 
    </tbody>
  </table>  

   <p>
    Lisää <a href="lisaakurssi.html">uusi kurssi</a>.
   </p> 
