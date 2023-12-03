<?php


require_once("./models/MainManager.model.php");

class VisitorArticlesManager extends MainManager
{
    public function getInfosAllArticles()
    {
        $req = "SELECT * FROM articles ORDER BY id_article desc";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
    public function getInfosArticle($id_article)
    {
        $req = "SELECT * FROM articles WHERE id_article = :id_article";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $stmt->execute();
        $infos = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
    public function getMaxIdarticle(){
        $req = "SELECT MAX(id_article) FROM articles";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $infos = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;  
    }
    public function chosenTheme($theme)
    {
        $req = "SELECT * FROM themes WHERE theme = :theme";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':theme', $theme, PDO::PARAM_STR);
        $stmt->execute();
        $infos = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
    public function articlesFromTheme($theme)
    {
        $req = "SELECT * FROM articles WHERE theme = :theme";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':theme', $theme, PDO::PARAM_STR);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
   
}