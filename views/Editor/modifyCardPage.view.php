<div class="container new_article">
    <h1>Modification de la carte de l'article.</h1>
    <form action="<?= URL ?>editor/modify_card_article/" method="POST" class="containerForm" id="changeArticle">
        <div class="entryForm">
            <label for="id_article">ID Article</label>
            <input type="text" name="id_article" id="id_article" value=<?= $article['id_article'] ?> readonly >
        </div>
        <div class="entryForm">
            <label for="title">Titre Carte</label>
            <input type="text" name="title" id="title" value='<?=$article['title'] ?>'>
        </div>
        <div class="entryForm">
            <label for="pitch">Pitch Carte</label>
            <input type="text" name="pitch" id="pitch" value='<?= $article['pitch'] ?>'>
        </div>
        <div class="entryForm">
            <label for="theme">theme</label>
            <select name="theme" id="theme">
                <?php foreach ($themes as $theme) : ?>
                    <option value="<?= $theme['theme']  ?>" <?= $theme['theme'] === $article['theme'] ? 'selected' : ''  ?>>
                        <?= $theme['theme']  ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="entryForm">
            <label for="url">URL article (sans espace ni caractère spécial #éèà?!...)</label>
            <input type="text" name="url" id="url" value='<?= $article['url'] ?>' class="url">
        </div>
        <h4 class="badUrl noVisibility">Seulement des lettres minuscules et "_".</h4>

        <div class="entryForm ">
            <button type="submit" class="disabled" id="btnNewArticleCard">
                <p>Je modifie la carte de l'article <?= $article['id_article']  ?> </p>
            </button>
        </div>
        <div class="entryForm ">
            <a href="<?=URL?>editor/create_text_article/<?= $article['id_article']?>">
                <p>Annuler</p>
            </a>
        </div>
    </form>




</div>