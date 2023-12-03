<div class="container new_article">
    <h1>Ajoutons les textes</h1>

    <form class="containerForm" action="<?= URL ?>editor/create_text_article/" method="POST" id="chooseArticleForm">
    <div class="entryForm">
        <select name="chooseArticle" id="chooseArticle">
            <?php foreach ($articles as $post) : ?>
                <option
                 value="<?= $post['id_article'] ?>"
                 <?= $post['id_article'] === $article['id_article'] ? 'selected':'' ?>
                 >
                    <?= $post['id_article']?> => <?= $post['title'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <p><b>Titre article : </b><?=$article['title'] ?></p>
        <p><b>Pitch : </b><?=$article['pitch'] ?></p>
        <p><b>Theme : </b><?=$article['theme'] ?></p>
        <p><b>URL : </b><?=$article['url'] ?></p>
    </div>
</form>







    </form>

</div>