      <h2>Käyttäjäksi rekisteröityminen</h2>

        <form class="form-horizonal" role="form" action="rekisteroidy.php" method="POST">
          <div class="form-group">
            <label for="etunimi" class="col-md-2 control-label">Etunimi: </label>
            <input type="text" class="form-control" name="etunimi" 
                   value="<?php echo htmlspecialchars($data->henkilo->getEtunimi()); ?>"> 
          </div>   
          <div class="form-group">
            <label for="sukunimi" class="col-md-2 control-label">Sukunimi: </label>
            <input type="text" class="form-control" name="sukunimi" 
                   value="<?php echo htmlspecialchars($data->henkilo->getSukunimi()); ?>"> 
          </div>              
          <div class="form-group">
            <label for="tunnus" class="col-md-2 control-label">Käyttäjätunnus: </label>
            <input type="text" class="form-control" name="tunnus" 
                   value="<?php echo htmlspecialchars($data->henkilo->getTunnus()); ?>"> 
          </div>
          <div class="form-group">
            <label for="salasana" class="col-md-2 control-label">Salasana: </label>
            <input type="password" class="form-control" name="salasana" 
                   value="<?php echo htmlspecialchars($data->henkilo->getSalasana()); ?>"> 
          </div> 
          <div class="form-group">
            <label for="laitos" class="col-md-2 control-label">Laitos: </label>
            <select name="laitos">
              <option value=0>-</option>
              <?php foreach(Laitos::haeKaikki() as $tdk_laitos): ?> 
              <option value="<?php echo $tdk_laitos->getId(); ?>">
              <?php echo $tdk_laitos->getNimi(); ?></option>
              <?php endforeach; ?>
            </select>
          </div> 
          <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
              <button type="submit" class="btn btn-default">Rekisteröi</button>
            </div>
          </div>              
        </form>
