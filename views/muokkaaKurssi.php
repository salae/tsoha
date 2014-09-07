<h2>Kurssin tietojen muokkaus</h2>

      
      
      <form class="form-horizonal" role="form" action="muokkaaKurssi.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $data->kurssi->getId(); ?>">
          
          <!--kurssin nimi-->
          
          <div class="form-group">            
            <label for="nimi" class="col-md-2 control-label">Nimi: </label>
            <input type="text" class="form-control" name="nimi" 
                   value="<?php echo htmlspecialchars($data->kurssi->getNimi()); ?>"> 
          </div> 
          
          <!--kurssin opettaja-->
          
          <div class="form-group">
            <label for="opettaja" class="col-md-2 control-label">Opettaja: </label>
            <select name="opettaja">
              <?php foreach(Henkilo::etsiKaikkiKayttajat() as $ope): ?> 
              <option value="<?php echo $ope->getId(); ?>">
              <?php echo $ope->getEtunimi().' '.$ope->getSukunimi(); ?></option>
              <?php endforeach; ?>
            </select> 
            <span>Toistaiseksi: <?php echo htmlspecialchars($data->kurssi->getOpettaja()); ?></span>
          </div> 
          
          <!--kurssin aloituspäivä-->
          
          <div class="form-group">
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
            <span>Toistaiseksi: <?php echo htmlspecialchars($data->kurssi->getAlkuPvm()->format('d.m.Y')); ?></span>
          </div>
          
          <!--kurssin loppumispäivä, voi olla sama kuin aloituspäivä-->
          
          <div class="form-group">
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
           <span> Toistaiseksi: <?php echo htmlspecialchars($data->kurssi->getLoppuPvm()->format('d.m.Y')); ?></span><br> 
          </div> 
          
          <!--kurssin järjestävä laitos-->
          
          <div class="form-group">
            <label for="laitos" class="col-md-2 control-label">Laitos: </label>
            <select name="laitos" >              
              <?php foreach(Laitos::haeKaikki() as $tdk_laitos): ?> 
              <option value="<?php echo $tdk_laitos->getId(); ?>">
              <?php echo $tdk_laitos->getNimi(); ?></option>
              <?php endforeach; ?>
            </select>
            <span>Toistaiseksi: <?php echo htmlspecialchars($data->kurssi->getLaitos()); ?></span>
          </div> 
          
          <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
              <button type="submit" class="btn btn-default">Tallenna</button>
            </div>
          </div>              
        </form>
