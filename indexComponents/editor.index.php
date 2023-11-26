<?php 

switch ($url[1]) {
    // Page d'écriture d'un article
    case "write_post":
        $editorController->writePost();
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