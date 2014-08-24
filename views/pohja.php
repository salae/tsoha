<!DOCTYPE html>
<html>
  <head>
    <title>Kurssikysely</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">
      
      <!--  yläreunaan tulee kirjautuminen 
            yritetään ottaa kirjautumistilanne huomioon uudessa versiossa 
            vähän vielä bugittaa
      -->
      
      <div class="row">      
          <div class="col-md-3  col-md-offset-9">
          <?php           
           if(isset($_SESSION['kirjautunut'])): ?> 
            
              <!--  Poiskirjautuminen-->
              <form class="form-inline" action="kirjauduUlos.php" method="POST">
                <span> on kirjautunut</span>
                <button type="submit">Kirjaudu ulos</button>             
              </form><?php
            elseif ($sivu == "kirjautuminen" || $sivu == "rekisterointi"):
              ?><p></p><?php              
            else:
               ?><p><a href="kirjautuminen.php">Kirjaudu</a></p><?php
              endif;           
          ?>
          </div>

      </div> 
      
      <!-- sovellusohjelman otsikko  -->
      
      <div class="row">      
          <div class="col-md-6  col-md-offset-3">
            <h1>Kurssikysely</h1>
          </div>
      </div>  
      
    <div class="row"> 
      
      <!-- Sivupalkki navivgaatiolle  -->      

          <div class="col-md-2">
              <ul class="nav">
                  <li><a href="index.php">Etusivu</a></li>
                  <li><a href="kurssit.php">Kurssit</a></li>
                  <li><a href="kysymykset.php">Kysymykset</a></li>
                  <li><a href="henkilot.php">Käyttäjät</a></li>
                  <li><a href="raportit.php">Raportit</a></li> 
              </ul>
            </div> 
      
      <!-- varsinainen sisältö  -->   
      
        <div class="col-md-10">
          <?php 
            /* HTML-rungon keskellä on sivun sisältö, 
             * joka haetaan sopivasta näkymätiedostosta.
             * Oikean näkymän tiedostonimi on tallennettu muuttujaan $sivu.
             */

             include 'views/'.$sivu.'.php'; 

            ?>      
           </div>
    </div>
      <div class="row">
      <?php if (!empty($data->virhe)): ?>
             <div class="alert alert-danger col-md-offset-2"><?php echo $data->virhe; ?></div>
             <?php endif; ?>
    
      
        </div> 
      </div> 
   </body>
</html>