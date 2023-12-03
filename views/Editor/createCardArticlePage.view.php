<div class="container new_article">
    <h1>Nouvel Article</h1>
    <h3 class="text-center ">Commençons par créer la fiche</h3>
    <h3 class="text-center ">Des modifications pourront être faites ultérieurement.</h3>



    <form action="<?= URL ?>editor/validation_creation_card_article" method="GET" class="containerForm" id="containerNewArticleCard">
        <div class="entryForm">
            <label for="title">Titre Carte</label>
            <input type="text" name="title" id="title">
        </div>
        <div class="entryForm">
            <label for="pitch">Pitch Carte</label>
            <input type="text" name="pitch" id="pitch">
        </div>
        <div class="entryForm">
            <label for="theme">theme</label>
            <select name="theme" id="theme">
                <?php foreach ($themes as $theme) : ?>
                    <option value="<?= $theme['theme']  ?>"><?= $theme['theme']  ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="entryForm">
            <label for="url">URL article (sans espace ni caractère spécial #éèà?!...)</label>
            <input type="text" name="url" id="url">
        </div>
        <h4 class="badUrl noVisibility">Seulement des lettres minuscules et "_".</h4>

        <div class="entryForm ">
            <button type="submit" class="disabled" id="btnNewArticleCard">
                <p>Je crée la fiche </p>
            </button>
        </div>
        <div class="entryForm">
         
                <a href="<?= URL ?>account/profile">
                    <p>Annuler</p>
                </a>
           
        </div>


    </form>

</div>