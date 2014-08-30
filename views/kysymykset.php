 <h2>Kysymykset</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Kysymys</th>          
          <th>Vastausyyppi</th>
          <th>Laajuus</th>
          <th>Laitos</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data->kysymykset as $kysymys): ?>
        <tr>
          <td><a href="#"> 
              <?php echo htmlspecialchars($kysymys->getKysymys()); ?></a></td>
          <td><?php echo htmlspecialchars($kysymys->getVastausLaji()); ?></td>
          <td><?php echo htmlspecialchars($kysymys->getKaikille()); ?></td>
          <td><?php echo htmlspecialchars($kysymys->getLaitos()); ?></td>
        </tr>
      <?php endforeach; ?>  
      </tbody>
    </table>               