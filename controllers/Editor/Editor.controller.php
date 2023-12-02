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
    public function writeCardarticle()           // A modifier !
    {

        $themes = $this->editorManager->getAllThemes();
        $templateForms = $this->editorManager->getAllTemplates();
        // Tools::showArray($templates);
        // Tools::showArray($themes);

        $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "js" => ['new_article.js'],
            "themes" => $themes,
            "templateForms" => $templateForms,
            "view" => "./views/Editor/writeCardArticlePage.view.php",
            "template" => "./views/templates/template.php",
        ];
        $this->functions->generatePage($data_page);
    }

  



    //  modifier un article ssi écrit par cet editeur
    public function modifyarticle()
    {
        echo "je modifie un article";
    }
    //  rendre le article invisible, c'est un admin qui le supprimera
    public function deletearticle()
    {
        echo "je supprime un article";
    }
}
