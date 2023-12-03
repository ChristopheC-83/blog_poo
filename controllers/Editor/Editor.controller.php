<?php

// Classe des possibilités pour un utilisateur connecté en tant qu'éditeur

require_once("./controllers/Functions.controller.php");
require_once("./models/Editor/Editor.model.php");
require_once("./models/Visitor/VisitorArticles.model.php");

class EditorController extends MainController
{
    public $functions;
    public $editorManager;
    public function __construct()
    {
        $this->functions = new Functions();
        $this->editorManager = new EditorManager();
    }
    // ecrire un nouvel article
    public function createCardArticle()           // A modifier !
    {

        $themes = $this->editorManager->getAllThemes();

        $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "js" => ['new_article.js'],
            "themes" => $themes,
            "view" => "./views/Editor/createCardArticlePage.view.php",
            "template" => "./views/templates/template.php",
        ];
        $this->functions->generatePage($data_page);
    }

  



    //  modifier un article ssi écrit par cet editeur
    public function modifyArticle()
    {
        echo "je modifie un article";
    }
    //  rendre le article invisible, c'est un admin qui le supprimera
    public function deleteArticle()
    {
        echo "je supprime un article";
    }
}
