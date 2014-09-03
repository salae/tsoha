<h2>Kurssin lisäys</h2>

      <form class="form-horizonal" role="form" action="lisaaKurssi.php" method="POST">
          <div class="form-group">            
            <label for="nimi" class="col-md-2 control-label">Kurssin nimi: </label>
            <input type="text" class="form-control" name="nimi" 
                   value="<?php echo htmlspecialchars($data->kurssi->getNimi()); ?>"> 
          </div> 
          <div class="form-group">
            <label for="opettaja" class="col-md-2 control-label">Opettaja: </label>
            <select name="opettaja">
              <?php foreach(Henkilo::etsiKaikkiKayttajat() as $ope): ?> 
              <option value="<?php echo $ope->getId(); ?>">
              <?php echo $ope->getEtunimi().' '.$ope->getSukunimi(); ?></option>
              <?php endforeach; ?>
            </select>
          </div>           
          <div class="form-group">
            <label for="laitos" class="col-md-2 control-label">Laitos: </label>
            <select name="laitos">              
              <?php foreach(Laitos::haeKaikki() as $tdk_laitos): ?> 
              <option value="<?php echo $tdk_laitos->getId(); ?>">
              <?php echo $tdk_laitos->getNimi(); ?></option>
              <?php endforeach; ?>
            </select> 
          </div>
          <div class="form-group form-inline">
            <label for="alkupvm" class="col-md-2 control-label">Alkupäivä: </label>
            <select name="alkuPaiva"> 
              <?php for($i = 1; $i <= 31; $i++){
                ?><option value="<?php echo $i?>"><?php echo $i ?></option>
              <?php } ?>               
            </select>
            <select name="alkuKuukausi">              
              <?php for($i = 1; $i <= 12; $i++){
                ?><option value="<?php echo $i?>"><?php echo $i ?></option>
              <?php } ?>  
            </select> 
            <select name="alkuVuosi">              
              <?php for($i = 2000; $i <= 2020 ; $i++){
                ?><option value="<?php echo $i?>"><?php echo $i ?></option>
              <?php } ?>  
            </select> 
          </div>
          <div class="form-group form-inline">
            <label for="loppupvm" class="col-md-2 control-label">Loppupäivä: </label>
            <select name="loppuPaiva"> 
              <?php for($i = 1; $i <= 31; $i++){
                ?><option value="<?php echo $i?>"><?php echo $i ?></option>
              <?php } ?>               
            </select>
            <select name="loppuKuukausi">              
              <?php for($i = 1; $i <= 12; $i++){
                ?><option value="<?php echo $i?>"><?php echo $i ?></option>
              <?php } ?>  
            </select> 
            <select name="loppuVuosi">              
              <?php for($i = 2000; $i <= 2020 ; $i++){
                ?><option value="<?php echo $i?>"><?php echo $i ?></option>
              <?php } ?>  
            </select> 
          </div>  
          <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
              <button type="submit" class="btn btn-default">Tallenna</button>
            </div>
          </div>              
        </form>