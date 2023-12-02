<?php

switch ($url[1]) {
        // Page d'écriture d'un article
    case "write_card_article":
        $editorController->writeCardArticle();
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
