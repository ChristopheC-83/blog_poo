<a href="<?= URL ?>article/
<?= $article['theme'] ?>/<?= $article['id_article'] ?>/<?= $article['url'] ?>/" class="link_card ">


    <div class="articleCard <?= $article['theme'] ?>_card">
        <p class="titleCard bold">
            <?= $article['title'] ?>


        </p>
        <p class="pitchCard">
            <?= $article['pitch'] ?>
        </p>
    </div>
</a>