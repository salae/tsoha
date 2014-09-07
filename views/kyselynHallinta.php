<!--Uuden kyselyn luomiseen käytettävä lomake.
Alun perin tässä piti olla enemmänkin toimintoja.-->

<h2>Kurssiin <?php echo $data->kurssi->getNimi(); ?> liittyvät kysymykset</h2>

  <p>
    Kurssikyselyyn tulee automaattisesti mukaan tiedekunnan kaikille kursseille yhteiset 
    kysymykset sekä laitoksen kaikille kursseille yhteiset kysymykset. Valinnaisista 
    kysymyksistä voi valita kyselyyn haluamasi.
  </p>
  
<form action="lisaaKysely.php" method="POST">  

<h3>Kaikille yhteiset kysymykset</h3>

  <ul><?php foreach($data->kaikki as $kysymys): ?>
    <li><input type="hidden" name="yhteiset[]" value="<?php echo $kysymys->getId(); ?>"/>
      <?php echo $kysymys->getKysymys().' ( Vastauslaji: '.$kysymys->getVastausLajiMerkkijonona().')'; ?></li>
      <?php endforeach; ?>      
  </ul>

<h3>Laitoksen yhteiset kysymykset</h3>

  <ul><?php foreach($data->laitos as $kysymys): ?>
    <li><input type="hidden" name="yhteiset[]" value="<?php echo $kysymys->getId(); ?>"/>
      <?php echo $kysymys->getKysymys().' ( Vastauslaji: '.$kysymys->getVastausLajiMerkkijonona().')'; ?></li>
      <?php endforeach; ?>      
  </ul>

<h3>Kurssin valinnaiset kysymykset</h3>
 
  <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $data->kurssi->getId(); ?>"/>
    <?php foreach($data->valinnaiset as $kysymys): ?>
    <input type="checkbox" name="valitut[]" value="<?php echo $kysymys->getId() ?>">
      <?php echo $kysymys->getKysymys().' ( Vastauslaji: '.$kysymys->getVastausLajiMerkkijonona().')'; ?><br>
      <?php endforeach; ?> 
  </div> 
    
  <div class="form-group ">  
      <button type="submit" class="btn btn-default">Tallenna ja aktvivoi</button>
  </div>     

</form>