<div class="container">

    <h1>Titre Site / Accueil</h1>
    <h2>Accueil Contiendra</h2>

    <p>Contenu Accueil</p>
    
    
    <div class="allCards ">
      <?php foreach ($infosArticles as $article) : ?>
        
         <?php require("./views/components/articleCard.php") ?>
      <?php endforeach ?>

   </div>

    

</div>