<?php


require_once("./models/MainManager.model.php");

class VisitorArticlesManager extends MainManager
{
    public function getInfosAllPosts()
    {
        $req = "SELECT * FROM posts ORDER BY id_article desc";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
    public function getInfosPost($id_article)
    {
        $req = "SELECT * FROM posts WHERE id_article = :id_article";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $stmt->execute();
        $infos = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
   
}