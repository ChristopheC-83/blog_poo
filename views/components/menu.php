<?php
if (empty($_GET['page'])) {
   $url[0] = "accueil";
} else {
   $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
   $page = $url[0];
}
require_once("./models/Visitor/Visitor.model.php");
$visitorController = new VisitorManager();
$userManager = new UserManager();
$topics = $visitorController->getAllTopics();

?>


<div class="btnThemesContainer">

   <a href="<?= URL ?>home" class="btnTheme all_themes 
      <?=
      (empty($url[0]) || $url[0] === 'home') ? 'selected_theme' : '';
      ?>
   ">
      <p>Accueil</p>
   </a>

   <?php foreach ($topics as $topic) : ?>
      <a href="<?= URL ?>topic/<?= $topic['topic'] ?>" class="btnTheme
       <?= $topic['topic'] ?> 
       <?= $url[1] === $topic['topic'] ? 'selected_theme' : '' ?>">
         <p><?= $topic['topic'] ?></p>
      </a>
   <?php endforeach ?>

   <?php if (!Tools::isConnected()) : ?>

      <a href="<?= URL ?>connection" class="btnTheme all_themes connection 
      <?= $url[0] === 'connection' ? 'selected_theme' : '';
      ?>
   ">
         <p>Connexion</p>
      </a>



   <?php else : ?>

      <div class="profilLogOut">

         <a href="<?= URL ?>account/profile"><img src="<?= URL . "public/assets/images/avatars/" . $_SESSION['profile']['avatar'] ?>" class="avatar_menu"></a>

         <a href="<?= URL ?>account/logout"><i class="fa-solid fa-right-from-bracket"></i></a>

      </div>
   <?php endif ?>

</div>