<div class="container new_article">
    <h1>Travaillons nos articles</h1>

    <form action="<?= URL ?>editor/create_text_article/" method="POST" class="containerForm" id="chooseArticleForm">
        <div class="entryForm">
            <h3 class="text-center">Créons ou modifions nos articles</h3>
            <label for="chooseArticle">Article à modifier ou compléter :</label>
            <select name="chooseArticle" id="chooseArticle">
                <?php foreach ($articles as $article) : ?>
                    <option value="<?= URL ?>editor/create_text_article/<?= $article['id_article']  ?>" <?= $article['id_article'] === $chooseArticle['id_article'] ?  'selected' : '' ?>>
                        <?= $article['id_article']  ?> / <?= $article['title']  ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <p><b>Theme : </b><?= $chooseArticle['theme'] ?></p>
            <p><b>Pitch : </b><?= $chooseArticle['pitch'] ?></p>
            <p><b>URL : </b><?= $chooseArticle['url'] ?></p>
        </div>
        <div class="infoProfile">
            <div class="modifyPasswordPage">
                <a href="<?= URL ?>editor/modify_card/<?= $chooseArticle['id_article'] ?>">
                    <div class="btnModifyPasswordPage">
                        <p>Modifier la carte de l'article <?= $chooseArticle['id_article'] ?></p>
                    </div>
                </a>
            </div>
        </div>
    </form>


    <form action="<?= URL ?>editor/validate_text_article" method="POST" class="containerForm" style="margin-top:30px">
        <input type="hidden" name="id_article" value="<?= $chooseArticle['id_article'] ?>">
        <h3 class="text-center">Notre texte</h3>
        <h4 class="text-center" style="margin-top:-10px">2 titres et 2 paragraphes</h4>

        <div class="entryForm">
            <label for="titre1">Titre 1</label>
            <input type="text" name="titre1" id="titre1" value="<?= !empty($chooseArticle['titre1']) ? $chooseArticle['titre1'] : '' ?>">
        </div>
        <div class="entryForm">
            <label for="texte1">Texte 1</label>
            <textarea id="mytextarea" name="texte1" style="width: clamp(250px, 50vw, 800px);margin: 0 auto;"><?= !empty($chooseArticle['texte1']) ? $chooseArticle['texte1'] : '' ?></textarea>
        </div>
        <div class="entryForm">
            <label for="titre2">Titre 2</label>
            <input type="text" name="titre2" id="titre2" value="<?= !empty($chooseArticle['titre2']) ? $chooseArticle['titre2'] : '' ?>">
        </div>
        <div class="entryForm">
            <label for="texte2">Texte 2</label>
            <textarea id="mytextarea2" name="texte2" style="width: clamp(250px, 50vw, 800px);margin: 0 auto;"><?= !empty($chooseArticle['texte2']) ? $chooseArticle['texte2'] : '' ?></textarea>
        </div>

        <div class="entryForm ">
            <button type="submit">
                <p>Je valide ces textes</p>
            </button>
        </div>
        <div class="entryForm ">
            <a href="<?=URL?>editor/create_text_article/<?= $chooseArticle['id_article']?>">
                <p>Annuler</p>
            </a>
        </div>

    </form>
</div>