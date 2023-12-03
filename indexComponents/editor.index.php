<?php

switch ($url[1]) {
        // Page de création d'un article
    case "create_card_article":
        $editorController->createCardArticle();
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
