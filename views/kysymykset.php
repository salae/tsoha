 <h2>Kysymykset</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Kysymys</th>          
          <th>Vastauslaji</th>
          <th>Kaikille</th>
          <th>Laitos</th>
          <th>Vaihtoehdot</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($data->kysymykset as $kysymys): ?>
        <tr>
          <td><?php echo htmlspecialchars($kysymys->getKysymys()); ?></td>          
          <td><?php echo htmlspecialchars($kysymys->getVastausLajiMerkkijonona())?> </td>         
          <td><?php echo htmlspecialchars($kysymys->getKaikille()); ?></td>
          <td><?php echo htmlspecialchars($kysymys->getLaitos()); ?></td>
          <td><?php foreach($kysymys->getVaihtoehdot() as $vaihtoehto): 
                        echo htmlspecialchars($vaihtoehto).' ';
                     endforeach; ?></td>
        </tr>
      <?php endforeach; ?>  
      </tbody>
    </table>               