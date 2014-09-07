  <h2>Raportit</h2>

  <h3>Omat kurssisi</h3>
  <p>
   Saat halutessasi yksityiskohtaisen raportin sellaiselta kurssilta, 
   jossa olet ollut opettajana.
  </p>

  <form class="form-horizonal" role="form"  action="teeKurssiRaportti.php" method="POST">
    <div class="form-group">           
      <div class="col-md-6">
        <label for="kurssi" class="control-label">Valitse kurssi: </label>
          <select name="kurssi">
            <?php foreach($data->opeKurssit as $kurssi): ?> 
            <option value="<?php echo $kurssi->getId(); ?>">
            <?php echo $kurssi->getNimi().' (aloitus: '.$kurssi->getAlkuPvm()->format('d.m.Y').')'; ?></option>
            <?php endforeach; ?>
          </select> 
        </div>
        <div class="col-md-offset-6 ">
          <button type="submit" class="btn btn-default">Hae</button>
        </div>        
    </div>
  </form>  


  <h3>Laitoksen kurssit</h3>

  <p>
    Saat yhteenvetotietoja oman laitoksesi kursseista.
  </p>
  
  <form class="form-horizonal" role="form"  action="teeYhteenvetoRaportti.php" method="POST">
    <div class="form-group">           
      <div class="col-md-6">
        <label for="kurssi" class="control-label">Valitse kurssi: </label>
          <select name="kurssi">
            <?php foreach($data->laitosKurssit as $kurssi): ?> 
            <option value="<?php echo $kurssi->getId(); ?>">
            <?php echo $kurssi->getNimi().' (aloitus: '.$kurssi->getAlkuPvm()->format('d.m.Y').')'; ?></option>
            <?php endforeach; ?>
          </select> 
        </div>
        <div class="col-md-offset-6 ">
          <button type="submit" class="btn btn-default">Hae</button>
        </div>        
    </div>
  </form>  

            