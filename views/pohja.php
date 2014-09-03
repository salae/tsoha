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
      
      <!--  yläreunassa tietoja kirjautumisesta ja mahdollisuus kirjautua   -->
      
      <div class="row">      
          <div class="col-md-3  col-md-offset-8">
          <?php           
           if(isset($_SESSION['kirjautunut'])): ?>             
              <!--  Poiskirjautuminen-->
              <form class="form-inline" action="kirjauduUlos.php" method="POST">
                <span><?php echo $_SESSION['kirjautunut']->getTunnus() ; ?> on kirjautunut</span>
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
          <div class="col-md-6  col-md-offset-2">
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
      
      <!-- varsinainen sisältö joka haetaan näkymätiedostosta  -->   
      
          <div class="col-md-10">
          <?php include 'views/'.$sivu.'.php';  ?>      
          </div>
      </div>
      
      <div class="row">
        
      <!--  erilaisia viestejä ja virheilmoituksia-->
      
         <?php if (!empty($data->virhe)): ?>
           <div class="alert alert-danger col-md-offset-2">
             <?php echo $data->virhe; ?>
           </div>
         <?php elseif (!empty($data->virheet)) : 
               foreach ($data->virheet as $erhe): ?>
                 <div class="alert alert-danger col-md-offset-2">
                     <?php echo $erhe.". "; ?>
                 </div><?php endforeach;
           elseif (!empty($data->viesti)): ?>
              <div class="alert alert-danger col-md-offset-2">
                 <?php echo $data->viesti; ?>
              </div><?php            
           elseif (!empty($_SESSION['ilmoitus'])): ?>
              <div class="alert alert-danger col-md-offset-2">
                 <?php echo $_SESSION['ilmoitus']; ?>
              </div>
             <?php
                // Samalla kun viesti näytetään, se poistetaan istunnosta,
                // ettei se näkyisi myöhemmin jollain toisella sivulla uudestaan.
                unset($_SESSION['ilmoitus']);                                
             endif; ?>      
        </div> 
      </div> 
   </body>
</html>