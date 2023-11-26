<?php

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
    public function connectionPage()
    {
        $data_page = [
            "page_description" => "Page de connexion",
            "page_title" => "Page de connexion",
            "view" => "views/Visitor/connectionPage.view.php",
            "template" => "views/templates/template.php",
        ];
        $this->functions->generatePage($data_page);
    }
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

    public function countSlider($dossier_slider)
    {
        $files = glob($dossier_slider . "/*");
        $numFiles = count($files);
        return $numFiles;
    }
    public function postPage($id_article)
    {

        $infosArticle = $this->visitorArticlesManager->getInfosPost($id_article);
        $images = $this->visitorArticlesManager->getImagesById($id_article);
        $textes = $this->visitorArticlesManager->getTextesById($id_article);
        $themes = $this->visitorArticlesManager->getAllTopics();
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
            "view" => "views/templates/template_post.view.php",
            "template" => "views/templates/template.php",
            // "js" => ['administration.js'],
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

    public function topicPage($topic)
    {
        $topicPage = $this->visitorArticlesManager->chosenTopic($topic);
        $postsFromTopic =$this->visitorArticlesManager-> postsFromTopic($topic);

        // Tools::showArray($topicPage);
        // Tools::showArray($postsFromTopic);

        $data_page = [
            "meta_description" => "Partage d'expérience : ... ",
            "page_title" => "repaire d'un dev !",
            "view" => "views/Visitor/topicPage.view.php",
            "template" => "views/templates/template.php",
            "js" => ['animation_grille.js'],
            "topicPage" => $topicPage,
            "postsFromTopic" => $postsFromTopic,
        ];
        $this->functions->generatePage($data_page);
    }
}
