<!DOCTYPE html>
<html>
  <head>
    <title>Kurssikysely - kirjautuminen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      
      <!--  ei ylähäälle kirjautumisriviä tälle sivulle      
      <div class="row">      
          <div class="col-md-3  col-md-offset-9">
            <p><a href="kirjautuminen.html">Kirjaudu</a> / <a href="">Kirjaudu ulos</a></p>
          </div>
      </div>       
      -->
      
      <!-- sovellusohjelman otsikko  -->
      
      <div class="row">      
          <div class="col-md-6  col-md-offset-3">
            <h1>Kurssikysely</h1>
          </div>
      </div>  
      <div class="row">     
        
      <!-- ei navigaatiota kirjautumissivulle   
          <div class="col-md-3">
              <ul class="nav">
                  <li class="active"><a href="index.html">Etusivu</a></li>
                  <li><a href="#">Kurssit</a></li>
                  <li><a href="kysymykset.html">Kysymykset</a></li>
                  <li><a href="henkilot.html">Henkilöt</a></li>
                  <li><a href="raportit.html">Raportit</a></li> 
              </ul>
          </div> 
      -->
      
      <!-- varsinainen sisältö  -->      
      
          <div class="col-md-9">
            <h2>Kirjautuminen</h2>
            <form class="form-horizonal" role="form" action="" method="POST">
              <div class="form-group">
                <label for="inputTunnus" class="col-md-2 control-label">Käyttäjätunnus: </label>
                <input type="text" class="form-control" id="inputTunnus" placeholder="Käyttäjätunnus"> 
              </div>
              <div class="form-group">
                <label for="inputSalasana" class="col-md-2 control-label">Salasana: </label>
                <input type="text" class="form-control" id="inputSalasana" placeholder="Salasana"> 
              </div> 
              <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                  <button type="submit" class="btn btn-default">Kirjaudu sisään</button>
                </div>
              </div>
              <div class="form-group">
                  <p>Jos olet uusi käyttäjä, sinun täytyy ensin <a href="rekisteroityminen.html">rekisteröityä.</a></p>              
              </div>                
            </form>
          </div>
     
      </div> 
    </div>
  </body>
</html>

