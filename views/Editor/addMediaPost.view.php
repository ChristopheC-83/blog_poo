<div class="container">

    <h1>Ajout Media</h1>

    <!-- <?= Tools::showArray($postSelected) ?> -->

    <div class="containerForm" style="margin : 20px 0">
        <h2>Informations articles :</h2><br>
        <div class="entryForm">
            <p class="infos_post"><b>Article : </b><?= $postSelected['id_article']  ?> / <?= $postSelected['titre']  ?></p>
            <p class="infos_post"><b>theme : </b><?= $postSelected['theme'] ?></p>
            <p class="infos_post"><b>Pitch Carte : </b><?= $postSelected['pitch'] ?></p>
            <p class="infos_post"><b>URL : </b><?= $postSelected['url'] ?></p>
        </div>
    </div>
    <form action="<?= URL ?>editor/validation_template_post" method="POST" class="containerForm" id="containerNewTemplate">
        <input type="hidden" name="id_article" value=<?= $postSelected['id_article'] ?>>
        <div class="entryForm">
            <h3 class="text-center">Choisis le template de l'article :</h3><br>
            <select name="templatePost" id="selectTemplate">
                <?php if (empty($postSelected['templateArticle'])) : ?>
                    <option value=""></option>
                <?php endif ?>
                <?php foreach ($templates as $temp) : ?>
                    <option value="<?= $temp['template']  ?>"><?= $temp['content']  ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
    </form>
    <div class="containerForm
                <?= empty($postSelected['templateArticle'])  ? 'dnone' : '' ?>
    " style="margin : 20px 0">
        <h2>coucou <?= $postSelected['titre'] ?> / <?= $postSelected['templateArticle'] ?></h2><br>
        <?php include_once("../Editor/components/add_1_picture.php") ?>


    </div>

</div>