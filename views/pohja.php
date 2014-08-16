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
      
      <!--  yläreunaan tulee kirjautuminen -->
      
      <div class="row">      
          <div class="col-md-3  col-md-offset-9">
            <p><a href="kirjautuminen.php">Kirjaudu</a> / <a href="">Kirjaudu ulos</a></p>
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
                  <li class="active"><a href="index.php">Etusivu</a></li>
                  <li><a href="kurssit.php">Kurssit</a></li>
                  <li><a href="kysymykset.php">Kysymykset</a></li>
                  <li><a href="henkilot.php">Käyttäjät</a></li>
                  <li><a href="raportit.php">Raportit</a></li> 
              </ul>
            </div> 
      
      <!-- varsinainen sisältö  -->   
      
        <?php 
          /* HTML-rungon keskellä on sivun sisältö, 
           * joka haetaan sopivasta näkymätiedostosta.
           * Oikean näkymän tiedostonimi on tallennettu muuttujaan $sivu.
           */
   
           include 'views/'.$sivu.'.php'; 
           
           if (!empty($data->virhe)): ?>
           <div class="alert alert-danger"><?php echo $data->virhe; ?></div>
           <?php endif;

//           include 'views/testi1.php'; 
//           include 'testi2.php'; 
//           include 'http://aesalmin.users.cs.helsinki.fi/Kurssikysely/views/testi3.php'; 
        ?>
      
        </div> 
      </div> 
   </body>
</html>