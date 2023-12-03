<?php

switch ($url[1]) {
        // Page de création d'un article
    case "create_card_article":
        $editorController->createCardArticle();
        break;

    case "validation_creation_card_article":
        // Tools::showArray($_POST);
        $title = Tools::secureHTML($_POST['title']);
        $pitch = Tools::secureHTML($_POST['pitch']);
        $theme = Tools::secureHTML($_POST['theme']);
        $url = Tools::secureHTML($_POST['url']);
        $editorController->validationCreateCardArticle($title, $pitch, $theme, $url);
        break;



    case "create_text_article":
        $id_article = Tools::secureHTML($url[2]);
        $editorController->createTextArticle($id_article);
        break;



    case "modify_article":
        $editorController->modifyArticle();
        break;
    case "delete_article":
        $editorController->deleteArticle();
        break;

    default:
        throw new Exception("La page demandée n'existe pas...");
}
