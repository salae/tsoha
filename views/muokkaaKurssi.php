<h2>Kurssin tietojen muokkaus</h2>

      <form class="form-horizonal" role="form" action="muokkaaKurssi.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $data->kurssi->getId(); ?>">
          <div class="form-group">            
            <label for="nimi" class="col-md-2 control-label">Nimi: </label>
            <input type="text" class="form-control" name="nimi" 
                   value="<?php echo htmlspecialchars($data->kurssi->getNimi()); ?>"> 
          </div>   
          <div class="form-group">
            <label for="opettaja" class="col-md-2 control-label">Opettaja: </label>
            <input type="text" class="form-control" name="opettaja" 
                   value="<?php echo htmlspecialchars($data->kurssi->getOpettaja()); ?>"> 
          </div>              
          <div class="form-group">
            <label for="alkupvm" class="col-md-2 control-label">Alkupäivä: </label>
            <input type="date" class="form-control" name="alkupvm" 
                   value="<?php echo htmlspecialchars($data->kurssi->getAlkuPvm()->format('d.m.Y')); ?>"> 
          </div>
          <div class="form-group">
            <label for="loppupvm" class="col-md-2 control-label">Loppupäivä: </label>
            <input type="date" class="form-control" name="loppupvm" 
                   value="<?php echo htmlspecialchars($data->kurssi->getLoppuPvm()->format('d.m.Y')); ?>"> 
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
          <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
              <button type="submit" class="btn btn-default">Tallenna</button>
            </div>
          </div>              
        </form>
