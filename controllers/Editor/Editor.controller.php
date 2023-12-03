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
    // ecrire un nouvel article, juste la carte dans un premier temps
    public function createCardArticle()
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



    // validation de la création de la carte article

    public function validationCreateCardArticle($title, $pitch, $theme, $url)
    {
        $id_article = $this->editorManager->getMaxIdarticle();
        $id_article = isset($id_article['MAX(id_article)']) ? $id_article['MAX(id_article)'] + 1 : 1;
     
        if (
            $this->editorManager->createCardArticleDB($title, $pitch, $theme, $url)
        ) {
            Tools::alertMessage("Article créé avec succés.", "green");
            header('Location: ' . URL . 'editor/create_text_article/' . $id_article);
        } else {
            Tools::alertMessage("Echec de la création de l'article.", "red");
            header('Location: ' . URL . 'editor/create_card_article');
        }
    }
    //  on ajoute le texte à l'article
    public function createTextArticle($id_article)
    {
        $articles = $this->editorManager->getInfosAllArticles();
        $chooseArticle = $this->editorManager->getInfosArticle($id_article);
        $themes = $this->editorManager->getAllThemes();
        $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "js" => ['modify_article.js'],
            "themes" => $themes,
            "articles" => $articles,
            "chooseArticle" => $chooseArticle,
            "view" => "./views/Editor/textArticlePage.view.php",
            "template" => "./views/templates/template.php",
        ];
        $this->functions->generatePage($data_page);
    }
    //  on modifie la carte de l'article
    public function modifyCard($id_article)
    {

        $article = $this->editorManager->getInfosArticle($id_article);
       
        $themes = $this->editorManager->getAllThemes();
        $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "js" => ['new_article.js'],
            "themes" => $themes,
            "article" => $article,
            "view" => "./views/Editor/modifyCardPage.view.php",
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
