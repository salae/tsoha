<!DOCTYPE HTML>
<html>
  <head>
    <title>Kurssikysely</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
  </head>
  <body>
      <div class="container-fluid">
            <!--  ylähäälle tulee kirjautuminen -->
      
      <div class="row">      
          <div class="col-md-3  col-md-offset-9">
            <p><a href="kirjautuminen.html">Kirjaudu</a> / <a href="">Kirjaudu ulos</a></p>
          </div>
      </div> 
      
      <!-- sovellusohjelman otsikko  -->
      
      <div class="row">      
          <div class="col-md-6  col-md-offset-3">
            <h1>Kurssikysely</h1>
          </div>
      </div>  
      
      <!-- Sivupalkki navivgaatiolle  -->
      
      <div class="row">
          <div class="col-md-2">
              <ul class="nav">
                  <li class="active"><a href="index.html">Etusivu</a></li>
                  <li><a href="kurssit.html">Kurssit</a></li>
                  <li><a href="kysymykset.html">Kysymykset</a></li>
                  <li><a href="henkilot.html">Henkilöt</a></li>
                  <li><a href="raportit.html">Raportit</a></li> 
              </ul>
          </div> 
        </div> 
      
      <!-- varsinainen sisältö  -->   
      
      
      
      <?php 
        /* HTML-rungon keskellä on sivun sisältö, 
         * joka haetaan sopivasta näkymätiedostosta.
         * Oikean näkymän tiedostonimi on tallennettu muuttujaan $sivu.
         */
        require 'views/'.$sivu.'.php'; 
      ?>

      
      </div> 
   </body>
</html>