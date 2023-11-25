<!-- 
$themes
$infosArticle
$images
$textes
 -->

<!-- 1 video centrale -->


<article class="container templateArticle2">

 


    <h1 class="titre_article"><?= $textes[0]['titre'] ?></h1>

    <section class="part part1">

        <p><?= $textes[0]['texte'] ?></p>

        <div class="iframeVideo">
            <iframe width="560" height="315" src="<?= $video['lien_video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <a href="<?= $video['lien_video'] ?>">Lien de la video</a>


    </section>

    <?php if (isset($textes[1]['titre']) && $textes[1]['titre'] !== '') : ?>
        <h2 class="titre_article"><?= $textes[1]['titre'] ?></h2>
    <?php endif ?>

    <section class="part part2">
        <p><?= $textes[1]['texte'] ?></p>
    </section>


</article>

<br><br>