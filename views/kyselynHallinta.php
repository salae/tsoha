<h2>Kurssiin <?php echo $data->kurssi->getNimi(); ?> liittyvät kysymykset</h2>

  <p>
    Kurssikyselyyn tulee automaattisesti mukaan tiedekunnan kaikille kursseille yhteiset 
    kysymykset sekä laitoksen kaikille kursseille yhteiset kysymykset. Valinnaisista 
    kysymyksistä voi valita kyselyyn haluamasi.
  </p>

<h3>Kaikille yhteiset kysymykset</h3>

  <ul>
    <?php foreach($data->kaikki as $kysymys): ?>
    <li><?php echo $kysymys->getKysymys().' ( Vastauslaji: '.$kysymys->getVastausLajiMerkkijonona().')'; ?></li>
      <?php endforeach; ?>      
  </ul>

<h3>Laitoksen yhteiset kysymykset</h3>

  <ul>
    <?php foreach($data->laitos as $kysymys): ?>
    <li><?php echo $kysymys->getKysymys().' ( Vastauslaji: '.$kysymys->getVastausLajiMerkkijonona().')'; ?></li>
      <?php endforeach; ?>      
  </ul>

<h3>Kurssin valinnaiset kysymykset</h3>

  <form action="lisaaKysely.php" method="POST">
  <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $data->kurssi->getId(); ?>">
    <?php foreach($data->valinnaiset as $kysymys): ?>
    <input type="checkbox" name="kysymys" value="<?php echo $kysymys->getId() ?>">
      <?php echo $kysymys->getKysymys().' ( Vastauslaji: '.$kysymys->getVastausLajiMerkkijonona().')'; ?><br>
      <?php endforeach; ?> 
    </div> 
    
  <div class="form-group ">    
    
      <div class=" ">
        <label>Kyselyn aktivointi</label><br>
        <span>Kun kysely aktivoidaan, siihen voidaan vastata. Tämän jälkeen kysymyksiä
          ei voi enää muuttaa.</span><br>
          <input type="checkbox" name="aktiivinen" value="true">Aktivoi kysely<br>
        <button type="submit" class="btn btn-default">Tallenna</button>
      </div>
  </div>     

  </form>