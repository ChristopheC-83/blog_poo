<div class=" container accueil ">

   <div class="intro">
      <h1><?= isset($topicPage['topic']) ? $topicPage['topic'] : "" ?></h1>
      <h3><?= isset($topicPage['description_theme']) ? $topicPage['description_theme'] : "" ?></h3>
   </div>

   <div class="container allCards">
      <?php if (!empty($postsFromTopic)) : ?>
         <?php foreach ($postsFromTopic as $article) : ?>
            <?php require("./views/components/articleCard.php") ?>
         <?php endforeach ?>
      <?php else : ?>
         <h3>"Je crois que ce sujet n'est pas répertorié ! 😅"</h3>
      <?php endif ?>

   </div>
</div>