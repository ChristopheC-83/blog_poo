<!-- 
$themes
$infosArticle
$images
$textes
 -->



 <article class="container templateArticle1">

<!-- <?php if (Tools::isConnected()) : ?>
    <form action="<?= URL ?>kikiAdmin/delete_article_template1" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_article" value="<?= $infosArticle['id_article']  ?>">
        <input type="hidden" name="fileToDelete1" value="public/assets/images/<?= $infosArticle['theme'] ?>/<?= $images[0]['url_img'] ?>">
        <input type="hidden" name="fileToDelete2" value="public/assets/images/<?= $infosArticle['theme'] ?>/<?= $images[1]['url_img'] ?>">
        <button class="btnDelete">1</button>
    </form>
<?php endif ?> -->



<h1 class="titre_article">
    <?= html_entity_decode($textes[0]['titre']) ?>

</h1>

<section class="part part1">
    <p><?= html_entity_decode($textes[0]['texte']) ?></p>
    <?php if (isset($images[0]['url_img']) && $images[0]['url_img'] !== '') : ?>

        <a href="<?= isset($images[0]['lien']) ? $images[0]['lien'] : '' ?>">
            <img src="<?= imgFolder ?><?= $infosArticle['topic'] ?>/<?= $images[0]['url_img'] ?>" alt="<?= $images[0]['alt_img'] ?>">
        </a>
    <?php endif ?>

</section>


<h2 class="titre_article"><?= html_entity_decode($textes[1]['titre']) ?></h2>


<section class="part part2">
    <?php if (isset($images[1]['url_img']) && $images[1]['url_img'] !== '') : ?>

        <a href="<?= isset($images[0]['lien']) ? $images[0]['lien'] : '' ?>">
            <img src="<?= imgFolder ?><?= $infosArticle['topic'] ?>/<?= $images[1]['url_img'] ?>" alt="<?= $images[1]['alt_img'] ?>"> </a>
    <?php endif ?>
    <p><?= html_entity_decode($textes[1]['texte']) ?></p>
</section>


</article>