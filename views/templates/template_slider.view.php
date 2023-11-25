<!-- 
$themes
$infosArticle
$images
$textes
 -->

<!-- un slider central -->


<article class="container templateArticle3">

 

    <h1 class="titre_article"><?= html_entity_decode($textes[0]['titre']) ?></h1>


    <section class="part part1">

        <p><?= html_entity_decode($textes[0]['texte']) ?></p>

        <div class="sliderArticle">

            <?php
            $directory = "public/assets/sliders/" . $slider['dossier'];
            $files = glob($directory . '/*'); // Récupère tous les fichiers et dossiers
            ?>

            <?php foreach ($files as $file) : ?>

                <img src="<?= slidersFolder . $slider['dossier'] . "/" . basename($file) ?>" alt="slider" class="imgSlider
            <?= pathinfo($file, PATHINFO_FILENAME) === "1" ? "imgSliderActive" : "" ?>
            ">

            <?php endforeach ?>

            <div class="tiretsSlider">
                <?php for ($i = 1; $i <= $numFiles; $i++) :  ?>
                    <div class="tiretSlider <?= $i === 1 ? "tiretSliderActive" : "" ?>"></div>
                <?php endfor ?>
            </div>
            <div class="flecheSliderBox ">
                <i class="fa-solid fa-circle-arrow-left flecheSlider flecheSliderGauche"></i>
                <i class="fa-solid fa-circle-arrow-right flecheSlider flecheSliderDroite"></i>
            </div>
        </div>


    </section>

    <?php if (isset($textes[1]['titre']) && $textes[1]['titre'] !== '') : ?>
        <h2 class="titre_article"><?= html_entity_decode($textes[1]['titre']) ?></h2>
    <?php endif ?>

    <section class="part part2">
        <p><?= html_entity_decode($textes[1]['texte']) ?></p>
    </section>


</article>

<script src="<?= URL ?>public/javascript/slider.js"></script>