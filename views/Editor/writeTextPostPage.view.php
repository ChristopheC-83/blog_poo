<div class="container new_post new_text_post">
    <h1>Nouveau Post</h1>
    <h3 class="text-center ">Ecrivons le texte</h3>

    <?= Tools::showArray($postSelected) ?>


    <form action="<?= URL ?>editor/write_text_post" method="POST" class="containerForm" id="containerNewPostCard">
        <div class="entryForm">
            <label for="selectPost">Pour quel article ?</label>
            <select name="selectPost" id="selectPost">
                <?php foreach ($posts as $post) : ?>
                    <option value="<?= $post['id_article']  ?>" <?= $post['id_article'] === $postSelected['id_article'] ? 'selected' : '' ?>><?= $post['id_article']  ?> / <?= $post['titre']  ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </form>
    <div class="containerForm" style="margin : 20px 0">
        <div class="entryForm">
            <p class="infos_post"><b>Topic : </b><?= $postSelected['topic'] ?></p>
            <p class="infos_post"><b>Pitch Carte : </b><?= $postSelected['pitch'] ?></p>
            <p class="infos_post"><b>Template : </b><?= $postSelected['templateArticle'] ?></p>
        </div>
    </div>
    <form method="post"  action ="<?= URL ?>editor/validation_text_post" class="containerForm">
    <input type="hidden" name="id_article" value="<?= $postSelected['id_article'] ?>" >
        <div class="entryForm">
            <input type="text" class="form-control inputTextForm" id="titre1" name="titre1" placeholder="Titre 1">
        </div>
        <textarea class="area_text mytextarea" style="width:90%" name="texte1"></textarea>
        <div class="entryForm">
            <input type="text" class="form-control inputTextForm" id="titre2" name="titre2" placeholder="Titre 2">
        </div>
        <textarea class="area_text mytextarea" style="width:90%" name="texte2"></textarea>
        <div class="entryForm ">
            <button type="submit">
                <p>Je valide les textes </p>
            </button>
        </div>
    </form>
</div>

Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, ab! Nisi placeat adipisci obcaecati asperiores?