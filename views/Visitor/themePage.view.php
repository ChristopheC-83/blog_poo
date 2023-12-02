<div class="container ">

   <div class="intro">
      <h1 class="uppercase"><?= isset($themePage['theme']) ? $themePage['theme'] : "" ?></h1>
      <h3 class="text-center"><?= isset($themePage['description_theme']) ? $themePage['description_theme'] : "" ?></h3>
      <br><br>
   </div>

   <div class="allCards">
      <?php if (!empty($articlesFromtheme)) : ?>
         <?php foreach ($articlesFromtheme as $article) : ?>
            <?php require("./views/components/articleCard.php") ?>
         <?php endforeach ?>
      <?php else : ?>
         <h3>"Je crois que ce sujet n'est pas répertorié ! 😅"</h3>
      <?php endif ?>

   </div>
</div>