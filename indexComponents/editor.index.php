<?php

switch ($url[1]) {
        // Page d'écriture d'un article
    case "write_card_post":
        $editorController->writeCardPost();
        break;

    case "validation_card_post":
        Tools::showArray($_POST);

        $title = Tools::secureHTML($_POST['title']);
        $pitch = Tools::secureHTML($_POST['pitch']);
        $topic = Tools::secureHTML($_POST['topic']);
        $templateArticle = Tools::secureHTML($_POST['templateArticle']);
        $url = Tools::secureHTML($_POST['url']);

        if (
            empty($title) ||
            empty($pitch) ||
            empty($url)
        ) {
            Tools::alertMessage("Il faut renseigner tous les champs", "red");
            header('location:' . URL . "editor/write_post");
        } else {
            $editorController->validationCardPost($title, $pitch, $topic, $templateArticle, $url);
        }
        break;
    case "write_text_post":
        $maxId = $visitorArticlesManager->getMaxIdPost();
        $maxId = $maxId['MAX(id_article)'];
        if (!isset($_POST['selectPost'])) {
            $editorController->writeTextPost($maxId);
        } else {
            $editorController->writeTextPost($_POST['selectPost']);
        }

        break;
    case "validation_text_post":
        // Tools::showArray($_POST);
        $id_article = Tools::secureHTML($_POST['id_article']);
        $titre1 = Tools::secureHTML($_POST['titre1']);
        $texte1 = Tools::secureHTML($_POST['texte1']);
        $titre2 = Tools::secureHTML($_POST['titre2']);
        $texte2 = Tools::secureHTML($_POST['texte2']);

        if (
            empty($titre1)
        ) {
            Tools::alertMessage("Il faut renseigner au moins le titre 1", "red");
            header('location:' . URL . "editor/write_text_post");
        } else {
            $editorController->validationTextPost($id_article, $titre1, $texte1, $titre2, $texte2);
        }




        break;



    case "add_media_post":

        $maxId = $visitorArticlesManager->getMaxIdPost();
        $maxId = $maxId['MAX(id_article)'];
        if (!isset($_POST['selectPost'])) {
            $editorController->addMediaPost($maxId);
        } else {
            $editorController->addMediaPost($_POST['selectPost']);
        }


        break;
    case "modify_post":
        $editorController->modifyPost();
        break;
    case "delete_post":
        $editorController->deletePost();
        break;

    default:
        throw new Exception("La page demandée n'existe pas...");
}
