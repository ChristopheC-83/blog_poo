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

    public function validationCardPostDB($title, $pitch, $theme, $url)
    {

        $req = "INSERT INTO articles (titre, pitch, theme, url) VALUES (:titre, :pitch, :theme, :url)";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindParam(":titre", $title, PDO::PARAM_STR);
        $stmt->bindParam(":pitch", $pitch, PDO::PARAM_STR);
        $stmt->bindParam(":theme", $theme, PDO::PARAM_STR);
        // $stmt->bindParam(":templateArticle", $templateArticle, PDO::PARAM_STR);
        $stmt->bindParam(":url", $url, PDO::PARAM_STR);
        $stmt->execute();
        $isCreate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isCreate;
    }
    public function validationTextPostDB($id_article, $num_article, $titre, $texte)
    {
        $req = 'INSERT INTO textes 
        (id_article, num_article, titre, texte) 
        values (:id_article, :num_article, :titre, :texte)
        ';
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id_article", $id_article, PDO::PARAM_STR);
        $stmt->bindValue(":num_article", $num_article, PDO::PARAM_STR);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":texte", $texte, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
        return $texte;
    }

    public function updateTemplatePostDB($id_article, $templateArticle)
    {
        $req = "UPDATE posts SET templateArticle = :templateArticle WHERE id_article = :id_article";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindParam(":id_article", $id_article, PDO::PARAM_INT);
        $stmt->bindParam(":templateArticle", $templateArticle, PDO::PARAM_STR);
        $stmt->execute();
        $isUpdate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isUpdate;
    }
}
