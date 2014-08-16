    
      
          <div class="col-md-9">
            <h2>Kirjautuminen</h2>
            
            <form class="form-horizonal" role="form" action="kirjaudu.php" method="POST">
              <div class="form-group">
                <label for="tunnus" class="col-md-3 control-label">Käyttäjätunnus: </label>
                <input type="text" class="form-control" name="tunnus" size="20" 
                       value="<?php echo $data->kayttaja; ?>" /> 
              </div>
              <div class="form-group">
                <label for="salasana" class="col-md-3 control-label">Salasana: </label>
                <input type="password" class="form-control" name="salasana"  size="20" > 
              </div> 
              <div class="form-group">
                <div class="col-md-offset-3 col-md-10">
                  <button type="submit" class="btn btn-default">Kirjaudu sisään</button>
                </div>
              </div>             
            </form>    
            
              <div class="col-md-offset-3">
                  <p>Jos olet uusi käyttäjä, sinun täytyy ensin <a href="rekisteroityminen.php">rekisteröityä.</a></p>              
              </div>            
            
           </div>
           




