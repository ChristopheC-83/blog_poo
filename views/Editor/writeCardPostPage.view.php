<div class="container new_post">
    <h1>Nouveau Post</h1>
    <h3 class="text-center ">Commençons par créer la fiche</h3>



    <form action="<?= URL ?>editor/validation_card_post" method="POST" class="containerForm" id="containerNewPostCard">
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
        <!-- <div class="entryForm">
            <label for="templateArticle">Template</label>
            <select name="templateArticle" id="templateArticle">
                <?php foreach ($templateForms as $templateForm) : ?>
                    <option value="<?= $templateForm['template']  ?>"><?= $templateForm['template']  ?></option>
                <?php endforeach; ?>
            </select>
        </div> -->
        <div class="entryForm">
            <label for="url">URL post</label>
            <input type="text" name="url" id="url">
        </div>

        <div class="entryForm ">
            <button type="submit" class="disabled" id="btnNewPostCard">
                <p>Je crée la fiche </p>
            </button>
        </div>
        <div class="entryForm">
         
                <a href="<?= URL ?>account/profile">
                    <p>Annuler</p>
                </a>
           
        </div>


    </form>

    <!-- <form method="post">
        <textarea id="mytextarea">Hello, World!</textarea>
    </form> -->
</div>