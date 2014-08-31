          
    <h2>Kirjautuminen</h2>

    <form class="form-horizonal " role="form" action="kirjaudu.php" method="POST">
      <div class="form-group">
        <label for="tunnus" class="col-md-2 control-label">Käyttäjätunnus: </label>
        <input type="text" class="form-control" name="tunnus" 
               value="<?php echo $data->kayttaja; ?>" /> 
      </div>
      <div class="form-group">
        <label for="salasana" class="col-md-2 control-label">Salasana: </label>
        <input type="password" class="form-control" name="salasana"  > 
      </div> 
      <div class="form-group">
        <div class="col-md-offset-2 ">
          <button type="submit" class="btn btn-default">Kirjaudu sisään</button>
        </div>
      </div>             
    </form>    

    <div >
        <p>Jos olet uusi käyttäjä, sinun täytyy ensin <a href="rekisterointi.php">rekisteröityä.</a></p>              
    </div>            
