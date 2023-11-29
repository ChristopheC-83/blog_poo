<div class="container new_post new_text_post">
    <h1>Nouveau Post</h1>
    <h3 class="text-center ">Ecrivons le texte</h3>

    <?= Tools::showArray($postSelected) ?>





    <form action="<?= URL ?>editor/write_text_post" method="POST" class="containerForm" id="containerNewPostCard">
        <div class="entryForm">
            <label for="selectPost">Pour quel article ?</label>
            <select name="selectPost" id="selectPost">
                <?php foreach ($posts as $post) : ?>
                    <option value="<?= $post['id_article']  ?>"
                    <?= $post['id_article'] === $postSelected['id_article'] ? 'selected' : '' ?>
                    ><?= $post['id_article']  ?> / <?= $post['titre']  ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </form>

  

    <!-- <form method="post">
        <textarea id="mytextarea">Hello, World!</textarea>
    </form> -->
</div>