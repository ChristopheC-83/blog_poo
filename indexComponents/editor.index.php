<?php

switch ($url[1]) {
        // Page d'écriture d'un article
    case "write_card_post":
        $editorController->writeCardPost();
        break;
    case "validation_card_post":
        // Tools::showArray($_POST);

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
            // $editorController->writeTextPost();
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
