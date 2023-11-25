<div class="container">

    <h1>Codons ensemble !</h1>
    <h2 class="text-center">Du simple tips au mini projet !</h2>
    <h3 class="text-center">Parce que c'est en forgeant...</h3>

    <p>Contenu Accueil</p>

    <p>Accueil -> Tout</p>
    <p>PROJETS Projets -> codons ensemble (rpg poo, CRUD...)</p>
    <p>TESTEZ Cas pratique</p>
    <p>TRICKS Tricks -> ces points qui m'ont bloqué</p>
    <p>FORMATIONS -> que j'ai suivies (rocket, Udemy, YT)</p>
    <p>PORTFOLIO -> mes créations</p>
    <p>AUTRES -> setup, mindset</p>
    
    
    <div class="allCards ">
      <?php foreach ($infosArticles as $article) : ?>
         <?php require("./views/components/articleCard.php") ?>
      <?php endforeach ?>
   </div>
</div>