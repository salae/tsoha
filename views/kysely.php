<h2> <?php echo $data->kurssi->getNimi(); ?></h2>

<form action="vastaaKysely.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $data->kurssi->getId(); ?>"/>
   
    <table class="table ">
    <thead>
      <tr>
        <th>Kysymys</th>
        <th>Vastaus</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($data->kysely as $kysymys): ?>
       <tr>
          <td><?php echo htmlspecialchars($kysymys->getKysymys()); ?></td>         
          <td><?php if($kysymys->getVastauslaji()==1): ?>
                <input type="text" class="form-control" name="vastaus" /> <?php
             elseif ($kysymys->getVastauslaji()== 2): ?>
                <input type="radio" name="arvo" value="1">1
                <input type="radio" name="arvo" value="2">2
                <input type="radio" name="arvo" value="3">3
                <input type="radio" name="arvo" value="4">4
                <input type="radio" name="arvo" value="5">5 <?php       
            elseif($kysymys->getVastauslaji()== 3): 
                foreach($kysymys->getVaihtoehdot() as $vaihtoehto): ?>
                  <input type="radio" name="arvo" value="<?php echo $vaihtoehto ?>"><?php echo $vaihtoehto ?> <br>
                <?php endforeach;            
            else : echo '-';  
            endif;?> </td>  
      </tr> 
      <?php endforeach; ?> 
    </tbody>
  </table>  
  <button type="submit" class="btn btn-default">Vastaa</button>
  
  
</form>

