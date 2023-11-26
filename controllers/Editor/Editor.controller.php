<?php

// Classe des possibilités pour un utilisateur connecté en tant qu'éditeur

require_once("./controllers/Functions.controller.php");
require_once("./models/Editor/Editor.model.php");

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
    public function writePost(){
        echo "j'écris un article";
    }
    //  modifier un article ssi écrit par cet editeur
    public function modifyPost(){
        echo "je modifie un article";
    }
    //  rendre le post invisible, c'est un admin qui le supprimera
    public function deletePost(){
        echo "je supprime un article";
    }
}
