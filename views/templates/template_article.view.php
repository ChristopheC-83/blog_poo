<article class="container">


    <?php if (isset($textes[0]['titre'])) : ?>


        <?php require_once("./views/templates/" . $templateArticle . ".view.php") ?>

    <?php else : ?>

        <h2>L'article est en cours de rédaction !</h2>
        <h3>Repassez plus tard 😉</h3>

    <?php endif ?>

    <?php if ($templateArticle === "template_slider") : ?>
        <script src="<?=URL?>public/javascript/slider.js"></script>
    <?php endif ?>
</article>