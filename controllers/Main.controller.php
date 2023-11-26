<?php

//  cette classe permet l'affichage des 2 pages de base
//  accueil et erreur

require_once("./controllers/Images.controller.php");
require_once("./controllers/Tools.controller.php");
require_once("./models/Visitor/VisitorArticles.model.php");


class MainController extends ImageController
{

    public $functions;
    public $visitorArticlesManager;
    public function __construct()
    {
        $this->functions = new Functions();
        $this->visitorArticlesManager = new VisitorArticlesManager();
    }

    public function homePage()
    {
        // affiche tous les articles
        $infosArticles = $this->visitorArticlesManager->getInfosAllPosts();

        $data_page = [
            "page_description" => "Description accueil",
            "page_title" => "titre accueil",
            "infosArticles" => $infosArticles,
            'js' => ['home_page_animated_grid.js'],
            "view" => "views/Visitor/homePage.view.php",
            "template" => "views/templates/template.php",

        ];
        $this->functions->generatePage($data_page);
    }

    public function errorPage($msg)
    {

        $data_page = [
            "page_description" => "Erreur !",
            "page_title" => "Erreur !",
            "view" => "views/Visitor/errorPage.view.php",
            "template" => "views/templates/template.php",
            "msg" => $msg,
        ];
        $this->functions->generatePage($data_page);
    }
}
