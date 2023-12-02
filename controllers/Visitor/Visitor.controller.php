<?php

// Classe des pages/fonctions propres à l'utilisateur connecté (ou en cours de connection/inscription) 

require_once("./controllers/Main.controller.php");
require_once("./models/Visitor/Visitor.model.php");
require_once("./models/Visitor/VisitorArticles.model.php");

class VisitorController extends MainController
{
    public $visitorManager;
    public $functions;
    public $visitorArticlesManager;
    public function __construct()
    {
        $this->functions = new Functions();
        $this->visitorManager = new VisitorManager();
        $this->visitorArticlesManager = new VisitorArticlesManager();
    }

    // connexion
    public function connectionPage()
    {
        $data_page = [
            "page_description" => "Page de connexion",
            "page_title" => "Page de connexion",
            "jsm" => ['loader.js'],
            "view" => "views/Visitor/connectionPage.view.php",
            "template" => "views/templates/template.php",
        ];
        $this->functions->generatePage($data_page);
    }
    // création compte
    public function registrationPage()
    {
        $data_page = [
            "page_description" => "Page de création de compte",
            "page_title" => "Page de création de compte",
            "jsm" => ['loader.js'],
            "view" => "views/Visitor/registrationPage.view.php",
            "template" => "views/templates/template.php",
        ];
        $this->functions->generatePage($data_page);
    }

    // récupère les slide pour un slider dans un article
    public function countSlider($dossier_slider)
    {
        $files = glob($dossier_slider . "/*");
        $numFiles = count($files);
        return $numFiles;
    }
    // creation d'un page avec un article
    public function articlePage($id_article)
    {
        $infosArticle = $this->visitorArticlesManager->getInfosarticle($id_article);
        $images = $this->visitorArticlesManager->getImagesById($id_article);
        $textes = $this->visitorArticlesManager->getTextesById($id_article);
        $themes = $this->visitorArticlesManager->getAllThemes();
        $meta = $infosArticle['titre'];
        $templateArticle = $infosArticle['templateArticle'];
        $slider = $this->visitorArticlesManager->getSlider($id_article);
        $video = $this->visitorArticlesManager->getVideo($id_article);
        $numFiles = 0;
        $dossier_slider = "";
        if ($slider && isset($slider['dossier'])) {
            $dossier_slider = sliderPath . $slider['dossier'];
            $numFiles = $this->countSlider($dossier_slider);
        }
        $data_page = [
            "meta_description" => "Partage d'expérience : $meta ",
            "page_title" => "repaire d'un dev !",
            "view" => "views/templates/template_article.view.php",
            "template" => "views/templates/template.php",
            "themes" => $themes,
            "infosArticle" => $infosArticle,
            "images" => $images,
            "textes" => $textes,
            "slider" => $slider,
            "video" => $video,
            "numFiles" => $numFiles,
            "dossier_slider" => $dossier_slider,
            "templateArticle" => $templateArticle,
        ];
        $this->functions->generatePage($data_page);
    }
    //  page avec les article pour un theme choisi
    public function themePage($theme)
    {
        $themePage = $this->visitorArticlesManager->chosenTheme($theme);
        $articlesFromTheme = $this->visitorArticlesManager->articlesFromTheme($theme);

        $data_page = [
            "meta_description" => "Partage d'expérience : ... ",
            "page_title" => "repaire d'un dev !",
            "view" => "views/Visitor/themePage.view.php",
            "template" => "views/templates/template.php",
            "js" => ['home_page_animated_grid.js'],
            "themePage" => $themePage,
            "articlesFromTheme" => $articlesFromTheme,
        ];
        $this->functions->generatePage($data_page);
    }
}
