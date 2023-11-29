<?php


require_once("./models/Visitor/VisitorArticles.model.php");

class EditorManager extends VisitorArticlesManager
{
    public function  getAllTemplates(){
        $req = "SELECT * FROM templates";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $templates = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $templates;
    
    }

    public function validationCardPostDB($title, $pitch, $topic, $templateArticle, $url){
    
        $req = "INSERT INTO posts (titre, pitch, topic, templateArticle, url) VALUES (:titre, :pitch, :topic, :templateArticle, :url)";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindParam (":titre", $title, PDO::PARAM_STR);
        $stmt->bindParam (":pitch", $pitch, PDO::PARAM_STR);
        $stmt->bindParam (":topic", $topic, PDO::PARAM_STR);
        $stmt->bindParam (":templateArticle", $templateArticle, PDO::PARAM_STR);
        $stmt->bindParam (":url", $url, PDO::PARAM_STR);
        $stmt->execute();
        $isCreate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isCreate;

    }
}
