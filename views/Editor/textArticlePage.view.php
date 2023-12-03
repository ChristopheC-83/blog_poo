<div class="container new_article">
    <h1>Travaillons nos articles</h1>

    <form action="<?= URL ?>editor/create_text_article/" method="POST" class="containerForm" id="changeArticle">
        <div class="entryForm">
            <h3 class="text-center">Créons ou modifions nos articles</h3>
            <label for="id_article">Article à modifier ou compléter :</label>
            <select name="chooseArticle" id="article">
                <?php foreach ($articles as $article) : ?>
                    <option value="<?= $article['id_article']  ?>" <?= $article['id_article'] === $chooseArticle['id_article'] ?  'selected' : '' ?>>
                        <?= $article['id_article']  ?> / <?= $article['title']  ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <p><b>Theme :</b><?= $chooseArticle['theme'] ?></p>
            <p><b>Pitch :</b><?= $chooseArticle['pitch'] ?></p>
            <p><b>URL :</b><?= $chooseArticle['url'] ?></p>
        </div>
    </form>




</div>

