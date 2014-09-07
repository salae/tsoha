  
  <!--Sovelluksen aloitusnäkymä-->

   <p>
      Kurssikysely-sivustolla voit antaa mielipiteesi käymästäsi kurssista.
   </p>

   <p>
      Alla on lista aktiivisista kurssikyselyistä. Valitse se, mihin
      haluat vastata.
   </p>

   <form class="form-horizonal" role="form" action="vastaaminen.php" method="POST"> 
      <div class="form-group">           
        <div class="col-md-6">
          <select class="form-control" name="id">
                <?php foreach($data->kyselyt as $kurssikysely): ?> 
                <option value="<?php echo $kurssikysely->getId(); ?>">
                <?php echo $kurssikysely->getNimi().' (aloitus:'.$kurssikysely->getAlkuPvm()->format('d.m.Y').')'; ?></option>
                <?php endforeach; ?>
          </select>
        </div>

        <div class="col-md-offset-7">
          <button type="submit" class="btn btn-default">Vastaa</button>
        </div>           
      </div>
   </form>

   <p>
      Jos olet kirjautuneena järjestelmään ja sinulla on tarvittavat 
      oikeudet, voit myös muokata järjestelmän tietoja.
   </p>

 
