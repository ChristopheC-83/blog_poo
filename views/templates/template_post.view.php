<article class="container">


    <?php if (isset($textes[0]['titre'])) : ?>


        <?php require_once("./views/templates/" . $infosArticle['templateArticle'] . ".view.php") ?>

    <?php else : ?>

        <h2>L'article est en cours de rédaction !</h2>
        <h3>Repassez plus tard 😉</h3>

    <?php endif ?>
</article>