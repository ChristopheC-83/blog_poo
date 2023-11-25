<div class="container">

    <h1>Codons ensemble !</h1>
    <h2 class="text-center">Du simple tips au mini projet !</h2>
    <h3 class="text-center">Parce que c'est en forgeant...</h3>
    <br><br>

   
    
    
    <div class="allCards ">
      <?php foreach ($infosArticles as $article) : ?>
         <?php require("./views/components/articleCard.php") ?>
      <?php endforeach ?>
   </div>
</div>