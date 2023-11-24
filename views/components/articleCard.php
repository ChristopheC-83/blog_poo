

<a href="<?= URL ?>article/<?= $article['theme'] ?>/<?= $article['id_article'] ?>/<?= $article['url'] ?>/" class="link_card dnone">


    <div class="articleCard <?= $article['theme'] ?>_card">
        <p class="titleCard bold">
            <?= $article['titre'] ?>


        </p>
        <p class="pitchCard">
            <?= $article['pitch'] ?>
        </p>
    </div>
</a>