<?php


require_once("./models/Visitor/VisitorArticles.model.php");

class EditorManager extends VisitorArticlesManager
{
    public function  getAllTemplates()
    {
        $req = "SELECT * FROM templates";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $templates = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $templates;
    }

    //  creation de la carte article
    public function createCardArticleDB($title, $pitch, $theme, $url)
    {
        $req = "INSERT INTO articles (title, pitch, theme, url) VALUES (:title, :pitch, :theme, :url)";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":pitch", $pitch, PDO::PARAM_STR);
        $stmt->bindParam(":theme", $theme, PDO::PARAM_STR);
        $stmt->bindParam(":url", $url, PDO::PARAM_STR);
        $stmt->execute();
        $isCreate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isCreate;
    }


    public function updateTemplateArticleDB($id_article, $templateArticle)
    {
        $req = "UPDATE articles SET templateArticle = :templateArticle WHERE id_article = :id_article";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindParam(":id_article", $id_article, PDO::PARAM_INT);
        $stmt->bindParam(":templateArticle", $templateArticle, PDO::PARAM_STR);
        $stmt->execute();
        $isUpdate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isUpdate;
    }

    public function modifyCardArticleDB($id_article, $title, $pitch, $theme, $url){
        $req = "UPDATE articles SET title = :title, pitch = :pitch, theme = :theme, url = :url WHERE id_article = :id_article";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindParam(":id_article", $id_article, PDO::PARAM_INT);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->bindParam(":pitch", $pitch, PDO::PARAM_STR);
        $stmt->bindParam(":theme", $theme, PDO::PARAM_STR);
        $stmt->bindParam(":url", $url, PDO::PARAM_STR);
        $stmt->execute();
        $isUpdate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isUpdate;    
    }

    public function modifyTextArticleDB($id_article, $titre1, $texte1, $titre2, $texte2){
        $req = "UPDATE articles SET titre1 = :titre1, texte1 = :texte1, titre2 = :titre2, texte2 = :texte2 WHERE id_article = :id_article";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindParam(":id_article", $id_article, PDO::PARAM_INT);
        $stmt->bindParam(":titre1", $titre1, PDO::PARAM_STR);
        $stmt->bindParam(":texte1", $texte1, PDO::PARAM_STR);
        $stmt->bindParam(":titre2", $titre2, PDO::PARAM_STR);
        $stmt->bindParam(":texte2", $texte2, PDO::PARAM_STR);
        $stmt->execute();
        $isUpdate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isUpdate; 
    
    
    }
}
