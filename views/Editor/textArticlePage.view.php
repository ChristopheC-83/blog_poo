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
            <p><b>Theme :</b><?= $chooseArticle['theme'] ?></p>
            <p><b>Pitch :</b><?= $chooseArticle['pitch'] ?></p>
            <p><b>URL :</b><?= $chooseArticle['url'] ?></p>
        </div>
        <div class="infoProfile">
            <div class="modifyPasswordPage">
                <a href="<?= URL ?>editor/modify_card/<?= $chooseArticle['id_article'] ?>">
                    <div class="btnModifyPasswordPage">
                        <p>Modifier la carte de l'article <?= $chooseArticle['id_article']?></p>
                    </div>
                </a>
            </div>
        </div>
    </form>
</div>
