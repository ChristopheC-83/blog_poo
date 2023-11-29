<?php


require_once("./models/User/User.model.php");

class EditorManager extends UserManager
{
    public function  getAllTemplates(){
        $req = "SELECT * FROM templates";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $templates = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $templates;
    
    }

    public function validationCardPostDB($title, $pitch, $theme, $templateArticle, $url){
    
        $req = "INSERT INTO articles (titre, pitch, theme, templateArticle, url) VALUES (:titre, :pitch, :theme, :templateArticle, :url)";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindParam (":titre", $title, PDO::PARAM_STR);
        $stmt->bindParam (":pitch", $pitch, PDO::PARAM_STR);
        $stmt->bindParam (":theme", $theme, PDO::PARAM_STR);
        $stmt->bindParam (":templateArticle", $templateArticle, PDO::PARAM_STR);
        $stmt->bindParam (":url", $url, PDO::PARAM_STR);
        $stmt->execute();
        $isCreate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isCreate;

    }
}
