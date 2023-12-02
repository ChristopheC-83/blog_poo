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
    public function writeCardPost()
    {

        $themes = $this->editorManager->getAllThemes();
        $templateForms = $this->editorManager->getAllTemplates();
        // Tools::showArray($templates);
        // Tools::showArray($themes);

        $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "js" => ['new_post.js'],
            "themes" => $themes,
            "templateForms" => $templateForms,
            "view" => "./views/Editor/writeCardPostPage.view.php",
            "template" => "./views/templates/template.php",
        ];
        $this->functions->generatePage($data_page);
    }

    public function validationCardPost($title, $pitch, $theme, $url)
    {
        if (
            $this->editorManager->validationCardPostDB($title, $pitch, $theme, $url)
        ) {
            Tools::alertMessage("Votre article a bien été enregistré", "green");
            header('location:' . URL . "editor/write_text_post");
        } else {
            Tools::alertMessage("Une erreur est survenue, veuillez réessayer", "red");
            header('location:' . URL . "editor/write_card_post");
        }
    }

    public function writeTextPost($id)
    {

        $posts = $this->editorManager->getInfosAllPosts();
        $postSelected = $this->editorManager->getInfosPost($id);
        $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "js" => ['https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js', 'new_post.js'],
            "posts" => $posts,
            "postSelected" => $postSelected,
            "view" => "./views/Editor/writeTextPostPage.view.php",
            "template" => "./views/templates/templateWritePage.php",
        ];
        $this->functions->generatePage($data_page);
    }

    public function validationTextPost($id_article, $titre1, $texte1, $titre2, $texte2)
    {
        if ($this->editorManager->validationTextPostDB($id_article, 1, $titre1, $texte1)) {
            $this->editorManager->validationTextPostDB($id_article, 2, $titre2, $texte2);
            Tools::alertMessage("Votre article a bien été enregistré", "green");
            header('location:' . URL . "editor/add_media_post");
        } else {
            Tools::alertMessage("Une erreur est survenue, veuillez réessayer", "red");
            header('location:' . URL . "editor/write_text_post");
        }
    }

    public function addMediaPost($id)
    {
        $templates = $this->editorManager->getAllTemplates();
        $posts = $this->editorManager->getInfosAllPosts();
        $postSelected = $this->editorManager->getInfosPost($id);
        $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "js" => ['new_post.js'],
            "posts" => $posts,
            "templates" => $templates,
            "postSelected" => $postSelected,
            "view" => "./views/Editor/addMediaPost.view.php",
            "template" => "./views/templates/template.php",
        ];
        $this->functions->generatePage($data_page);
    }


    public function validationTemplatePost($id_article, $templatePost){
        {
            if ($this->editorManager->updateTemplatePostDB($id_article,$templatePost)) {
                Tools::alertMessage("Votre template a bien été choisi.", "green");
                header('location:' . URL . "editor/add_media_post");
            } else {
                Tools::alertMessage("Une erreur est survenue, veuillez réessayer", "red");
                header('location:' . URL . "editor/add_media_post");
            }
        }
        
    }









    //  modifier un article ssi écrit par cet editeur
    public function modifyPost()
    {
        echo "je modifie un article";
    }
    //  rendre le post invisible, c'est un admin qui le supprimera
    public function deletePost()
    {
        echo "je supprime un article";
    }
}
