<?php


require_once("./models/MainManager.model.php");

class VisitorArticlesManager extends MainManager
{
    public function getAllInfos()
    {
        $req = "SELECT * FROM articles ORDER BY id_article desc";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
}