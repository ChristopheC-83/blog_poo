<a href="<?= URL ?>article/
<?= $article['topic'] ?>/<?= $article['id_article'] ?>/<?= $article['url'] ?>/" class="link_card ">


    <div class="articleCard <?= $article['topic'] ?>_card">
        <p class="titleCard bold">
            <?= $article['titre'] ?>


        </p>
        <p class="pitchCard">
            <?= $article['pitch'] ?>
        </p>
    </div>
</a>