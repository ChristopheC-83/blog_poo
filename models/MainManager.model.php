<?php
// les modelsManager permettent la récupéretion, le traitement des données
// ils gèrent aussi la partie logique du site.
// Il est issu de ImagesManager (issu de Model), car ImagesManager utiles partout !

require_once("./models/Images.model.php");
class MainManager extends ImagesManager
{
    public function getThemes() // remplacer par topics à terme
    {
        $req = "SELECT * FROM themes ORDER BY id_theme asc";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
    public function getAllTopics()
    {
        $req = "SELECT * FROM topics ORDER BY id_topic asc";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
    // public function getUsers()
    // {
    //     $req = "SELECT * FROM users ";
    //     $stmt = $this->getBDD()->prepare($req);
    //     $stmt->execute();
    //     $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     $stmt->closeCursor();
    //     return $infos;
    // }
    public function getImagesById($id_article)
    {
        $req = "SELECT * FROM images 
        WHERE id_article = :id_article
        ";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
    function getTextesById($id_article)
    {
        $req = "SELECT * FROM textes 
        WHERE id_article = :id_article
        ";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
    public function getSlider($id_article)
    {
        $req = "SELECT * FROM slider 
            WHERE id_article = :id_article
            ";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $stmt->execute();
        $infos = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }

    public function getVideo($id_article)
    {
        $req = "SELECT * FROM videos 
            WHERE id_article = :id_article
            ";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindValue(':id_article', $id_article, PDO::PARAM_INT);
        $stmt->execute();
        $infos = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
}
