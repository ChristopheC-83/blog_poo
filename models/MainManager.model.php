<?php

// les modelsManager permettent la récupéretion, le traitement des données
// ils gèrent aussi la partie logique du site.
// Il est issu de ImagesManager (issu de Model), car ImagesManager utiles partout !

require_once("./models/Images.model.php");
class MainManager extends ImagesManager
{
    // récupérer les themes pour faire par exemple les boutons de la barre de menu
    public function getAllTopics()
    {
        $req = "SELECT * FROM topics ORDER BY id_topic asc";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }
    // récupère les images des articles
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
    // récupère les textes des articles
    public function getTextesById($id_article)
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
    // récupère les sliders des articles
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
    // récupère les videos des articles (liens youtube par exemple)
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
